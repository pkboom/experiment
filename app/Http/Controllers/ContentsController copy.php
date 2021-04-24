<?php

namespace App\Http\Controllers;

use App\Certificate;
use App\Content;
use App\EnrolmentContent;
use App\Rules\UniqueContentInCourse;
use App\Section;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class ContentsController extends Controller
{
    public function create(Section $section)
    {
        return Inertia::render('Contents/Create', [
            'course' => $section->course->only('id', 'name'),
            'section' => $section->only('id'),
            'elearnings' => Auth::user()->authAccount()->elearnings()
                ->where('is_uploaded', true)
                ->orderBy('name')
                ->get()
                ->map
                ->only('id', 'name'),
            'quizzes' => Auth::user()->authAccount()->quizzes()
                ->orderBy('name')
                ->get()
                ->map
                ->only('id', 'name'),
            'files' => Auth::user()->authAccount()->files()
                ->where('is_uploaded', true)
                ->orderBy('name')
                ->get()
                ->map
                ->only('id', 'name'),
            'links' => Auth::user()->authAccount()->links()
                ->orderBy('name')
                ->get()
                ->map
                ->only('id', 'name'),
            'contents' => $section->contents
                ->sortBy('name')
                ->map->only('id', 'name')
                ->values(),
            'certificates' => Certificate::getCertificates(),
        ]);
    }

    public function store(Section $section)
    {
        $content = $section->contents()->create(
            Request::validate([
                'type' => ['required', 'string', 'in:'.implode(',', Content::$types)],
                'name' => ['required', 'string', 'max:255'],
                'elearning_id' => ['nullable', 'required_if:type,elearning', 'exists:elearnings,id', new UniqueContentInCourse($section)],
                'quiz_id' => ['nullable', 'required_if:type,quiz', 'exists:quizzes,id', new UniqueContentInCourse($section)],
                'file_id' => ['nullable', 'required_if:type,file', 'exists:files,id', new UniqueContentInCourse($section)],
                'link_id' => ['nullable', 'required_if:type,link', 'exists:links,id', new UniqueContentInCourse($section)],
                'description' => ['nullable', 'string'],
            ]) + ['account_id' => Auth::user()->authAccount()->id]
        );

        if ($section->hasUsers()) {
            $section->enrolments->each(function ($enrolment) use ($content) {
                $content->enrolments()->attach($enrolment);
            });
        }

        return Redirect::route('contents.edit', $content)->with('success', 'Content created.');
    }

    public function edit(Content $content)
    {
        return Inertia::render('Contents/Edit', [
            'course' => $content->section->course->only('id', 'name'),
            'content' => [
                'id' => $content->id,
                'name' => $content->name,
                'description' => $content->description,
            ],
        ]);
    }

    public function update(Content $content)
    {
        if (Request::wantsJson()) {
            $content->update(
                Request::validate([
                    'prerequisite_id' => ['nullable', 'exists:contents,id'],
                ])
            );

            if ($content->prerequisite) {
                $prerequisiteEnrolmentContents = $content->prerequisite->enrolmentContents;

                $content->enrolmentContents->each(function ($enrolmentContent) use ($prerequisiteEnrolmentContents) {
                    $enrolmentContent->update([
                        'prerequisite_id' => $prerequisiteEnrolmentContents->firstWhere('enrolment_id', $enrolmentContent->enrolment_id)->id,
                    ]);
                });
            } else {
                $content->enrolmentContents()->update(['prerequisite_id' => null]);
            }

            return;
        }

        $content->update(
            Request::validate([
                'name' => ['required', 'string', 'max:255'],
                'description' => ['nullable', 'string'],
            ])
        );

        return Redirect::back()->with('success', 'Content updated.');
    }

    public function destroy(Content $content)
    {
        if ($content->type === 'class') {
            $content->classes()->delete();
        } elseif ($content->type === 'elearning') {
            $content->progresses()->delete();
        } elseif ($content->type === 'quiz') {
            $content->attempts->each(function ($attempt) {
                $attempt->attemptQuestions()->delete();

                $attempt->delete();
            });
        }

        EnrolmentContent::whereIn('prerequisite_id', $content->enrolmentContents->pluck('id'))
            ->update(['prerequisite_id' => null]);

        $content->enrolments()->detach();

        Content::where('prerequisite_id', $content->id)
            ->update(['prerequisite_id' => null]);

        $content->delete();

        return Redirect::route('courses.edit', $content->section->course_id)->with('success', 'Content deleted.');
    }
}

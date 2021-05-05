<?php

return [
    'default_collection' => null,

    'collections' => [
        'posts' => [
            'disk' => 'posts',
            'sheet_class' => \App\Docs\DocumentationPage::class,
            'path_parser' => \Spatie\Sheets\PathParsers\SlugWithDateParser::class,
            'content_parser' => \Spatie\Sheets\ContentParsers\MarkdownWithFrontMatterParser::class,
        ],
    ],
];

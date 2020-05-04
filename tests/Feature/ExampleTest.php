<?php

namespace Tests\Feature;

use App\Role;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function testBasicTest()
    {
        $user = factory(User::class)->create();

        $role = Role::make([
            'name' => 'master',
        ]);

        $user->roles()->sync($role);

        dump($user->roles->toArray());

        // $user->roles()->save($role);

        // dump($user->roles->toArray());
    }
}

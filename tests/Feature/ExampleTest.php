<?php

namespace Tests\Feature;

use App\Models\Message;
use HFarm\EmailDomainRule\EmailDomainRule;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function testExample()
    {
        $email = 'my-email@example.com';
    
        Validator::make([
            'email' => $email,
        ], [
            'email' => [
                'string',
                'email',
                new EmailDomainRule,
            ],
        ])->validated(); 
    }
}

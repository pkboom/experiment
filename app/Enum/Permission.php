<?php

namespace App\Enum;

use App\Attributes\Abilities;
use App\Attributes\Description;
use App\Attributes\Key;

enum Permission: string
{
    #[Key('admin')]
    #[Description('Admin users can perform any action.')]
    #[Abilities(['create','read','update','delete'])]
    case ADMIN = 'ADMIN';

    #[Key('editor')]
    #[Description('Editor users have the ability to read, and update.')]
    #[Abilities(['read','update'])]
    case EDITOR = 'EDITOR';
}

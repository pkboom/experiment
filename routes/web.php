<?php

use App\User;
use Spatie\QueryBuilder\QueryBuilder;

Route::get('users', function () {
    $queryBuilder = QueryBuilder::for(User::class)
        ->allowedIncludes(['posts'])
        ->get();

    return $queryBuilder;
});

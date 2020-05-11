<?php

Route::get('/', function () {
    return Post::all();
});

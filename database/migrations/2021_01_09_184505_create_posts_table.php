<?php

use App\Enums\StatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->enum('status', StatusEnum::toValues());
            $table->enum('nullable_enum', StatusEnum::toValues())->nullable();
            $table->json('array_of_enums');
            $table->timestamps();
        });
    }
}

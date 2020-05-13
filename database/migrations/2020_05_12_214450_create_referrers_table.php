<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferrersTable extends Migration
{
    public function up()
    {
        Schema::create('referrers', function (Blueprint $table) {
            $table->id();
            $table->string('uri');
            $table->string('referrer')->nullable();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('referrers');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeviceRenderingTable extends Migration
{
    public function up()
    {
        Schema::create('device_renderings', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->nullable();
            $table->bigInteger('device_id')->nullable();
            $table->bigInteger('rendering_id')->nullable();
            $table->timestamp('rendering_completed_at')->nullable();
            $table->timestamps();
        });
    }
}

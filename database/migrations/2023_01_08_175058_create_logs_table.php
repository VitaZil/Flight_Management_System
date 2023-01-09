<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up():void
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->string('flight_id');
            $table->dateTime('departure_time');
            $table->bigInteger('departure_airport_id');
            $table->dateTime('arrival_time');
            $table->bigInteger('arrival_airport_id');
            $table->string('timezone');
            $table->integer('seats');
            $table->timestamps();
        });
    }

    public function down():void
    {
        Schema::dropIfExists('logs');
    }
};

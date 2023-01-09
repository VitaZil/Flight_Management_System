<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->dateTime('departure_time');
            $table->bigInteger('departure_airport_id')->unsigned();
            $table->foreign('departure_airport_id')->references('id')->on('airports')->onDelete('cascade');
            $table->dateTime('arrival_time');
            $table->bigInteger('arrival_airport_id')->unsigned();
            $table->foreign('arrival_airport_id')->references('id')->on('airports')->onDelete('cascade');
            $table->string('timezone');
            $table->integer('seats');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};

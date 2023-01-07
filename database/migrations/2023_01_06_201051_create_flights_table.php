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
            $table->bigInteger('depairport')->unsigned();
            $table->foreign('depairport')->references('id')->on('airports')->onDelete('cascade');
            $table->dateTime('arrival_time');
            $table->bigInteger('arrairport')->unsigned();
            $table->foreign('arrairport')->references('id')->on('airports')->onDelete('cascade');
            $table->integer('seats');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};

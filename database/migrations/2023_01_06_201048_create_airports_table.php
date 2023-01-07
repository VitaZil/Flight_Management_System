<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('airports', function (Blueprint $table) {
            $table->id();
            $table->string('ident');
            $table->string('type');
            $table->string('name');
            $table->integer('elevation_ft');
            $table->string('continent');
            $table->string('iso_country');
            $table->string('iso_region');
            $table->string('municipality');
            $table->string('gps_code');
            $table->string('iata_code');
            $table->string('local_code');
            $table->string('coordinates');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('airports');
    }
};

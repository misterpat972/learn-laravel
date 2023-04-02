<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            // nom de la section
            $table->string('title');
            // url de la video de la section 
            $table->string('video');
            // slug de la section à afficher dans l'url
            $table->string('slug');
            // temps de lecture de la section en seconde 
            $table->string('playtime_seconds');
            // id du cours auquel la section appartient 
            $table->unsignedBigInteger('course_id');
            // timestamp de creation et de modification de la section
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};

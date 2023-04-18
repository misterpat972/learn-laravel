<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Type\Integer;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            // user id est une clé étrangère qui fait référence à la clé primaire de la table users
            $table->integer('user_id');
            // image est une chaine de caractère qui contient le nom de l'image qui sera stockée dans le dossier public/images
            $table->string('image');
            $table->string('subtitle');
            $table->string('slug');
            $table->text('description');
            $table->float('price')->nullable();
            $table->integer('category_id');
            $table->boolean('published')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};

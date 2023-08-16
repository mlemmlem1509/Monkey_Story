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
        Schema::create('pages', function (Blueprint $table) {
            $table->id('idPage');
            $table->integer('pageNumber');
            $table->unsignedBigInteger('storyID');
            $table->unsignedBigInteger('imageID');
            $table->foreign('storyID')->references('idStory')->on('stories');
            $table->foreign('imageID')->references('idImage')->on('images');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};

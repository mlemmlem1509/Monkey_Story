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
        Schema::create('contents', function (Blueprint $table) {
            $table->id('idPageContent');
            $table->string('name');
            $table->integer('positionX');
            $table->integer('positionY');
            $table->integer('width');
            $table->integer('height');
            $table->unsignedBigInteger('pageID');
            $table->unsignedBigInteger('textID');
            $table->foreign('pageID')->references('idPage')->on('pages');
            $table->foreign('textID')->references('idText')->on('texts');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};

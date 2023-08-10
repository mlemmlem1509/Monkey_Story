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
        Schema::create('texts', function (Blueprint $table) {
            $table->id('idText');
            $table->string('name');
            $table->integer('positionX');
            $table->integer('positionY');
//            $table->foreignId('idPage')->constrained()->onDelete('cascade')->onUpdate('cascade');
//            $table->foreignId('idPageContent')->constrained()->onDelete('cascade')->onUpdate('cascade');
//            $table->foreignId('idAudio')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('text');
    }
};

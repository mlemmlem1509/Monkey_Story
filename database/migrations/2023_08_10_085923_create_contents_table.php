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
//            $table->foreignId('idPage')->constrained()->onDelete('cascade')->onUpdate('cascade');
//            $table->foreignId('idText')->constrained()->onDelete('cascade')->onUpdate('cascade');
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

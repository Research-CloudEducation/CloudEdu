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
            $table->integer('id')->unsigned();
            $table->json('title');
            $table->json('type');

            $table->integer('categoryId')->unsigned();
            $table->integer('teacherId')->unsigned();

            // $table->foreignId('categoryId')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreignId('teacherId')->references('id')->on('teachers')->onDelete('cascade')->onUpdate('cascade');
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

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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('comment');
            $table->integer('studentId')->unsigned();
            $table->integer('teacherId')->unsigned();
            $table->integer('contentId')->unsigned();


            // $table->foreignId('studentId')->references('id')->on('students')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreignId('teacherId')->references('id')->on('teachers')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreignId('contentId')->references('id')->on('contents')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};

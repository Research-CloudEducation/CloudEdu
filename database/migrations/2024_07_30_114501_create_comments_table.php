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
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('teacher_id');
            $table->unsignedBigInteger('content_id');


            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('content_id')->references('id')->on('contents')->onDelete('cascade')->onUpdate('cascade');
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

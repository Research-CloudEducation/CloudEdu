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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->text('profile')->nullable();
            $table->string('phone');
            $table->string('address');
            $table->unsignedBigInteger('school_id');
            $table->unsignedBigInteger('class_id');
            $table->timestamps();

            $table->foreign('school_id')->references('id')->on('schools');
            $table->foreign('class_id')->references('id')->on('class_levels');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};

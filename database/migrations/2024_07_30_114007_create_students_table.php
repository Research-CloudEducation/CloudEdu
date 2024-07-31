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
            $table->integer('id')->unsigned();
            $table->json('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone');
            $table->string('address');
            $table->integer('schoolId')->unsigned();
            $table->integer('classId')->unsigned();
            $table->timestamps();

            // $table->foreign('schoolId')->references('id')->on('schools')->onDelete('cascade');
            // $table->foreign('classId')->references('id')->on('class_levels')->onDelete('cascade');

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

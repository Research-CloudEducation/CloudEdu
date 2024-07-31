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
        Schema::create('teachers', function (Blueprint $table) {
            $table->integer('id')->unsigned();
            $table->json('name');
            $table->string('email')->unique();
            $table->string('password');
            // $table->string('rank'); // this will see it later
            $table->string('phone');
            $table->string('address');
            $table->integer('schoolId')->unsigned();

            // $table->foreign('schoolId')->references('id')->on('schools')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};

<?php

namespace Database\Seeders;

use App\Models\Student as ModelsStudent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Student extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // try to store data into database in student table
        ModelsStudent::factory(10)->create();
    }
}

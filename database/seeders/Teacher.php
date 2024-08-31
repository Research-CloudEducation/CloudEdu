<?php

namespace Database\Seeders;

use App\Models\Teacher as ModelsTeacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Teacher extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // try to store fake data into database 
        ModelsTeacher::factory(10)->create();
    }
}

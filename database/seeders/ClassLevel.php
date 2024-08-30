<?php

namespace Database\Seeders;

use App\Models\ClassLevel as ModelsClassLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassLevel extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // try to stor data into class level 
        ModelsClassLevel::factory(3)->create();
    }
}

<?php

namespace Database\Seeders;

use App\Models\School as modelSchool;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class School extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // try to create school seeder 
        modelSchool::factory(15)->create();
    }
}

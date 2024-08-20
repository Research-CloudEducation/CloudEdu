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
        modelSchool::create([
            'name' => json_encode([
                'ar' => 'تجربة 1',
                'en' => 'tester 1',
            ]),
            'description' => json_encode([
                'ar' => ' للتجربة الاولي ',
                'en' => 'for tester just ',
            ]),
            'address' => 'address for location',
        ]);
    }
}

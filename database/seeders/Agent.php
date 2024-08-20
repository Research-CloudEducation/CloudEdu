<?php

namespace Database\Seeders;

use App\Models\Agent as ModelsAgent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Agent extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // try to create seeder of agent 
        ModelsAgent::create([
            'name' => json_encode([
                'ar' => 'المقداد وكيل',
                'en' => 'Almeqdad agent'
            ]),
            'email' => 'agent@agent.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'is_agent' => 1,
            'address' => 'test locate',
            'phone' => '0902407373',
            'school_id' => 1,
        ]);
    }
}

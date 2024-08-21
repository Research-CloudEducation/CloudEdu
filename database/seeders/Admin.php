<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Admin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // 
         $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'product-list',
            'product-create',
            'product-edit',
            'product-delete'
        ];
        //create default credential for admin

       $user = User::create([
            'name' => json_encode([
                'ar' => 'المقداد محمد',
                'en' => 'Almeqdad Mohammed'
            ]),
            'email' => 'admin@app.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'is_admin' => 1,
            'remember_token' => Str::random(10),
        ]);

        $role = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole($role->id);
    }
}

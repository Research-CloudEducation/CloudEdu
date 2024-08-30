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
            'users-list',
            'users-create',
            'users-edit',
            'users-delete',
            'school-list',
            'school-create',
            'school-edit',
            'school-delete',
            'agent-list',
            'agent-create',
            'agent-edit',
            'agent-delete',
            'teacher-list',
            'teacher-create',
            'teacher-edit',
            'teacher-delete',
            'student-list',
            'student-create',
            'student-edit',
            'student-delete',
            'class-list',
            'class-create',
            'class-edit',
            'class-delete',
            'subject-list',
            'subject-create',
            'subject-edit',
            'subject-delete',
            'category-list',
            'category-create',
            'category-edit',
            'category-delete',
            'content-list',
            'content-create',
            'content-edit',
            'content-delete'
        ];
        //create default credential for admin

       $user = User::create([
            'name' => json_encode([
                'ar' => 'المقداد محمد',
                'en' => 'Almeqdad Mohammed'
            ]),
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'is_admin' => 1,
            'school_id' => 1,
            'remember_token' => Str::random(10),
        ]);

        $role = Role::create(['name' => 'Admin']);
        
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
          }

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole($role->id);
    }
}

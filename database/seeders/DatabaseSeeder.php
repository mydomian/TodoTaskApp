<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$12$E3sSQpq.nAgl2DPMzCnSLufK7ZCcX7YOCDdJH.xUsFFXSHCOvKZ7u', //12345678
            'access_code' => '12345678',
            'user_type' => 'admin'
        ]);
        \App\Models\User::factory(5)->create();

        $permissions = [
            'create todo',
            'edit todo',
            'delete todo',
            'assign todo'
        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}

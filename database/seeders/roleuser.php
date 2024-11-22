<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class roleuser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleadmin= Role::createOrFirst(['name'=>'admin']);
        Role::createOrFirst(['name'=>'user']);

        $admin= User::create([
            'name'=>'Admin',
            'email'=> 'admin@gmail.com',
            'password'=> bcrypt('password'),
        ]);

        $admin->assignRole($roleadmin);
    }
}

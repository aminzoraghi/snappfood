<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles
        $roles = ['admin','seller','user'];
        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

// Assign permissions to roles
        $admin = Role::findByName('admin');
        $seller = Role::findByName('seller');
        $user = Role::findByName('user');


// Create sample users and assign roles
       $admin1=User::query()->create(['name'=>'admin','email'=> 'admin@gmail.com','password'=> '12345678']);
       $admin1->assignRole($admin);
        $seller1=User::query()->create(['name'=>'seller','email'=> 'seller@gmail.com','password'=> '12345678']);
        $seller1->assignRole($seller);
        $user1=User::query()->create(['name'=>'user','email'=> 'user@gmail.com','password'=> '12345678']);
        $user1->assignRole($user);
    }

}

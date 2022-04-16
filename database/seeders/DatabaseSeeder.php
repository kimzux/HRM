<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('permissions')->insert([
            [
                'name' => 'View Dashboard',
                'guard_name' => 'web'
            ],
           
            [
                'name' => 'Create user',
                'guard_name' => 'web'
            ],
            [
                'name' => 'View users',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Deleta User',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Edit user',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Add user role',
                'guard_name' => 'web'
            ],
            [
                'name' => 'View role',
                'guard_name' => 'web'
            ],
            [
                'name' => 'add role',
                'guard_name' => 'web'
            ],
             [
                'name' => 'delete role',
                'guard_name' => 'web'
            ],
             [
                'name' => 'edit role',
                'guard_name' => 'web'
            ],
             
        ]);
    }

    }

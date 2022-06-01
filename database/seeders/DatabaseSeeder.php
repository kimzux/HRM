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
                'name' => 'Update users',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Delete User',
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
            [
                'name' => 'update role',
                'guard_name' => 'web'
            ],
            
            [
                'name' => ' Create Department',
                'guard_name' => 'web'
            ],

            [
                'name' => ' View Department',
                'guard_name' => 'web'
            ],

            [
                'name' => ' Edit Department',
                'guard_name' => 'web'
            ],

            [
                'name' => ' Update Department',
                'guard_name' => 'web'
            ],

            [
                'name' => ' Delete Department',
                'guard_name' => 'web'
            ],

            [
                'name' => ' Show Department',
                'guard_name' => 'web'
            ],
            [
                'name' => ' Create Designation',
                'guard_name' => 'web'
            ],
            [
                'name' => ' View Designation',
                'guard_name' => 'web'
            ],

            [
                'name' => ' Edit Designation',
                'guard_name' => 'web'
            ],
            [
                'name' => ' Update Designation',
                'guard_name' => 'web'
            ],
            [
                'name' => ' Show Designation',
                'guard_name' => 'web'
            ],
            [
                'name' => ' View Setting',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Create Setting',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Show Setting',
                'guard_name' => 'web'
            ],
            [
                'name' => ' View Notice',
                'guard_name' => 'web'
            ],
        



        ]);
    }

    }

<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;


class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {

        $user = User::create([

            'name' => 'senorita michael', 

            'email' => 'admin@gmail.com',

            'password' => bcrypt('seno@ark.co.tz')

        ]);

    

        $role = Role::create(['name' => 'Super Admin']);

     

        $permissions = Permission::pluck('id','id')->all();

   

        $role->syncPermissions($permissions);

     

        $user->assignRole([$role->id]);

    }
}
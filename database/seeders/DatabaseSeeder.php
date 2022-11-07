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
                'guard_name' => 'web',
            ],

            [
                'name' => 'Create user',
                'guard_name' => 'web',
            ],
            [
                'name' => 'View users',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Update users',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Delete User',
                'guard_name' => 'web',
            ],

            [
                'name' => 'Edit user',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Add user role',
                'guard_name' => 'web',
            ],
            [
                'name' => 'View role',
                'guard_name' => 'web',
            ],
            [
                'name' => 'add role',
                'guard_name' => 'web',
            ],

            [
                'name' => 'delete role',
                'guard_name' => 'web',
            ],
            [
                'name' => 'edit role',
                'guard_name' => 'web',
            ],
            [
                'name' => 'update role',
                'guard_name' => 'web',
            ],

            [
                'name' => 'Create Department',
                'guard_name' => 'web',
            ],

            [
                'name' => 'View Department',
                'guard_name' => 'web',
            ],

            [
                'name' => 'Edit Department',
                'guard_name' => 'web',
            ],

            [
                'name' => 'Update Department',
                'guard_name' => 'web',
            ],

            [
                'name' => 'Delete Department',
                'guard_name' => 'web',
            ],

            [
                'name' => 'Show Department',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Create Designation',
                'guard_name' => 'web',
            ],
            [
                'name' => 'View Designation',
                'guard_name' => 'web',
            ],

            [
                'name' => 'Edit Designation',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Update Designation',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Show Designation',
                'guard_name' => 'web',
            ],
            [
                'name' => 'View Setting',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Create Setting',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Show Setting',
                'guard_name' => 'web',
            ],
            [
                'name' => 'View Notice',
                'guard_name' => 'web',
            ],

            [
                'name' => 'view employee',
                'guard_name' => 'web',
            ],
            [
                'name' => 'create employee',
                'guard_name' => 'web',
            ],
            [
                'name' => 'update employee',
                'guard_name' => 'web',
            ],
            [
                'name' => 'delete employee',
                'guard_name' => 'web',
            ],
            [
                'name' => 'show employee',
                'guard_name' => 'web',
            ],
            [
                'name' => 'edit employee',
                'guard_name' => 'web',
            ],
            [
                'name' => 'see employee',
                'guard_name' => 'web',
            ],
            [
                'name' => 'view disciplinary',
                'guard_name' => 'web',
            ],
            [
                'name' => 'create disciplinary',
                'guard_name' => 'web',
            ],
            [
                'name' => 'edit disciplinary',
                'guard_name' => 'web',
            ],
            [
                'name' => 'update disciplinary',
                'guard_name' => 'web',
            ],
            [
                'name' => 'delete disciplinary',
                'guard_name' => 'web',
            ],
            [
                'name' => 'view holiday',
                'guard_name' => 'web',
            ],
            [
                'name' => 'create holiday',
                'guard_name' => 'web',
            ],
            [
                'name' => 'edit holiday',
                'guard_name' => 'web',
            ],
            [
                'name' => 'update holiday',
                'guard_name' => 'web',
            ],

            [
                'name' => 'delete holiday',
                'guard_name' => 'web',
            ],
            [
                'name' => 'view leave_type',
                'guard_name' => 'web',
            ],
            [
                'name' => 'create leave_type',
                'guard_name' => 'web',
            ],

            ['name' => 'edit leave_type', 'guard_name' => 'web'],
            [
                'name' => 'update leave_type',
                'guard_name' => 'web',
            ],
            [
                'name' => 'delete leave_type',
                'guard_name' => 'web',
            ],
            [
                'name' => 'view leave_application',
                'guard_name' => 'web',
            ],
            [
                'name' => 'create leave_application',
                'guard_name' => 'web',
            ],
            [
                'name' => 'edit leave_application',
                'guard_name' => 'web',
            ],
            [
                'name' => 'update leave_application',
                'guard_name' => 'web',
            ],
            [
                'name' => 'view leave',
                'guard_name' => 'web',
            ],
            [
                'name' => 'create leave',
                'guard_name' => 'web',
            ],
            [
                'name' => 'edit leave',
                'guard_name' => 'web',
            ],
            [
                'name' => 'update leave',
                'guard_name' => 'web',
            ],
            [
                'name' => 'delete leave_application',
                'guard_name' => 'web',
            ],
            [
                'name' => 'approve leave_application',
                'guard_name' => 'web',
            ],
            [
                'name' => 'reject leave_application',
                'guard_name' => 'web',
            ],
            [
                'name' => 'view all department application',
                'guard_name' => 'web',
            ],

            [
                'name' => 'edit leave_earn',
                'guard_name' => 'web',
            ],
            [
                'name' => 'create leave_earn',
                'guard_name' => 'web',
            ],
            [
                'name' => 'view leave_earn',
                'guard_name' => 'web',
            ],
            [
                'name' => 'update leave_earn',
                'guard_name' => 'web',
            ],
            [
                'name' => 'view task',
                'guard_name' => 'web',
            ],
            [
                'name' => 'create task',
                'guard_name' => 'web',
            ],

            [
                'name' => 'create project',
                'guard_name' => 'web',
            ],
            [
                'name' => 'view project',
                'guard_name' => 'web',
            ],
            [
                'name' => 'edit project',
                'guard_name' => 'web',
            ],
            [
                'name' => 'update project',
                'guard_name' => 'web',
            ],
            [
                'name' => 'delete project',
                'guard_name' => 'web',
            ],
            [
                'name' => 'view payrol',
                'guard_name' => 'web',
            ],

            [
                'name' => 'view logsupport',
                'guard_name' => 'web',
            ],

            [
                'name' => 'create logsupport',
                'guard_name' => 'web',
            ],
            [
                'name' => 'edit logsupport',
                'guard_name' => 'web',
            ],
            [
                'name' => 'update logsupport',
                'guard_name' => 'web',
            ],
            [
                'name' => 'delete logsupport',
                'guard_name' => 'web',
            ],
            [
                'name' => 'view logistic',
                'guard_name' => 'web',
            ],
            [
                'name' => 'create logistic',
                'guard_name' => 'web',
            ],
            [
                'name' => 'edit logistic',
                'guard_name' => 'web',
            ],
            [
                'name' => 'update logistic',
                'guard_name' => 'web',
            ],
            [
                'name' => 'delete logistic',
                'guard_name' => 'web',
            ],
            [
                'name' => 'delete loan',
                'guard_name' => 'web',
            ],
            [
                'name' => 'edit loan',
                'guard_name' => 'web',
            ],
            [
                'name' => 'update loan',
                'guard_name' => 'web',
            ],
            [
                'name' => 'view loan',
                'guard_name' => 'web',
            ],
            [
                'name' => 'create loan',
                'guard_name' => 'web',
            ],
            [
                'name' => 'create loan_install',
                'guard_name' => 'web',
            ],
            [
                'name' => 'view loan_install',
                'guard_name' => 'web',
            ],
            [
                'name' => 'view field',
                'guard_name' => 'web',
            ],
            [
                'name' => 'create field',
                'guard_name' => 'web',
            ],
            [
                'name' => 'edit field',
                'guard_name' => 'web',
            ],
            [
                'name' => 'delete field',
                'guard_name' => 'web',
            ],
            [
                'name' => 'update field',
                'guard_name' => 'web',
            ],
            [
                'name' => 'view deduction',
                'guard_name' => 'web',
            ],
            [
                'name' => 'create deduction',
                'guard_name' => 'web',
            ],
            [
                'name' => 'edit deduction',
                'guard_name' => 'web',
            ],
            [
                'name' => 'delete deduction',
                'guard_name' => 'web',
            ],
            [
                'name' => 'update deduction',
                'guard_name' => 'web',
            ],
            [
                'name' => 'view category',
                'guard_name' => 'web',
            ],
            [
                'name' => 'create category',
                'guard_name' => 'web',
            ],
            [
                'name' => 'edit category',
                'guard_name' => 'web',
            ],
            [
                'name' => 'update category',
                'guard_name' => 'web',
            ],
            [
                'name' => 'delete category',
                'guard_name' => 'web',
            ],
            [
                'name' => 'view assetlist',
                'guard_name' => 'web',
            ],
            [
                'name' => 'edit assetlist',
                'guard_name' => 'web',
            ],
            [
                'name' => 'create assetlist',
                'guard_name' => 'web',
            ],
            [
                'name' => 'delete assetlist',
                'guard_name' => 'web',
            ],
            [
                'name' => 'update assetlist',
                'guard_name' => 'web',
            ],
            [
                'name' => 'view perdeim-employee',
                'guard_name' => 'web',
            ],
            [
                'name' => 'create perdeim-employee',
                'guard_name' => 'web',
            ],

            [
                'name' => 'view perdeim',
                'guard_name' => 'web',
            ],
            [
                'name' => 'create perdeim',
                'guard_name' => 'web',
            ],
            [
                'name' => 'view all department perdeim',
                'guard_name' => 'web',
            ],
            [
                'name' => 'approve perdeim',
                'guard_name' => 'web',
            ],
            [
                'name' => 'reject perdeim',
                'guard_name' => 'web',
            ],

            [
                'name' => 'view perdeimretires',
                'guard_name' => 'web',
            ],
            [
                'name' => 'create perdeimretires',
                'guard_name' => 'web',
            ],

            [
                'name' => 'approve perdeim-retire',
                'guard_name' => 'web',
            ],
            [
                'name' => 'reject perdeim-retire',
                'guard_name' => 'web',
            ],
            [
                'name' => 'download perdeim-retire',
                'guard_name' => 'web',
            ],
            [
                'name' => 'View perdeim-retires-view',
                'guard_name' => 'web',
            ],
            [
                'name' => 'create perdeim-retires-view',
                'guard_name' => 'web',
            ],
        ]);
        $this->call(AdminUserSeeder::class);
    }
}

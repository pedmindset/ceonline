<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'admin', 
                'guard_name' => 'web', 
            ],
            [
                'name' => 'accountant',
                'guard_name' => 'web', 
            ],
            [
                'name' => 'regional pastor',
                'guard_name' => 'web', 
            ],

            [
                'name' => 'zonal pastor',
                'guard_name' => 'web', 
            ],
            [
                'name' => 'group pastor',
                'guard_name' => 'web', 
            ],
            [
                'name' => 'pastor',
                'guard_name' => 'web', 
            ],
        ];

        foreach($roles as $role){
            Role::create($role);
        }
    }
}

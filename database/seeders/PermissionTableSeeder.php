<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		$permissions = [
            'configure',
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'user-list',
           'user-create',
           'user-edit',
           'user-delete',
		   'contact-list',
		   'contact-create',
		   'contact-edit',
		   'contact-delete',
		   'brand-list',
		   'brand-create',
		   'brand-edit',
		   'brand-delete',
		   'region-list',
		   'region-create',
		   'region-edit',
		   'region-delete',
		   'department-list',
		   'department-create',
		   'department-edit',
		   'department-delete'
        ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}

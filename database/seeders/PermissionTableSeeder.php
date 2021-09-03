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
		   'department-delete',
           'loantype-list',
           'loantype-create',
           'loantype-edit',
           'loantype-delete',
           'vehicle-list',
           'vehicle-create',
           'vehicle-edit',
           'vehicle-delete',
           'email-template-list',
           'email-template-create',
           'email-template-edit',
           'email-template-delete',
           'lists-list',
           'lists-create',
           'lists-edit',
           'lists-delete',

           'booking-list',
           'booking-create',
           'booking-edit',
           'booking-delete'
        ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}

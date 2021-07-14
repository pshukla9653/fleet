<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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
		$user = User::create([
			'company_name' => 'None',
        	'first_name' => 'Prashant',
			'last_name' => 'Shukla', 
        	'email' => 'prashant@ssak.co.in',
        	'password' => bcrypt('12345678')
        ]);
  
        $role = Role::create(['name' => 'Admin']);
   
        $permissions = Permission::pluck('id','id')->all();
  
        $role->syncPermissions($permissions);
   
        $user->assignRole([$role->id]);
		
		$permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           
        ];
   
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}

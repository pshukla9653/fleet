<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Company;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		
		$company = Company::create([
            'company_name' => 'Fleet',
        	'job_title' => 'Company',
			
        ]);

        $user = User::create([
            'company_id' => $company['id'],
        	'first_name' => 'Company',
			'last_name' => 'admin', 
        	'email' => 'user@fleet.com',
        	'password' => bcrypt('password')
        ]);
    
        $role = Role::create(['name' => 'Admin','company_id'=>1]);
     
        
		$permissions = Permission::pluck('id','id')->all();
   		
        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);
    }
}

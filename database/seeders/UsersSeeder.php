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
		$Company =  Company::create([
            'company_name' => 'News Paper Fleet',
			'job_title' => 'Director',
			'address' => 'Street Address',
			'city' => 'City',
			'country' => 'Country',
			'post_code' => '123456',
        ]);
		$user = User::create([
            'company_id' => $Company['id'],
        	'first_name' => 'Company',
			'last_name' => 'admin', 
        	'email' => 'admin@fleet.com',
        	'password' => bcrypt('12345678')
        ]);
    
        $role = Role::create(['name' => 'Company Admin']);
     
        
		$permissions = Permission::pluck('id','id')->all();
   		
        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);
    }
}

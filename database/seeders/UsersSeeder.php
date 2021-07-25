<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
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
		$user = User::create([
            'company_id' => '0',
        	'first_name' => 'Hira',
			'last_name' => 'Shukla', 
        	'email' => 'hira@ssak.co.in',
        	'password' => bcrypt('12345678')
        ]);
    
        $role = Role::create(['name' => 'New Role']);
     
        $permissions = array(5,6,7,8);
   		
        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);
    }
}
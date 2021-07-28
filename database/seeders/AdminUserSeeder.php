<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
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
        //
		$user = User::create([
            'company_id' => '0',
        	'first_name' => 'Super',
			'last_name' => 'Admin', 
        	'email' => 'superadmin@fleet.com',
        	'password' => bcrypt('12345678')
        ]);
    
        $role = Role::create(['name' => 'Super Admin']);
     
        
   		$permissions = array(5,6,7,8);
        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);
    }
}

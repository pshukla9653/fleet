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
            'company_id' => null,
        	'first_name' => 'Super',
			'last_name' => 'Admin', 
        	'email' => 'admin@fleet.com',
        	'password' => bcrypt('password')
        ]);
    
        
    }
}

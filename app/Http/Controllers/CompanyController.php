<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CompanyController extends Controller
{
    //
    public function index(Request $request)
    {
        //
		
        $data = Company::orderBy('id','DESC')->paginate(5);
       // $users = User::join('posts', 'users.id', '=', 'posts.user_id')
       //        ->get(['users.*', 'posts.descrption']);

        return view('company.index', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        
        return view('company.create');
    }

    

    public function store(Request $request)
    {
        $this->validate($request, [
            'company_name' => ['required', 'string', 'max:255'],
			'first_name' => ['required', 'string', 'max:255'],
            'email' => 'required|email|unique:users,email',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            
        ]);
    
        $Company =  Company::create([
            'company_name' => $request['company_name'],
			'job_title' => $request['job_title'],
			'address' => $request['address'],
			'city' => $request['city'],
			'country' => $request['country'],
			'post_code' => $request['post_code'],
        ]);
		
		$user =  User::create([
			'company_id' => $Company['id'],
            'first_name' => $request['first_name'],
			'last_name' => $request['last_name'],
			'email' => $request['email'],
			'phone_number' => $request['phone_number'],
            'password' => Hash::make($request['password']),
        ]);
        
        $role = Role::create(['name' => 'Admin','company_id'=>$Company['id']]);
     
        
		$permissions = Permission::pluck('id','id')->all();
   		
        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);

        return redirect()->route('companies.index')
                        ->with('success','Company created successfully');
    }


    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
    
        return view('users.edit',compact('user','roles','userRole'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
    
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }

}

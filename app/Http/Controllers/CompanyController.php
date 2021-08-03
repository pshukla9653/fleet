<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller
{
    //
    public function index(Request $request)
    {
        //
		
        $data = Company::orderBy('id','DESC')->paginate(5);
        
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
    
        return redirect()->route('companies.index')
                        ->with('success','Company created successfully');
    }

}

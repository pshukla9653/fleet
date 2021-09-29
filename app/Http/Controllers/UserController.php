<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;

use DB;
use Hash;
use Illuminate\Support\Arr;

class UserController extends Controller
{

	function __construct()
    {
        //  $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
        //  $this->middleware('permission:user-create', ['only' => ['create','store']]);
        //  $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        //  $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = Role::pluck('name','name')->all();
        if($request->input('search')){
            $query = $request->input('search');
            $data = User::where('first_name', 'LIKE', '%'. $query. '%')
                ->orWhere('last_name', 'LIKE', '%'. $query. '%')
                ->orWhere('phone_number', 'LIKE', '%'. $query. '%')
                ->orWhere('email', 'LIKE', '%'. $query. '%')
                ->orderBy('id','DESC')
                ->paginate(10);

            return view('users.index', compact('data','roles', 'query'));

        } else{
            $data = User::orderBy('id','DESC')->paginate(10);
            return view('users.index', compact('data','roles'))
                ->with('i', ($request->input('page', 1) - 1) * 5);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->id){
            $validation = [
                'first_name' => 'required',
                'email' => 'required|email|unique:users,email,'.$request->id,
                'password' => 'required|same:confirm-password',
                'roles' => 'required'
            ];
        }else{
            $validation = [
                'first_name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|same:confirm-password',
                'roles' => 'required'
            ];
        }
		$this->validate($request, $validation);

        $input = $request->all();

        if($request->id){
            $user = User::find($request->id);

            if($input['password']){
                $input['key_token'] = $input['password'];
                $input['password'] = Hash::make($input['password']);
            }

            $user->update($input);

        }
        else
        {
            $input['key_token'] = $input['password'];
            $input['password'] = Hash::make($input['password']);
    	    $input['company_id'] = Auth()->user()->company_id;
            $user = User::create($input);
            $user->assignRole($request->input('roles'));
        }
        return response()->json(['success' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
    public function edit(Request $request)
    {
        //echo "hi";exit;
        $user = User::find($request->id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        $data = ['user' => $user,'roles' => $roles,'userRole' => $userRole];
        return response()->json($data);
        //return view('users.edit',compact('user','roles','userRole'));
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
    public function destroy(Request $request)
    {
        User::find($request->id)->delete();
        return response()->json(['success' => true]);
    }
}

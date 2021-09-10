<?php
    
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
    
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
         $this->middleware('permission:role-create', ['only' => ['create','store']]);
         $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        $permission = Permission::get();
       
		if($request->input('search')){
            $query = $request->input('search');
            $roles = Role::where('name', 'LIKE', '%'. $query. '%')->orderBy('id','DESC')->paginate(10);
           
            return view('roles.index', compact('roles','permission'));
            
        }
        else{
        $roles = Role::orderBy('id','DESC')->paginate(5);
        return view('roles.index',compact('roles','permission'))
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
        $permission = Permission::get();
        return view('roles.create',compact('permission'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //echo 'hello'; die;
        $name=$request->name;
        if(empty($name))
        {
            $result['status']=0;
            $result['message']='The name field is required';
            echo json_encode($result);die;
        }
        $permission=$request->permission;
        if(empty($permission))
        {
            $result['status']=0;
            $result['message']='The permission field is required';  
            echo json_encode($result);die;
        }
        if(DB::table('roles')->where('name', $name)->exists())
        {
            $result['status']=0;
            $result['message']='The name field already exist';
            echo json_encode($result);die;
        }
        $role = Role::create(['name' => $request->input('name'),'guard_name'=>Auth()->user()->company_id,'company_id'=>Auth()->user()->company_id]);
        $role->syncPermissions($request->input('permission'));
        if($role)
        {
            $result['status']=1;
            $result['message']='Role created successfully';
            echo json_encode($result);die;
        }else{
            $result['status']=0;
            $result['message']='Role created faild';
            echo json_encode($result);die;
        }
        //return redirect()->route('roles.index')->with('success','Role created successfully');
    }


    
    
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
    
        return view('roles.edit',compact('role','permission','rolePermissions'));
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
            'name' => 'required',
            'permission' => 'required',
        ]);
    
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
    
        $role->syncPermissions($request->input('permission'));
    
        return redirect()->route('roles.index')
                        ->with('success','Role updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        DB::table("roles")->where('id',$id)->delete();
        $result['status']=1;
        $result['message']='Role deleted successfully';
        echo json_encode($result);die;
        // return redirect()->route('roles.index')
        //                 ->with('success','Role deleted successfully');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:department-list|department-create|department-edit|department-delete', ['only' => ['index','store']]);
         $this->middleware('permission:department-create', ['only' => ['create','store']]);
         $this->middleware('permission:department-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:department-delete', ['only' => ['destroy']]);
    }
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
		$departments = Department::orderBy('id','DESC')->paginate(5);
        return view('department.index', compact('departments'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		$departments = Department::pluck('department_name','department_name')->all();
        return view('department.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
		$this->validate($request, [
            'department_name' => 'required',
        ]);
        
        if($request->id){
            $input = $request->all();
            $department = Department::find($request->id);
            $department->update($input);
        }
        else{
        $department   =   Department::Create(
            [
                'company_id' => Auth()->user()->company_id,
                'department_name' => $request->department_name, 
                
            ]);
        }
            return response()->json(['success' => true]);
    
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $departments
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $departments
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
      
		$department = Department::find($request->id);
    	//var_dump($contact); exit;
        return response()->json($department);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $departments
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $departments
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
       
		Department::find($request->id)->delete();
        return response()->json(['success' => true]);
    }
}

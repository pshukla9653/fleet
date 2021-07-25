<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
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
		$departments = Departments::orderBy('id','DESC')->paginate(5);
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
		$departments = Departments::pluck('department_name','department_name')->all();
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
    
        $input = $request->all();
		$input['company_id'] = Auth()->user()->company_id;
    
        $department = Departments::create($input);
        
    
        return redirect()->route('departments.index')
                        ->with('success','Department created successfully');
    
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Departments  $departments
     * @return \Illuminate\Http\Response
     */
   public function show($id)
    {
        //
		$department = Departments::find($id);
        return view('department.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Departments  $departments
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
		$department = Departments::find($id);
    	//var_dump($contact); exit;
        return view('department.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Departments  $departments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
		$this->validate($request, [
            'department_name' => 'required',
           
        ]);
    
        $input = $request->all();
        
    
        $user = Departments::find($id);
        $user->update($input);
    
        return redirect()->route('departments.index')
                        ->with('success','Department updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Departments  $departments
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
		Departments::find($id)->delete();
        return redirect()->route('departments.index')
                        ->with('success','Department deleted successfully');
    }
}

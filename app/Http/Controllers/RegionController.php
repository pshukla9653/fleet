<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:region-list|region-create|region-edit|region-delete', ['only' => ['index','store']]);
         $this->middleware('permission:region-create', ['only' => ['create','store']]);
         $this->middleware('permission:region-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:region-delete', ['only' => ['destroy']]);
    }
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if($request->input('search')){
            $query = $request->input('search');
            $regions = Region::where('region_name', 'LIKE', '%'. $query. '%')->orderBy('id','DESC')->paginate(10);
           
            return view('region.index', compact('regions'));
            
        }
        else{
		$regions = Region::orderBy('id','DESC')->paginate(5);
        return view('region.index', compact('regions'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
        }
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
            $validation = ['region_name' => 'required|unique:regions,region_name,'.$request->id];
        }else{
            $validation = ['region_name' => 'required|unique:regions,region_name'];
        }
		$this->validate($request, $validation);
    
        if($request->id){
            $input = $request->all();
            $regions = Region::find($request->id);
            $regions->update($input);
        }
        else{
        $regions   =   Region::Create(
            [
                'company_id' => Auth()->user()->company_id,
                'region_name' => $request->region_name, 
                
            ]);
        }
            return response()->json(['success' => true]);
    
        
    }

   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Region  $departments
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
      
		$Region = Region::find($request->id);
    	//var_dump($contact); exit;
        return response()->json($Region);
    }

    

   

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Region  $regions
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
		Region::find($request->id)->delete();
        return response()->json(['success' => true]);
    }
}

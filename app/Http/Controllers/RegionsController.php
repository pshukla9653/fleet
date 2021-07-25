<?php

namespace App\Http\Controllers;

use App\Models\Regions;
use Illuminate\Http\Request;

class RegionsController extends Controller
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
		$regions = Regions::orderBy('id','DESC')->paginate(5);
        return view('region.index', compact('regions'))
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
		$regions = Regions::pluck('region_name','region_name')->all();
        return view('region.create', compact('regions'));
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
            'region_name' => 'required',
        ]);
    
        $input = $request->all();
		$input['company_id'] = Auth()->user()->company_id;
    
        $region = Regions::create($input);
        
    
        return redirect()->route('regions.index')
                        ->with('success','Region created successfully');
    
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Regionss  $regions
     * @return \Illuminate\Http\Response
     */
   public function show($id)
    {
        //
		$region = Regions::find($id);
        return view('region.show', compact('region'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Regionss  $regions
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
		$region = Regions::find($id);
    	//var_dump($region); exit;
        return view('region.edit', compact('region'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Regionss  $regions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
		$this->validate($request, [
            'region_name' => 'required',
           
        ]);
    
        $input = $request->all();
        
    
        $user = Regions::find($id);
        $user->update($input);
    
        return redirect()->route('regions.index')
                        ->with('success','Region updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Regionss  $regions
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
		Regions::find($id)->delete();
        return redirect()->route('regions.index')
                        ->with('success','Region deleted successfully');
    }
}

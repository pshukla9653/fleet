<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        //
        $brands = DB::table('brands')->where('company_id', Auth()->user()->company_id)->get();
        $regions = DB::table('regions')->where('company_id', Auth()->user()->company_id)->get();
        $departments = DB::table('departments')->where('company_id', Auth()->user()->company_id)->get();

        if($request->input('search')){
            $query = $request->input('search');
            $vehicles = Vehicle::where('registration_number', 'LIKE', '%'. $query. '%')->orderBy('id','ASC')->paginate(10);
           
            return view('vehicle.index', compact('vehicles'));
            
        }
        else{
        $vehicles = Vehicle::orderBy('id','ASC')->paginate(5);
        
        //var_dump($brands); exit;
        return view('vehicle.index', compact('vehicles','brands','regions','departments'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->id){
            $validation = ['registration_number' => 'unique:vehicles,registration_number,'.$request->id];
        }else{
            $validation = ['registration_number' => 'required|unique:vehicles,registration_number',
                            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'];
        }
		$this->validate($request, $validation);

        if($request->id){
            $input = $request->all();
            $brand  = Vehicle::find($request->id);
        if ($image = $request->file('image')) {

            if (Storage::disk('public')->exists($brand->file_name)) {
                Storage::disk('public')->delete($brand->file_name);
            }
            $image_name= Storage::disk('public')->put('vehicle/', $image);
            $input['file_name'] = $image_name;
			$input['company_id'] = Auth()->user()->company_id;
            
			
        }else{
            unset($input['image']);
        }
          
        $brand->update($input);
        }
        else{
        //
		
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $image_name= Storage::disk('public')->put('vehicle/', $image);
            $input['image'] = $image_name;
			$input['company_id'] = Auth()->user()->company_id;
        }
    
        Vehicle::create($input);
     
        }
        return redirect()->route('vehicle.index')
                        ->with('success','Vehicle created successfully');
						
    
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        //
    }
}

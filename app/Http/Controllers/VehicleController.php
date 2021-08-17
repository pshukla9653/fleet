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
            $validation = ['registration_number' => 'unique:vehicles,registration_number,'.$request->id,
                            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                            'model' => 'required',
                            'derivative' => 'required',
                            'vin' => 'required',
                            'adoption_date' => 'required',
                            'projected_defleet_date' => 'required',
                            'spec_sheet.*' => 'mimes:pdf|max:10000',                
            ];
        }else{
            $validation = ['registration_number' => 'required|unique:vehicles,registration_number',
                            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                            'model' => 'required',
                            'derivative' => 'required',
                            'vin' => 'required',
                            'adoption_date' => 'required',
                            'projected_defleet_date' => 'required',
                            'spec_sheet.*' => 'mimes:pdf|max:10000',
                        ];
        }
		$this->validate($request, $validation);
        $path = '/';
        if($request->id){
            $input = $request->all();
            $vehicle  = Vehicle::find($request->id);
        if ($image = $request->file('image')) {

            if (Storage::disk('public')->exists($path, $image)) {
                Storage::disk('public')->delete($path, $image);
            }
            $image_name= Storage::disk('public')->put($path, $image);
            $input['image'] = $image_name;
			$input['company_id'] = Auth()->user()->company_id;
            
			
        }else{
            unset($input['image']);
        }
        if($spec_sheet = $request->file('spec_sheet')){
            foreach($spec_sheet as $key=>$spec){
                $file_name= Storage::disk('public')->put($path, $spec);
			    $vehicle_specs['vehicle_id'] = $request->id;
                $vehicle_specs['file_name'] = $file_name;
                DB::table('vehicle_specs')->insert($vehicle_specs);
            }
        }  
        $brand->update($input);
        }
        else{
        //
		
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $image_name= Storage::disk('public')->put($path, $image);
            $input['image'] = $image_name;
			$input['company_id'] = Auth()->user()->company_id;
        }
        
    
        $vahicle = Vehicle::create($input);
        if($spec_sheet = $request->file('spec_sheet')){
            foreach($spec_sheet as $key=>$spec){
                $file_name= Storage::disk('public')->put($path, $spec);
			    $vehicle_specs['vehicle_id'] = $vahicle['id'];
                $vehicle_specs['file_name'] = $file_name;
                DB::table('vehicle_specs')->insert($vehicle_specs);
            }
        }
     
        }
        return redirect()->route('vehicles.index')
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

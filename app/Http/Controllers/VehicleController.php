<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;

class VehicleController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:vehicle-list|vehicle-create|vehicle-edit|vehicle-delete', ['only' => ['index','store']]);
         $this->middleware('permission:vehicle-create', ['only' => ['create','store']]);
         $this->middleware('permission:vehicle-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:vehicle-delete', ['only' => ['destroy']]);
    }

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
            $vehicles = Vehicle::where('registration_number', 'LIKE', '%'. $query. '%')
                ->orWhereHas('brand', function ($q) use ($query){
                    $q->where('brand_name', 'LIKE', '%'. $query. '%');
                })
                ->orWhereHas('region', function ($q) use ($query){
                    $q->where('region_name', 'LIKE', '%'. $query. '%');
                })
                ->orWhereHas('department', function ($q) use ($query){
                    $q->where('department_name', 'LIKE', '%'. $query. '%');
                })
                ->orWhere('model', 'LIKE', '%'. $query. '%')
                ->orWhere('derivative', 'LIKE', '%'. $query. '%')
                ->orWhere('derivative', 'LIKE', '%'. $query. '%')
                ->orWhere('vin', 'LIKE', '%'. $query. '%')
                ->orderByRaw("CAST(order_number as UNSIGNED) ASC")->paginate(10);

            return view('vehicle.index', compact('vehicles','brands','regions','departments', 'query'));

        }
        else{
        $vehicles = Vehicle::orderByRaw("CAST(order_number as UNSIGNED) ASC")->paginate(10);

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
        $validation = ['registration_number' => 'required|unique:vehicles,registration_number',
                        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                        'loan_cost' => 'required|numeric',
                        'value' => 'numeric',
                        'adoption_date' => 'required',
                        'projected_defleet_date' => 'required',
                        'spec_sheet.*' => 'mimes:pdf|max:10000',
                    ];
		$this->validate($request, $validation);
        $path = '/';
        $input = $request->all();

        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $image_name= Storage::disk('public')->put($path, $image);
            $input['image'] = $image_name;
            $input['company_id'] = Auth()->user()->company_id;
        }

        $vahicle = Vehicle::create($input);
        if($request->hasfile('spec_sheet')){
            $spec_sheet = $request->file('spec_sheet');
            foreach($spec_sheet as $spec){
                $file_name= Storage::disk('public')->put($path, $spec);
                $vehicle_specs['vehicle_id'] = $vahicle['id'];
                $vehicle_specs['original_name'] = $spec->getClientOriginalName();
                $vehicle_specs['file_name'] = $file_name;
                DB::table('vehicle_specs')->insert($vehicle_specs);
            }
        }

        return redirect()->route('vehicles.index')->with('success','Vehicle created successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = ['registration_number' => 'unique:vehicles,registration_number,'.$request->id,
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'loan_cost' => 'required|numeric',
            'value' => 'numeric',
            'adoption_date' => 'required',
            'projected_defleet_date' => 'required',
            'spec_sheet.*' => 'mimes:pdf|max:10000',
        ];
        $this->validate($request, $validation);
        $path = '/';
        $input = $request->all();
        $vehicle  = Vehicle::find($request->id);
        if ($request->hasfile('image')) {
            $image = $request->file('image');

            if (Storage::disk('public')->exists($path, $vehicle->image)) {
                Storage::disk('public')->delete($path, $vehicle->image);
            }
            $image_name= Storage::disk('public')->put($path, $image);
            $input['image'] = $image_name;
            $input['company_id'] = Auth()->user()->company_id;
        }else{
            unset($input['image']);
        }
        if($request->hasfile('spec_sheet')){
            $spec_sheet = $request->file('spec_sheet');
            foreach($spec_sheet as $spec){
                $file_name= Storage::disk('public')->put($path, $spec);
                $vehicle_specs['vehicle_id'] = $request->id;
                $vehicle_specs['original_name'] = $spec->getClientOriginalName();
                $vehicle_specs['file_name'] = $file_name;
                DB::table('vehicle_specs')->insert($vehicle_specs);
            }
        } else{
            unset($input['spec_sheet']);
        }
        $vehicle->update($input);

        return redirect()->route('vehicles.index')->with('success','Vehicle updated successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $vehicle  = Vehicle::find($request->id);
        $vehicle->specs = DB::table('vehicle_specs')->where('vehicle_id', $request->id)->get();

        return response()->json($vehicle);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
		$vehicle = Vehicle::find($request->id);
        if (count($vehicle->bookings)) {
            return response()->json(['success' => false]);
        }
		if (Storage::disk('public')->exists($vehicle->image)) {
            Storage::disk('public')->delete($vehicle->image);
        }

		Vehicle::find($request->id)->delete();

        return response()->json(['success' => true]);
    }

    public function delete(Request $request)
    {
        //
		$vehicle = DB::table('vehicle_specs')->where('id', $request->id)->get();
        //var_dump($vehicle[0]->file_name); exit;
		if (Storage::disk('public')->exists($vehicle[0]->file_name)) {
            Storage::disk('public')->delete($vehicle[0]->file_name);
        }

		DB::table('vehicle_specs')->where('id', $request->id)->delete();

        return response()->json(['success' => true]);
    }
    public function remove_img(Request $request)
    {
        //
		$vehicle  = Vehicle::find($request->id);
        //var_dump($vehicle[0]->file_name); exit;
		if (Storage::disk('public')->exists($vehicle->image)) {
            Storage::disk('public')->delete($vehicle->image);
        }

		$vehicle->update(['image'=>'']);

        return response()->json(['success' => true]);
    }
}

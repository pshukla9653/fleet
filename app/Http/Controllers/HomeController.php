<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $brands = DB::table('brands')->where('company_id', Auth()->user()->company_id)->get();
        $regions = DB::table('regions')->where('company_id', Auth()->user()->company_id)->get();
        $departments = DB::table('departments')->where('company_id', Auth()->user()->company_id)->get();
        if($request->input('search')){
            $query = $request->input('search');
            $vehicles = Vehicle::where('registration_number', 'LIKE', '%'. $query. '%')->orderByRaw("CAST(order_number as UNSIGNED) ASC")->get();
        }
        if($request->input('brand_id')){
            $brand_id = $request->input('brand_id');
            $vehicles = Vehicle::where('brand_id', $brand_id)->orderByRaw("CAST(order_number as UNSIGNED) ASC")->get();
        }
        if($request->input('region_id')){
            $region_id = $request->input('region_id');
            $vehicles = Vehicle::where('region_id', $region_id)->orderByRaw("CAST(order_number as UNSIGNED) ASC")->get();
        }
        if($request->input('department_id')){
            $department_id = $request->input('department_id');
            $vehicles = Vehicle::where('department_id', $department_id)->orderByRaw("CAST(order_number as UNSIGNED) ASC")->get();
        }
        else{
        $vehicles = Vehicle::orderByRaw("CAST(order_number as UNSIGNED) ASC")->get();
        }
        return view('home', compact('brands','regions','departments','vehicles'));
    }
}

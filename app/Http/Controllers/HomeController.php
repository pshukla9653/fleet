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
        elseif($request->input('region_id')){
            $region_id = $request->input('region_id');
            $vehicles = Vehicle::where('region_id', $region_id)->orderByRaw("CAST(order_number as UNSIGNED) ASC")->get();
        }
        elseif($request->input('department_id')){
            $department_id = $request->input('department_id');
            $vehicles = Vehicle::where('department_id', $department_id)->orderByRaw("CAST(order_number as UNSIGNED) ASC")->get();
        }
        else{
        $vehicles = Vehicle::orderByRaw("CAST(order_number as UNSIGNED) ASC")->get();
        }
        if($request->input('mode')=='forward'){
            $start_date  =  $request->input('start_date');
            $date_range  =  $request->input('date_range');
            $end_date = date("Y-m-d", strtotime($start_date . "+".$date_range." week"));
            $diff=date_diff(date_create($start_date), date_create($end_date));
            $days = $diff->days;
            }
        elseif($request->input('mode')=='backward'){
            $end_date  =  $request->input('start_date');
            $date_range  =  $request->input('date_range');
            $start_date = date("Y-m-d", strtotime($end_date . "-".$date_range." week"));
            $diff=date_diff(date_create($start_date), date_create($end_date));
            $days = $diff->days;
            }
        elseif($request->input('start_date') && $request->input('mode')==''){
        $start_date  =  $request->input('start_date');
        $date_range  =  $request->input('date_range');
        $end_date = date("Y-m-d", strtotime($start_date . "+".$date_range." week"));
        $diff=date_diff(date_create($start_date), date_create($end_date));
        $days = $diff->days;
        }
        
        else{
        $start_date  =  date('Y-m-d');
        $date_range  =  4;
        $end_date = date("Y-m-d", strtotime($start_date . "+".$date_range." week"));
        $diff=date_diff(date_create($start_date), date_create($end_date));
        $days = $diff->days;
        }
       
        return view('home', compact('brands','regions','departments','vehicles','start_date','end_date','days','date_range'));
    }
}

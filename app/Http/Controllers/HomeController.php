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
        $email_templates = DB::table('email_templates')->where('company_id', Auth()->user()->company_id)->get();
        $brands = DB::table('brands')->where('company_id', Auth()->user()->company_id)->get();
        $regions = DB::table('regions')->where('company_id', Auth()->user()->company_id)->get();
        $departments = DB::table('departments')->where('company_id', Auth()->user()->company_id)->get();
        $brand_id ='';
        $region_id = '';
        $department_id = '';
        $seach_by_find = false;
        if($request->input('search')){
            $query = $request->input('search');
            $vehicles = Vehicle::where('registration_number', 'LIKE', '%'. $query. '%')->orderByRaw("CAST(order_number as UNSIGNED) ASC")->get();
        }
        if($request->input('brand_id')){
            $find['brand_id'] = $request->input('brand_id');
            $brand_id = $request->input('brand_id');
            $seach_by_find = true;
        }
        if($request->input('region_id')){
            $find['region_id'] = $request->input('region_id');
            $region_id = $request->input('region_id');
            $seach_by_find = true;
        }
        if($request->input('department_id')){
            $find['department_id'] = $request->input('department_id');
            $department_id = $request->input('department_id');
            $seach_by_find = true;
            
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
        if($seach_by_find == true){
        $vehicles = Vehicle::where($find)->orderByRaw("CAST(order_number as UNSIGNED) ASC")->get();
        }
        
        return view('home', compact('email_templates','brands','regions','departments','vehicles','start_date','end_date','days','date_range','brand_id','region_id','department_id'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use DB;
use App\Models\Brand;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
	 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	function __construct()
    {
         $this->middleware('permission:brand-list|brand-create|brand-edit|brand-delete', ['only' => ['index','store']]);
         $this->middleware('permission:brand-create', ['only' => ['create','store']]);
         $this->middleware('permission:brand-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:brand-delete', ['only' => ['destroy']]);
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
            $brand = Brand::where('brand_name', 'LIKE', '%'. $query. '%')->orderBy('id','DESC')->paginate(10);
            return view('brand.index', compact('brand'));
            
        }
        else{
            $brand = Brand::orderBy('id','DESC')->paginate(5);
            return view('brand.index', compact('brand'))
                ->with('i', ($request->input('page', 1) - 1) * 5);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		
        $brand = Role::pluck('name','name')->all();
        return view('brand.create', compact('brand'));
		
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
            $validation = ['brand_name' => 'required|unique:brands,brand_name,'.$request->id];
        }else{
            $validation = ['brand_name' => 'required|unique:brands,brand_name'];
        }
		$this->validate($request, $validation);

        if($request->id){
            $input = $request->all();
            $brand  = Brand::find($request->id);
        if ($image = $request->file('image')) {

            if (Storage::disk('public')->exists($brand->file_name)) {
                Storage::disk('public')->delete($brand->file_name);
            }
            $image_name= Storage::disk('public')->put('/', $image);
            $input['file_name'] = $image_name;
			$input['company_id'] = Auth()->user()->company_id;
            
			
        }else{
            unset($input['image']);
        }
          
        $brand->update($input);
        }
        else{
        //
		$this->validate($request, [
            'brand_name' => 'required',
             'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $image_name= Storage::disk('public')->put('/', $image);
            $input['file_name'] = $image_name;
			$input['company_id'] = Auth()->user()->company_id;
        }
    
         Brand::create($input);
     
        }
        return redirect()->route('brands.index')
                        ->with('success','Brand created successfully');
						
    
        
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
		$brand  = Brand::find($request->id);
    	//var_dump($brand); exit;
        return response()->json($brand);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
		$brand = Brand::Find($request->id);
		if (Storage::disk('public')->exists($brand->file_name)) {
            Storage::disk('public')->delete($brand->file_name);
        }
		Brand::find($request->id)->delete();
		
        return response()->json(['success' => true]);
    }
	

    
}
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
		$brand = Brand::orderBy('id','DESC')->paginate(5);
        return view('brand.index', compact('brand'))
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
            $input = $request->all();
            $brand = Brand::find($request->id); 
        if ($image = $request->file('image')) {
            $destinationPath = 'upload/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['file_name'] = "$profileImage";
			
			$file = public_path('upload/'. $brand['file_name']);
			if (file_exists($file)) {
  				@unlink($file);
				}
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
            $destinationPath = 'upload/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['file_name'] = "$profileImage";
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
    public function update(Request $request, Brand $brand)
    {
        //
		$this->validate($request, [
            'brand_name' => 'required',
            
        ]);
    	
         $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'upload/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['file_name'] = "$profileImage";
			
			$file = public_path('upload/'. $brand['file_name']);
			if (file_exists($file)) {
  				@unlink($file);
				}
        }else{
            unset($input['image']);
        }
        $brand = Brand::find($request->id);  
        $brand->update($input);
    
        return redirect()->route('brands.index')
                        ->with('success','Brand updated successfully');
    }

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
		$file = public_path('upload/'. $brand['file_name']);
		if (file_exists($file)) {
  			@unlink($file);
		}
		Brand::find($request->id)->delete();
		
        return response()->json(['success' => true]);
    }
	
}



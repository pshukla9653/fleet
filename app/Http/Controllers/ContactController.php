<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use DB;

class ContactController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:contact-list|contact-create|contact-edit|contact-delete', ['only' => ['index','store']]);
         $this->middleware('permission:contact-create', ['only' => ['create','store']]);
         $this->middleware('permission:contact-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:contact-delete', ['only' => ['destroy']]);
    }
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
		$contacts = Contact::orderBy('id','DESC')->paginate(5);
        return view('contact.index', compact('contacts'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
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
            'first_name' => 'required',
            'email' => 'required|email',
        ]);
    
        $input = $request->all();
		
        if($request->id){
            $regions = Contact::find($request->id);
            $regions->update($input);
        }
        else{
            $input['company_id'] = Auth()->user()->company_id;
            $contact = Contact::create($input);
        }
        
        
        return response()->json(['success' => true]);
    
        
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
		$contact = Contact::find($request->id);
    	//var_dump($contact); exit;
        return response()->json($contact);
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
		Contact::find($request->id)->delete();
        return response()->json(['success' => true]);
    }
}

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		
        $contacts = Role::pluck('name','name')->all();
        return view('contact.create', compact('contacts'));
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
		$input['company_id'] = Auth()->user()->company_id;
    
        $contact = Contact::create($input);
        
    
        return redirect()->route('contacts.index')
                        ->with('success','Cantact created successfully');
    
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
		$contact = Contact::find($id);
        return view('contact.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
		$contact = Contact::find($id);
    	//var_dump($contact); exit;
        return view('contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
		$this->validate($request, [
            'first_name' => 'required',
            'email' => 'required|email',
        ]);
    
        $input = $request->all();
        
    
        $user = Contact::find($id);
        $user->update($input);
    
        return redirect()->route('contacts.index')
                        ->with('success','Contact updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
		Contact::find($id)->delete();
        return redirect()->route('contact.index')
                        ->with('success','Contact deleted successfully');
    }
}

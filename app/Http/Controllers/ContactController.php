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
        if($request->input('search')){
            $query = $request->input('search');
            $contacts = Contact::where('first_name', 'LIKE', '%'. $query. '%')->orderBy('id','DESC')->paginate(10);
           
            return view('contact.index', compact('contacts'));
            
        }
        else{
		$contacts = Contact::orderBy('id','DESC')->paginate(5);
        return view('contact.index', compact('contacts'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
        }
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

    public function get_contact_list_for_search(Request $request)
    {
        $contacts = [];

        if($request->has('q')){
            $search = $request->q;
            $contacts =Contact::select("id", "first_name","last_name")
            		->where('first_name', 'LIKE', "%$search%")
                    ->orwhere('last_name', 'LIKE', "%$search%")
            		->get();
        }
        return response()->json($contacts);
        
    }

    public function get_contact_list()
    {
        $contactlist = Contact::all();
        //print_r($contactlist);die;
        $html='<tr>
                <th>Name</th>
                <th>Surname</th>
                <th>Email</th>
                <th>Action</th>
              </tr>';
        foreach ($contactlist as $key => $value) {
            //echo $value->first_name."<br>";
            $html.='<tr class="contact-row">
                    <td><input type="hidden" name="contacts[]" value="'.$value->id.'"> '.$value->first_name.'</td>
                    <td>'.$value->last_name.'</td>
                    <td>'.$value->email.'</td>
                    <td class="check-box"><input type="checkbox" class="form-control checked" id="row-id-'.$value->id.'" style="width: 20px"></td>
                  </tr>';
        }
        echo $html;
        //print_r($contactlist);die;
        
    }
    public function get_contact_list_for_list()
    {
        $contactlist = Contact::all();
        $html='<tr>
                <th>Name</th>
                <th>Surname</th>
                <th>Email</th>
                <th>Action</th>
              </tr>';
        foreach ($contactlist as $key => $value) {
            //echo $value->first_name."<br>";
            $html.='<tr class="contact-row">
                    <td><input type="hidden" name="contacts[]" value="'.$value->id.'"> '.$value->first_name.'</td>
                    <td>'.$value->last_name.'</td>
                    <td>'.$value->email.'</td>
                    <td class="check-box"><input type="checkbox" class="form-control checked" id="row-id-'.$value->id.'" style="width: 20px"></td>
                  </tr>';
        }
        echo $html;
        
    }
    public function get_existing_contact_list()
    {
        $contactlist = Contact::all();
        //print_r($contactlist);die;
        $html='<tr>
                <th>Name</th>
                <th>Surname</th>
                <th>Email</th>
                <th>Action</th>
              </tr>';
        foreach ($contactlist as $key => $value) {
            //echo $value->first_name."<br>";
            $html.='<tr class="contact-row">
                    <td><input type="hidden" name="contacts[]" value="'.$value->id.'"> '.$value->first_name.'</td>
                    <td>'.$value->last_name.'</td>
                    <td>'.$value->email.'</td>
                    <td class="check-box"><input type="checkbox" class="form-control checked" id="row-id-'.$value->id.'" style="width: 20px"></td>
                  </tr>';
        }
        echo $html;
        //print_r($contactlist);die;
    }
    public function get_existing_contact_list_booking()
    {
        $contactlist = Contact::all();
        $html='';
        foreach ($contactlist as $key => $value) {
            $html.='<p><input type="checkbox" id="'.$value->id.'" value="'.$value->id.'" name="contacts[]" /> &nbsp;&nbsp;&nbsp;<lable for="'.$value->id.'">'.$value->first_name.' '.$value->last_name.'</lable></p>';
        }
        echo $html;
    }
    public function get_existing_list_booking()
    {
        $lists = DB::table("lists")->get();
        $html='';
        foreach ($lists as $key => $value) {
            $list_contact = DB::table('list_contacts')->where('list_id', '=', $value->id)->get();
            $html.='
                <h5> '.$value->list_name.' </h5>
                
              <div class="toggle-div">';
              foreach ($list_contact as $key => $val) {
                $contact = DB::table('contacts')->where('id', '=', $val->contact_id)->first();
                if(!empty($contact)){
                  $html.='<p id="'.$contact->id.'"><input type="checkbox" id="'.$contact->id.'" value="'.$contact->id.'" name="contacts[]" /> &nbsp;&nbsp;&nbsp;<lable for="'.$contact->id.'">'.$contact->first_name.' '.$contact->last_name.'</lable></p>';
                }
                 
              }
              $html.="</div>";
        }
        echo $html;
    }
}

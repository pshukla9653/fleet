<?php

namespace App\Http\Controllers;

use App\Models\Lists;
use App\Models\ListContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListsController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:lists-list|lists-create|lists-edit|lists-delete', ['only' => ['index','store']]);
         $this->middleware('permission:lists-create', ['only' => ['create','store']]);
         $this->middleware('permission:lists-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:lists-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        if($request->input('search')){
            $query = $request->input('search');
            
            $lists = Lists::where('list_name', 'LIKE', '%'. $query.'%')->orderBy('id','DESC')->paginate(10);
           
            return view('lists.index', compact('lists'));
            
        } else{
            $lists = Lists::orderBy('id','DESC')->paginate(5);
            return view('lists.index', compact('lists'))
                    ->with('i', ($request->input('page', 1) - 1) * 5);
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        if($request->id){
            $validation = ['list_name' => 'required|unique:lists,list_name,'.$request->id];
        }else{
            $validation = ['list_name' => 'required|unique:lists,list_name'];
        }
        $this->validate($request, $validation);
      
        if($request->id){
            $lists = Lists::find($request->id);
            $lists->update(['list_name' => $request->list_name]);
            foreach ($request->contacts as $key => $value) {
                $data = new ListContact;
                $data->company_id = Auth()->user()->company_id;
                $data->list_id = $request->id;
                $data->contact_id = $value;
                $data->save();
            }
        } else{
            $lists   =   Lists::Create( [
                        'company_id' => Auth()->user()->company_id,
                        'list_name' => $request->list_name
                    ]);
           
            foreach ($request->contacts as $key => $value) {
                $data = new ListContact;
                $data->company_id = Auth()->user()->company_id;
                $data->list_id = $lists->id;
                $data->contact_id = $value;
                $data->save();
            }
        }
        return response()->json(['success' => true]);
    }

    
    public function show(Lists $lists)
    {
        //
    }

    
    public function edit(Request $request)
    {
        $lists = Lists::find($request->id);
        return response()->json($lists);
    }

    
    public function update(Request $request, Lists $lists)
    {
        //
    }

    public function destroy(Request $request)
    {
        DB::table('list_contacts')->where('list_id', '=', $request->id)->delete();
        Lists::find($request->id)->delete();
        return response()->json(['success' => true]);
    }
    public function get_lists_contact_list(Request $request)
    {
        $contactlist = DB::table('list_contacts')
                          ->leftJoin('contacts', 'list_contacts.contact_id', '=', 'contacts.id')
                          ->select('list_contacts.id as id',
                                   'list_contacts.list_id as listid',
                                   'contacts.first_name',
                                   'contacts.last_name',
                                   'contacts.email',
                                   'contacts.phone_number')
                          ->where('list_contacts.list_id', '=', $request->id)
                          ->get();
        
        $html='<tr>
                <th>Name</th>
                <th>Surname</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
              </tr>';
        foreach ($contactlist as $key => $value) {
            
            $html.='<tr class="contact-row">
                    <td><input type="hidden" name="contacts[]" value="'.$value->id.'"> '.$value->first_name.'</td>
                    <td>'.$value->last_name.'</td>
                    <td>'.$value->email.'</td>
                    <td>'.$value->phone_number.'</td>
                    <td class="check-box"><button type="button" class="btn btn-danger delete" onclick="deleteContact(this, '.$value->id.')">Delete</button></td>
                  </tr>';
        }
        echo $html;
    }
    public function delete_contact(Request $request)
    {
        $res = DB::table('list_contacts')->where('id', '=', $request->id)->delete();
        echo $res;die;
        return response()->json(['success' => true]);
    }
}

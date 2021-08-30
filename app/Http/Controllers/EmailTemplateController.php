<?php

namespace App\Http\Controllers;

use App\Models\EmailTemplate;
use Illuminate\Http\Request;
use DB;

class EmailTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {
        
        
        if($request->input('search')){
            $query = $request->input('search');
            $emailTemplate = EmailTemplate::where('subject', 'LIKE', '%'. $query. '%')->orderBy('id','DESC')->paginate(10);
           
            return view('email_template.index', compact('emailTemplate'));
            
        }
        else{
        $emailTemplate = EmailTemplate::orderBy('id','DESC')->paginate(5);
        return view('email_template.index', compact('emailTemplate'))
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
        if($request->id){
            $validation = [
                            'description' => 'required',
                            'subject' => 'required',
                            'email_body' => 'required',
                            'spec_sheet.*' => 'mimes:pdf,doc,docx,xls,xlsx|max:10000',                
            ];
        }else{
            $validation = [
                            'description' => 'required',
                            'subject' => 'required',
                            'email_body' => 'required',
                            'spec_sheet.*' => 'mimes:pdf,doc,docx,xls,xlsx|max:10000',
                        ];
        }
		$this->validate($request, $validation);
        $path = '/';
        if($request->id){
            $input = $request->all();
            
        if($request->hasfile('spec_sheet')){
            $spec_sheet = $request->file('spec_sheet');
            foreach($spec_sheet as $key=>$spec){
                $file_name= Storage::disk('public')->put($path, $spec);
			    $vehicle_specs['template_id'] = $request->id;
                $vehicle_specs['file_name'] = $file_name;
                DB::table('email_file')->insert($vehicle_specs);
            }
        }
        else{
            unset($input['spec_sheet']);
        } 
        $emailTemplate->update($input);
        }
        else{
        //
		
  
        $input = $request->all();
  
        
        
    
        $vahicle = EmailTemplate::create($input);
        if($request->hasfile('spec_sheet')){
            $spec_sheet = $request->file('spec_sheet');
            foreach($spec_sheet as $key=>$spec){
                $file_name= Storage::disk('public')->put($path, $spec);
			    $vehicle_specs['template_id'] = $request->id;
                $vehicle_specs['file_name'] = $file_name;
                DB::table('email_file')->insert($vehicle_specs);
            }
        }
     
        }
        return redirect()->route('email_template.index')
                        ->with('success','Email Template created successfully');
						
    
        
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmailTemplate  $emailTemplate
     * @return \Illuminate\Http\Response
     */
    public function edit(EmailTemplate $emailTemplate)
    {
        //
        $emailTemplate  = EmailTemplate::find($request->id);
        $emailTemplate->specs = DB::table('email_file')->where('template_id', $request->id)->get();
        return response()->json($emailTemplate);
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmailTemplate  $emailTemplate
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmailTemplate $emailTemplate)
    {
        //
        $emailTemplate = EmailTemplate::Find($request->id);
		if (Storage::disk('public')->exists($emailTemplate->image)) {
            Storage::disk('public')->delete($emailTemplate->image);
        }
        
		EmailTemplate::find($emailTemplate->id)->delete();
		
        return response()->json(['success' => true]);
    }
}

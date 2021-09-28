<?php

namespace App\Http\Controllers;

use App\Models\EmailTemplate;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;

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

        if ($request->id) {
            $validation = [
                'description' => 'required',
                'subject' => 'required',
                'email_body' => 'required',
                'spec_sheet.*' => 'mimes:pdf,doc,docx,xls,xlsx|max:10000',
            ];
        } else {
            $validation = [
                'description' => 'required',
                'subject' => 'required',
                'email_body' => 'required',
                'spec_sheet.*' => 'mimes:pdf,doc,docx,xls,xlsx|max:10000',
            ];
        }
        $this->validate($request, $validation);
        $path = '/';


        if ($request->id) {

            $input = $request->all();
            if ($request->has('is_spec')) {
                $input['is_spec'] = 1;
            } else {
                $input['is_spec'] = 0;
            }
            $emailTemplate = EmailTemplate::find($request->id);
            if ($request->hasfile('spec_sheet')) {
                $spec_sheet = $request->file('spec_sheet');
                foreach ($spec_sheet as $key => $spec) {
                    $file_name = Storage::disk('public')->put($path, $spec);
                    $email_file['template_id'] = $request->id;
                    $email_file['original_name'] = $spec->getClientOriginalName();
                    $email_file['file_name'] = $file_name;
                    DB::table('email_file')->insert($email_file);
                }
            } else {
                unset($input['spec_sheet']);
            }

            $emailTemplate->update($input);
            return redirect()->route('email-template.index')
                ->with('success', 'Email Template Updated successfully');
        } else {
            //


            $input = $request->all();
            $input['company_id'] = Auth()->user()->company_id;
            if ($request->has('is_spec')) {
                $input['is_spec'] = 1;
            } else {
                $input['is_spec'] = 0;
            }


            $emailTemplate = EmailTemplate::create($input);
            if ($request->hasfile('spec_sheet')) {
                $spec_sheet = $request->file('spec_sheet');
                foreach ($spec_sheet as $key => $spec) {
                    $file_name = Storage::disk('public')->put($path, $spec);
                    $email_file['template_id'] = $emailTemplate->id;
                    $email_file['original_name'] = $spec->getClientOriginalName();
                    $email_file['file_name'] = $file_name;
                    DB::table('email_file')->insert($email_file);
                }
            }
            return redirect()->route('email-template.index')
                ->with('success', 'Email Template created successfully');
        }


    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmailTemplate  $emailTemplate
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
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
    public function destroy(Request $request)
    {
        //
        $emailTemplate = EmailTemplate::Find($request->id);
		if (Storage::disk('public')->exists($emailTemplate->image)) {
            Storage::disk('public')->delete($emailTemplate->image);
        }

		EmailTemplate::find($emailTemplate->id)->delete();

        return response()->json(['success' => true]);
    }

    public function delete(Request $request)
    {
        //


		$email_file = DB::table('email_file')->where('id', '=', $request->id)->first();

		if (Storage::disk('public')->exists($email_file->file_name)) {
            Storage::disk('public')->delete($email_file->file_name);
        }

		DB::table('email_file')->where('id', '=', $request->id)->delete();

        return response()->json(['success' => true]);
    }
}

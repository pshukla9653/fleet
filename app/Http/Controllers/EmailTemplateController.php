<?php

namespace App\Http\Controllers;

use App\Models\EmailTemplate;
use App\Services\EmailTemplateService;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;

class EmailTemplateController extends Controller
{
    public function __construct(protected EmailTemplateService $emailTemplateService) {

    }

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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        try {
            $validation = [
                'description' => 'required',
                'subject' => 'required',
                'email_body' => 'required',
                'spec_sheet.*' => 'mimes:pdf,doc,docx,xls,xlsx|max:10000',
            ];
            $this->validate($request, $validation);
            if (isset($request->id) && !empty($request->id)) {
                $emailTemplate = EmailTemplate::find($request->id);
                if (! $emailTemplate->exists) {
                    throw new \Exception('Something went wrong. Email Template not found in our records!', 404);
                }
                $this->emailTemplateService->store($request, $emailTemplate);
                $message = "Email Template Updated successfully";
            } else {
                $this->emailTemplateService->store($request);
                $message = "Email template added successfully!";
            }
            return redirect()->route('email-template.index')
                ->with('success', $message);
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
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

<?php


namespace App\Services;


use App\Models\EmailFile;
use App\Models\EmailTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmailTemplateService
{
    const ATTACHMENT_PATH = '/';

    /**
     * @param Request $request
     * @param EmailTemplate|null $emailTemplate
     */
    public function store(Request $request, EmailTemplate $emailTemplate = null) {
        $data = $request->all();
        $data['company_id'] = Auth()->user()->company_id;
        $data['is_spec'] = $request->has('is_spec');
        $update = false;
        if ($emailTemplate != null) {
            $update = true;
            $emailTemplate->update($data);
        } else {
            $emailTemplate = EmailTemplate::create($data);
        }
        if ($request->hasfile('spec_sheet')) {
            $attachments = $request->file('spec_sheet');
            foreach ($attachments as $key => $attachment) {
                $file_name = Storage::disk('public')->put(self::ATTACHMENT_PATH, $attachment);
                $emailFile = new EmailFile();
                $emailFile->file_name = $file_name;
                $emailFile->original_file_name = $attachment->getClientOriginalName();
                $emailFile->template_id = $emailTemplate->id;
                $emailFile->save();
            }
        }
    }
}

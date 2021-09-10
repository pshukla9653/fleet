<?php

namespace App\Services\Mailers\DTO;

use App\Models\Booking;
use App\Services\Mailers\IMailer;
use App\Services\WordDocumentService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Spatie\DataTransferObject\DataTransferObject;

class BookingEmailDTO extends DataTransferObject
{
    // Sendinblue
    public mixed $api_key;

    // Booking
    public mixed $start_date;
    public mixed $end_date;
    public mixed $purpose_of_loan;
    public mixed $current_date;
    public mixed $current_date_dd_mm_yyyy;
    public mixed $current_date_mm_dd_yyyy;
    public mixed $primary_contact;
    public mixed $primary_first_name;
    public mixed $primary_email;
    public mixed $primary_phone;
    public mixed $primary_post_code;
    public mixed $primary_company_name;
    public mixed $contacts_comma;
    public mixed $contacts_list;
    public mixed $vehicles_comma;
    public mixed $vehicles_list;
    public mixed $vehicles_model_derivative;
    public mixed $vehicles_vin_number;
    public mixed $vehicles_registration;
    public mixed $address_outbound_collection;
    public mixed $address_outbound_delivery;
    public mixed $address_inbound_collection;
    public mixed $address_inbound_delivery;
    public mixed $notes_outbound_collection;
    public mixed $notes_outbound_delivery;
    public mixed $notes_inbound_collection;
    public mixed $notes_inbound_delivery;

    // Email template
    public mixed $description;
    public mixed $subject;
    public mixed $from_name;
    public mixed $reply_to_email;
    public mixed $from_email;
    public mixed $to_email;
    public mixed $cc_email;
    public mixed $bcc_email;
    public mixed $email_body;

    public mixed $template_id;

    public array $attachments;

    public function getAttachments(): array
    {
        $attachments = [];

        foreach ($this->attachments as $id => $attachment) {
            $attachmentTemplate = app(WordDocumentService::class)->open(Storage::disk('public')->path($attachment));

            foreach (IMailer::REPLACEABLE as $key) {
                $attachmentTemplate->setValues([$key => $this->{camel_to_snake_case($key)}]);
            }

            $filePath = implode('-', [auth()->id(), $id, $attachment]);

            $attachmentTemplate->saveAs($path = public_path("storage/$filePath"));

            $attachments[] = [
                'name' => $attachment,
                'type' => mime_content_type($path),
                'data' => base64_encode(file_get_contents($path))
            ];
        }

        return $attachments;
    }
}

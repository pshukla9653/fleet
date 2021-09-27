<?php

namespace App\Services;

use App\Models\Booking;
use App\Models\EmailTemplate;
use App\Services\Mailers\DTO\BookingEmailDTO;
use App\Services\Mailers\IMailer;
use App\Services\Mailers\SendinblueMailer;
use App\Services\Mailers\SparkpostMailer;

class EmailService
{
    const MAILERS = [
        'sendinblue' => SendinblueMailer::class,
        'sparkpost' => SparkpostMailer::class
    ];

    /**
     * @const COMMA
     * Define Format Type
     */
    const COMMA = ',';

    /**
     * @const LIST
     * Define Format Type
     */
    const LIST = '<br>';

    /**
     * @var BookingEmailDTO $mailerData
     */
    private BookingEmailDTO $mailerData;

    /**
     * @var Booking $booking
     */
    private Booking $booking;

    /**
     * @var EmailTemplate $emailTemplate
     */
    private EmailTemplate $emailTemplate;

    public function __construct(protected WordDocumentService $documentService, protected array $config)
    {}

    public function setData(Booking $booking, EmailTemplate $emailTemplate): static
    {
        $this->booking = $booking;
        $this->emailTemplate = $emailTemplate;
        $data = [
            'start_date' => $booking->start_date,
            'end_date' => $booking->end_date,
            'purpose_of_loan' => $booking->purpose_of_loan,
            'current_date' => now()->toFormattedDateString(),
            'current_date_dd_mm_yy' => now()->format('d/m/Y'),
            'current_date_mm_dd_yy' => now()->format('m/d/Y'),
            'primary_contact' => $this->getFormattedPrimaryContact($booking),
            'primary_first_name' => $booking->primaryContact?->first_name,
            'primary_email' => $booking->primaryContact?->email,
            'primary_phone' => $booking->primaryContact?->phone_number,
            'primary_post_code' => $booking->primaryContact?->post_code,
            'primary_company_name' => $booking->primaryContact?->company?->company_name,
            'contacts_comma' => $this->getFormattedContacts($booking, self::COMMA),
            'contacts_list' => $this->getFormattedContacts($booking, self::LIST),
            'vehicles_comma' => $booking->vehicle?->model,
            'vehicles_list' => $booking->vehicle?->model,
            'vehicles_model_derivative' => $booking->vehicle?->derivative,
            'vehicles_registration' => $booking->vehicle?->registration_number,
            'vehicles_vin_number' => $booking->vehicle?->vin,
            'address_outbound_collection' => $booking->ob_pick_from_address_1,
            'address_outbound_delivery' => $booking->ob_deliver_to_address_1,
            'address_inbound_collection' => $booking->ib_pick_from_address_1,
            'address_inbound_delivery' => $booking->ib_deliver_to_address_1,
            'notes_outbound_collection' => $booking->ob_pick_from_notes,
            'notes_outbound_delivery' => $booking->ob_deliver_to_deliver_notes,
            'notes_inbound_collection' => $booking->ib_pick_from_notes,
            'notes_inbound_delivery' => $booking->ib_deliver_to_notes,

            'description' => $this->emailTemplate->description,
            'subject' => $this->emailTemplate->subject,
            'from_name' => $this->emailTemplate->from_name,
            'from_email' => $this->emailTemplate->from_email,
            'reply_to_email' => $this->emailTemplate->reply_to_email,
            'to_email' => $this->getToEmail(),
            'cc_email' => $this->emailTemplate->cc_email,
            'bcc_email' => $this->emailTemplate->bcc_email,
            'email_body' => $this->emailTemplate->email_body,
            'attachments' => $this->emailTemplate->attachments->pluck('file_name', 'id')->toArray() ?? []
        ];

        $this->mailerData = new BookingEmailDTO($data);

        return $this;
    }

    public function from(string $type): IMailer
    {
        foreach ($this->config[$type] as $key => $value) {
            if (!$this->mailerData->{$key}) {
                $this->mailerData->{$key} = $value;
            }
        }

        $serviceClass = self::MAILERS[$type] ?: null;

        if (!class_exists($serviceClass)) {
            throw new \Exception("Selected mailer does not exists");
        }

        /** @var IMailer $emailService */
        return new $serviceClass($this->mailerData);
    }

    public function __call($method, $arguments)
    {
        foreach (self::MAILERS as $mailer) {
            (new $mailer($this->mailerData))->{$method}(...$arguments);
        }
    }

    /**
     * @param Booking $booking
     * @return string
     * @throws \Exception
     */
    public function getFormattedPrimaryContact(Booking $booking): string
    {
        if (!$booking->primaryContact()->exists()) {
            throw new \Exception('Something went wrong. No primary contact attached to the booking!', 404);
        }
        return $booking->primaryContact->first_name . ' ' . $booking->primaryContact->last_name;
    }

    /**
     * @param Booking $booking
     * @return string
     */
    public function getFormattedContacts(Booking $booking, $formatType = self::COMMA): string
    {
        if (!$booking->contactsCollection()->exists()) {
            throw new \Exception('No contacts attached to this booking!', 404);
        }
        $contacts = $booking->contactsCollection()->get(['first_name', 'last_name']);
        $contactsComma = "";
        foreach ($contacts as $i => $contact) {
            $contactsComma .= $contact->first_name . ' ' . $contact->last_name;
            if (isset($contacts[$i + 1])) {
                $contactsComma .= ' ' . $formatType;
            }
        }
        return $contactsComma;
    }

    /**
     * @return mixed
     * @note In email template form, input TO_EMAIL can be dynamic.
     * It can be set as : %%PrimaryEmail%%
     */
    public function getToEmail(): mixed
    {
        $to_email = $this->emailTemplate?->to_email;
        if (!empty($to_email) && (str_starts_with($to_email, '%%')) && (str_ends_with($to_email, '%%'))) {
            $to_email = $this->booking->primaryContact?->email;
        }
        return $to_email;
    }
}

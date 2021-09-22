<?php

namespace App\Services;

use App\Models\Booking;
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

    private BookingEmailDTO $mailerData;

    public function __construct(protected WordDocumentService $documentService, protected array $config)
    {}

    public function setData(Booking $booking)
    {
        $data = array_merge([
                'current_date' => now()->toFormattedDateString(),
                'current_date_dd_mm_yy' => now()->format('d/m/Y'),
                'current_date_mm_dd_yy' => now()->format('m/d/Y'),
                'primary_contact' => '',
                'primary_first_name' => '',
                'primary_email' => '',
                'primary_phone' => '',
                'primary_post_code' => '',
                'primary_company_name' => '',
                'contacts_comma' => '',
                'contacts_list' => '',
                'vehicles_comma' => '',
                'vehicles_list' => '',
                'vehicles_model_derivative' => '',
                'vehicles_vin_number' => '',
                'address_outbound_collection' => '',
                'address_outbound_delivery' => '',
                'address_inbound_collection' => '',
                'address_inbound_delivery' => '',
                'notes_outbound_collection' => '',
                'notes_outbound_delivery' => '',
                'notes_inbound_collection' => '',
                'notes_inbound_delivery' => '',
            ],
            $booking->only('start_date', 'end_date', 'purpose_of_loan'),
            $booking->emailTemplate?->only(
                'description',
                'subject',
                'from_name',
                'from_email',
                'reply_to_email',
                'to_email',
                'cc_email',
                'bcc_email',
                'email_body'
            ) ?? [], [
                'attachments' => $booking->emailTemplate?->attachments->pluck('file_name', 'id')->toArray() ?? []
            ]
        );

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
}

<?php


namespace App\Services;


use App\Models\Booking;

class BookingService
{
    private EmailService $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    public function sendBookingEmails(Booking $booking)
    {
        $emailTemplates = $booking->emailTemplates()->where('status', 1)->get();
        if (!empty($emailTemplates) && count($emailTemplates)) {
            foreach ($emailTemplates as $emailTemplate) {
                $this->emailService
                    ->setData(
                        $booking,
                        $emailTemplate
                    )
                    ->from('sendinblue')
//                    ->from('sparkpost')
                    ->sendTransactionalEmail();
            }
        }
    }
}

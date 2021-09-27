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
        if ($booking->emailTemplates()->exists()) {
            foreach ($booking->emailTemplates()->get() as $emailTemplate) {
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

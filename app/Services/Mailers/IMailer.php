<?php

namespace App\Services\Mailers;

abstract class IMailer
{
    const REPLACEABLE = [
        'StartDate',
        'EndDate',
        'PurposeOfLoan',
        'CurrentDate',
        'CurrentDateDdMmYyyy',
        'CurrentDateMmDdYyyy',
        'PrimaryContact',
        'PrimaryFirstName',
        'PrimaryEmail',
        'PrimaryPhone',
        'PrimaryPostCode',
        'PrimaryCompanyName',
        'ContactsComma',
        'ContactsList',
        'VehiclesComma',
        'VehiclesList',
        'VehiclesModelDerivative',
        'VehiclesRegistration',
        'VehiclesVinNumber',
        'AddressOutboundCollection',
        'AddressOutboundDelivery',
        'AddressInboundCollection',
        'AddressInboundDelivery',
        'NotesOutboundCollection',
        'NotesOutboundDelivery',
        'NotesInboundCollection',
        'NotesInboundDelivery',
    ];

    const AUTOESCAPE = [
        'ContactsList',
        'VehiclesList'
    ];

    abstract public function sendEmailTest();

    abstract public function formatReplaceable(string $key): string;

    abstract public function sendTransactionalEmail();

    public function getHtmlContent(): string
    {
        $body = $this->dto->email_body;
        foreach (self::REPLACEABLE as $key) {
            $body = str_replace("%%$key%%", $this->formatReplaceable($key), $body);
        }
        return $body;
    }

    public function getEmailParams()
    {
        return $this->dto->except(
            'api_key', 'email_body', 'subject', 'from_name', 'reply_to_email',
            'from_email', 'to_email', 'cc_email', 'bcc_email',
        )->toArray();
    }
}

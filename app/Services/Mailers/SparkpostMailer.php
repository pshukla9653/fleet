<?php

namespace App\Services\Mailers;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Spatie\DataTransferObject\DataTransferObject;

class SparkpostMailer extends IMailer
{
    const OPENING_TAG = '{{ ';
    const CLOSING_TAG = ' }}';

    protected PendingRequest $client;

    public function __construct(protected DataTransferObject $dto)
    {
        $this->client = Http::baseUrl('https://api.eu.sparkpost.com/api/v1/')->withHeaders([
            'Authorization' => $dto->api_key
        ]);
    }

    public function sendEmailTest()
    {
        if (!empty($this->dto->email_body)) {
            $to = array_map(function ($email) {
                return ['address' => [
                    'name' => explode('@', $email)[0],
                    'email' => $email
                ]];
            }, [$this->dto->to_email]);

            return $this->sendTransactionalEmail($to);
        }

        return false;
    }

    public function sendTransactionalEmail($to, $template_id = false, $params = [])
    {
        $data = array_merge_recursive([
            'recipients' => $to,
            'substitution_data' =>  array_merge($this->getEmailParams(), [
                'subject' => $this->dto->subject,
                'system_name' => $this->dto->from_name
            ]),
            'content' => [
                'from' => [
                    'name' => $this->dto->from_name,
                    'email' => $this->dto->from_email,
                ],
                'subject' => $this->dto->subject,
                'html' => $this->getHtmlContent(),
                'attachments' => $this->dto->getAttachments()
            ]
        ], [
            'options' => [
                'transactional' => true
            ]
        ]);

        $response = $this->client->post('transmissions', $data);

        if ($errors = $response->json('errors')) {
            $errorMessage = collect($errors)->pluck('message')->implode("\n");

            throw new \Exception($errorMessage);
        }

        return $response->json('results.id');
    }

    public function formatReplaceable(string $key): string
    {
        return self::OPENING_TAG . camel_to_snake_case($key) . self::CLOSING_TAG;
    }
}

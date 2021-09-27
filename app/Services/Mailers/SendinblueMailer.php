<?php

namespace App\Services\Mailers;

use GuzzleHttp\Client;
use SendinBlue\Client\Api\TransactionalEmailsApi;
use SendinBlue\Client\Configuration;
use SendinBlue\Client\Model\SendSmtpEmail;
use Spatie\DataTransferObject\DataTransferObject;

class SendinblueMailer extends IMailer
{
    const OPENING_TAG = '{{ ';
    const CLOSING_TAG = ' }}';
    const AUTOESCAPE_OFF = '{% autoescape off %}';
    const END_AUTOESCAPE = '{% endautoescape %}';

    public Configuration $config;
    public TransactionalEmailsApi $transactionalApiInstance;

    public function __construct(protected DataTransferObject $dto)
    {
        $this->config = Configuration::getDefaultConfiguration()->setApiKey('api-key', $dto->api_key);

        $this->transactionalApiInstance = new TransactionalEmailsApi(new Client(), $this->config);
    }

    /**
     * @return mixed
     */
    public function sendEmailTest(): mixed
    {
        if (!empty($this->dto->email_body)) {
            $to = array_map(function ($email) {
                return [
                    'name' => explode('@', $email)[0],
                    'email' => $email
                ];
            }, [$this->dto->to_email]);

            return $this->sendTransactionalEmail($to);
        }

        return false;
    }

    public function sendTransactionalEmail()
    {
        $data = [
            'to' => [[
                'email' => $this->dto->to_email
            ]],
            'cc' => [[
                'email' => $this->dto->cc_email
            ]],
            'bcc' => [[
                'email' => $this->dto->bcc_email
            ]],
            'replyTo' => [
                'email' => $this->dto->reply_to_email
            ],
            'subject' => $this->dto->subject,
            'sender' => [
                'name' => $this->dto->from_name,
                'email' => $this->dto->from_email,
            ],
            'attachment' => collect($this->dto->getAttachments())->map(function ($item) {
                $item['content'] = $item['data'];
                unset($item['data']);

                return $item;
            })->toArray()
        ];

        $data['htmlContent'] = $this->getHtmlContent();

        $data['params'] = $this->getEmailParams();

        return json_decode(
            $this->transactionalApiInstance->sendTransacEmail(new SendSmtpEmail($data))
        );
    }

    public function formatReplaceable(string $key): string
    {
        if (in_array($key, self::AUTOESCAPE)) {
            return self::AUTOESCAPE_OFF . self::OPENING_TAG . 'params.' . camel_to_snake_case($key) . self::CLOSING_TAG . self::END_AUTOESCAPE;
        }
        return self::OPENING_TAG . 'params.' . camel_to_snake_case($key) . self::CLOSING_TAG;
    }
}

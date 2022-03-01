<?php

namespace Codemonkey76\ClickSend;

use Illuminate\Support\Facades\Http;
use Codemonkey76\ClickSend\ClickSendResponse;
use Codemonkey76\ClickSend\MessageResponse;
use Codemonkey76\ClickSend\MessageInterface;

class ClickSend implements MessageInterface
{
    protected string $username;
    protected string $password;
    protected string $baseUrl;

    public static function make(): self
    {
        return app(static::class);
    }

    public function __construct(string $username, string $password, string $endpoint)
    {
        $this->username = $username;
        $this->password = $password;
        $this->baseUrl = $endpoint;
    }

    public function sendMessage(SmsMessage|array $messages): ClickSendResponse
    {
        $postData = is_array($messages) ? ['messages' => $messages] : ['messages' => [$messages]];
        $response = Http::withBasicAuth($this->username, $this->password)->post($this->baseUrl.'/sms/send', $postData);

        return new ClickSendResponse($response->json());
    }
    
    public function getMessageReceipt(MessageResponse $messageResponse): array
    {
        $response = Http::withBasicAuth($this->username, $this->password)->get($this->baseUrl.'/sms/receipts/'.$messageResponse->message_id);

        $responseJson = $response->json();
        return [
            'status_code' => (int)data_get($responseJson, 'data.status_code', 500),
            'status_text' => data_get($responseJson, 'data.status_text', '')
            ];
    }
}

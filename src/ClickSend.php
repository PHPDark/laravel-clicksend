<?php

namespace Codemonkey76\ClickSend;

use Illuminate\Support\Facades\Http;

class ClickSend
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

    public function SendMessage(SmsMessage|array $messages): ClickSendResponse
    {
        $postData = is_array($messages) ? ['messages' => $messages] : ['messages' => [$messages]];
        $response = Http::withBasicAuth($this->username, $this->password)->post($this->baseUrl.'/sms/send', $postData);

        return new ClickSendResponse($response->json());
    }
}

<?php

namespace Codemonkey76\ClickSend;

use Illuminate\Contracts\Config\Repository as Config;

class ClickSend
{
    protected string $username;
    protected string $password;
    protected string $baseUrl;

    public function __construct(Config $config)
    {
        $this->username = $config['clicksend.username'];
        $this->password = $config['clicksend.password'];
        $this->baseUrl = $config['clicksend.api_endpoint'];
    }

    public static function SendMessage(SmsMessage|array $messages): ClickSendResponse
    {
        $baseUrl = config('clicksend.api_endpoint');
        $username = config('clicksend.username');
        $password = config('clicksend.password');

        $postData = is_array($messages) ? ['messages' => $messages] : ['messages' => [$messages]];
        $response = Http::withBasicAuth($username, $password)->post($baseUrl.'/sms/send', $postData);

        return new ClickSendResponse($response->json());
    }
    // Build your next great package.
}

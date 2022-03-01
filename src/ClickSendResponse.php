<?php

namespace Codemonkey76\ClickSend;

use Codemonkey76\ClickSend\ClickSendResponseData;

class ClickSendResponse
{
    public int $http_code;
    public string $response_code;
    public string $response_msg;
    public ClickSendResponseData $data;

    public function __construct($obj)
    {
        $this->http_code = data_get($obj, 'http_code', 500);
        $this->response_code = data_get($obj, 'response_code', '');
        $this->response_msg = data_get($obj, 'response_msg', '');
        $this->data = new ClickSendResponseData(data_get($obj, 'data', ''));
    }
}

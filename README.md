# Very short description of the package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/codemonkey76/laravel-clicksend.svg?style=flat-square)](https://packagist.org/packages/codemonkey76/laravel-clicksend)
[![Total Downloads](https://img.shields.io/packagist/dt/codemonkey76/laravel-clicksend.svg?style=flat-square)](https://packagist.org/packages/codemonkey76/laravel-clicksend)
![GitHub Actions](https://github.com/codemonkey76/laravel-clicksend/actions/workflows/main.yml/badge.svg)

This is a laravel wrapper for ClickSend's REST API, currently only implementing sending SMS and getting delivery receipts for those messages.

## Installation

You can install the package via composer:

```bash
composer require codemonkey76/laravel-clicksend
```

## Config

Optionally you can publish the config file if you would like to modify the config.

```bash
php artisan vendor:publish --provider="Codemonkey76\ClickSend\ClickSendServiceProvider"
```

## Environment

Add the following to your .env file and set the values from your clicksend account.

```bash
CLICKSEND_USERNAME=<your username goes here>
CLICKSEND_PASSWORD=<your api key goes here>
```

Optionally if you need to modify the api endpoint, you can also define the following.

```bash
CLICKSEND_API_ENDPOINT=*<api endpoint goes here>*
```

## Usage

Example 1. Sending a single message and retreiving the delivery receipt.

```php

use Codemonkey76\ClickSend\SmsMessage;

$recipient = '1234567890';
$senderId  = '1234567890';
$body      = 'Test Message';

$message = new SmsMessage($recipient, $senderId, $body);

$response = ClickSend::SendMessage($message);

// Some time later, get the receipt.
sleep(5);

ClickSend::GetMessageReceipt($response->data->messages[0]->message_id);
```

Example 2. Send multiple messages and retrieve their delivery receipts.

```php

use Codemonkey76\ClickSend\SmsMessage;

$message1 = new SmsMessage('1234567890', '1234567890', 'Test Message #1');
$message2 = new SmsMessage('1234567890', '1234567890', 'Test Message #2');
$message3 = new SmsMessage('1234567890', '1234567890', 'Test Message #3');
$message4 = new SmsMessage('1234567890', '1234567890', 'Test Message #4');

$response = ClickSend::SendMessage([$message1, $message2, $message3, $message4]);

// Some time later, get the receipts.
sleep(5);

$receipt1 = ClickSend::GetMessageReceipt($response->data->message[0]->message_id);
$receipt2 = ClickSend::GetMessageReceipt($response->data->message[1]->message_id);
$receipt3 = ClickSend::GetMessageReceipt($response->data->message[2]->message_id);
$receipt4 = ClickSend::GetMessageReceipt($response->data->message[3]->message_id);

```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email shane@alphasg.com.au instead of using the issue tracker.

## Credits

-   [Shane Poppleton](https://github.com/codemonkey76)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).

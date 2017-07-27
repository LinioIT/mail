Linio Mail
==========
[![Latest Stable Version](https://poser.pugx.org/linio/mail/v/stable.svg)](https://packagist.org/packages/linio/mail) [![License](https://poser.pugx.org/linio/mail/license.svg)](https://packagist.org/packages/linio/mail) [![Build Status](https://secure.travis-ci.org/LinioIT/mail.png)](http://travis-ci.org/LinioIT/mail) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/LinioIT/mail/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/LinioIT/mail/?branch=master)

Linio Mail is yet another component of the Linio Framework. It aims to
abstract email messaging by supporting multiple adapters.

Install
-------

The recommended way to install Linio Mail is [through composer](http://getcomposer.org).

```bash
$ composer install linio/mail
```

Tests
-----

To run the test suite, you need install the dependencies via composer, then
run PHPUnit.

```bash
$ composer install
$ vendor/bin/phpunit
```

Usage
-----

The library is very easy to use: first, you have to register the service. For
Silex, a service provider is included. Just register it:

```php
<?php

$app->register(new \Linio\Component\Mail\Provider\MailServiceProvider(), [
    'mail.adapter_name' => 'mandrill',
    'mail.adapter_options' => [
        'api_key' => '',
    ],
]);

```

Note that must provide an adapter name and an array of options. Each adapter
has different configuration options that are injected by the `AdapterFactory`.

To start sending messages:

```php
<?php

use Linio\Component\Mail\Message;
use Linio\Component\Mail\Contact;

$message = new Message();
$message->setSubject('hello world');
$message->setFrom(new Contact('Barfoo', 'bar@foo.com'));
$message->addTo(new Contact('Foobar', 'foo@bar.com'));
$message->setTemplate('my_template');
$message->setData(['id' => '1']);

$app['mail.service']->send($message);

```

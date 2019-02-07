<?php

declare(strict_types=1);

namespace Linio\Component\Mail\Adapter;

use Linio\Component\Mail\Contact;
use Linio\Component\Mail\Message;

class NullAdapterTest extends \PHPUnit\Framework\TestCase
{
    public function testIsSending(): void
    {
        $adapter = new NullAdapter();

        $message = new Message();
        $message->setFrom(new Contact('Foobar', 'foo@bar.com'));
        $message->addTo(new Contact('Barfoo', 'bar@foo.com'));
        $message->setTemplate('my_template');
        $message->setSubject('hey world');

        $this->assertTrue($adapter->send($message));
    }
}

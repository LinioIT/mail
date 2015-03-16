<?php

namespace Linio\Component\Mail\Adapter;

use Linio\Component\Mail\Message;
use Linio\Component\Mail\Contact;

class NullAdapterTest extends \PHPUnit_Framework_TestCase
{
    public function testIsSending()
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

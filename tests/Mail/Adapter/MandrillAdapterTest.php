<?php

declare(strict_types=1);

namespace Linio\Component\Mail\Adapter;

use Linio\Component\Mail\Contact;
use Linio\Component\Mail\Message;

class MandrillAdapterTest extends \PHPUnit\Framework\TestCase
{
    public function testIsSending(): void
    {
        $messageData = [
            'subject' => 'hello world',
            'from_email' => 'bar@foo.com',
            'from_name' => 'Barfoo',
            'to' => [['email' => 'foo@bar.com', 'name' => 'Foobar', 'type' => 'to']],
            'track_opens' => true,
            'track_clicks' => true,
            'global_merge_vars' => [[
                'name' => 'id',
                'content' => 1,
            ]],
            'preserve_recipients' => true,
        ];

        $mandrillMessagesMock = $this->getMockBuilder('Mandrill_Messages')
            ->disableOriginalConstructor()
            ->getMock();
        $mandrillMessagesMock->expects($this->once())
            ->method('sendTemplate')
            ->with($this->equalTo('my_template'), $this->equalTo(null), $this->equalTo($messageData))
            ->will($this->returnValue([['status' => 'sent']]));

        $mandrillMock = $this->getMockBuilder('Mandrill')
            ->disableOriginalConstructor()
            ->getMock();
        $mandrillMock->messages = $mandrillMessagesMock;

        $adapter = $this->getMockBuilder('Linio\Component\Mail\Adapter\MandrillAdapter')
            ->disableOriginalConstructor()
            ->setMethods(null)
            ->getMock();

        $adapter->setMandrill($mandrillMock);

        $message = new Message();
        $message->setSubject('hello world');
        $message->setFrom(new Contact('Barfoo', 'bar@foo.com'));
        $message->addTo(new Contact('Foobar', 'foo@bar.com'));
        $message->setTemplate('my_template');
        $message->setData(['id' => '1']);

        $adapter->send($message);
    }
}

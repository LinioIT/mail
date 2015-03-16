<?php

namespace Linio\Component\Mail;

class MailServiceTest extends \PHPUnit_Framework_TestCase
{
    public function testIsSendingMessage()
    {
        $message = new Message();

        $adapterMock = $this->getMock('Linio\Component\Mail\AdapterInterface');
        $adapterMock->expects($this->once())
            ->method('send')
            ->with($this->equalTo($message));

        $mail = new MailService();
        $mail->setAdapter($adapterMock);
        $this->assertTrue($mail->send($message));
    }

    public function testIsDetectingProblemWhenSendingMessage()
    {
        $message = new Message();

        $loggerMock = $this->getMock('Psr\Log\LoggerInterface');
        $loggerMock->expects($this->once())
            ->method('error')
            ->with($this->equalTo('[Mail] An error has occurred: Oops!'), $this->contains('Oops!'));

        $adapterMock = $this->getMock('Linio\Component\Mail\AdapterInterface');
        $adapterMock->expects($this->once())
            ->method('send')
            ->with($this->equalTo($message))
            ->will($this->throwException(new \RuntimeException('Oops!')));

        $mail = new MailService();
        $mail->setAdapter($adapterMock);
        $mail->setLogger($loggerMock);

        $this->assertFalse($mail->send($message));
    }
}

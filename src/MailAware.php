<?php

declare (strict_types = 1);

namespace Linio\Component\Mail;

trait MailAware
{
    /**
     * @var MailService
     */
    protected $mail;

    public function getMail(): MailService
    {
        return $this->mail;
    }

    public function setMail(MailService $mail)
    {
        $this->mail = $mail;
    }
}

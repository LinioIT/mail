<?php

namespace Linio\Component\Mail;

trait MailTrait
{
    /**
     * @var MailService
     */
    protected $mail;

    /**
     * @return MailService
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param MailService $mail
     */
    public function setMail(MailService $mail)
    {
        $this->mail = $mail;
    }
}

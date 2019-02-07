<?php

declare(strict_types=1);

namespace Linio\Component\Mail;

class Message
{
    /**
     * @var Contact
     */
    protected $from;

    /**
     * @var Contact[]
     */
    protected $to = [];

    /**
     * @var Contact[]
     */
    protected $cc = [];

    /**
     * @var Contact[]
     */
    protected $bcc = [];

    /**
     * @var string
     */
    protected $subject;

    /**
     * @var Contact
     */
    protected $replyTo;

    /**
     * @var array
     */
    protected $headers = [];

    /**
     * @var mixed
     */
    protected $data;

    /**
     * @var string
     */
    protected $template;

    public function getFrom(): Contact
    {
        return $this->from;
    }

    public function setFrom(Contact $from): void
    {
        $this->from = $from;
    }

    /**
     * @return Contact[]
     */
    public function getTo(): array
    {
        return $this->to;
    }

    /**
     * @param Contact[] $to
     */
    public function setTo(array $to): void
    {
        $this->to = $to;
    }

    public function addTo(Contact $to): void
    {
        $this->to[] = $to;
    }

    /**
     * @return Contact[]
     */
    public function getCc(): array
    {
        return $this->cc;
    }

    /**
     * @param Contact[] $cc
     */
    public function setCc(array $cc): void
    {
        $this->cc = $cc;
    }

    public function addCc(Contact $cc): void
    {
        $this->cc[] = $cc;
    }

    /**
     * @return Contact[]
     */
    public function getBcc(): array
    {
        return $this->bcc;
    }

    /**
     * @param Contact[] $bcc
     */
    public function setBcc($bcc): void
    {
        $this->bcc = $bcc;
    }

    public function addBcc(Contact $bcc): void
    {
        $this->bcc[] = $bcc;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function setSubject(string $subject): void
    {
        $this->subject = $subject;
    }

    public function getReplyTo(): Contact
    {
        return $this->replyTo;
    }

    public function setReplyTo(Contact $replyTo): void
    {
        $this->replyTo = $replyTo;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function setHeaders(array $headers): void
    {
        $this->headers = $headers;
    }

    public function addHeader(string $key, string $value): void
    {
        $this->headers[$key] = $value;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data): void
    {
        $this->data = $data;
    }

    public function getTemplate(): string
    {
        return $this->template;
    }

    public function setTemplate(string $template): void
    {
        $this->template = $template;
    }
}

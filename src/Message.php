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

    public function setFrom(Contact $from)
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
    public function setTo(array $to)
    {
        $this->to = $to;
    }

    public function addTo(Contact $to)
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
    public function setCc(array $cc)
    {
        $this->cc = $cc;
    }

    public function addCc(Contact $cc)
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
    public function setBcc($bcc)
    {
        $this->bcc = $bcc;
    }

    public function addBcc(Contact $bcc)
    {
        $this->bcc[] = $bcc;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function setSubject(string $subject)
    {
        $this->subject = $subject;
    }

    public function getReplyTo(): Contact
    {
        return $this->replyTo;
    }

    public function setReplyTo(Contact $replyTo)
    {
        $this->replyTo = $replyTo;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function setHeaders(array $headers)
    {
        $this->headers = $headers;
    }

    public function addHeader(string $key, string $value)
    {
        $this->headers[$key] = $value;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function getTemplate(): string
    {
        return $this->template;
    }

    public function setTemplate(string $template)
    {
        $this->template = $template;
    }
}

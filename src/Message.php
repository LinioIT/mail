<?php

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
     * @var string
     */
    protected $data;

    /**
     * @var string
     */
    protected $template;

    /**
     * @return Contact
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param Contact $from
     */
    public function setFrom(Contact $from)
    {
        $this->from = $from;
    }

    /**
     * @return Contact[]
     */
    public function getTo()
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

    /**
     * @param Contact $to
     */
    public function addTo(Contact $to)
    {
        $this->to[] = $to;
    }

    /**
     * @return Contact[]
     */
    public function getCc()
    {
        return $this->cc;
    }

    /**
     * @param Contact[] $cc
     */
    public function setCc($cc)
    {
        $this->cc = $cc;
    }

    /**
     * @param Contact $cc
     */
    public function addCc(Contact $cc)
    {
        $this->cc[] = $cc;
    }

    /**
     * @return Contact[]
     */
    public function getBcc()
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

    /**
     * @param Contact $bcc
     */
    public function addBcc(Contact $bcc)
    {
        $this->bcc[] = $bcc;
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return Contact
     */
    public function getReplyTo()
    {
        return $this->replyTo;
    }

    /**
     * @param Contact $replyTo
     */
    public function setReplyTo(Contact $replyTo)
    {
        $this->replyTo = $replyTo;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param array $headers
     */
    public function setHeaders(array $headers)
    {
        $this->headers = $headers;
    }

    /**
     * @param string $key
     * @param string $value
     */
    public function addHeader($key, $value)
    {
        $this->headers[$key] = $value;
    }

    /**
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param string $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @param string $template
     */
    public function setTemplate($template)
    {
        $this->template = $template;
    }
}

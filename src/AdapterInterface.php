<?php

namespace Linio\Component\Mail;

interface AdapterInterface
{
    /**
     * @param array $config
     */
    public function __construct(array $config);

    /**
     * @param \Linio\Component\Mail\Message $message
     */
    public function send(Message $message);
}

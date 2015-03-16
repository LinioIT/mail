<?php

namespace Linio\Component\Mail\Adapter;

use Linio\Component\Mail\AdapterInterface;
use Linio\Component\Mail\Message;

class NullAdapter implements AdapterInterface
{
    /**
     * {@inheritdoc}
     */
    public function __construct(array $config = array())
    {
    }

    /**
     * {@inheritdoc}
     */
    public function send(Message $message)
    {
        return true;
    }
}

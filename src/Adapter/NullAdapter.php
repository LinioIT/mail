<?php

declare (strict_types = 1);

namespace Linio\Component\Mail\Adapter;

use Linio\Component\Mail\AdapterInterface;
use Linio\Component\Mail\Message;

class NullAdapter implements AdapterInterface
{
    public function __construct(array $config = [])
    {
    }

    public function send(Message $message)
    {
        return true;
    }
}

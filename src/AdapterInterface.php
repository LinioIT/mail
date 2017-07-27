<?php

declare(strict_types=1);

namespace Linio\Component\Mail;

interface AdapterInterface
{
    public function __construct(array $config);

    public function send(Message $message);
}

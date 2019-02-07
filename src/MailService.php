<?php

declare(strict_types=1);

namespace Linio\Component\Mail;

use Psr\Log\LoggerInterface;

class MailService
{
    /**
     * @var AdapterInterface
     */
    protected $adapter;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    public function send(Message $message): bool
    {
        try {
            $this->adapter->send($message);
        } catch (\Exception $e) {
            $this->logger->error('[Mail] An error has occurred: ' . $e->getMessage(), (array) $e);

            return false;
        }

        return true;
    }

    public function setAdapter(AdapterInterface $adapter): void
    {
        $this->adapter = $adapter;
    }

    public function setLogger(LoggerInterface $logger): void
    {
        $this->logger = $logger;
    }
}

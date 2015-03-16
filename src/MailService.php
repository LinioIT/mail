<?php

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

    /**
     * @param Message $message
     * @return boolean
     */
    public function send(Message $message)
    {
        try {
            $this->adapter->send($message);
        } catch (\Exception $e) {
            $this->logger->error('[Mail] An error has occurred: ' . $e->getMessage(), (array) $e);

            return false;
        }

        return true;
    }

    /**
     * @param AdapterInterface $adapter
     */
    public function setAdapter(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
}

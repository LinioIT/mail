<?php

namespace Linio\Component\Mail\Adapter;

use Linio\Component\Mail\AdapterInterface;
use Linio\Component\Mail\Message;
use Linio\Component\Mail\Contact;

class MandrillAdapter implements AdapterInterface
{
    /**
     * @var \Mandrill
     */
    protected $mandrill;

    /**
     * {@inheritdoc}
     */
    public function __construct(array $config = array())
    {
        $this->mandrill = new \Mandrill($config['api_key']);
    }

    /**
     * {@inheritdoc}
     */
    public function send(Message $message)
    {
        $result = $this->mandrill->messages->sendTemplate($message->getTemplate(), null, $this->prepareMessage($message))[0];

        if (isset($result['status']) && in_array($result['status'], ['queued', 'sent'])) {
            return;
        }

        throw new \RuntimeException(sprintf('Mandrill could not send the email to "%s" due to: %s', $result['email'], $result['reject_reason']));
    }

    /**
     * @param array $data
     * @return array
     */
    protected function prepareData(array $data)
    {
        $result = [];

        foreach ($data as $key => $value) {
            $result[] = [
                'name' => $key,
                'content' => $value
            ];
        }

        return $result;
    }

    /**
     * @param Message $message
     * @return array
     */
    protected function prepareMessage(Message $message)
    {
        return [
            'subject' => $message->getSubject(),
            'from_email' => $message->getFrom()->getEmail(),
            'from_name' => $message->getFrom()->getName(),
            'to' => $this->getDestinations($message),
            'track_opens' => true,
            'track_clicks' => true,
            'preserve_recipients' => true,
            'global_merge_vars' => $this->prepareData($message->getData())
        ];
    }

    protected function getDestinations(Message $message)
    {
        $preparedTo = $this->prepareContacts($message->getTo(), 'to');
        $preparedBcc = $this->prepareContacts($message->getBcc(), 'bcc');
        $destination = array_merge($preparedTo, $preparedBcc);

        return $destination;
    }

    /**
     * @param Contact[] $contacts
     * @param string $type
     * @return array
     */
    protected function prepareContacts(array $contacts, $type)
    {
        $result = [];

        foreach ($contacts as $contact) {
            $result[] = [
                'name' => $contact->getName(),
                'email' => $contact->getEmail(),
                'type' => $type
            ];
        }

        return $result;
    }

    /**
     * @return \Mandrill
     */
    public function getMandrill()
    {
        return $this->mandrill;
    }

    /**
     * @param \Mandrill $mandrill
     */
    public function setMandrill(\Mandrill $mandrill)
    {
        $this->mandrill = $mandrill;

        return $this;
    }
}

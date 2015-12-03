<?php
declare(strict_types=1);

namespace Linio\Component\Mail\Adapter;

use Linio\Component\Mail\AdapterInterface;
use Linio\Component\Mail\Contact;
use Linio\Component\Mail\Message;

class MandrillAdapter implements AdapterInterface
{
    /**
     * @var \Mandrill
     */
    protected $mandrill;

    public function __construct(array $config = [])
    {
        $this->mandrill = new \Mandrill($config['api_key']);
    }

    public function send(Message $message)
    {
        $result = $this->mandrill->messages->sendTemplate($message->getTemplate(), null, $this->prepareMessage($message))[0];

        if (isset($result['status']) && in_array($result['status'], ['queued', 'sent'])) {
            return;
        }

        throw new \RuntimeException(sprintf('Mandrill could not send the email to "%s" due to: %s', $result['email'], $result['reject_reason']));
    }

    protected function prepareData(array $data): array
    {
        $result = [];

        foreach ($data as $key => $value) {
            $result[] = [
                'name' => $key,
                'content' => $value,
            ];
        }

        return $result;
    }

    protected function prepareMessage(Message $message): array
    {
        return [
            'subject' => $message->getSubject(),
            'from_email' => $message->getFrom()->getEmail(),
            'from_name' => $message->getFrom()->getName(),
            'to' => $this->getDestinations($message),
            'track_opens' => true,
            'track_clicks' => true,
            'preserve_recipients' => true,
            'global_merge_vars' => $this->prepareData($message->getData()),
        ];
    }

    protected function getDestinations(Message $message): array
    {
        $preparedTo = $this->prepareContacts($message->getTo(), 'to');
        $preparedBcc = $this->prepareContacts($message->getBcc(), 'bcc');
        $destination = array_merge($preparedTo, $preparedBcc);

        return $destination;
    }

    /**
     * @param Contact[] $contacts
     */
    protected function prepareContacts(array $contacts, string $type): array
    {
        $result = [];

        foreach ($contacts as $contact) {
            $result[] = [
                'name' => $contact->getName(),
                'email' => $contact->getEmail(),
                'type' => $type,
            ];
        }

        return $result;
    }

    public function getMandrill(): \Mandrill
    {
        return $this->mandrill;
    }

    public function setMandrill(\Mandrill $mandrill)
    {
        $this->mandrill = $mandrill;
    }
}

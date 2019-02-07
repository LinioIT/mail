<?php

declare(strict_types=1);

namespace Linio\Component\Mail\Provider;

use Linio\Component\Mail\AdapterFactory;
use Linio\Component\Mail\MailService;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class MailServiceProvider implements ServiceProviderInterface
{
    public function register(Container $container): void
    {
        if (!isset($container['mail.adapter_name'])) {
            $container['mail.adapter_name'] = 'null';
        }

        $container['mail.adapter'] = $container->factory(function ($container) {
            $adapterFactory = new AdapterFactory();

            return $adapterFactory->getAdapter($container['mail.adapter_name'], $container['mail.adapter_options']);
        });

        $container['mail.service'] = function ($container) {
            $mailService = new MailService();
            $mailService->setAdapter($container['mail.adapter']);
            $mailService->setLogger($container['monolog']);

            return $mailService;
        };
    }
}

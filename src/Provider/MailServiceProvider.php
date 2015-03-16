<?php

namespace Linio\Component\Mail\Provider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Linio\Component\Mail\MailService;
use Linio\Component\Mail\AdapterFactory;

class MailServiceProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        if (!isset($container['mail.adapter_name'])) {
            $container['mail.adapter_name'] = 'null';
        }

        $container['mail.adapter'] = $container->factory(function ($container) {
            $adapterFactory = new AdapterFactory();
            $adapter = $adapterFactory->getAdapter($container['mail.adapter_name'], $container['mail.adapter_options']);

            return $adapter;
        });

        $container['mail.service'] = function ($container) {
            $mailService = new MailService();
            $mailService->setAdapter($container['mail.adapter']);
            $mailService->setLogger($container['monolog']);

            return $mailService;
        };
    }
}

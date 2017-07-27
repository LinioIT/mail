<?php

declare(strict_types=1);

namespace Linio\Component\Mail;

use Doctrine\Common\Inflector\Inflector;

class AdapterFactory
{
    public function getAdapter(string $adapterName, array $adapterConfig = []): AdapterInterface
    {
        $adapterClass = sprintf('%s\\Adapter\\%sAdapter', __NAMESPACE__, Inflector::classify($adapterName));

        if (!class_exists($adapterClass)) {
            throw new \InvalidArgumentException('Adapter class does not exist: ' . $adapterClass);
        }

        $adapter = new $adapterClass($adapterConfig);

        return $adapter;
    }
}

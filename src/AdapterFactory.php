<?php

namespace Linio\Component\Mail;

use Doctrine\Common\Inflector\Inflector;

class AdapterFactory
{
    /**
     * @param string $adapterName
     * @param array $adapterConfig
     * @return \Linio\Component\Mail\AdapterInterface
     */
    public function getAdapter($adapterName, $adapterConfig = array())
    {
        $adapterClass = sprintf('%s\\Adapter\\%sAdapter', __NAMESPACE__, Inflector::classify($adapterName));

        if (!class_exists($adapterClass)) {
            throw new \InvalidArgumentException('Adapter class does not exist: ' . $adapterClass);
        }

        $adapter = new $adapterClass($adapterConfig);

        return $adapter;
    }
}

<?php

declare(strict_types=1);

namespace Linio\Component\Mail;

class AdapterFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testIsGettingAdapter()
    {
        $adapterFactory = new AdapterFactory();
        $adapter = $adapterFactory->getAdapter('null', ['foo' => 'bar']);
        $this->assertInstanceOf('Linio\Component\Mail\Adapter\NullAdapter', $adapter);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testIsDetectingBadAdapter()
    {
        $adapterFactory = new AdapterFactory();
        $adapter = $adapterFactory->getAdapter('foobar', ['foo' => 'bar']);
    }
}

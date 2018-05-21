<?php

namespace YottaCms\Bundle\YottaPhpSettingsBundle\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Console\ConsoleEvents;

class PhpIniListener implements EventSubscriberInterface
{
    const PRIORITY = -100000;
    protected $container;

    /**
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::REQUEST => array('setPhpSettings', self::PRIORITY),
            ConsoleEvents::COMMAND=> array('setPhpSettings', self::PRIORITY),
        ];
    }

    /**
     * Set php.ini settings
     */
    public function setPhpSettings()
    {
        foreach ((array)$this->container->getParameter('yotta_php_settings')['ini'] as $item) {
            list($key, $value) = each($item);
            ini_set($key, $value);
        };
    }
}

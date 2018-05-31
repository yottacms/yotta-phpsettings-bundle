<?php

namespace YottaCms\Bundle\YottaPhpSettingsBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerInterface;

class YottaPhpSettingsBundle extends Bundle
{
    protected $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
        $this->setPhpSettings();
        return parent::setContainer($container);
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

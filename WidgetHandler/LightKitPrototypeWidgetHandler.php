<?php


namespace Ling\Light_Kit\WidgetHandler;


use Ling\Kit_PrototypeWidget\WidgetHandler\PrototypeWidgetHandler;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;


/**
 * The LightKitPrototypeWidgetHandler class.
 */
class LightKitPrototypeWidgetHandler extends PrototypeWidgetHandler
{


    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    private LightServiceContainerInterface $container;


    /**
     * Returns the container of this instance.
     *
     * @return LightServiceContainerInterface
     */
    public function getContainer(): LightServiceContainerInterface
    {
        return $this->container;
    }

    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }


}
<?php

namespace Libellule\Controller;


use Libellule\Core\Container\Container;

abstract class AbstractController
{
    private $container;

    public function __construct()
    {
        $this->container = Container::getInstance();
    }

    /**
     * @return mixed
     */
    public function getContainer()
    {
        return $this->container;
    }



}
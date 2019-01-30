<?php

namespace Libellule\Core\Container;


use Tightenco\Collect\Support\Collection;

class Container
{
    private static $_instance;
    private $instances;

    private function __construct() {
        $this->instances = new Collection();
    }

    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function get(string $key)
    {
        return $this->instances->get($key);
    }

    public function set(string $key, $value)
    {
        $this->instances->put($key, $value);
    }

    public function has(string $key)
    {
        return $this->instances->has($key);
    }

}
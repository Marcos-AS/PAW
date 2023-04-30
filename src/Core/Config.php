<?php

namespace Paw\Core;

class Config {

    private array $configs;

    public function __construct() {
        $this -> configs["LOG_LEVEL"] = getenv("LOG_LEVEL", "INFO");
        $path = getenv("LOG_PATH", "/logs/app.log");
        $this -> configs["LOG_PATH"] = $this -> joinPaths('..', $path);
    }

    public function joinPaths() {
        $paths = array();
        foreach (func_get_args() as $args) {
            if ($args <> '') {
                $paths[] = $args;
            }
        }
        return preg_replace('#\+#', '/', join('/', $paths));
    }

    public function get($name) {
        return $this -> configs[$name] ?? null;
    }
}
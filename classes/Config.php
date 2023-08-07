<?php

class Config {

    public function get(string $paramsName) {
        $config = require ('config.php');
        return $config[$paramsName] ?? null;
    }
}
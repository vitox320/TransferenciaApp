<?php

namespace App;

class Usuario
{
    private $name;
    private $saldo;

    public function __construct(string $name, float $saldo)
    {
        $this->name = $name;
        $this->saldo = $saldo;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }
}
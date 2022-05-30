<?php

namespace Config;

use Twig\Environment;

class Controller
{
    private int $number;

    public function __construct()
    {
        $this->number = 1000;
    }
}
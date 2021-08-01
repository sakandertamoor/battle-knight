<?php

declare(strict_types=1);

namespace App\Domain;

class Skill
{
    private string $name;
    private int $value;


    public function __construct(string $name, int $value)
    {
        $this->name = $name;
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getName()
    {
        return $this->name;
    }
    public function randomize($min, $max)
    {
        $this->value = rand($min, $max);
    }
}

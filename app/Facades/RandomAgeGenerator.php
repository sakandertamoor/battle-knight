<?php

declare(strict_types=1);

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class RandomAgeGenerator extends Facade
{
    private const MIN_AGE = 20;
    private const MAX_AGE = 25;

    public static function getAge(): int
    {
        return rand(self::MIN_AGE, self::MAX_AGE);
    }
}

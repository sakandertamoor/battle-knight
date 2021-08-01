<?php

namespace App\Casts;

use App\Domain\Knight;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use InvalidArgumentException;

class KnightCast implements CastsAttributes
{
    public function get($model, $key, $value, $attributes)
    {
        return new $attributes['name'](
            $attributes['name'],
            $attributes['age'],
            $attributes['health'],
            [],
            []
        );
    }

    public function set($model, $key, $value, $attributes)
    {
        if (!$value instanceof Knight) {
            throw new InvalidArgumentException(
                'The given value is not a Knight instance.'
            );
        }

        return [
            'name' => $value->getName(),
            'age' => $value->getAge(),
            'health' => $value->getHealth(),
            'skills' => $value->getSkills(),
            'virtues' => $value->getVirtues()
        ];
    }
}

<?php

declare(strict_types=1);

namespace App\Interfaces;

use App\Domain\Knight;

interface KnightRepositoryInterface
{
    public function get(int $knightId): ?Knight;
    public function add(Knight $knight): ?int;
}

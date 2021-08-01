<?php

declare(strict_types=1);

namespace App\Interfaces;

interface RandomNameGeneratorServiceInterface
{
    public function getName(): ?string;
}

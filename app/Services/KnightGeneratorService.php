<?php

declare(strict_types=1);

namespace App\Services;

use App\Domain\Knight;
use App\Domain\Skill;
use App\Domain\Virtue;
use App\Facades\RandomAgeGenerator;
use App\Interfaces\RandomNameGeneratorServiceInterface;

class KnightGeneratorService
{
    private RandomNameGeneratorServiceInterface $nameGeneratorService;

    public function __construct(RandomNameGeneratorServiceInterface $nameGeneratorService)
    {
        $this->nameGeneratorService = $nameGeneratorService;
    }

    public function generate(): ?Knight
    {
        $name = $this->nameGeneratorService->getName();
        if(is_null($name)) {
            return null;
        }
        $age = RandomAgeGenerator::getAge();

        return new Knight($name, $age, 100, $this->generateVirtues($age), $this->generateSkills());
    }

    /**
     * @param int $age
     * @return Virtue[]
     */
    private function generateVirtues(int $age): array
    {
        return [
        ];
    }

    /**
     * @return Skill[]
     */
    private function generateSkills(): array
    {
        return array(
        );
    }
}

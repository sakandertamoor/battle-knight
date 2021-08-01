<?php

declare(strict_types=1);

namespace App\Domain;

class Knight
{
    private string $name;
    private int $age;
    private int $health;
    /** @var Virtue[] */
    private array $virtues;
    /** @var Skill[] */
    private array $skills;

    /**
     * Knight constructor.
     * @param string $name
     * @param int $age
     * @param int $health
     * @param Virtue[] $virtues
     * @param Skill[] $skills
     */
    public function __construct(
        string $name,
        int $age,
        int $health,
        array $virtues,
        array $skills
    ) {
        $this->name = $name;
        $this->virtues = $virtues;
        $this->skills = $skills;
        $this->age = $age;
        $this->health = $health;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @return int
     */
    public function getHealth(): int
    {
        return $this->health;
    }

    /**
     * @return Virtue[]
     */
    public function getVirtues(): array
    {
        return $this->virtues;
    }

    /**
     * @return Skill[]
     */
    public function getSkills(): array
    {
        return $this->skills;
    }
}

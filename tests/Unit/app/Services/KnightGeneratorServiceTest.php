<?php

declare(strict_types=1);

namespace Tests\Unit\app\Services;

use App\Domain\Knight;
use App\Interfaces\RandomNameGeneratorServiceInterface;
use App\Services\KnightGeneratorService;
use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;
use Prophecy\Prophecy\ObjectProphecy;

class KnightGeneratorServiceTest extends TestCase
{
    use ProphecyTrait;

    private KnightGeneratorService $knightGeneratorService;

    /** @var RandomNameGeneratorServiceInterface|ObjectProphecy */
    private $nameFakeGeneratorService;

    public function setUp(): void
    {
        parent::setUp();
        $this->nameFakeGeneratorService = $this->prophesize(RandomNameGeneratorServiceInterface::class);
    }

    public function testGenerateWillReturnAKnight()
    {
        $this->initiateKnightGenerator('Sakander');
        $this->assertInstanceOf(Knight::class, $this->knightGeneratorService->generate());
    }

    public function testGenerateWillReturnNull()
    {
        $this->initiateKnightGenerator(null);
        $this->assertNull($this->knightGeneratorService->generate());
    }

    private function initiateKnightGenerator(?string $value)
    {
        $this->nameFakeGeneratorService->getName()->willReturn($value);
        $this->knightGeneratorService = new KnightGeneratorService($this->nameFakeGeneratorService->reveal());
    }
}

<?php


namespace Tests\Unit\app\Repositories;


use App\Domain\Knight;
use App\Interfaces\KnightRepositoryInterface;
use App\Models\Knight as KnightModel;
use App\Repositories\KnightRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class KnightRepositoryTest extends TestCase
{
    use RefreshDatabase;

    private KnightRepositoryInterface $knightRepository;

    public function setUp(): void
    {
        parent::setUp();
        $this->knightRepository = new KnightRepository();
    }

    public function testGetReturnsAKnight()
    {
        KnightModel::factory(1)->create([
            'name' => 'SSSSSsakandar',
            'age' => 25,
            'health' => 100,
            'courage' => 90,
            'justice' => 90,
            'mercy' => 90,
            'generosity' => 90,
            'faith' => 90,
            'strength' => 90,
            'defense' => 90,
            'strategy' => 90
        ]);

        $knight = $this->knightRepository->get(1);
        $knights = KnightModel::find(1);
        echo '<pre>';
        print_r($knights->skills->);
        echo '</pre>';
        exit;
        $this->assertInstanceOf(Knight::class, $knight);
        $this->assertEquals('Sakandar', $knight->getName());
        $this->assertEquals(25, $knight->getAge());
    }

    public function testGetReturnsNullWhenNoKnightFound()
    {
        $knight = $this->knightRepository->get(1);
        $this->assertNull($knight);
    }
}

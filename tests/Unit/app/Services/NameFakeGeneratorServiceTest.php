<?php

namespace Tests\Unit\app\Services;

use App\Interfaces\RandomNameGeneratorServiceInterface;
use App\Services\NameFakeGeneratorService;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use Prophecy\PhpUnit\ProphecyTrait;
use Prophecy\Prophecy\ObjectProphecy;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;

class NameFakeGeneratorServiceTest extends TestCase
{
    use ProphecyTrait;

    private RandomNameGeneratorServiceInterface $nameFakeGeneratorService;

    /** @var ClientInterface|ObjectProphecy */
    private $client;

    /** @var RequestFactoryInterface|ObjectProphecy */
    private $requestFactory;

    public function setUp(): void
    {
        parent::setUp();

        $this->client = $this->prophesize(ClientInterface::class);
        $this->requestFactory = $this->prophesize(RequestFactoryInterface::class);
    }

    /**
     * @dataProvider nameGeneratorDataProvider
     */
    public function testGetNameWillReturnAValidName(int $statusCode, string $body, ?string $expectedName)
    {
        $request = new Request('GET', 'https://api.namefake.com/');
        $this->requestFactory->createRequest(Argument::any(), Argument::any())->willReturn($request);
        $this->client->sendRequest($request)->willReturn(
            new Response($statusCode, [], $body)
        );

        $this->initiateNameFakeGeneratorService();

        $this->assertEquals($expectedName, $this->nameFakeGeneratorService->getName());
    }

    public function nameGeneratorDataProvider()
    {
        return [
            'getNameWillReturnAValidName' => [
                'statusCode' => 200,
                'body' => json_encode(['name' => 'Sakandar Taimoor']),
                'expectedName' => 'Sakandar Taimoor'
            ],
            'getNameWillReturnNullForBadRequest' => [
                'statusCode' => 500,
                'body' => '',
                'expectedName' => null
            ],
            'getNameWillReturnNullWhenNameDoNotExist' => [
                'statusCode' => 200,
                'body' => '',
                'expectedName' => null
            ]
        ];
    }

    /*public function testGetNameWillReturnNullWhenEcceptionIsThrown()
    {
        $this->expectException(ClientExceptionInterface::class);

        $request = new Request('GET', 'https://api.namefake.com/');
        $this->requestFactory->createRequest(Argument::any(), Argument::any())->willReturn($request);
        $this->client->sendRequest(Argument::any())->willThrow(
            ClientExceptionInterface::class
        );

        $this->initiateNameFakeGeneratorService();

        $this->assertNull($this->nameFakeGeneratorService->getName());
    }*/

    private function initiateNameFakeGeneratorService()
    {
        $this->nameFakeGeneratorService = new NameFakeGeneratorService(
            $this->client->reveal(),
            $this->requestFactory->reveal()
        );
    }
}

<?php

declare(strict_types=1);

namespace App\Services;

use App\Interfaces\RandomNameGeneratorServiceInterface;
use Illuminate\Support\Facades\Log;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;

class NameFakeGeneratorService implements RandomNameGeneratorServiceInterface
{
    private const BASE_URL = 'https://api.namefake.com/';
    private ClientInterface $client;
    private RequestFactoryInterface $requestFactory;

    public function __construct(ClientInterface $client, RequestFactoryInterface $requestFactory)
    {
        $this->client = $client;
        $this->requestFactory = $requestFactory;
    }

    public function getName(string $url = ''): ?string
    {
        try {
            $request = $this->requestFactory->createRequest('GET', self::BASE_URL . $url);
            $response = $this->client->sendRequest($request);

            if($response->getStatusCode() !== 200) {
                return null;
            }

            $content = json_decode($response->getBody()->getContents());
            return $content->name ?? null;

        } catch (ClientExceptionInterface $e) {
            Log::error($e->getMessage(), [
                'url' => $url
            ]);
        }
        return null;
    }
}

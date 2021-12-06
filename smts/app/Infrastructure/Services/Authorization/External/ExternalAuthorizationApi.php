<?php
namespace App\Infrastructure\Services\Authorization\External;

use App\Infrastructure\Services\Authorization\External\Contracts\ExternalAuthorizationApiInterface;
use GuzzleHttp\Client as HttpClient;

class ExternalAuthorizationApi implements ExternalAuthorizationApiInterface
{
    private $httpClient;

    public function __construct(
        HttpClient $httpClient
    ) {
        $this->httpClient = $httpClient;
    }

    private function getAuthorizationUrl()
    {
        return env('AUTHORIZATION_SERVICE_URL');
    }

    public function get($id = null): array
    {
        try {
            $request = $this->httpClient->request('GET', $this->getAuthorizationUrl());
            if ($request->getStatusCode() !== 200) {
                return [];
            }
            return json_decode($request->getBody()->getContents(), true);
        } catch (\Exception $e) {
            return [];
        }
    }
}

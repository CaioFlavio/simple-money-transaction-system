<?php
namespace App\Domain\Transactions\ExternalAuthorization\Services;


use App\Domain\Transactions\ExternalAuthorization\Contracts\ExternalAuthorizationApiServiceInterface;
use App\Infrastructure\Services\Authorization\External\Contracts\ExternalAuthorizationApiInterface;

class ExternalAuthorizationApiService implements ExternalAuthorizationApiServiceInterface
{
    const AUTHORIZATION_CODE = 'Autorizado';

    private $externalAuthorizationApi;

    public function __construct(
        ExternalAuthorizationApiInterface $externalAuthorizationApi
    ){
        $this->externalAuthorizationApi = $externalAuthorizationApi;
    }

    private function checkConditions(array $authorization) : bool
    {
        return (
            array_key_exists('message', $authorization)
            && $authorization['message'] == static::AUTHORIZATION_CODE
        );
    }
    public function isAuthorized(): bool
    {
        try {
            $authorization = $this->externalAuthorizationApi->get();
            return $this->checkConditions($authorization);
        } catch (\Exception $e) {
            return false;
        }
    }
}

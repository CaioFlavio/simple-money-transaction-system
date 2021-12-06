<?php
namespace App\Domain\Transactions\ExternalAuthorization\Contracts;

interface ExternalAuthorizationApiServiceInterface
{
    public function isAuthorized() : bool;
}

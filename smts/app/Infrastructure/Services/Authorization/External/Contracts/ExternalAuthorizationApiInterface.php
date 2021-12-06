<?php
namespace App\Infrastructure\Services\Authorization\External\Contracts;

interface ExternalAuthorizationApiInterface
{
    /**
     * @param null $id
     * @return array
     */
    public function get($id = null) : array;
}

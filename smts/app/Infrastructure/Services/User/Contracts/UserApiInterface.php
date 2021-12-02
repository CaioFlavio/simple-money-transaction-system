<?php
namespace App\Infrastructure\User\Contracts;

interface UserApiInterface
{
    public function get($id) : array;

    public function create(array $data) : array;

    public function update($id, array $data) : array;

    public function delete($id) : bool;
}

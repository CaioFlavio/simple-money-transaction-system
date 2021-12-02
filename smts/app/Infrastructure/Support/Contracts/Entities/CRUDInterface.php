<?php
namespace App\Infrastructure\Support\Contracts\Entities;

interface CRUDInterface
{
    /**
     * @param $id
     * @return array
     */
    public function loadEntity($id) : array;

    /**
     * @param array $data
     * @return array
     */
    public function createEntity(array $data) : array;

    /**
     * @param $id
     * @param array $data
     * @return array
     */
    public function updateEntity($id, array $data): array;

    /**
     * @param $id
     * @return bool
     */
    public function deleteEntity($id) : bool;
}

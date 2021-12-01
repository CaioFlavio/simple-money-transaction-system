<?php
namespace App\Infrastructure\Support\Contracts\Entities;

interface CRUDInterface
{
    /**
     * @param $id
     * @return array
     */
    public function load($id) : array;

    /**
     * @param array $data
     * @return array
     */
    public function create(array $data) : array;

    /**
     * @param $id
     * @param array $data
     * @return array
     */
    public function update($id, array $data): array;

    /**
     * @param $id
     * @return bool
     */
    public function delete($id) : bool;
}

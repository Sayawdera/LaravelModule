<?php

namespace App\Interfaces;

interface IBaseRepository
{
    /**
     * @param $data
     * @return mixed
     */
    public function paginatedList(array $data = []): mixed;

    /**
     * @param $data
     * @return mixed
     */
    public function create($data): mixed;

    /**
     * @param $data
     * @param $id
     * @return mixed
     */
    public function update($data, $id): mixed;

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id): mixed;

    /**
     * @param $id
     * @return mixed
     */
    public function findById($id): mixed;
}

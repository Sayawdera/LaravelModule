<?php

namespace App\Interfaces;

interface IBaseService
{
    /**
     * @param array $data
     * @return mixed
     */
    public function paginatedList(array $data = []): mixed;

    /**
     * @param $data
     * @return mixed
     */
    public function createModel($data): mixed;

    /**
     * @param $data
     * @param $id
     * @return mixed
     */
    public function updateModel($data, $id): mixed;

    /**
     * @param $id
     * @return mixed
     */
    public function deleteModel($id): mixed;

    /**
     * @param $id
     * @return mixed
     */
    public function getModelById($id): mixed;
}

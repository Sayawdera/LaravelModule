<?php

namespace App\Modules\User\Service;

use App\Modules\User\Repository\UserRepository;
use App\Services\BaseService;
use Illuminate\Database\Eloquent\{Builder, Collection, Model};
use Throwable;


class UserService extends BaseService
{
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param array $data
     * @return Model|array|Collection|Builder|null
     * @throws Throwable
     */
    public function createModel($data): Model|array|Collection|Builder|null
    {
        $data['password'] = bcrypt($data['password']);
        return parent::createModel($data);
    }

    /**
     * @param array $data
     * @param int $id
     * @return Model|array|Collection|Builder[]|Builder[]|null
     * @throws Throwable
     */
    public function updateModel($data, $id): Model|array|Collection|Builder|null
    {
        $data['password'] = bcrypt($data['password']);
        return parent::updateModel($data, $id);
    }
}

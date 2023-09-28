<?php

namespace App\Repositories;


use App\Constants\PaginatorPerPageEnum;
use App\Interfaces\IBaseRepository;
use App\Models\BaseModel;
use App\Modules\Users\Model\Users;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\{Builder, Collection, Model};
use Throwable;


abstract class BaseRepository implements IBaseRepository
{
    protected Model $modelClass;

    /**
     * @param Model $modelClass
     */
    public function __construct(Model $modelClass)
    {
        $this->modelClass = $modelClass;
    }

    /**
     * @param array $data
     * @param array|string|null $with
     * @return LengthAwarePaginator
     * @throws Throwable
     */
    public function paginatedList($data = [], array|string $with = null): LengthAwarePaginator
    {
        $query = $this->query();

        if (method_exists($this->getModel(), 'scopeFilter'))
        {
            $query->filter($data);
        }

        if (! is_null($with))
        {
            $query->with($with);
        }

        return $query->paginate(PaginatorPerPageEnum::PER_PAGE);
    }

    /**
     * @return Builder|BaseModel
     * @throws Throwable
     */
    protected function query(): Builder|BaseModel
    {
        /** @var Model $class */
        $query = $this->getModel()->query();
        return $query->orderByDesc('id');
    }

    /**
     * @return Model
     * @throws Throwable
     */
    protected function getModel(): Model
    {
        return $this->modelClass;
    }

    /**
     * @param $data
     * @return BaseModel|BaseModel[]|Builder|Builder[]|Collection|Model|null
     * @throws Throwable
     */
    public function create($data): Model|array|Collection|Builder|BaseModel|null
    {
        $model = $this->getModel();
        $model->fill($data);
        $model->save();
        return $model;
    }

    /**
     * @param $data
     * @param $id
     * @return BaseModel|BaseModel[]|Builder|Builder[]|Collection|Model|null
     * @throws Throwable
     */
    public function update($data, $id): Model|array|Collection|Builder|BaseModel|null
    {
        $model = $this->findById($id);
        $model->fill($data);
        $model->save();
        return $model;
    }

    /**
     * @param $id
     * @return BaseModel|BaseModel[]|Builder|Builder[]|Collection|Model|null
     * @throws Throwable
     */
    public function findById($id): Model|array|Collection|Builder|BaseModel|null
    {
        return $this->getModel()::query()->findOrFail($id);
    }

    /**
     * @param $id
     * @return bool
     * @throws Throwable
     */
    public function delete($id): bool
    {
        $model = $this->findById($id);
        return $model->delete();
    }
}

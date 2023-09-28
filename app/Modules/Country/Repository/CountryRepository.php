<?php

namespace App\Modules\Country\Repository;

use App\Repositories\BaseRepository;
use App\Modules\Country\Model\Country;

class CountryRepository extends BaseRepository
{
    public function __construct(Country $model)
    {
        parent::__construct($model);
    }
}

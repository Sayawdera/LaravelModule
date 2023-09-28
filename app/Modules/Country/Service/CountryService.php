<?php

namespace App\Modules\Country\Service;

use App\Modules\Country\Repository\CountryRepository;
use App\Services\BaseService;

class CountryService extends BaseService
{
    public function __construct(CountryRepository $repository)
    {
        $this->repository = $repository;
    }
}

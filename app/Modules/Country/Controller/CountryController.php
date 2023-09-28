<?php

namespace App\Modules\Country\Controller;

use Throwable;
use App\Modules\Country\Model\Country;
use App\Modules\Country\Service\CountryService;
use Illuminate\Database\Eloquent\{Builder, Collection};
use App\Modules\Country\Request\{StoreCountryRequest, UpdateCountryRequest};
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

/**
 * Class Country
 * @package  App\Http\Controllers
 */
class CountryController extends Controller
{
    private CountryService $service;

    public function __construct(CountryService $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Get(
     *  path="/api/Countrys",
     *  operationId="indexCountry",
     *  tags={"Country"},
     *  summary="Get list of Country",
     *  description="Returns list of Country",
     *  @OA\Response(response=200, description="Successful operation",
     *    @OA\JsonContent(ref="#/components/schemas/Countrys"),
     *  ),
     * )
     *
     * Display a listing of CrudGenerator.
     * @return LengthAwarePaginator
     * @throws Throwable
     */
    public function index(Request $request): LengthAwarePaginator|Collection
    {
        return $this->service->paginatedList($request->all());
    }

    /**
     * @OA\Post(
     *  operationId="storeCountry",
     *  summary="Insert a new Country",
     *  description="Insert a new Country",
     *  tags={"Country"},
     *  path="/api/Country",
     *  @OA\RequestBody(
     *    description="Country to create",
     *    required=true,
     *    @OA\MediaType(
     *      mediaType="application/json",
     *      @OA\Schema(
     *      @OA\Property(
     *      title="data",
     *      property="data",
     *      type="object",
     *      ref="#/components/schemas/Countrys")
     *     )
     *    )
     *  ),
     *  @OA\Response(response="201",description="Country created",
     *     @OA\JsonContent(
     *      @OA\Property(
     *       title="data",
     *       property="data",
     *       type="object",
     *       ref="#/components/schemas/Countrys"
     *      ),
     *    ),
     *  ),
     *  @OA\Response(response=422,description="Validation exception"),
     * )
     *
     * @param UpdateCountryRequest $request
     * @return array|Builder|Collection|Country|Builder[]|Country[]
     * @throws Throwable
     */
    public function store(UpdateCountryRequest $request): array |Builder|Collection|Country
    {
        return $this->service->createModel($request->validated('data'));

    }

    /**
     * @OA\Get(
     *   path="/api/Country/{Country_id}",
     *   summary="Show a Country from his Id",
     *   description="Show a Country from his Id",
     *   operationId="showCountry",
     *   tags={"Country"},
     *   @OA\Parameter(ref="#/components/parameters/Country--id"),
     *   @OA\Response(
     *     response=200,
     *     description="Successful operation",
     *       @OA\JsonContent(
     *       @OA\Property(
     *       title="data",
     *       property="data",
     *       type="object",
     *       ref="#/components/schemas/Countrys"
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response="404",description="Country not found"),
     * )
     *
     * @param $countrys
     * @return array|Builder|Collection|Country
     * @throws Throwable
     */
    public function show($countrys): array |Builder|Collection|Country
    {
        return $this->service->getModelById($countrys);
    }

    /**
     * @OA\Patch(
     *   operationId="updateCountry",
     *   summary="Update an existing Country",
     *   description="Update an existing Country",
     *   tags={"Country"},
     *   path="/api/crudgenerators/{swaggername_id}",
     *   @OA\Parameter(ref="#/components/parameters/Country--id"),
     *   @OA\Response(
     *     response=200,
     *     description="Successful operation",
     *       @OA\JsonContent(
     *       @OA\Property(
     *       title="data",
     *       property="data",
     *       type="object",
     *       ref="#/components/schemas/Countrys"
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response="404",description="Country not found"),
     *   @OA\RequestBody(
     *     description="Country to update",
     *     required=true,
     *     @OA\MediaType(
     *       mediaType="application/json",
     *       @OA\Schema(
     *        @OA\Property(
     *        title="data",
     *        property="data",
     *        type="object",
     *        ref="#/components/schemas/Countrys")
     *      )
     *     )
     *   )
     *
     * )
     *
     * @param StoreCountryRequest $request
     * @param int $countrys
     * @return array|Builder|Builder[]|Collection|Country|Country[]
     * @throws Throwable
     */
    public function update(StoreCountryRequest $request, int $countrys): array |Country|Collection|Builder
    {
        return $this->service->updateModel($request->validated('data'), $countrys);

    }

    /**
     * @OA\Delete(
     *  path="/api/Country/{Country_id}",
     *  summary="Delete a Country",
     *  description="Delete a Country",
     *  operationId="Country",
     *  tags={"Country"},
     *   @OA\Response(
     *     response=200,
     *     description="Successful operation",
     *       @OA\JsonContent(
     *       @OA\Property(
     *       title="data",
     *       property="data",
     *       type="object",
     *       ref="#/components/schemas/Countrys"
     *       ),
     *     ),
     *   ),
     *  @OA\Parameter(ref="#/components/parameters/Country--id"),
     *  @OA\Response(response=204,description="No content"),
     *  @OA\Response(response=404,description="Country not found"),
     * )
     *
     * @param int $countrys
     * @return array|Builder|Builder[]|Collection|Country|Country[]
     * @throws Throwable
     */
    public function destroy(int $countrys): array |Builder|Collection|Country
    {
        return $this->service->deleteModel($countrys);
    }
}

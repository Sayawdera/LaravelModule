<?php

namespace App\Modules\User\Controller;

use App\Dtos\ApiResponse;
use Throwable;
use App\Modules\User\Model\{User, UserRoles};
use App\Modules\User\Service\UserService;
use Illuminate\Database\Eloquent\{Builder, Collection};
use App\Modules\User\Request\{StoreUserRequest, UpdateUserRequest};
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Http\Controllers\Controller;
use Illuminate\Http\{Request, JsonResponse};
use OpenApi\Annotations as OA;

/**
 * Class UserController
 * @package  App\Http\Controllers
 */
class UserController extends Controller
{
    private UserService $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }


    /**
     * @OA\Get(
     *  path="/api/Users",
     *  operationId="indexUsers",
     *  tags={"Userss"},
     *  summary="Get list of Users",
     *  description="Returns list of Users",
     *  @OA\Response(response=200, description="Successful operation",
     *    @OA\JsonContent(ref="#/components/schemas/Users"),
     *  ),
     * )
     *
     * Display a listing of Users.
     * @return LengthAwarePaginator
     * @throws Throwable
     */
    public function index(Request $request): LengthAwarePaginator|Collection
    {
        return $this->service->paginatedList($request->all());
    }

    /**
     * @OA\Post(
     *  operationId="storeUsers",
     *  summary="Insert a new Users",
     *  description="Insert a new Users",
     *  tags={"Userss"},
     *  path="/api/Users",
     *  @OA\RequestBody(
     *    description="Users to create",
     *    required=true,
     *    @OA\MediaType(
     *      mediaType="application/json",
     *      @OA\Schema(
     *      @OA\Property(
     *      title="data",
     *      property="data",
     *      type="object",
     *      ref="#/components/schemas/Users")
     *     )
     *    )
     *  ),
     *  @OA\Response(response="201",description="Users created",
     *     @OA\JsonContent(
     *      @OA\Property(
     *       title="data",
     *       property="data",
     *       type="object",
     *       ref="#/components/schemas/Users"
     *      ),
     *    ),
     *  ),
     *  @OA\Response(response=422,description="Validation exception"),
     * )
     *
     * @param StoreUserRequest $request
     * @return array|Builder|Collection|User|Builder[]|User[]
     * @throws Throwable
     */
    public function store(StoreUserRequest $request): array |Builder|Collection|User
    {
        return $this->service->createModel($request->validated('data'));

    }

    /**
     * @OA\Get(
     *   path="/api/Users/{users_id}",
     *   summary="Show a Users from his Id",
     *   description="Show a Users from his Id",
     *   operationId="showUsers",
     *   tags={"Userss"},
     *   @OA\Parameter(ref="#/components/parameters/Users--id"),
     *   @OA\Response(
     *     response=200,
     *     description="Successful operation",
     *       @OA\JsonContent(
     *       @OA\Property(
     *       title="data",
     *       property="data",
     *       type="object",
     *       ref="#/components/schemas/Users"
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response="404",description="Users not found"),
     * )
     *
     * @param $crudgeneratorId
     * @return array|Builder|Collection|User
     * @throws Throwable
     */
    public function show($crudgeneratorId): array |Builder|Collection|User
    {
        return $this->service->getModelById($crudgeneratorId);
    }

    /**
     * @OA\Patch(
     *   operationId="updateUsers",
     *   summary="Update an existing Users",
     *   description="Update an existing Users",
     *   tags={"Userss"},
     *   path="/api/Users/{users_id}",
     *   @OA\Parameter(ref="#/components/parameters/Users--id"),
     *   @OA\Response(
     *     response=200,
     *     description="Successful operation",
     *       @OA\JsonContent(
     *       @OA\Property(
     *       title="data",
     *       property="data",
     *       type="object",
     *       ref="#/components/schemas/Users"
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response="404",description="Users not found"),
     *   @OA\RequestBody(
     *     description="Users to update",
     *     required=true,
     *     @OA\MediaType(
     *       mediaType="application/json",
     *       @OA\Schema(
     *        @OA\Property(
     *        title="data",
     *        property="data",
     *        type="object",
     *        ref="#/components/schemas/Users")
     *      )
     *     )
     *   )
     *
     * )
     *
     * @param UpdateUserRequest $request
     * @param int $crudgeneratorId
     * @return array|Builder|Builder[]|Collection|User|User[]
     * @throws Throwable
     */
    public function update(UpdateUserRequest $request, int $crudgeneratorId): array |User|Collection|Builder
    {
        return $this->service->updateModel($request->validated('data'), $crudgeneratorId);

    }

    /**
     * @OA\Delete(
     *  path="/api/Users/{users_id}",
     *  summary="Delete a Users",
     *  description="Delete a Users",
     *  operationId="destroyUsers",
     *  tags={"Userss"},
     *   @OA\Response(
     *     response=200,
     *     description="Successful operation",
     *       @OA\JsonContent(
     *       @OA\Property(
     *       title="data",
     *       property="data",
     *       type="object",
     *       ref="#/components/schemas/Users"
     *       ),
     *     ),
     *   ),
     *  @OA\Parameter(ref="#/components/parameters/Users--id"),
     *  @OA\Response(response=204,description="No content"),
     *  @OA\Response(response=404,description="Users not found"),
     * )
     *
     * @param int $crudgeneratorId
     * @return array|Builder|Builder[]|Collection|User|User[]
     * @throws Throwable
     */
    public function destroy(int $crudgeneratorId): array |Builder|Collection|User|bool
    {
        return $this->service->deleteModel($crudgeneratorId);
    }


    /**
     * @OA\Get(
     *   path="/api/role",
     *   summary="Show a role list",
     *   description="Show a role list",
     *   operationId="showRole",
     *   tags={"Role"},
     *   @OA\Response(
     *     response=200,
     *     description="Successful operation",
     *       @OA\JsonContent(
     *     ),
     *   ),
     *   @OA\Response(response="404",description="User not found"),
     * )
     *
     * @return JsonResponse
     * @throws Throwable
     */
    public function roles(): JsonResponse
    {
        $role = new UserRoles();
        return ApiResponse::success($role->getRoleList());
    }
}

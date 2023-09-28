<?php

namespace App\Modules\Authentication\Controller;

use Throwable;
use App\Modules\Authentication\Service\AuthenticationService;
use App\Modules\Authentication\Request\{LoginRequest, RegisterRequest, ResetPasswordRequest};
use App\Http\Controllers\Controller;
use OpenApi\Annotations as OA;
use Illuminate\Http\{Request, JsonResponse};
use App\Dtos\ApiResponse;

/**
 * Class Authentication
 * @package  App\Http\Controllers
 */
class AuthenticationController extends Controller
{
    private AuthenticationService $service;

    public function __construct(AuthenticationService $service)
    {
        $this->service = $service;
    }


    /**
     * Login api
     *
     * @param LoginRequest $request
     * @return JsonResponse
     *
     * Store a newly created resource in storage.
     *
     * @OA\Post(
     *  operationId="login",
     *  summary="Insert a new User",
     *  description="Insert a new User",
     *  tags={"login"},
     *  path="login",
     *  security={
     *      {"bearer_token":{}},
     *  },
     *  @OA\Parameter(
     *    name="email",
     *    in="query",
     *    description="insert your email",
     *    required=true,
     *  ),
     *  @OA\Parameter(
     *    name="password",
     *    in="query",
     *    description="insert your password",
     *    required=true,
     *  ),
     *  @OA\Response(response="200",description="User created",
     *     @OA\JsonContent(
     *      @OA\Property(
     *       property="data",
     *       type="object",
     *      ),
     *    ),
     *  ),
     *  @OA\Response(response=422,description="Validation exception"),
     *  @OA\Response(response="401",description="Unauthorized"),
     * )
     * @throws Throwable
     */
    public function login(LoginRequest $request): JsonResponse
    {
        return $this->service->login($request->validated('data'));
    }



    /**
     * Login api
     *
     * @param RegisterRequest $request
     * @return JsonResponse
     *
     * Store a newly created resource in storage.
     *
     * @OA\Post(
     *  operationId="register",
     *  summary="Insert a new User",
     *  description="Insert a new User",
     *  tags={"login"},
     *  path="register",
     *  security={
     *      {"bearer_token":{}},
     *  },
     *  @OA\Parameter(
     *    name="email",
     *    in="query",
     *    description="insert your email",
     *    required=true,
     *  ),
     *  @OA\Parameter(
     *    name="password",
     *    in="query",
     *    description="insert your password",
     *    required=true,
     *  ),
     *  @OA\Response(response="200",description="User created",
     *     @OA\JsonContent(
     *      @OA\Property(
     *       property="data",
     *       type="object",
     *      ),
     *    ),
     *  ),
     *  @OA\Response(response=422,description="Validation exception"),
     *  @OA\Response(response="401",description="Unauthorized"),
     * )
     * @throws Throwable
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        return $this->service->register($request->validated('data'));
    }

    /**
     * Login api
     *
     * @param ResetPasswordRequest $request
     * @return JsonResponse
     *
     * Store a newly created resource in storage.
     *
     * @OA\Post(
     *  operationId="resetPassword",
     *  summary="resetPassword",
     *  description="resetPassword",
     *  tags={"login"},
     *  path="reset-password",
     *  security={
     *      {"bearer_token":{}},
     *  },
     *  @OA\Parameter(
     *    name="email",
     *    in="query",
     *    description="insert your email",
     *    required=true,
     *  ),
     *  @OA\Parameter(
     *    name="code",
     *    in="query",
     *    description="insert your code",
     *    required=true,
     *  ),
     *  @OA\Response(response="200",description="User created",
     *     @OA\JsonContent(
     *      @OA\Property(
     *       property="data",
     *       type="object",
     *      ),
     *    ),
     *  ),
     *  @OA\Response(response=422,description="Validation exception"),
     *  @OA\Response(response="401",description="Unauthorized"),
     * )
     * @throws Throwable
     */
    public function resetPassword(ResetPasswordRequest $request): JsonResponse
    {
        return $this->service->resetPassword($request->validated('data'));
    }

    /**
     * @OA\Get(
     *  path="logout",
     *  operationId="logout",
     *  tags={"login"},
     *  summary="logout ",
     *  description="account logout",
     *  security={
     *      {"sanctum":{}},
     *  },
     *  @OA\Response(response="200",description="User created",
     *     @OA\JsonContent(
     *      @OA\Property(
     *       property="data",
     *       type="object",
     *      ),
     *    ),
     *  ),
     *  @OA\Response(response="401",description="Unauthorized"),
     * )
     * Display a listing of the resource.
     *
     * @throws Throwable
     */
    public function logout(): JsonResponse
    {
        return ApiResponse::success($this->service->logout());
    }


    /**
     * @OA\Get(
     *  path="check-user-token",
     *  operationId="checkUserToken",
     *  tags={"login"},
     *  summary="account",
     *  description="user account description",
     *  security={
     *      {"sanctum":{}},
     *  },
     *  @OA\Response(response="200",description="User created",
     *     @OA\JsonContent(
     *      @OA\Property(
     *       property="data",
     *       type="object",
     *      ),
     *    ),
     *  ),
     *  @OA\Response(response="401",description="Unauthorized"),
     * )
     * Display a listing of the resource.
     *
     */
    public function checkUserToken(): JsonResponse
    {
        $success = Auth()->user();
        return ApiResponse::success($success);
    }
    /**
     * @OA\Get(
     *  path="update-yourself",
     *  operationId="updateYourself",
     *  tags={"login"},
     *  summary="updateYourself",
     *  description="user updateYourself description",
     *  security={
     *      {"sanctum":{}},
     *  },
     *  @OA\Response(response="200",description="User created",
     *     @OA\JsonContent(
     *      @OA\Property(
     *       property="data",
     *       type="object",
     *      ),
     *    ),
     *  ),
     *  @OA\Response(response="401",description="Unauthorized"),
     * )
     * Display a listing of the resource.
     *
     */
    public function updateYourself(Request $request)
    {
        auth()->user()->update($request->all());

        return ApiResponse::success(auth()->user());
    }
}

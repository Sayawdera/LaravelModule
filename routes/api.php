<?php

use App\Modules\Authentication\Controller\AuthenticationController;
use App\Modules\Country\Controller\CountryController;
use App\Modules\EmailVerificationCode\Controller\EmailVerificationCodeController;
use App\Modules\User\Controller\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::middleware(['json.response', 'guest'])->prefix('/authentication')->group( function ()
{
    Route::post('/login', [AuthenticationController::class, 'login']);
    Route::post('/register', [AuthenticationController::class, 'register']);
    Route::post('/reset-password', [AuthenticationController::class, 'resetPassword']);
    Route::post('/check-user-token', [AuthenticationController::class, 'checkUserToken']);
    Route::post('/update-your-self', [AuthenticationController::class, 'updateYourself']);

    Route::post('/email-verification', [EmailVerificationCodeController::class, 'sendEmailVerification']);
    Route::post('/check-email-verification', [EmailVerificationCodeController::class, 'checkEmailVerification']);
});

Route::apiResource('/application/users', UserController::class);


Route::middleware(['json.response', 'auth:api', 'auth.permission'])->prefix('/application')->group( function ()
{
    Route::post('/logout', [AuthenticationController::class, 'logout']);
    Route::apiResource('/countries', CountryController::class);
});

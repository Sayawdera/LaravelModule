<?php

namespace App\Modules\EmailVerificationCode\Service;

use App\Modules\EmailVerificationCode\Repository\EmailVerificationCodeRepository;
use App\Services\BaseService;
use Illuminate\Http\JsonResponse;
use Throwable;
use App\Dtos\ApiResponse;
use App\Mail\VerificationMail;
use Illuminate\Support\Facades\{Hash, Mail};
use Illuminate\Database\Eloquent\{Model, Builder, Collection};
use Symfony\Component\HttpFoundation\Response;

class EmailVerificationCodeService extends BaseService
{
    public function __construct(EmailVerificationCodeRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * @param $data
     * @return Model|Model[]|Builder|Builder[]|Collection|null
     * @throws Throwable
     */
    public function createModel($data): array |Collection|Builder|Model|null
    {
        $randomCode = random_int(100000, 999999);
        $mailMessage = [
            'to' => $data['email'],
            'subject' => 'Email Verification Code',
            'code' => $randomCode,
        ];

        $isSending = Mail::send(new VerificationMail($mailMessage));

        if ($isSending)
        {
            $data = [
                'email' => $data['email'],
                'code' => bcrypt($randomCode),
            ];
        }
        return $this->repository->create($data);
    }


    /**
     * checkEmailVerificationCode
     *
     * @param  mixed $data
     * @return JsonResponse
     */
    public function checkVerificationCode($data): JsonResponse
    {
        $model = $this->repository->findByEmail($data['email']);
        if ($model and Hash::check($data['code'], $model->code))
        {
            return ApiResponse::success([
                'email' => $data['email']
            ]);
        } else {
            return ApiResponse::error("The provided code  is incorrect.", Response::HTTP_UNAUTHORIZED);
        }

    }
}

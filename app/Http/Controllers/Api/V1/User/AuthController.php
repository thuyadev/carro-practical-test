<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserLoginFormRequest;
use App\Http\Requests\User\UserRegisterFormRequest;
use App\Http\Resources\User\AuthUserResource;
use App\Services\User\UserAuthService;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    use ResponseTrait;

    private $userAuthService;

    public function __construct(UserAuthService $userAuthService)
    {
        $this->userAuthService = $userAuthService;
    }

    public function login(UserLoginFormRequest $request): JsonResponse
    {
        $user = $this->userAuthService->login($request);

        return $this->responseUser(new AuthUserResource($user), $user->createToken('User-Token')->plainTextToken, 'success');
    }

    public function register(UserRegisterFormRequest $request): JsonResponse
    {
        $user = $this->userAuthService->create($request);

        return $this->responseUser(new AuthUserResource($user), $user->createToken('User-Token')->plainTextToken, 'success', true);
    }

    public function logout(): JsonResponse
    {
        $this->userAuthService->logout();

        return $this->responseMsgOnly('logout successfully');
    }
}

<?php

namespace App\Services\User;

use App\Exceptions\CustomException;
use App\Models\User;
use App\Repositories\User\UserAuthRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserAuthService
{
    private UserAuthRepositoryInterface $userAuthRepository;

    public function __construct(UserAuthRepositoryInterface $userAuthRepository)
    {
        $this->userAuthRepository = $userAuthRepository;
    }

    public function login($request): User
    {
        $validated_data = $request->validated();

        $user = $this->userAuthRepository->findByEmail($validated_data['email']);

        if (!Hash::check($validated_data['password'], $user['password']))
        {
            throw new CustomException('Invalid credentials', 404);
        }

        return $user;
    }

    public function create($request): User
    {
        try {
            $validated_data = $request->validated();

            $change_to_user = $this->toUserObj($validated_data);

            DB::beginTransaction();

            $user = $this->userAuthRepository->create($change_to_user);

            DB::commit();
        } catch (\Exception $exception)
        {
            DB::rollBack();

            throw new CustomException($exception->getMessage(), $exception->getCode());
        }

        return $user;
    }

    public function logout(): void
    {
        auth()->user()->currentAccessToken()->delete();
    }

    private function toUserObj($validated_data): User
    {
        $user = new User($validated_data);
        $user['password'] = Hash::make($user['password']);

        return $user;
    }
}

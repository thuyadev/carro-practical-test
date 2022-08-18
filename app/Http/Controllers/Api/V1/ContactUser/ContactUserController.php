<?php

namespace App\Http\Controllers\Api\V1\ContactUser;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactUser\ContactUserFormRequest;
use App\Http\Resources\ContactForm\ContactFormResource;
use App\Http\Resources\ContactUser\ContactUserResource;
use App\Services\ContactUser\ContactUserService;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class ContactUserController extends Controller
{
    use ResponseTrait;

    private $contactUserService;

    public function __construct(ContactUserService $contactUserService)
    {
        $this->contactUserService = $contactUserService;
    }

    public function store(ContactUserFormRequest $request): JsonResponse
    {
        $this->contactUserService->create($request);

        return $this->responseMsgOnly('Mail has been sent to user');
    }
}

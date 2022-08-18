<?php

namespace App\Http\Controllers\Api\V1\ContactForm;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactForm\ContactFormRequest;
use App\Http\Resources\ContactForm\ContactFormResource;
use App\Models\ContactForm;
use App\Services\ContactForm\ContactFormService;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class ContactFormController extends Controller
{
    use ResponseTrait;

    private ContactFormService $contactFormService;

    public function __construct(ContactFormService $contactFormService)
    {
        $this->contactFormService = $contactFormService;
    }

    public function index(): JsonResponse
    {
        $contact_forms = $this->contactFormService->getContactForms();

        return $this->responseSuccessWithPaginate('success', ContactFormResource::collection($contact_forms));
    }

    public function store(ContactFormRequest $request): JsonResponse
    {
        $contact_form = $this->contactFormService->create($request);

        return $this->responseCreated(new ContactFormResource($contact_form));
    }

    public function update(ContactFormRequest $request, ContactForm $contact_form): JsonResponse
    {
        $contact_form = $this->contactFormService->update($request, $contact_form);

        return $this->responseSuccess('success', new ContactFormResource($contact_form));
    }

    public function destroy(ContactForm $contact_form): JsonResponse
    {
        $this->contactFormService->delete($contact_form);

        return $this->responseMsgOnly('successfully deleted!');
    }
}

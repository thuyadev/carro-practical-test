<?php

namespace App\Services\ContactUser;

use App\Exceptions\CustomException;
use App\Mail\ContactUserMail;
use App\Models\ContactUser;
use App\Repositories\ContactUser\ContactUserRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ContactUserService
{
    private ContactUserRepositoryInterface $contactUserRepository;

    public function __construct(ContactUserRepositoryInterface $contactUserRepository)
    {
        $this->contactUserRepository = $contactUserRepository;
    }

    public function create($request): ContactUser
    {
        try {
            $data = $request->validated();

            DB::beginTransaction();

            $to_contact_user = new ContactUser($data);

            $contact_user = $this->contactUserRepository->create($to_contact_user);

            $this->send($contact_user);

            DB::commit();

        } catch (\Exception $exception)
        {
            DB::rollBack();

            throw new CustomException($exception->getMessage(), $exception->getCode());
        }

        return $contact_user;
    }

    public function send(ContactUser $contactUser): void
    {
        Mail::to(env('MAIL_RECEIVER'))->send(new ContactUserMail($contactUser));
    }
}

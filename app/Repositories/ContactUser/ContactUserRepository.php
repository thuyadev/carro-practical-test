<?php

namespace App\Repositories\ContactUser;

use App\Models\ContactUser;

class ContactUserRepository implements ContactUserRepositoryInterface
{
    public function create(ContactUser $contactUser): ContactUser
    {
        $contactUser->save();

        return $contactUser;
    }
}

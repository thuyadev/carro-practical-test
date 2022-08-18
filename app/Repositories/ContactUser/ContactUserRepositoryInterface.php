<?php

namespace App\Repositories\ContactUser;

use App\Models\ContactUser;

interface ContactUserRepositoryInterface
{
    public function create(ContactUser $contactUser): ContactUser;
}

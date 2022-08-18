<?php

namespace App\Repositories\ContactForm;

use App\Models\ContactForm;
use Illuminate\Pagination\LengthAwarePaginator;

class ContactFormRepository implements ContactFormRepositoryInterface
{

    public function getAll(): LengthAwarePaginator
    {
        return ContactForm::latest()->paginate(10);
    }

    public function save(ContactForm $contactForm): ContactForm
    {
        $contactForm->save();

        return $contactForm;
    }

    public function update(ContactForm $contactForm): ContactForm
    {
        $contactForm->save();

        return $contactForm;
    }

    public function delete(ContactForm $contactForm): string
    {
        $contactForm->delete();

        return 'success';
    }
}

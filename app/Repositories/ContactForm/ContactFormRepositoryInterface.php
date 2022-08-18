<?php

namespace App\Repositories\ContactForm;
use App\Models\ContactForm;
use Illuminate\Pagination\LengthAwarePaginator;

interface ContactFormRepositoryInterface
{
    public function getAll(): LengthAwarePaginator;

    public function save(ContactForm $contactForm): ContactForm;

    public function update(ContactForm $contactForm): ContactForm;

    public function delete(ContactForm $contactForm): string;
}

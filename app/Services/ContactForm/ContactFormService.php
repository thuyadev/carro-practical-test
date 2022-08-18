<?php

namespace App\Services\ContactForm;

use App\Exceptions\CustomException;
use App\Models\ContactForm;
use App\Repositories\ContactForm\ContactFormRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class ContactFormService
{
    private $contactFormRepository;

    public function __construct(ContactFormRepositoryInterface $contactFormRepository)
    {
        $this->contactFormRepository = $contactFormRepository;
    }

    public function getContactForms(): LengthAwarePaginator
    {
        return $this->contactFormRepository->getAll();
    }

    public function create($request): ContactForm
    {
        try {
            $validated_data = $request->validated();

            DB::beginTransaction();

            $validated_data['input_values'] = json_encode($this->inputValues($validated_data['input_values']));

            $to_contact_form = new ContactForm($validated_data);

            $contact_form = $this->contactFormRepository->save($to_contact_form);

            DB::commit();

        } catch (\Exception $exception)
        {
            DB::rollBack();

            throw new CustomException($exception->getMessage(), $exception->getCode());
        }

        return $contact_form;
    }

    public function update($request, ContactForm $contactForm): ContactForm
    {
        try {
            $validated_data = $request->validated();

            DB::beginTransaction();

            $contactForm['name'] = $validated_data['name'];
            $contactForm['input_values'] = json_encode($this->inputValues($validated_data['input_values']));

            $contact_form = $this->contactFormRepository->update($contactForm);

            DB::commit();

        } catch (\Exception $exception)
        {
            DB::rollBack();

            throw new CustomException($exception->getMessage(), $exception->getCode());
        }

        return $contact_form;
    }

    public function delete(ContactForm $contactForm): string
    {
        return $this->contactFormRepository->delete($contactForm);
    }

    private function inputValues(array $input_values): array
    {
        $datas = [];

        foreach ($input_values as $value)
        {
            $obj = (object) [];
            $obj->type = $value == 'gender' ? 'radio' : ($value == 'description' ? 'textarea' : ($value == 'email' ? 'email' : ($value == 'date_of_birth' ? 'date' : 'text')));
            $obj->field_name = $value;

            array_push($datas, $obj);
        }

        return $datas;
    }
}

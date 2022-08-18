<?php

namespace App\Http\Requests\ContactUser;

use Illuminate\Foundation\Http\FormRequest;

class ContactUserFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => 'sometimes|required',
            'email' => 'sometimes|required|email',
            'phone' => 'sometimes|required|numeric',
            'gender' => 'sometimes|required',
            'date_of_birth' => 'sometimes|required',
            'description' => 'sometimes|required',
            'contact_form_id' => 'required',
        ];
    }
}

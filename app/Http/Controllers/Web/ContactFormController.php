<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactForm\ContactFormRequest;
use App\Models\ContactForm;
use App\Services\ContactForm\ContactFormService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactFormController extends Controller
{
    private ContactFormService $contactFormService;

    public function __construct(ContactFormService $contactFormService)
    {
        $this->contactFormService = $contactFormService;
    }

    public function index()
    {
        $contact_forms = $this->contactFormService->getContactForms();

        return view('dashboard', compact('contact_forms'));
    }

    public function create(): View
    {
        return view('contact_forms.create');
    }

    public function store(ContactFormRequest $request): RedirectResponse
    {
        $this->contactFormService->create($request);

        return redirect('dashboard');
    }

    public function edit(ContactForm $contact_form): View
    {
        $form_values = json_decode($contact_form['input_values'], true);

        $input_values = collect($form_values)->pluck('field_name')->toArray();

        return view('contact_forms.edit', compact('contact_form', 'input_values'));
    }

    public function update(ContactFormRequest $request, ContactForm $contact_form): RedirectResponse
    {
        $this->contactFormService->update($request, $contact_form);

        return redirect('dashboard');
    }

    public function destroy(ContactForm $contact_form): RedirectResponse
    {
        $this->contactFormService->delete($contact_form);

        return redirect('dashboard');
    }
}

<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactUser\ContactUserFormRequest;
use App\Models\ContactForm;
use App\Services\ContactUser\ContactUserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactUserController extends Controller
{
    private $contactUserService;

    public function __construct(ContactUserService $contactUserService)
    {
        $this->contactUserService = $contactUserService;
    }

    public function create(ContactForm $contact_form): View
    {
        return view('contact_users.create', compact('contact_form'));
    }

    public function store(ContactUserFormRequest $request): RedirectResponse
    {
        $this->contactUserService->create($request);

        return redirect('dashboard')->with('success', 'Mail has been sent to the user');
    }
}

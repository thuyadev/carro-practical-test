<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Practical Test
        </h2>
    </x-slot>

    @if(session()->has('success'))
        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
            <span class="font-medium">Success!</span> {{ session('success') }}
        </div>
    @endif

    <div class="py-12">
        <div class="flex justify-between max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
            <h1>Contact Form List</h1>
            <x-custom-button-component href="{{ route('contact-forms.create') }}" isLink="true">Create</x-custom-button-component>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        Name
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Values
                                    </th>
                                    <th scope="col" class="py-3 px-6"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($contact_forms as $contact_form)
                                    <tr class="bg-white border-b hover:bg-gray-50">
                                        <th scope="row" class="py-4 px-6 font-medium">
                                            <a href="{{ route('contact-users.create', $contact_form['id']) }}">{{ $contact_form['name'] }}</a>
                                        </th>
                                        <td class="py-4 px-6">
                                            {{ $contact_form['input_values'] }}
                                        </td>
                                        <td class="py-4 px-6 text-right flex">
                                            <a href="{{ route('contact-forms.edit', $contact_form['id']) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-2">Edit</a>

                                            <form method="POST" action="{{ route('contact-forms.destroy', $contact_form['id']) }}">
                                                @csrf
                                                @method('DELETE')

                                                <a href="{{ route('contact-forms.destroy', $contact_form['id']) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" :href="route('logout')"
                                                   onclick="event.preventDefault();
                                                    this.closest('form').submit();"
                                                >
                                                    DELETE
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="bg-white border-b hover:bg-gray-50">
                                        <td class="py-4 px-6" colspan="3">
                                            No Items Found!
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

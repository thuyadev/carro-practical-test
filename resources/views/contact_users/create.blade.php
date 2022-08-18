<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Contact User
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('contact-users.store') }}" method="POST">
                @csrf

                <input type="hidden" name="contact_form_id" value="{{ $contact_form['id'] }}">

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                    <div class="p-6 bg-white border-b border-gray-200">
                        @foreach($contact_form['decoded_input_values'] as $value)
                            @if($value['type'] == 'text' || $value['type'] == 'email' || $value['type'] == 'date' || $value['type'] == 'number')
                                <div class="mb-6">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 uppercase">{{ $value['field_name'] }}</label>
                                    <input type="{{ $value['type'] }}" id="{{ $value['field_name'] }}" name="{{ $value['field_name'] }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                    <p class="mt-2 text-sm text-red-600 @error($value['field_name'])!visible @enderror">
                                        @error($value['field_name'])
                                            {{ $message }}
                                        @enderror
                                    </p>
                                </div>
                            @endif

                            @if($value['type'] == 'radio')
                                <div class="mb-6">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 uppercase">{{ $value['field_name'] }}</label>
                                    <div class="flex items-center mr-4">
                                        <input id="male" type="{{ $value['type'] }}" value="male" name="{{ $value['field_name'] }}" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 focus:ring-green-500 focus:ring-2">
                                        <label for="male" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Male</label>
                                    </div>
                                    <div class="flex items-center mr-4">
                                        <input id="female" type="{{ $value['type'] }}" value="female" name="{{ $value['field_name'] }}" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 focus:ring-green-500 focus:ring-2">
                                        <label for="female" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Female</label>
                                    </div>
                                    <p class="mt-2 text-sm text-red-600 @error($value['field_name'])!visible @enderror">
                                        @error($value['field_name'])
                                            {{ $message }}
                                        @enderror
                                    </p>
                                </div>
                            @endif

                            @if($value['type'] == 'textarea')
                                <div class="mb-6">
                                    <label for="{{ $value['field_name'] }}" class="block mb-2 text-sm font-medium text-gray-900 uppercase">{{ $value['field_name'] }}</label>
                                    <textarea id="{{ $value['field_name'] }}" name="{{ $value['field_name'] }}" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
                                    <p class="mt-2 text-sm text-red-600 @error($value['field_name'])!visible @enderror">
                                        @error($value['field_name'])
                                            {{ $message }}
                                        @enderror
                                    </p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="flex">
                    <x-custom-button-component isLink="false" class="mt-2 mr-2">Send</x-custom-button-component>
                    <x-custom-button-component isLink="true" class="mt-2 mr-2 bg-transparent border text-black hover:text-gray-100" href="{{ route('dashboard') }}">Cancel</x-custom-button-component>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>

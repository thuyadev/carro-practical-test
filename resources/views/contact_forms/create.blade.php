<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Contact Form Create
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('contact-forms.store') }}" method="POST">
                @csrf

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="mb-6">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Form Name</label>
                            <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <p class="mt-2 text-sm text-red-600 @error('name')!visible @enderror">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                        <div class="mb-6">
                            <label for="input_values" class="block mb-2 text-sm font-medium text-gray-900">Input Fields</label>
                            <div class="flex">
                                <div class="flex items-center mr-4">
                                    <input id="input_values-name" type="checkbox" name="input_values[]" value="name" class="w-4 h-4 text-green-600 bg-gray-100 rounded border-gray-300 focus:ring-green-500 focus:ring-2">
                                    <label for="input_values-name" class="ml-2 text-sm font-medium text-gray-900">Name</label>
                                </div>
                                <div class="flex items-center mr-4">
                                    <input id="input_values-email" type="checkbox" name="input_values[]" value="email" class="w-4 h-4 text-green-600 bg-gray-100 rounded border-gray-300 focus:ring-green-500 focus:ring-2">
                                    <label for="input_values-email" class="ml-2 text-sm font-medium text-gray-900">Email</label>
                                </div>
                                <div class="flex items-center mr-4">
                                    <input id="input_values-phone" type="checkbox" name="input_values[]" value="phone" class="w-4 h-4 text-green-600 bg-gray-100 rounded border-gray-300 focus:ring-green-500 focus:ring-2">
                                    <label for="input_values-phone" class="ml-2 text-sm font-medium text-gray-900">Phone</label>
                                </div>
                                <div class="flex items-center mr-4">
                                    <input id="input_values-gender" type="checkbox" name="input_values[]" value="gender" class="w-4 h-4 text-green-600 bg-gray-100 rounded border-gray-300 focus:ring-green-500 focus:ring-2">
                                    <label for="input_values-gender" class="ml-2 text-sm font-medium text-gray-900">Gender</label>
                                </div>
                                <div class="flex items-center mr-4">
                                    <input id="input_values-dob" type="checkbox" name="input_values[]" value="date_of_birth" class="w-4 h-4 text-green-600 bg-gray-100 rounded border-gray-300 focus:ring-green-500 focus:ring-2">
                                    <label for="input_values-dob" class="ml-2 text-sm font-medium text-gray-900">Date of Birth</label>
                                </div>
                                <div class="flex items-center mr-4">
                                    <input id="input_values-desc" type="checkbox" name="input_values[]" value="description" class="w-4 h-4 text-green-600 bg-gray-100 rounded border-gray-300 focus:ring-green-500 focus:ring-2">
                                    <label for="input_values-desc" class="ml-2 text-sm font-medium text-gray-900">Description</label>
                                </div>
                            </div>
                            <p class="mt-2 text-sm text-red-600 @error('input_values')!visible @enderror">
                                @error('input_values')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                    </div>
                </div>

                <div class="flex">
                    <x-custom-button-component isLink="false" class="mt-3 mr-2">Create</x-custom-button-component>
                    <x-custom-button-component isLink="true" class="mt-3 mr-2 bg-transparent border text-black hover:text-gray-100" href="{{ route('dashboard') }}">Cancel</x-custom-button-component>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>

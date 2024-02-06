<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit customer
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
                        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">
                            Customer information
                        </h2>
                        <form action={{ route('customers.update') }} method="POST">
                            @csrf

                            <input type="hidden" name="id" value="{{ $customer->id }}">

                            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                <div class="sm:col-span-2">
                                    <label for="email"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Email
                                    </label>
                                    <input type="email" name="email" id="email" value="{{ $customer->email }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Email van de klant" required>

                                    @error('email')
                                        <div class="text-red-500 mt-2 text-sm">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="w-full">
                                    <label for="voornaam"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Voornaam
                                    </label>
                                    <input type="text" name="first_name" id="voornaam"
                                        value="{{ $customer->first_name }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Jan" required>

                                    @error('voornaam')
                                        <div class="text-red-500 mt-2 text-sm">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="w-full">
                                    <label for="achternaam"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Achternaam
                                    </label>
                                    <input type="text" name="last_name" id="achternaam"
                                        value="{{ $customer->last_name }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Janssen" required>

                                    @error('achternaam')
                                        <div class="text-red-500 mt-2 text-sm">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="land"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Land</label>
                                    <select id="land" name="country"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option value="Nederland">Nederland</option>
                                        <option value="België">België</option>
                                        <option value="Duitsland">Duitsland</option>
                                        <option value="Verenigd Koninkrijk">
                                            Verenigd Koninkrijk
                                        </option>
                                        <option value="India">India</option>
                                    </select>

                                    @error('land')
                                        <div class="text-red-500 mt-2 text-sm">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="telefoonnummer"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Telefoonnummer
                                    </label>

                                    <input type="text" name="phone_number" id="telefoonnummer"
                                        value="{{ $customer->phone_number }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="0612345678" required>

                                    @error('telefoonnummer')
                                        <div class="text-red-500 mt-2 text-sm">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-span-2 grid grid-cols-3 gap-4 sm:gap-6">
                                    <div>
                                        <label for="straatnaam"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Straatnaam
                                        </label>
                                        <input type="text" name="street_name" id="straatnaam"
                                            value="{{ $customer->street_name }}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            required>

                                        @error('straatnaam')
                                            <div class="text-red-500 mt-2 text-sm">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="huisnummer"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Huisnummer
                                        </label>
                                        <input type="text" name="house_number" id="huisnummer"
                                            value="{{ $customer->house_number }}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            required>

                                        @error('huisnummer')
                                            <div class="text-red-500 mt-2 text-sm">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="postcode"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Postcode
                                        </label>
                                        <input type="text" name="postcode" id="postcode"
                                            value="{{ $customer->postcode }}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            required>

                                        @error('postcode')
                                            <div class="text-red-500 mt-2 text-sm">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="border-t w-full col-span-2 border-gray-600"></div>


                                <div class="w-full">
                                    <label for="bedrijfsnaam"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Bedrijfsnaam
                                    </label>
                                    <input type="text" name="company_name" id="bedrijfsnaam"
                                        value="{{ $customer->company_name }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Gold snack NV" required>

                                    @error('bedrijfsnaam')
                                        <div class="text-red-500 mt-2 text-sm">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="w-full">
                                    <label for="btw_nummer"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        BTW-nummer
                                    </label>
                                    <input type="text" name="vat_number" id="btw_nummer"
                                        value="{{ $customer->vat_number }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="000" required>

                                    @error('btw_nummer')
                                        <div class="text-red-500 mt-2 text-sm">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="iban"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        IBAN
                                    </label>
                                    <input type="text" name="iban" id="iban" rows="3"
                                        value="{{ $customer->iban }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="BE" required></input>

                                    @error('iban')
                                        <div class="text-red-500 mt-2 text-sm">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit"
                                class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                Update customer @svg('heroicon-o-arrow-right', 'w-4 h-4 ml-2')
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
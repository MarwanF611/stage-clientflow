<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Nieuw factuur aanmaken
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
                        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">
                            Algemene informatie
                        </h2>
                        <form action={{ route('customers.store') }} method="POST">
                            @csrf
                            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                <div class="sm:col-span-2">
                                    <label for="customer"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Customer
                                    </label>
                                    <input type="text" name="customer" id="customer"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Customer ID" required>

                                    @error('customer')
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
                                    <label for="product_id"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Product ID
                                    </label>
                                    <input type="text" name="product_id" id="product_id"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="XXXXX" required>

                                    @error('product_id')
                                        <div class="text-red-500 mt-2 text-sm">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="w-full ">
                                    <label for="product_aantal"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Aantal
                                    </label>
                                    <input type="text" name="product_aantal" id="product_aantal"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="000" required>
                                    @error('product_aantal')
                                        <div class="text-red-500 mt-2 text-sm">
                                            {{ $message }}
                                        </div>
                                    @enderror


                                </div>
                                <div id="products-parent" class="w-full col-span-2 grid grid-cols-2 gap-6">
                                </div>
                            </div>

                            <div class="flex flex-col">
                                <button type="button" onclick="addProduct()"
                                    class="inline-flex items-center px-5 w-fit py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-gray-600 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-gray-500">
                                    Product toevoegen @svg('heroicon-o-plus', 'w-4 h-4 ml-2')
                                </button>

                                <button type="submit"
                                    class="inline-flex w-fit items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                    Maak factuur @svg('heroicon-o-arrow-right', 'w-4 h-4 ml-2')
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<script>
    let productCount = 0;

    function addProduct() {
        productCount++;
        document.getElementById("products-parent").innerHTML += `
        
        <div>
                                        <label for="product_id_${productCount}"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Product ID
                                        </label>
                                        <input type="text" name="product_id" id="product_id"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="XXXX" required>

                                        @error('product_id')
                                            <div class="text-red-500 mt-2 text-sm">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="product_aantal"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Aantal
                                        </label>
                                        <input type="text" name="product_aantal" id="product_aantal"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="000" required>

                                        @error('product_aantal')
                                            <div class="text-red-500 mt-2 text-sm">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        
                                    </div>
        
        `;

        console.log("test");
    }
</script>

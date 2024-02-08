<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Make new quote
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
                        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">
                            Quote information
                        </h2>
                        <form action={{ route('quotes.store') }} method="POST">
                            @csrf
                            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                <div class="sm:col-span-2">
                                    <label for="customer"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Customer <span class="text-sm text-red-500">*</span>
                                    </label>
                                    <select name="customer" id="customer"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->id }}">
                                                {{ $customer->first_name }}
                                                {{ $customer->last_name }}
                                                ({{ $customer->company_name }})
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('customer')
                                        <div class="text-red-500 mt-2 text-sm">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="border-t w-full col-span-2 border-gray-600"></div>
                                <div class="col-span-2">
                                    <label for="product_id_0"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Product name <span class="text-sm text-red-500">*</span>
                                    </label>
                                    <select name="product_id_0" id="product_id_0"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">
                                                {{ $product->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('product_id_0')
                                        <div class="text-red-500 mt-2 text-sm">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <div class="w-full">
                                        <label for="product_amount_0"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Amount <span class="text-sm text-red-500">*</span>
                                        </label>
                                        <input type="text" name="product_amount_0" id="product_amount_0"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="000" required>

                                        @error('product_aantal')
                                            <div class="text-red-500 mt-2 text-sm">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div id="products-parent" class="w-full col-span-2">
                                    </div>
                                </div>
                                <div id="products-parent" class="w-full col-span-2">
                                </div>
                            </div>

                            <div class="flex flex-col">
                                <button type="button" onclick="addProduct()"
                                    class="inline-flex items-center px-5 w-fit py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-gray-600 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-gray-500">
                                    Add product @svg('heroicon-o-plus', 'w-4 h-4 ml-2')
                                </button>

                                <button type="submit"
                                    class="inline-flex w-fit items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                    Create quote @svg('heroicon-o-arrow-right', 'w-4 h-4 ml-2')
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
            <div id="p_id_${productCount}" class="w-full col-span-2">
                <div class="w-full">
                    <label for="product_id_${productCount}"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Product ID
                    </label>
                    <select name="product_id_${productCount}" id="product_id_${productCount}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">
                                {{ $product->name }}
                            </option>
                        @endforeach
                    </select>

                    @error('product_id_${productCount}')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="w-full">
                    <label for="product_amount_${productCount}"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Amount
                    </label>
                    <input type="text" name="product_amount_${productCount}" id="product_amount_${productCount}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="000" required>

                    @error('product_amount_${productCount}')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="button" onclick="removeProduct(${productCount})"
                    class="inline-flex items-center px-5 w-fit py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-red-600 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg
                    -red-500">
                    @svg('heroicon-s-trash', 'h-5 w-5')
                </button>
            </div>

        `;
    }

    function removeProduct(id) {
        document.getElementById('p_id_' + id).remove();
    }
</script>

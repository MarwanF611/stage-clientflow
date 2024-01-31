<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit ivoice
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
                        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">
                            Invoice information
                        </h2>
                        <form action={{ route('invoices.update') }} method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $invoice->id }}">
                            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                <div class="sm:col-span-2">
                                    <label for="customer"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Customer
                                    </label>
                                    <input type="text" name="customer" id="customer"
                                        value="{{ $invoice->customer->id }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Customer ID" required>

                                    @error('customer')
                                        <div class="text-red-500 mt-2 text-sm">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div>
                                    <label for="payment_method"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Payment
                                        method</label>
                                    <select id="payment_method" name="payment_method"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option value="cash">Cash</option>
                                        <option value="bank">Bank</option>
                                        <option value="card">Card</option>
                                        <option value="credit_card">Credit card</option>
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
                                        value="{{ $invoice->customer->phone_number }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="0612345678" required>

                                    @error('telefoonnummer')
                                        <div class="text-red-500 mt-2 text-sm">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="expiration_date"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Expiration date
                                    </label>


                                    <div class="relative max-w-sm">
                                        <div
                                            class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                            </svg>
                                        </div>
                                        <input datepicker datepicker-autohide type="text"
                                            value="{{ $invoice->expiration_date }}" name="expiration_date"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Select date">
                                    </div>

                                    @error('expiration_date')
                                        <div class="text-red-500 mt-2 text-sm">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="status"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                    <select id="status" name="status"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option value="open">Open</option>
                                        <option value="expired">Expired</option>
                                        <option value="completed">Completed</option>
                                    </select>

                                    @error('land')
                                        <div class="text-red-500 mt-2 text-sm">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="border-t w-full col-span-2 border-gray-600"></div>

                                @php
                                    $productCount = 0;
                                @endphp

                                @foreach (json_decode($invoice->products) as $product)
                                    <div class="w-full">
                                        <label for="product_id_{{ $productCount }}"
                                            class="block mb-2 text-sm  font-medium text-gray-900 dark:text-white">
                                            Product ID
                                        </label>
                                        <input type="text" name="product_id_{{ $productCount }}"
                                            id="product_id_{{ $productCount }}" value="{{ $product->id }}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="XXXXX" required>

                                        @error('product_id_{{ $productCount }}')
                                            <div class="text-red-500 mt-2 text-sm">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="w-full">
                                        <label for="product_amount_{{ $productCount }}"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Aantal
                                        </label>
                                        <input type="text" name="product_amount_{{ $productCount }}"
                                            id="product_amount_{{ $productCount }}" value="{{ $product->amount }}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="000" required>

                                        @error('product_amount_{{ $productCount }}')
                                            <div class="text-red-500 mt-2 text-sm">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    @php
                                        $productCount++;
                                    @endphp
                                @endforeach



                                <div id="products-parent" class="w-full col-span-2 grid grid-cols-2 gap-6">
                                </div>
                            </div>

                            <div class="flex flex-col">
                                <button type="button" onclick="addProduct()"
                                    class="inline-flex items-center px-5 w-fit py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-gray-600 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-gray-500">
                                    Add product @svg('heroicon-o-plus', 'w-4 h-4 ml-2')
                                </button>

                                <button type="submit"
                                    class="inline-flex w-fit items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                    Update invoice @svg('heroicon-o-arrow-right', 'w-4 h-4 ml-2')
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
    let productCount =
        @php
            echo $productCount;
        @endphp;

    function addProduct() {
        productCount++;
        document.getElementById("products-parent").innerHTML += `
        
        <div>
                                        <label for="product_id_${productCount}"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Product ID
                                        </label>
                                        <input type="text"  name="product_id_${productCount}" id="product_id_${productCount}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="XXXX" required>

                                        @error('product_id_${productCount}')
                                            <div class="text-red-500 mt-2 text-sm">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="product_amount_${productCount}"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Aantal
                                        </label>
                                        <input type="text"  name="product_amount_${productCount}" id="product_amount_${productCount}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="000" required>

                                        @error('product_amount_${productCount}')
                                            <div class="text-red-500 mt-2 text-sm">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        
                                    </div>
        `;
    }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/datepicker.min.js"></script>

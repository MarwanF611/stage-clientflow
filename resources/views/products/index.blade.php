<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Products
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between p-6 text-gray-900 dark:text-gray-100 items-center">
                    This is the products page.

                    <x-primary-link route_name="products.create">
                        Add new product
                    </x-primary-link>
                </div>
            </div>


            <div class="relative mt-3 overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Type
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Price
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Stock
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex items-center space-x-2">
                                    <img src={{ Storage::url('images/' . $product->image) }} alt="{{ $product->name }}"
                                        width="64" heigh="64" class="w-8 h-8 rounded-full object-cover">
                                    <p>
                                        {{ $product->name }} #{{ $product->id }}
                                    </p>
                                </th>
                                <td class="px-6 py-4">
                                    {{ $product->type }}
                                </td>
                                <td class="px-6 py-4">
                                    € {{ $product->price }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $product->stock }}
                                </td>
                                <td class="px-6 py-4 flex items-center space-x-4">
                                    <a href="{{ route('products.edit', [
                                        'id' => $product->id,
                                    ]) }}"
                                        class="font-medium text-gray-300 hover:underline">
                                        @svg('heroicon-m-pencil-square', 'h-5 w-5')
                                    </a>

                                    <a href="{{ route('products.delete', [
                                        'id' => $product->id,
                                    ]) }}"
                                        class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                        @svg('heroicon-s-trash', 'h-5 w-5')
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="py-3">
                {{ $products->links() }}
            </div>

        </div>
    </div>
</x-app-layout>

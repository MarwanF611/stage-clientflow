@php
    $products = App\Models\Product::latest()
        ->take(3)
        ->get();

@endphp


<div class="bg-white  rounded-lg shadow sm:p-8 dark:bg-gray-800 ">
    <div class="flex items-center justify-between
    mb-4">
        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Latest Products</h5>
        <a href="{{ route('products.index') }}"
            class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
            View all
        </a>
    </div>
    <div class="flow-root">

        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
            @foreach ($products as $product)
                <li class="py-3 sm:py-1">
                    <div class="flex items-center">
                        <div scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex items-center space-x-2">
                            <img src={{ Storage::url('images/' . $product->image) }} alt="{{ $product->name }}"
                                width="64" heigh="64" class="w-8 h-8 rounded-full object-contain">

                        </div>
                        <div class="flex-1 min-w-0 ms-4">
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                {{ $product->name }}
                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                {{ $product->type }}
                            </p>
                        </div>
                        <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                            €{{ $product->price }}
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>

    </div>
</div>

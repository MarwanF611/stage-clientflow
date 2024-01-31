<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Quotes
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between p-6 text-gray-900 dark:text-gray-100 items-center">
                    This is the quotes page.
                    <a href="{{ route('quotes.create') }}"
                        class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        Add new quote
                    </a>
                </div>
            </div>

            <div class="relative mt-3 overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Customer
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Contact
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Created at
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($quotes as $quote)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex items-center space-x-2">
                                    <p>
                                        {{ $quote->id }}
                                    </p>
                                </th>
                                <td class="px-6 py-4">
                                    {{ $quote->customer->first_name }} {{ $quote->customer->last_name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $quote->customer->email }}

                                </td>
                                <td class="px-6 py-4">
                                    {{ $quote->created_at->format('d-m-Y') }}
                                </td>
                                <td class="px-6 py-4 flex items-center space-x-4">
                                    <a href="#" class="font-medium text-gray-300 hover:underline">
                                        @svg('heroicon-m-pencil-square', 'h-5 w-5')
                                    </a>
                                    <a href="{{ route('quotes.download', [
                                        'id' => $quote->id,
                                    ]) }}"
                                        class="font-medium text-gray-300 hover:underline">
                                        @svg('heroicon-s-cloud-arrow-down', 'h-5 w-5')
                                    </a>
                                    <a href="{{ route('quotes.delete', [
                                        'id' => $quote->id,
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
                {{ $quotes->links() }}
            </div>
        </div>
    </div>
</x-app-layout>

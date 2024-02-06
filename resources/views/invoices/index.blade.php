<x-app-layout>
    <x-slot name="header">
        <h2
            class=" flex display-flex justify-between font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Invoices
            <x-primary-link route_name="invoices.create">
                Add new invoice
            </x-primary-link>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
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
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Expiry date
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Total
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($invoices as $invoice)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex items-center space-x-2">
                                    <p>
                                        {{ $invoice->id }}
                                    </p>
                                </th>
                                <td class="px-6 py-4">
                                    {{ $invoice->customer->first_name }} {{ $invoice->customer->last_name }}
                                </td>
                                <td class="px-6 py-4">
                                    @if ($invoice->status == 'completed')
                                        <span
                                            class="bg-green-100 text-green-800 uppercase text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                            {{ $invoice->status }}
                                        </span>
                                    @elseif($invoice->status == 'expired')
                                        <span
                                            class="bg-red-100 text-red-800 uppercase text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">
                                            {{ $invoice->status }}
                                        </span>
                                    @elseif($invoice->status == 'open')
                                        <span
                                            class="bg-yellow-100 text-yellow-800 uppercase text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">
                                            {{ $invoice->status }}
                                        </span>
                                    @endif

                                </td>
                                <td class="px-6 py-4">
                                    {{ $invoice->expiration_date }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $invoice->price }} €
                                </td>
                                <td class="px-6 py-4 flex items-center space-x-4">
                                    <a href="{{ route('invoices.edit', [
                                        'id' => $invoice->id,
                                    ]) }}"
                                        class="font-medium text-gray-300 hover:underline">
                                        @svg('heroicon-m-pencil-square', 'h-5 w-5')
                                    </a>
                                    <a href="{{ route('invoices.download', [
                                        'id' => $invoice->id,
                                    ]) }}"
                                        class="font-medium text-gray-300 hover:underline">
                                        @svg('heroicon-s-cloud-arrow-down', 'h-5 w-5')
                                    </a>
                                    <a href="{{ route('invoices.delete', [
                                        'id' => $invoice->id,
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
                {{ $invoices->links() }}
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2
            class="flex display-flex justify-between font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Customers

            <x-primary-link route_name="customers.create">
                Add new customer
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
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Company
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Phone number
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($customers as $customer)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $customer->first_name . ' ' . $customer->last_name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $customer->company_name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $customer->email }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $customer->phone_number }}
                                </td>
                                <td class="px-6 py-4 flex items-center space-x-4">
                                    <a href="{{ route('customers.edit', [
                                        'id' => $customer->id,
                                    ]) }}"
                                        class="font-medium text-gray-300 hover:underline">
                                        @svg('heroicon-m-pencil-square', 'h-5 w-5')
                                    </a>
                                    <a href="{{ route('customers.delete', [
                                        'id' => $customer->id,
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
                {{ $customers->links() }}
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-0 grid grid-cols-2 gap-4">
                {{-- <x-dashboard.charts.chart-sales /> --}}
                <x-dashboard.customers-card />
                <x-dashboard.products-card />
            </div>
        </div>
</x-app-layout>

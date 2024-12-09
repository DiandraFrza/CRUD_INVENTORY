<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Grid untuk statistik -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 flex flex-col items-center">
                    <h3 class="text-xl font-bold text-gray-700 dark:text-gray-300">Total Items</h3>
                    <p class="text-3xl mt-2 font-semibold text-indigo-600">{{ $totalItems }}</p>
                </div>
                <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 flex flex-col items-center">
                    <h3 class="text-xl font-bold text-gray-700 dark:text-gray-300">Total Quantity</h3>
                    <p class="text-3xl mt-2 font-semibold text-indigo-600">{{ $totalQuantity }}</p>
                </div>
                <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 flex flex-col items-center">
                    <h3 class="text-xl font-bold text-gray-700 dark:text-gray-300">Low Stock Items</h3>
                    <p class="text-3xl mt-2 font-semibold text-red-600">{{ $lowStockItems }}</p>
                </div>
            </div>

            <!-- Tabel Latest Items -->
            <div class="mt-8">
                <h2 class="text-2xl font-bold mb-4 text-gray-700 dark:text-gray-300">Latest Items</h2>
                <div class="overflow-hidden rounded-lg shadow-md">
                    <table class="min-w-full table-auto">
                        <thead>
                            <tr class="bg-gray-100 dark:bg-gray-700">
                                <th class="px-5 py-3 border-b text-left text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase">
                                    Name
                                </th>
                                <th class="px-5 py-3 border-b text-left text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase">
                                    Quantity
                                </th>
                                <th class="px-5 py-3 border-b text-left text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase">
                                    Last Updated
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($latestItems as $item)
                            <tr class="bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td class="px-5 py-5 border-b text-sm text-gray-900 dark:text-gray-200">
                                    {{ $item->name }}
                                </td>
                                <td class="px-5 py-5 border-b text-sm text-gray-900 dark:text-gray-200">
                                    {{ $item->quantity }}
                                </td>
                                <td class="px-5 py-5 border-b text-sm text-gray-900 dark:text-gray-200">
                                    {{ $item->updated_at->format('d/m/Y') }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="mt-8">
                <h2 class="text-2xl font-bold mb-4 text-gray-700 dark:text-gray-300">Quick Actions</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    <a href="{{ route('items.create') }}" class="block bg-indigo-500 hover:bg-indigo-700 text-white text-center py-4 rounded-lg shadow-lg transform hover:scale-105 transition duration-200 ease-in-out">
                        Add New Item
                    </a>
                    <a href="{{ route('items.index') }}" class="block bg-blue-500 hover:bg-blue-700 text-white text-center py-4 rounded-lg shadow-lg transform hover:scale-105 transition duration-200 ease-in-out">
                        Manage Items
                    </a>
                    <a href="#" class="block bg-green-500 hover:bg-green-700 text-white text-center py-4 rounded-lg shadow-lg transform hover:scale-105 transition duration-200 ease-in-out">
                        Generate Report
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
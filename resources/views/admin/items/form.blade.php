<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $item->exists ? 'Edit Item' : 'Add New Item' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ $item->exists ? route('items.update', $item->id) : route('items.store') }}" method="POST">
                    @csrf
                    @if ($item->exists)
                    @method('PUT')
                    @endif

                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="name">Name</label>
                            <input
                                type="text"
                                name="name"
                                id="name"
                                value="{{ old('name', $item->name) }}"
                                required
                                class="form-input rounded-md shadow-sm mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="description">Description</label>
                            <textarea
                                name="description"
                                id="description"
                                rows="4"
                                class="form-input rounded-md shadow-sm mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('description', $item->description) }}</textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="quantity">Quantity</label>
                            <input
                                type="number"
                                name="quantity"
                                id="quantity"
                                value="{{ old('quantity', $item->quantity) }}"
                                required
                                class="form-input rounded-md shadow-sm mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                    </div>

                    <div class="mt-6">
                        <button
                            type="submit"
                            class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-indigo-400">
                            {{ $item->exists ? 'Update Item' : 'Add Item' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
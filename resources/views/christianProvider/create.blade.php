<!-- announcements/create.blade.php -->

<x-guest-layout>
    <div class="max-w-3xl mx-auto mt-8 px-4">

    <div class="max-w-3xl mx-auto mt-8 px-4">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        
        <h1 class="text-3xl font-semibold mb-4">Create Announcement</h1>
        <!-- Announcement creation form -->
        <form method="POST" action="{{ route('cposts.store') }}" class="space-y-4">
            @csrf
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title:</label>
                <input type="text" id="title" name="title" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div>
                <label for="content" class="block text-sm font-medium text-gray-700">Content:</label>
                <textarea id="content" name="content" rows="5" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
            </div>
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">Create</button>
        </form>
    </div>

    </x-guest-layout>


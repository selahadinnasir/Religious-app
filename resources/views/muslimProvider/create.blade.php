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
        <form method="POST" action="{{ route('posts.store') }}" class="space-y-4" enctype="multipart/form-data" >
    @csrf
    <div>
        <label for="category" class="block text-sm font-medium text-gray-700">Category:</label>
        <input type="text" id="category" name="category" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
    </div>
    <div>
        <label for="tag" class="block text-sm font-medium text-gray-700">Tag:</label>
        <input type="text" id="tag" name="tag" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
    </div>
    <div>
        <label for="author" class="block text-sm font-medium text-gray-700">Author:</label>
        <input type="text" id="author" name="author" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
    </div>
    <div>
        <label for="status" class="block text-sm font-medium text-gray-700">Status:</label>
        <select id="status" name="status" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            <option value="published">Published</option>
            <option value="unpublished">Unpublished</option>
            <option value="draft" selected>Draft</option>
        </select>
    </div>
    <div>
        <label for="cover_image" class="block text-sm font-medium text-gray-700">Cover Image:</label>
        <input type="file" id="cover_image" name="cover_image" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
    </div>
    <div>
        <label for="document_file" class="block text-sm font-medium text-gray-700">Document File:</label>
        <input type="file" id="document_file" name="document_file" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
    </div>
    <div>
        <label for="video_file" class="block text-sm font-medium text-gray-700">Video File:</label>
        <input type="file" id="video_file" name="video_file" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
    </div>
    <div>
        <label for="external_content_url" class="block text-sm font-medium text-gray-700">External Content URL:</label>
        <input type="url" id="external_content_url" name="external_content_url" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
    </div>
    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">Create</button>
</form>

    </div>

    </x-guest-layout>


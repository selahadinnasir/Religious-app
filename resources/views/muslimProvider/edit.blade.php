<!-- announcements/create.blade.php -->

<x-guest-layout>
    <div class="max-w-3xl mx-auto mt-8 px-4">

        
        
        <h1 class="text-3xl font-semibold mb-4">edit Announcement</h1>
        <!-- Announcement creation form -->
        <form method="POST" action="{{ route('posts.update', ['post' => $post]) }}" class="space-y-4"  enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div>
        <label for="category" class="block text-sm font-medium text-gray-700">Category:</label>
        <input type="text" id="category" name="category" value="{{ $post->category }}" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
    </div>
    <div>
        <label for="tag" class="block text-sm font-medium text-gray-700">Tag:</label>
        <input type="text" id="tag" name="tag" value="{{ $post->tag }}" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
    </div>
    <div>
        <label for="author" class="block text-sm font-medium text-gray-700">Author:</label>
        <input type="text" id="author" name="author" value="{{ $post->author }}" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
    </div>
    <div>
        <label for="status" class="block text-sm font-medium text-gray-700">Status:</label>
        <select id="status" name="status" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            <option value="published" @if($post->status == 'published') selected @endif>Published</option>
            <option value="unpublished" @if($post->status == 'unpublished') selected @endif>Unpublished</option>
            <option value="draft" @if($post->status == 'draft') selected @endif>Draft</option>
        </select>
    </div>
    <div>
        <label for="cover_image" class="block text-sm font-medium text-gray-700">Cover Image:</label>
        <input type="file" id="cover_image" name="cover_image" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
    </div>
    <!-- Add fields for document file -->
    <div>
        <label for="document_file" class="block text-sm font-medium text-gray-700">Document File:</label>
        <input type="file" id="document_file" name="document_file" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
    </div>
    <!-- Add fields for video file -->
    <div>
        <label for="video_file" class="block text-sm font-medium text-gray-700">Video File:</label>
        <input type="file" id="video_file" name="video_file" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
    </div>
    <!-- Add fields for external content URL -->
    <div>
        <label for="external_content_url" class="block text-sm font-medium text-gray-700">External Content URL:</label>
        <input type="url" id="external_content_url" name="external_content_url" value="{{ $post->external_content_url }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
    </div>
    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">Update</button>
</form>

                
    </div>

    </x-guest-layout>


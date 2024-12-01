<!-- announcements/create.blade.php -->

<x-guest-layout>
    <div class="max-w-3xl mx-auto mt-8 px-4">

    <div class="max-w-3xl mx-auto mt-8 px-4">
        
        
        <h1 class="text-3xl font-semibold mb-4">edit Announcement</h1>
        <!-- Announcement creation form -->
        <form method="POST" action="{{route('cposts.update' , ['cpost' => $cpost])}}" class="space-y-4">
            @csrf
            @method('put')
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title:</label>
                <input type="text" id="title" name="title" value="{{$cpost->title}}" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div>
                <label for="content" class="block text-sm font-medium text-gray-700">Content:</label>
                <textarea id="content" name="content" rows="5"  required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                {{$cpost->content}}
                </textarea>
            </div>
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">Update</button>
        </form>
    </div>

    </x-guest-layout>


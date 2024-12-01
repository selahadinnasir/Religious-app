<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RelegiosApp</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Include Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">
<nav class="bg-gray-800 py-4">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <a href="/" class="text-white text-2xl font-semibold">Relegiuos App</a>
            </div>
            <div class="flex">
                <ul class="flex space-x-4">
                    <li><a href="/" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md">Home</a></li>
                    <!-- Other menu items -->
                    
                    <li><a href="/" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md">About</a></li>
                    <li><a href="" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md">Services</a></li>
                    <li><a href="" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md">Contact</a></li>
               
                    @if(auth()->check() && auth()->user()->account_type === 'provider' && auth()->user()->religion === 'muslim')
                    <li><a href="{{ route('cposts.create') }}" class="text-blue-300 hover:bg-gray-700 hover:text-blue-400 border border-bg-slate-100 text-lg px-3 py-2 rounded-md">Create Post</a></li>
                   @endif                
                </ul>
            </div>
        </div>
    </div>
</nav>

<div class="container mx-auto py-8">
@if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Updated successfully!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        <h1 class="text-3xl font-bold text-center mb-8">Christian Provider</h1>

        <!-- Religious Content Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Religious Content Card 1 -->
            @foreach($post as $post)
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-bold mb-4">{{ $post->title }}</h2>
                <p class="text-gray-700 mb-4">{{ $post->content }}</p>
                <a href="#" class="text-blue-500 hover:text-blue-700">Read More</a>

                <a href="{{route('cposts.edit', ['post' => $post])}}" class="hover:bg-blue-800 border box p-1  border-gray-100  text-lg bg-blue-600 text-white ">Edit</a>
            <form method ="post" action="{{route('cposts.destroy', ['post' => $post])}}">
                @csrf
               @method('DELETE')
                <button type="submit" class="hover:bg-red-800 border border-gray-100 p-1 text-lg text-white bg-red-600">Delete</button>
               </div>
              @endforeach

            </form>
           

            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-bold mb-4">Daily Inspiration</h2>
                <p class="text-gray-700 mb-4">Find your daily dose of inspiration here.</p>
                <a href="#" class="text-blue-500  hover:text-blue-700">Read More</a>
            
            </div>

            <!-- Religious Content Card 2 -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-bold mb-4">Prayer Requests</h2>
                <p class="text-gray-700 mb-4">Share your prayer requests with us.</p>
                <a href="#" class="text-blue-500 hover:text-blue-700">Submit Request</a>
            </div>

            <!-- Religious Content Card 3 -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-bold mb-4">Bible Study</h2>
                <p class="text-gray-700 mb-4">Join our weekly Bible study sessions.</p>
                <a href="#" class="text-blue-500 hover:text-blue-700">Learn More</a>
            </div>
        </div>
    </div>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provider Page</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Include Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">
 <style>
     nav {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 999; /* Ensure the navigation bar appears above other content */
        }

        .container {
            margin-top: 85px; /* Adjust according to your navigation bar's height */
            padding: 20px;
        }
 </style>

<nav class="bg-gray-800 py-4">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <a href="/" class="text-white text-2xl font-semibold">Relegios App</a>
            </div>
            <div class="flex">
                <ul class="flex space-x-4">
                    <li><a href="/" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md">Home</a></li>
                    <!-- Other menu items -->
                    
                    <li><a href="/#about" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md">About</a></li>
                    <li><a href="/#services" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md">Services</a></li>
                    <li><a href="/#contact" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md">Contact</a></li>
               
                    @if(auth()->check() && auth()->user()->account_type === 'provider' && auth()->user()->religion === 'muslim')
                    <li><a href="{{ route('posts.create') }}" class="text-blue-300 hover:bg-gray-700 hover:text-blue-400 border border-bg-slate-100 text-lg px-3 py-2 rounded-md">Create Post</a></li>
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
        <h1 class="text-3xl font-bold text-center mb-8  ">Muslim Provider</h1>

        <!-- Religious Content Section -->
 <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
 @foreach($post as $post)
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-bold mb-4">{{ $post->category }}</h2>
        <p class="text-gray-700 mb-4">Tag: {{ $post->tag }}</p>
        <p class="text-gray-700 mb-4">Author: {{ $post->author }}</p>
        <p class="text-gray-700 mb-4">Status: {{ $post->status }}</p>
        @if ($post->cover_image)
            <img src="{{ asset('storage/images/' . $post->cover_image) }}" alt="Cover Image" class="w-full h-64 mb-2">
        @endif

        <!-- Read more link -->
          <a href="#" class="read-more text-blue-500 hover:text-blue-700">Read more</a>
        
        <!-- items-center rounded-md shadow-sm bg-blue-600 hover:bg-blue-800 text-white px-4 py-2 text-sm">Read more</a> -->
        
    

        <!-- Additional content -->
        <div class="additional-content hidden">
            @if ($post->document_file)
                <a href="{{ Storage::url($post->document_file) }}" class="text-blue-500 hover:text-blue-700 block mb-4">Download Document</a>
            @endif

            @if ($post->video_file)
                <video controls class="w-full h-32 mb-4">
                    <source src="{{ Storage::url('videos/' . $post->video_file) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            @endif

            @if ($post->external_content_url)
                <a href="{{ $post->external_content_url }}" class="text-blue-500 hover:text-blue-700 block mb-4">External Content</a>
            @endif
        </div>
        <div class="flex justify-end  items-center">

            <a href="{{ route('posts.edit', ['post' => $post]) }}" class="rounded-md mr-2 shadow-sm bg-blue-600 hover:bg-blue-800 text-white px-4 py-2 text-lg">
                Edit
            </a>
            <!-- Delete button can be placed here -->
            <form method="post" action="{{ route('posts.destroy', ['post' => $post]) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="rounded-md shadow-sm bg-red-600 hover:bg-red-800 text-white px-4 py-2 text-lg ml-1">Delete</button>
            </form>
        </div>
    </div>
@endforeach    

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
   <script>
         document.querySelectorAll('.read-more').forEach(function(link) {
    link.addEventListener('click', function(e) {
        e.preventDefault();
        // Find the next sibling element of the clicked link, which should be the .additional-content container
        var additionalContent = link.nextElementSibling;
        // Toggle its visibility
        additionalContent.classList.toggle('hidden');
    });
});
    </script>        

</body>
</html>

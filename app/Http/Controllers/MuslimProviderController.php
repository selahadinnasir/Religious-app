<?php

namespace App\Http\Controllers;
use App\Models\Posts;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class MuslimProviderController extends Controller
{
    //
    public function posts() {
        // Retrieve data from the database or another source
        $post = Posts::all(); // Assuming you have a Post model

        // Return the data as a JSON response
        return response()->json(['post' => $post], 200);
    }
    
    public function index()
    {
          
      $post = Posts::all();
    // Pass the post data to the view
         return view('muslimProvider.dashboard', ['post' => $post]);
    }

    public function create(){
        return view('muslimProvider.create');
    }

    public function store(Request $request)
{
    // Validate the incoming request data, including file validation if necessary

    // dd($request->all());
    $data = $request->validate([
        'category' => 'nullable|string|max:255',
        'tag' => 'nullable|string|max:255',
        'author' => 'nullable|string|max:255',
        'status' => 'nullable|in:published,unpublished,draft',
        // 'cover_image' => 'nullable|image|max:2048', // Max file size: 2MB, and only image files are allowed
    ]);

    // Retrieve the uploaded file
    
    // Retrieve the uploaded files
    $documentFile = $request->file('document_file');
    $videoFile = $request->file('video_file');

    // Move the uploaded document file to the desired destination directory
    if ($documentFile) {
        $documentPath = $documentFile->store('public/documents');
        $data['document_file'] = basename($documentPath);
    }

    // Move the uploaded video file to the desired destination directory
    if ($videoFile) {
        $videoPath = $videoFile->store('public/videos');
        $data['video_file'] = basename($videoPath);
    }

    // Move the uploaded image file to the desired destination directory
    if ($coverImage = $request->file('cover_image')) {
        $imagePath = $coverImage->store('public/images');
        $data['cover_image'] = basename($imagePath);
    }
                   
    $data['external_content_url'] = $request->input('external_content_url');

    $post = Posts::create($data);

    return redirect()->route('posts.create')->with('success', 'Post created successfully.');
    
}
        
    

    public function edit(Posts $post)  {
        
          return view('muslimProvider.edit', ['post'=>  $post]);
    }

    public function update(Posts $post , Request $request) {
        $data = $request->validate([
            'category' => 'nullable|string|max:255',
            'tag' => 'nullable|string|max:255',
            'author' => 'nullable|string|max:255',
            'status' => 'nullable|in:published,unpublished,draft',
            'cover_image' => 'nullable|string|max:255',
            'document_file' => 'nullable|string|max:255',
            'video_file' => 'nullable|string|max:255',
            'external_content_url' => 'nullable|url',
        ]);

        $post->update($data);
       
        return redirect()->route('posts.edit')->with('success', 'Post updated successfully.');
    }

    public function destroy(Posts $post) {
        $post->delete();
        return redirect()->route('muslimProvider.dashboard')->with('success', 'Post deleted successfully.');
    }
}

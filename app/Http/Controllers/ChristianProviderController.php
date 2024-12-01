<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;

class ChristianProviderController extends Controller
{
    //  
    public function index()
    {
    
      $spost = Post::all();
    //   thsi lists the post from Posts model not from Post mdel which is for christian? 
      dd($spost);
  
  // Pass the post data to the view
         return view('ChristianProvider.dashboard', ['post' => $post]);
    }

    public function create(){
        return view('ChristianProvider.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $data = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        // Create a new post instance
        $post = Post::create($data);
      
        // You can set other fields here if neede
        // Save the post to the database
        $post->save();

        return redirect()->route('cposts.create')->with('success', 'Post created successfully.');
        

    }

    public function edit(Post $post)  {
        
          return view('ChristianProvider.edit', ['cpost'=>  $post]);
    }

    public function update(Posts $post , Request $request) {
        $data = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $post->update($data);
       
        return redirect()->route('ChristianProvider.dashboard')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post) {
        $post->delete();
        return redirect()->route('ChristianProvider.dashboard')->with('success', 'Post deleted successfully.');
    }
}

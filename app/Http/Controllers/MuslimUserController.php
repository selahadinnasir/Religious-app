<?php

namespace App\Http\Controllers;
use App\Models\Posts;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class MuslimUserController extends Controller
{
    public function index() {
        $post = Posts::all();
        return view('muslimUser.dashboard', ['post' => $post]);
    }

    public function bookmark(Request $request, Posts $post)
    {
        try {
            $user = Auth::user();
            Log::info('Bookmark request received.', ['user_id' => $user->id, 'post_id' => $post->id]);

            // Validate that the post exists
            $request->validate([
                'post_id' => 'required|exists:posts,id',
            ]);

            Log::info('Validation passed.', ['post_id' => $post->id]);

            // Check if the bookmark already exists to avoid duplicates
            if (!$user->bookmarks->contains($post->id)) {
                $user->bookmarks()->attach($post->id);
                Log::info('Post bookmarked successfully.', ['user_id' => $user->id, 'post_id' => $post->id]);
                return redirect()->back()->with('success', 'Post bookmarked successfully.');
            }

            Log::warning('Post already bookmarked.', ['user_id' => $user->id, 'post_id' => $post->id]);
            return redirect()->back()->with('error', 'Post is already bookmarked.');
        } catch (\Exception $e) {
            Log::error('Error bookmarking post.', ['error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'An error occurred while bookmarking the post.');
        }
    }

    public function unbookmark(Request $request, Posts $post)
    {
         $user = Auth::user();

        // Validate that the post exists
        $request->validate([
            'post_id' => 'required|exists:posts,id',
        ]);

        // Check if the user and post exist
        if (!$user || !$post) {
            return back()->with('error', 'Invalid user or post.');
        }

        $user->bookmark()->detach($post->id);
        return back()->with('success', 'Bookmark removed successfully.');
    }




}


<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        // Sans pagination, tous les posts
        // withCount('likes') => likes_count dispo dans la vue
        $posts = Post::query()
            ->with(['user'])
            ->withCount('likes')
            ->latest()
            ->get();

        return view('dashboard', compact('posts'));
    }
    public function home()
    {
        $posts = Post::query()
            ->with(['user', 'likes', 'comments.user'])
            ->withCount('comments')
            ->latest()
            ->get();

        return view('Home', compact('posts'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'content' => ['required', 'string', 'max:2000'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
        }

        Post::create([
            'user_id' => auth()->id(),
            'content' => $data['content'],
            'image_path' => $imagePath,
        ]);

        return back()->with('success', 'Post créé avec succès ✅');
    }

    public function edit(Post $post)
    {
        abort_if($post->user_id !== auth()->id(), 403);

        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        abort_if($post->user_id !== auth()->id(), 403);

        $data = $request->validate([
            'content' => ['required', 'string', 'max:2000'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'remove_image' => ['nullable', 'boolean'],
        ]);

        // remove image si checkbox
        if ($request->boolean('remove_image') && $post->image_path) {
            Storage::disk('public')->delete($post->image_path);
            $post->image_path = null;
        }

        // nouvelle image upload
        if ($request->hasFile('image')) {
            if ($post->image_path) {
                Storage::disk('public')->delete($post->image_path);
            }
            $post->image_path = $request->file('image')->store('posts', 'public');
        }

        $post->content = $data['content'];
        $post->save();

        return redirect()->route('dashboard')->with('success', 'Post modifié ✅');
    }

    public function destroy(Post $post)
    {
        abort_if($post->user_id !== auth()->id(), 403);

        if ($post->image_path) {
            Storage::disk('public')->delete($post->image_path);
        }

        $post->delete();

        return back()->with('success', 'Post supprimé ✅');
    }

    public function toggleLike(Post $post)
    {
        $me = auth()->id();

        $like = Like::query()
            ->where('user_id', $me)
            ->where('post_id', $post->id)
            ->first();

        if ($like) {
            $like->delete();
        } else {
            Like::create([
                'user_id' => $me,
                'post_id' => $post->id,
            ]);
        }

        return back();
    }
}

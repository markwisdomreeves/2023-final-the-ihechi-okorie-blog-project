<?php

namespace App\Http\Controllers\ClientController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;


class PostController extends Controller{
    public function ShowPostDetail(Post $post) {
        $all_recent_posts_data = Post::latest()->take(4)->get();
        $all_categories_data = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(8)->get();
        $all_tags_data = Tag::latest()->take(5)->get();

        return view('client.post', [
            'post' => $post,
            'all_recent_posts_data' => $all_recent_posts_data,
            'all_categories_data' => $all_categories_data,
            'all_tags_data' => $all_tags_data
        ]);
    }

    public function CreatePostComment(Post $post) {
        $attributes = request()->validate([
            'comment' => 'required|min:10|max:300'
        ]);

        $attributes['user_id'] = auth()->id();
        $comment = $post->comments()->create($attributes);

        return redirect('/posts/' . $post->slug . '#comment_' . $comment->id)->with('success', 'Comment Added.');
    }
}

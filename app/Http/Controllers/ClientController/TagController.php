<?php

namespace App\Http\Controllers\ClientController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;


class TagController extends Controller{
    
    public function Show(Tag $tag) {
        $all_recent_posts_data = Post::latest()->take(4)->get();
        $all_categories_data = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(8)->get();
        $all_posts_data = $tag->posts()->withCount('comments')->orderBy('id', 'desc')->paginate(4);
        $all_tags_data = Tag::latest()->take(8)->get();
 
        return view('client.tags.show', compact('tag', 'all_posts_data', 'all_recent_posts_data', 'all_categories_data', 'all_tags_data'));
    }
}

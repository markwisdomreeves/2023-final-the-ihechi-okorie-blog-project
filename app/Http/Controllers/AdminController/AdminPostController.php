<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;


class AdminPostController extends Controller {

    private $rules = [
        'title' => 'required|max:500',
        'slug' => 'required|max:500',
        'excerpt' => 'required|max:5000',
        'category_id' => 'required|numeric',
        'thumbnail' => 'required|file|mimes:jpg,png,webp,svg,jpeg',
        'description' => 'required',
    ];

    public function index(){
        return view('admin.posts.index', [
            'posts' => Post::with('category')->orderBy('id', 'DESC')->paginate(10),
        ]);
    }

    public function create(){
        return view('admin.posts.create', [
            'categories' => Category::pluck('name', 'id')
        ]);
    }

    public function store(Request $request){
        $validated = $request->validate($this->rules);
        $validated['user_id'] = auth()->id();
        $post = Post::create($validated);

        if($request->has('thumbnail')){
            $thumbnail = $request->file('thumbnail');
            $filename = $thumbnail->getClientOriginalName();
            $file_extension = $thumbnail->getClientOriginalExtension();
            $path = $thumbnail->store('storage', 'public');
            
            $post->image()->create([
                'image' => $filename,
                'extension' => $file_extension,
                'path' => $path
            ]);
        }

        $tags = explode(',', $request->input('tags'));
        $tags_ids = [];
        foreach($tags as $tag){
            $tag_ob = Tag::create(['name' => trim($tag)]);
            $tags_ids[] = $tag_ob->id;
        }
        
        if(count($tags_ids) > 0)
            $post->tags()->sync( $tags_ids );
        return redirect()->route('admin.posts.create')->with('success', 'Post has been created successfully.');
    }

    public function edit(Post $post) {
        $tags = '';
        foreach($post->tags as $key => $tag){
            $tags .= $tag->name;
            if($key !== count($post->tags) - 1){
                $tags .= ', ';
            }
        }
        
        return view('admin.posts.edit', [
            'post' => $post,
            'tags' => $tags,
            'categories' => Category::pluck('name', 'id')
        ]);
    }

    public function update(Request $request, Post $post) {
        $this->rules['thumbnail'] = 'nullable|file|mimes:jpg,png,webp,svg,jpeg';
        $validated = $request->validate($this->rules);
        $validated['approved'] = $request->input('approved') !== null;

        $post->update($validated);

        if($request->has('thumbnail')){
            $thumbnail = $request->file('thumbnail');
            $filename = $thumbnail->getClientOriginalName();
            $file_extension = $thumbnail->getClientOriginalExtension();
            $path = $thumbnail->store('storage', 'public');

            $post->image()->update([
                'image' => $filename,
                'extension' => $file_extension,
                'path' => $path
            ]);
        }

        $tags = explode(',', $request->input('tags'));
        $tags_ids = [];
        foreach($tags as $tag){
            $tag_exist = $post->tags()->where('name', trim($tag) )->count();
            if($tag_exist == 0) {
                $tag_ob = Tag::create(['name' => $tag]);
                $tags_ids[] = $tag_ob->id;
            }
        }
        
        if(count($tags_ids) > 0) {
            $post->tags()->syncWithoutDetaching( $tags_ids );
        }
            
        return redirect()->route('admin.posts.edit', $post)->with('success', 'Post has been updated successfully.');
    }

    public function destroy(Post $post){
        $post->tags()->delete();
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Post has been Deleted Successfully.');
    }
}

<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Tag;


class AdminTagsController extends Controller{

    public function index(){
        return view('admin.tags.index', [
            'tags' => Tag::with('posts')->orderBy('id', 'desc')->paginate(10),
        ]);
    }

    public function show(Tag $tag){
        return view('admin.tags.show', [
            'tag' => $tag
        ]);
    }

    public function destroy(Tag $tag){
        $tag->posts()->detach();
        $tag->delete();
        return redirect()->route('admin.tags.index')->with('success', 'Tag has been Deleted Successfully.');
    }
}

<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Category;


class AdminCategoryController extends Controller{

    private $rules = [
        'name' => 'required|min:3|max:30',
        'slug' => 'required|unique:categories,slug'
    ];

    public function index(){
        return view('admin.categories.index', [
            'categories' => Category::with('user')->orderBy('id', 'DESC')->paginate(6)
        ]);
    }

    public function create(){
        return view('admin.categories.create');
    }
    
    public function store(Request $request){
        $validated = $request->validate($this->rules);
        $validated['user_id'] = auth()->id();
        Category::create($validated);
        return redirect()->route('admin.categories.create')->with('success', 'Category has been Created Successfully.');
    }

    public function show(Category $category){
        return view('admin.categories.show', [
            'category' => $category
        ]);
    }

    public function edit(Category $category){
        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    public function update(Request $request, Category $category){
        $this->rules['slug'] = ['required', Rule::unique('categories')->ignore($category)];
        $validated = $request->validate($this->rules);
        
        $category->update($validated);

        return redirect()->route('admin.categories.edit', $category)->with('success', 'Category has been Updated Successfully.');
    }

    public function destroy(Category $category){
        $default_category_id = Category::where('name', 'Uncategorized')->first()->id;
        
        if($category->name === 'Uncategorized')
            abort(404);
    
        $category->posts()->update(['category_id' => $default_category_id]);

        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category has been Deleted Successfully.');
    }
}

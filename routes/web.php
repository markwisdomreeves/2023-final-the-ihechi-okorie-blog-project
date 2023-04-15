<?php

use Illuminate\Support\Facades\Route;

// Client / Frontend Controllers
use App\Http\Controllers\ClientController\HomeController;
use App\Http\Controllers\ClientController\PostController;
use App\Http\Controllers\ClientController\ContactController;
use App\Http\Controllers\ClientController\AboutController;
use App\Http\Controllers\ClientController\CategoryController;
use App\Http\Controllers\ClientController\TagController;

// Admin / Backend Controllers
use App\Http\Controllers\AdminController\DashboardController;
use App\Http\Controllers\AdminController\AdminPostController;
use App\Http\Controllers\AdminController\TinyMCEController;
use App\Http\Controllers\AdminController\AdminCategoryController;
use App\Http\Controllers\AdminController\AdminTagsController;
use App\Http\Controllers\AdminController\AdminCommentsController;
use App\Http\Controllers\AdminController\AdminRolesController;
use App\Http\Controllers\AdminController\AdminUsersController;




// To create a storage image links
Route::get('/storage', function(){
    symlink(base_path() . '/storage/app/public', 'storage');
});

// Route::get('generate', function (){
//     \Illuminate\Support\Facades\Artisan::call('storage:link');
//     echo 'ok';
// });



// Client / Frontend routes
Route::get('/', [HomeController::class, 'ShowHomePage'])->name('show_home_page');
Route::get('/posts/{post:slug}', [PostController::class, 'ShowPostDetail'])->name('show_post_detail');
Route::post('/posts/{post:slug}', [PostController::class, 'CreatePostComment'])->name('create_post_comment');
Route::get('/about-me', [AboutController::class, 'ShowAboutPage'])->name('show_about_page');
Route::get('/contact-me', [ContactController::class, 'ShowContactPage'])->name('show_contact_page');
Route::post('/send-message', [ContactController::class, 'StoreContactMessage'])->name('submit_contact_form');
Route::get('/categories/{category:slug}', [CategoryController::class, 'Show'])->name('categories.show');
Route::get('/categories', [CategoryController::class, 'Index'])->name('categories.index');
Route::get('/tags/{tag:name}', [TagController::class, 'Show'])->name('tags.show');


// Admin / Backend routes
Route::name('admin.')->prefix('admin')->middleware(['auth', 'check_permissions'])->group(function() {
    Route::get('/', [DashboardController::class, 'ShowAdminDashboard'])->name('index');
    Route::post('upload_tinymce_image', [TinyMCEController::class, 'upload_tinymce_image'])->name('upload_tinymce_image');
    Route::resource('posts', AdminPostController::class);
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('tags', AdminTagsController::class)->only(['index', 'show', 'destroy']);
    Route::resource('comments', AdminCommentsController::class)->except('show');
    Route::resource('roles', AdminRolesController::class)->except('show');
    Route::resource('users', AdminUsersController::class);
});


require __DIR__.'/auth.php';

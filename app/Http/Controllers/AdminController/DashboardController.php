<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Image;
use App\Models\Comment;
use App\Models\User;
use App\Models\Role;


class DashboardController extends Controller{
    public function ShowAdminDashboard() {
      $total_post = Post::count();
      $total_category = Category::count();
      $total_tag = Tag::count();
      $total_image = Image::count();
      $total_comment = Comment::count();
      $total_user = User::count();
      $total_role = Role::count();

      return view('admin.index', compact('total_post', 'total_category', 'total_tag', 'total_image', 'total_comment', 'total_user', 'total_role'));
    }
}

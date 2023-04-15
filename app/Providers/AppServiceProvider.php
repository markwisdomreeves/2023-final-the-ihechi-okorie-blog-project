<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Models\Category;



class AppServiceProvider extends ServiceProvider
{
  
    public function register(): void {
       
    }

   
    public function boot(): void {
        Paginator::useBootstrap();

        if(Schema::hasTable('categories')) {
            $all_categories_data = Category::withCount('posts')->orderBy('posts_count', 'DESC')->take(8)->get();
            View::share('navbar_categories_data', $all_categories_data);
        }
    }
}

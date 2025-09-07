<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Post;

class ViewServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        View::composer(['partials.navbar', 'partials.sidebar', 'partials.footer', 'pages.home'], function ($view) {
            $categories = Category::published()
                ->withCount([
                    'posts' => function ($query) {
                        $query->published();
                    }
                ])
                ->get();
            $popular = Post::published()
                ->whereHas('category', function ($q) {
                    $q->published();
                })
                ->orderBy('views', 'desc')
                ->limit(6)
                ->get();
            $view->with(compact('categories', 'popular'));
        });
    }
}

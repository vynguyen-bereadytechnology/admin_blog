<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        $featured = Post::published()
            ->whereHas('category', function ($q) {
                $q->published();
            })
            ->orderBy('views', 'desc')
            ->limit(6)
            ->get();

        $latest = Post::published()
            ->whereHas('category', function ($q) {
                $q->published();
            })
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();

        return view('pages.home', compact('featured', 'latest'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $topPosts = $category->posts()
            ->published()
            ->orderBy('views', 'desc')
            ->limit(3)
            ->get();

        $latestPosts = $category->posts()
            ->published()
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        return view('pages.category', [
            'category' => $category,
            'slug' => $slug,
            'topPosts' => $topPosts,
            'latestPosts' => $latestPosts,
        ]);
    }
    public function allCategory()
    {
        $categories = Category::published()->paginate(8);

        return view('pages.allcategory', compact('categories'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        $post->increment('views');

        $relatedPosts = Post::published()
            ->where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        return view('pages.post', [
            'post' => $post,
            'relatedPosts' => $relatedPosts,
        ]);
    }

    public function featured()
    {
        $featured = Post::published()
            ->whereHas('category', function ($q) {
                $q->published();
            })
            ->orderBy('views', 'desc')
            ->paginate(6);

        return view('pages.featured', [
            'featured' => $featured,
        ]);
    }

    public function latest()
    {
        $latest = Post::published()
            ->whereHas('category', function ($q) {
                $q->published();
            })
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        return view('pages.latest', [
            'latest' => $latest,
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->input('q');

        $allPosts = Post::published()
            ->whereHas('category', function ($q) {
                $q->published();
            })
            ->where(function ($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                    ->orWhere('content', 'like', "%{$query}%")      // search trong content
    

                    ->orWhereHas('category', function ($cat) use ($query) {
                        $cat->published()->where('name', 'like', "%{$query}%"); // search trong category name
                    });
            })
            ->orderBy('views', 'desc')
            ->paginate(6);
        return view('pages.search', compact('allPosts', 'query'));
    }

}

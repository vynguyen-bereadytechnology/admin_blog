@extends('layouts.app')

@section('title', $category->name . ' - Travel Blog')

@section('content')
    <!-- Category Hero Section -->
    <x-hero-section title="{{ $category->name }}" subtitle="Explore latest posts and stories in this category."
        :image="'storage/' . $category->thumbnail" />

    <!-- Main Content -->
    <main class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10 bg-bg text-text">

        <!-- Featured Posts Header -->
        <x-heading-block title="Featured Posts"
            description="These are the most popular and trending posts in this category. Hand-picked for you to explore." />


        <!-- Top Posts -->
        <section class="mb-12 grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($topPosts as $post)
                <x-post-card :post="$post" />
            @endforeach
        </section>

        <!-- New Posts Header -->
        <x-heading-block title="New Posts"
            description="Check out the latest articles and stories. Stay updated with the newest content." />

        <!-- Other Posts + Sidebar -->
        <section class="grid lg:grid-cols-4 gap-8">
            <!-- Posts List -->
            <div class="lg:col-span-3 space-y-6">
                @foreach ($latestPosts as $post)
                    <x-post-list-card :post="$post" />
                @endforeach

                <!-- Pagination -->
                <div class="mt-8 flex justify-center">
                    {{ $latestPosts->links('pagination::tailwind') }}
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                @include('partials.sidebar')
            </div>
        </section>

    </main>
@endsection

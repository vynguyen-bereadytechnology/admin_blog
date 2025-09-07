@extends('layouts.app')

@section('title', 'Home - Travel Blog')

@section('content')
    <!-- Hero Section -->
    <section class="relative h-[70vh] min-h-[500px] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 bg-cover bg-center"
            style="background-image:url('images/kenya-safari-wildlife-elephants.png')">
            <div class="absolute inset-0 bg-gradient-to-r from-[#ff8c94]/80 via-[#ffd6a5]/60 to-[#a0e7e5]/60"></div>
        </div>

        <div class="relative z-10 text-center max-w-3xl mx-auto px-4 font-sans">
            <h1 class="text-4xl md:text-6xl font-extrabold mb-6 text-text drop-shadow-lg font-serif">
                Discover Your Next
                <span
                    class="block text-primary drop-shadow-md text-primary-hover transition-colors duration-300">Adventure</span>
            </h1>
            <p class="text-lg md:text-xl mb-8 text-text/90 drop-shadow-sm">
                Join us on incredible journeys around the world. From hidden gems to iconic destinations, find inspiration
                for your next unforgettable trip.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('category.show', 'adventure') }}"
                    class="px-6 py-3 rounded-lg bg-primary text-card font-semibold text-sm hover:bg-primary-hover transition-colors transition-transform duration-300 hover:scale-105">
                    Explore Destinations
                </a>
                <a href="{{ route('posts.latest') }}"
                    class="px-6 py-3 rounded-lg border font-semibold text-sm border-[var(--color-secondary)] text-[var(--color-secondary)] bg-black/50 backdrop-blur-sm transition duration-300 hover:bg-[var(--color-secondary)]/10 hover:scale-105">
                    Read Latest Stories
                </a>

            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10 -mt-16 bg-bg text-text">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="flex items-center justify-between mb-6">
                <x-heading-block title="Categories" description="Explore our diverse travel categories." />

                <a href="{{ route('allcategory') }}"
                    class="text-base font-medium text-primary transition-colors duration-300 hover:text-primary-hover transition-transform duration-300 hover:scale-105">
                    See all
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
                @foreach ($categories->shuffle()->take(4) as $category)
                    <x-category-card :category="$category" />
                @endforeach
            </div>
        </div>

        <hr>
        </br>

        <div class="flex items-end justify-between mb-6">
            <x-heading-block title="Featured Posts"
                description="These are the most popular and trending posts. Hand-picked for you to explore." />

            <a href="{{ route('posts.featured') }}"
                class="text-base font-medium text-primary transition-colors duration-300 hover:text-primary-hover transition-transform duration-300 hover:scale-105">
                See all
            </a>
        </div>

        <!-- Featured Stories -->
        <section class="mb-12">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-8">
                @foreach ($featured->take(6) as $post)
                    <x-post-card :post="$post" />
                @endforeach
            </div>
        </section>

        <hr>
        </br>

        <!-- Latest Stories -->
        <section id="latest" class="grid lg:grid-cols-4 gap-8">
            <div class="lg:col-span-3 mb-6 text-center lg:text-left">
                <x-heading-block title="New Posts"
                    description="Check out the latest articles and stories. Stay updated with the newest content." />
            </div>
            <div class="lg:col-span-3 space-y-6">
                @foreach ($latest as $post)
                    <x-post-list-card :post="$post" />
                @endforeach
                <div class="flex justify-center">
                    <a href="{{ route('posts.latest') }}"
                        class="px-6 py-3 rounded-lg border border-[var(--color-secondary)] text-[var(--color-secondary)] font-semibold text-sm bg-white/50 backdrop-blur-sm transition-all duration-300 hover:bg-[var(--color-secondary)]/10 hover:scale-105">
                        See all
                    </a>
                </div>
            </div>

            <div class="lg:col-span-1">
                @include('partials.sidebar')
            </div>
        </section>
    </main>
@endsection

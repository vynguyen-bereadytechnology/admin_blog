@extends('layouts.app')

@section('title', 'Search Results - Travel Blog')

@section('content')
    <!-- Hero Section -->
    <x-hero-section title="Search Results" subtitle="" image="images/kenya-safari-wildlife-elephants.png">
        <!-- Search Form -->
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 mt-6 flex justify-center">
            <form action="{{ route('posts.search') }}" method="GET"
                class="flex w-full max-w-md rounded-lg border border-theme overflow-hidden bg-card">
                <input type="search" name="q" value="{{ $query }}" placeholder="Search..."
                    class="flex-1 bg-card py-2 px-3 text-sm text-text placeholder:text-text-secondary focus:outline-none" />
                <button type="submit"
                    class="px-3 py-2 text-text-secondary hover:text-primary transition-colors flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 13.65z" />
                    </svg>
                    <span class="hidden md:inline">Search</span>
                </button>
            </form>
        </div>
    </x-hero-section>

    <!-- Main Content -->
    <main class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10 bg-bg text-text">
        <x-heading-block title="Search Results" :description="__('Showing results for: <span class=\'font-semibold text-secondary\'>' . request('q') . '</span>')" />

        <div class="grid lg:grid-cols-4 gap-8">
            <!-- Posts -->
            <section class="lg:col-span-3 space-y-6">
                @forelse ($allPosts as $post)
                    <x-post-list-card :post="$post" />
                @empty
                    <p class="col-span-2 text-center text-text-secondary">No results found for your query.</p>
                @endforelse
                <!-- Pagination -->
                <div class="mt-8 flex justify-center">
                    {{ $allPosts->links('pagination::tailwind') }}
                </div>
            </section>

            <!-- Sidebar -->
            <aside class="lg:col-span-1">
                @include('partials.sidebar')
            </aside>
        </div>
    </main>
@endsection

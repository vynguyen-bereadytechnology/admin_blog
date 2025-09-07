@extends('layouts.app')

@section('title', 'Featured Stories - Travel Blog')

@section('content')
    <!-- Hero Section -->
    <x-hero-section title="Featured Stories"
        subtitle="Discover our hand-picked selection of the best travel stories and adventures."
        image="images/kenya-safari-wildlife-elephants.png" />

    <!-- Main Content -->
    <main class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10 bg-bg text-text">
        <x-heading-block title="Featured Posts"
            description="These are the most popular and trending posts. Hand-picked for you to explore." />

        <div class="grid lg:grid-cols-4 gap-8">
            <!-- Posts -->
            <section class="lg:col-span-3 grid lg:grid-cols-2 gap-6 items-stretch">
                @foreach ($featured as $post)
                    <x-post-card :post="$post" />
                @endforeach

                <!-- Pagination -->
                <div class="lg:col-span-2 mt-8 flex justify-center">
                    {{ $featured->links('pagination::tailwind') }}
                </div>
            </section>

            <!-- Sidebar -->
            <aside class="lg:col-span-1">
                @include('partials.sidebar')
            </aside>
        </div>
    </main>
@endsection

@extends('layouts.app')

@section('title', 'All Categories - Travel Blog')

@section('content')
    <x-hero-section title="All Categories" subtitle="Explore our diverse travel categories."
        image="images/kenya-safari-wildlife-elephants.png" />

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 bg-bg text-text">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach ($categories as $category)
                <x-category-card :category="$category" />
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-12 flex justify-center">
            {{ $categories->links('pagination::tailwind') }}
        </div>
    </main>
@endsection

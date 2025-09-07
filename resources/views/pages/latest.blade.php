@extends('layouts.app')

@section('title', 'Latest Stories - Travel Blog')

@section('content')
    <!-- Hero Section -->
    <x-hero-section title="Latest Stories" subtitle="Hand-picked adventures and guides."
        image="images/kenya-safari-wildlife-elephants.png" />

    <!-- Main Content -->
    <main class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10 bg-bg text-text">
        <x-heading-block title="Latest Posts" description="Stay updated with our latest stories and adventures." />

        <div class="grid lg:grid-cols-4 gap-8">
            <!-- Posts -->
            <section class="lg:col-span-3 space-y-8">
                @foreach ($latest as $post)
                    <x-post-list-card :post="$post" />
                @endforeach

                <!-- Pagination -->
                <div class="mt-8 flex justify-center">
                    {{ $latest->links('pagination::tailwind') }}
                </div>
            </section>

            <!-- Sidebar -->
            <aside class="lg:col-span-1">
                @include('partials.sidebar')
            </aside>
        </div>
    </main>
@endsection

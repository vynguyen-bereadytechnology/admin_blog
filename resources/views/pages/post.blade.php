@extends('layouts.app')

@section('title', $post->title . ' - Travel Blog')

@section('content')
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 bg-bg text-text">

        <div class="grid lg:grid-cols-4 gap-10">

            <!-- Main Content -->
            <article class="lg:col-span-3 space-y-6">
                <a href="{{ route('category.show', $post->category) }}"
                    class="px-6 py-3 rounded-lg border border-[var(--color-secondary)] text-[var(--color-secondary)] font-semibold text-sm bg-white/50 backdrop-blur-sm transition-all duration-300 hover:bg-[var(--color-secondary)]/10 hover:scale-105 hover:underline">
                    {{ $post->category->name }}
                </a>

                <!-- Title -->
                <h1 class="text-4xl md:text-5xl font-extrabold text-text">
                    {{ $post->title }}
                </h1>

                <!-- Meta Info -->
                <div class="flex flex-wrap items-center gap-4 text-sm text-text-secondary">
                    <span>Published: {{ $post->created_at->format('d M, Y') }}</span>
                    <span> • Read Time: {{ $post->read_time }} min</span>
                    <span> • Views: {{ $post->views }}</span>
                </div>

                <!-- Excerpt -->
                @if ($post->excerpt)
                    <p class="text-lg text-text-secondary italic border-l-4 border-primary pl-4">
                        {{ $post->excerpt }}
                    </p>
                @endif

                <!-- Thumbnail -->
                <img src="{{ $post->thumbnail ? asset('storage/' . $post->thumbnail) : asset('images/default-thumbnail.jpg') }}"
                    alt="{{ $post->title }}" class="w-full h-[400px] md:h-[400px] object-cover rounded-xl shadow-lg">

                <!-- Content -->
                <div class="prose prose-custom max-w-full">
                    {!! $post->content !!}
                </div>

            </article>

            <!-- Sidebar -->
            @include('partials.sidebar')
        </div>

        <!-- Related Posts Section -->
        @if ($relatedPosts->count())
            <section class="mt-16">
                <x-heading-block title="Related Posts" description="Explore more articles related to this topic." />
                <div class="grid sm:grid-cols-1 lg:grid-cols-3 gap-6 w-full h-full">
                    @foreach ($relatedPosts as $related)
                        <x-post-card :post="$related" />
                    @endforeach
                </div>
            </section>
        @endif
    </main>
@endsection

{{-- @props(['post'])

<div
    class="group overflow-hidden rounded-xl border border-gray-300 shadow transition-all duration-300 hover:shadow-lg hover:-translate-y-1 max-w-[370px] max-h-[500px] flex flex-col">
    <a href="{{ route('post.show', $post->slug) }}" class="flex flex-col h-full">
        <div class="mt-4">
            <div class="aspect-video overflow-hidden w-full border-b border-gray-300">
                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}"
                    class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
            </div>
        </div>
        <div class="px-6 pb-6 flex-1 flex flex-col justify-between">
            <div>
                <div class="flex items-center gap-2 mb-3 mt-4">
                    <span
                        class="px-2 py-0.5 rounded bg-card-primary text-xs text-text-secondary transition-colors duration-300 group-hover:text-primary">
                        {{ $post->category->name }}
                    </span>
                    <span class="flex items-center gap-1 ml-auto text-xs text-text-secondary">
                        {{ $post->read_time . ' min read' ?? '5 min read' }} </span>
                </div>
                <h3
                    class="font-bold text-lg mb-2 line-clamp-2 transition-colors duration-300 group-hover:text-[var(--color-secondary)]">
                    {{ Str::limit($post->title, 60, '...') }}
                </h3>
                <p class="text-text-secondary text-sm line-clamp-3 mb-4">
                    {{ Str::limit($post->excerpt, 200, '...') }}
                </p>
            </div>
            <div class="flex items-center gap-4 text-xs text-text-secondary">
                <div class="flex items-center gap-1 ml-auto">
                    <span>{{ $post->created_at->format('d M, Y') }}</span>
                </div>
            </div>
        </div>
    </a>
</div> --}}

{{-- @props(['post'])

<div
    class="group overflow-hidden transition-all duration-300 hover:scale-105 max-w-[370px] max-h-[500px] flex flex-col">
    <a href="{{ route('post.show', $post->slug) }}" class="flex flex-col h-full">
        <div class="mt-4">
            <div class="aspect-video overflow-hidden w-full">
                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}"
                    class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
            </div>
        </div>
        <div class="px-6 pb-6 flex-1 flex flex-col justify-between">
            <div>
                <div class="flex items-center gap-2 mb-3 mt-4">
                    <span
                        class="px-2 py-0.5 bg-card-primary text-xs text-text-secondary transition-colors duration-300 group-hover:text-primary">
                        {{ $post->category->name }}
                    </span>
                    <span class="flex items-center gap-1 ml-auto text-xs text-text-secondary">
                        {{ $post->read_time . ' min read' ?? '5 min read' }}
                    </span>
                </div>
                <h3 class="font-bold text-lg mb-2 line-clamp-2 transition-colors duration-300 group-hover:text-[var(--color-secondary)]">
                    {{ Str::limit($post->title, 60, '...') }}
                </h3>
                <p class="text-text-secondary text-sm line-clamp-3 mb-4">
                    {{ Str::limit($post->excerpt, 200, '...') }}
                </p>
            </div>
            <div class="flex items-center gap-4 text-xs text-text-secondary">
                <div class="flex items-center gap-1 ml-auto">
                    <span>{{ $post->created_at->format('d M, Y') }}</span>
                </div>
            </div>
        </div>
    </a>
</div> --}}

@props(['post'])

<div class="group overflow-hidden transition-all duration-300 hover:scale-105 max-w-[370px] max-h-[370px] flex flex-col">
    <a href="{{ route('post.show', $post->slug) }}" class="flex flex-col h-full">

        <div class="mt-4 relative">
            <div class="aspect-video overflow-hidden w-full relative">
                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}"
                    class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">

                <span class="absolute top-2 left-2 px-2 py-1 bg-black/50 text-primary text-xs font-semibold rounded">
                    {{ $post->category->name }}
                </span>

                <div class="absolute inset-x-0 bottom-0 p-4 bg-white/30 dark:bg-black/50">
                    <h3
                        class="font-bold text-xl mb-2 text-text dark:text-white transition-colors duration-300 group-hover:text-[var(--color-secondary)]">
                        {{ Str::limit($post->title, 60, '...') }}
                    </h3>
                </div>

            </div>
        </div>

        <div class="px-6 pb-6 flex-1 flex flex-col justify-between mt-4">
            <div>
                <div class="flex items-center gap-2 mb-3">
                    <span class="flex items-center gap-1 text-xs text-text-secondary">
                        {{ $post->read_time . ' min read' ?? '5 min read' }}
                    </span>
                </div>
                <p class="text-text-secondary text-sm line-clamp-3 mb-4">
                    {{ Str::limit($post->excerpt, 200, '...') }}
                </p>
            </div>
            <div class="flex items-center gap-4 text-xs text-text-secondary">
                <div class="flex items-center gap-1 ml-auto">
                    <span>{{ $post->created_at->format('d M, Y') }}</span>
                </div>
            </div>
        </div>
    </a>
</div>

@props(['post'])

<div class="group transition-transform duration-300 hover:scale-105">
    <a href="{{ route('post.show', $post->slug) }}" class="flex flex-col md:flex-row items-center">
        <div class="w-full md:w-64 shrink-0 flex flex-col items-center">
            <span
                class="mb-2 self-start px-2 py-0.5 text-[11px] font-medium rounded 
           bg-white/30 border border-primary text-primary 
           transition-colors duration-300 group-hover:bg-primary">
                {{ $post->category->name }}
            </span>
            <div class="w-full h-48 md:h-auto overflow-hidden flex items-center justify-center">
                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}"
                    class="w-full h-2/3">
            </div>
        </div>
        <div class="flex-1 p-6">
            <h3
                class="font-bold text-2xl mb-2 text-text transition-colors duration-300 group-hover:text-[var(--color-secondary)]">
                {{ Str::limit($post->title, 100, '...') }}
            </h3>

            <p class="text-text-secondary text-sm mt-1 text-justify">
                {{ Str::limit($post->excerpt, 300, '...') }}
            </p>
            <div class="mt-4 flex items-center gap-4 text-xs text-text-secondary">
                <div class="flex items-center gap-1 ml-auto">
                    <span>{{ $post->created_at->format('d M, Y') }}</span>
                </div>
            </div>
        </div>
    </a>
</div>

<aside class="space-y-6">

    <!-- Categories -->
    <div class="bg-card text-text p-4 rounded-lg">
        <a href="{{ route('allcategory') }}" class="text-base text-primary font-medium hover:underline">
            <h3 class="font-semibold mb-8 text-secondary">Categories</h3>
        </a>
        <div class="space-y-4">
            @foreach ($categories as $cat)
                <a href="{{ route('category.show', $cat->slug) }}" class="flex gap-3 group p-2 hover:bg-primary/10">
                    <div class="min-w-0">
                        <h4
                            class="text-sm font-medium line-clamp-2 text-text transition-colors duration-300 group-hover:text-[var(--color-primary-hover)]">
                            {{ Str::limit($cat->name, 60, '...') }}
                        </h4>
                    </div>

                    <span
                        class="ml-auto text-xs text-text-secondary transition-colors duration-300 group-hover:text-[var(--color-primary-hover)]
                        border-[var(--color-secondary)] text-[var(--color-secondary)] 
                        bg-white/50 hover:bg-[var(--color-secondary)]/10 backdrop-blur-sm transition-transform duration-300 hover:scale-105 rounded-lg border font-semibold px-2 py-0.5">
                        {{ $cat->posts_count ?? 0 }}
                    </span>
                </a>
            @endforeach
        </div>
        {{-- <div class="mt-2 text-right">
            <a href="{{ route('allcategory') }}" class="text-sm text-primary font-medium hover:underline">
                See All
            </a>
        </div> --}}
    </div>

    <!-- Popular Posts -->
    <div class="bg-card text-text p-4 rounded-lg">
        <a href="{{ route('posts.featured') }}" class="text-base text-primary font-medium hover:underline">
            <h3 class="font-semibold mb-8 text-secondary">Popular Posts</h3>
        </a>
        <div class="space-y-4">
            @foreach ($popular as $p)
                <x-post-small-card :post="$p" overlay="true" img-height="h-24" />
            @endforeach
        </div>
    </div>



</aside>

@props(['category'])

<a href="{{ route('category.show', $category->slug) }}"
    class="group relative block overflow-hidden rounded-3xl shadow-xl transform transition duration-500 hover:scale-105 hover:shadow-2xl">

    @if ($category->thumbnail)
        <img src="{{ asset('storage/' . $category->thumbnail) }}" alt="{{ $category->name }}"
            class="w-full h-64 sm:h-72 md:h-80 object-cover transition-transform duration-500 group-hover:scale-110">
    @else
        <div
            class="w-full h-64 sm:h-72 md:h-80 bg-gradient-to-br from-purple-400 via-pink-400 to-yellow-300 flex items-center justify-center text-white font-bold text-xl">
            {{ $category->name }}
        </div>
    @endif

    <div
        class="absolute bottom-0 w-full bg-gradient-to-t from-black/70 via-black/20 to-transparent p-5 backdrop-blur-sm">
        <h3 class="text-xl font-bold text-white group-hover:text-primary transition">{{ $category->name }}</h3>
        @if ($category->description)
            <p class="text-sm text-white/80 mt-1 line-clamp-2">{{ $category->description }}</p>
        @endif
    </div>
</a>

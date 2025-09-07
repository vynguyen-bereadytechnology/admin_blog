@props(['post', 'imgHeight' => 'h-44'])

<a href="{{ route('post.show', $post->slug) }}" 
   class="group block relative overflow-hidden rounded-lg">

    <img src="{{ $post->thumbnail ? asset('storage/' . $post->thumbnail) : asset('images/default-thumbnail.jpg') }}"
         alt="{{ $post->title }}"
         class="w-full {{ $imgHeight }} object-cover transition-transform duration-300 group-hover:scale-110 rounded-md">

    <div class="absolute inset-0 flex flex-col justify-end p-3 bg-black/30">
        <h3 class="text-white text-sm font-medium line-clamp-2">
            {{ $post->title }}
        </h3>
        <p class="text-xs text-white/80 mt-1">
            {{ $post->created_at->format('d M, Y') }}
        </p>
    </div>
</a>

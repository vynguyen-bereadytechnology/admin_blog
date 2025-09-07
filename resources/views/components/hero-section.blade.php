@props([
    'title' => 'Default Title',
    'subtitle' => '',
    'image' => 'images/default-bg.png'
])

<section class="relative h-[60vh] min-h-[400px] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-cover bg-center" style="background-image:url('{{ asset($image) }}')">
        <div class="absolute inset-0 bg-gradient-to-r from-white/50 via-white/50 to-white/50"></div>
    </div>
    <div class="relative z-10 text-center max-w-3xl mx-auto px-4 font-sans">
        <h1 class="text-4xl md:text-5xl font-extrabold mb-4 text-secondary drop-shadow-lg font-serif">
            {{ $title }}
        </h1>
        <p class="text-lg md:text-lg mb-6 text-black/80 drop-shadow-sm">
            {{ $subtitle }}
        </p>

        @isset($slot)
            <div class="mt-6">
                {{ $slot }}
            </div>
        @endisset
    </div>
</section>

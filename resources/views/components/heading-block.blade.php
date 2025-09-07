<div class="post-section mb-6 text-center lg:text-left">
    <h2 class="text-3xl font-extrabold text-secondary text-primary-hover mb-2">
        {{ $title }}
    </h2>

    @isset($description)
        <p class="text-sm text-text-secondary">{!! $description !!}</p>
    @endisset

    <div class="w-24 h-1 bg-primary mt-2 rounded-full mx-auto lg:mx-0"></div>
</div>

<footer class="bg-card text-text mt-10">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="grid md:grid-cols-3 gap-8">

            <!-- Logo & Description -->
            <div>
                <a href="{{ route('home') }}">
                    <div class="flex items-center gap-2 font-semibold text-primary mb-3">
                        <img src="{{ asset('destination.png') }}" class="w-6 h-6" alt="">
                        <span>Travel Blog</span>
                    </div>
                </a>
                <p class="text-sm text-text-secondary">Stories, guides and inspiration for your next adventure.</p>
            </div>

            <!-- Categories -->
            <div>
                <a href="{{ route('allcategory') }}" class="text-sm text-primary font-medium hover:underline">
                    <h4 class="text-primary font-semibold mb-3">Categories</h4>
                </a>
                <ul class="space-y-2 text-sm">
                    @foreach (collect($categories)->take(6) as $cat)
                        <li>
                            <a href="{{ route('category.show', $cat->slug) }}"
                                class="hover:text-primary-hover hover:underline transition-all duration-200">
                                {{ $cat->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Travel Highlights -->
            <div>
                <h4 class="text-primary font-semibold mb-3">Travel Highlights</h4>
                <p class="text-sm text-text-secondary mb-2">Explore snapshots from our adventures.</p>

                <div class="grid grid-cols-3 gap-2 md:grid-cols-4 lg:grid-cols-5">
                    @foreach (collect($categories)->shuffle()->take(3) as $cat)
                        <a href="{{ route('category.show', $cat->slug) }}">
                            <img src="{{ asset('storage/' . $cat->thumbnail) }}"
                                class="w-24 h-44 object-cover rounded-lg transform hover:scale-105 hover:rotate-3 transition-all duration-300">
                        </a>
                    @endforeach
                </div>
            </div>

        </div>

        <!-- Copyright -->
        <div class="border-t border-text/10 mt-8 pt-6 text-xs text-text-secondary">
            &copy; {{ date('Y') }} Travel Blog. All rights reserved.
        </div>
    </div>
</footer>

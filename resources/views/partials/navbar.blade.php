<header class="bg-card/90 backdrop-blur border-b border-theme/30 sticky top-0 z-50">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="h-16 flex items-center justify-between gap-4">

            <!-- Logo -->
            <a href="{{ route('home') }}"
                class="flex items-center gap-2 font-bold text-xl text-primary text-primary-hover transition-colors duration-300">
                <img src="{{ asset('destination.png') }}" alt="Travel Blog Logo" class="w-6 h-6">
                <span>Travel Blog</span>
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex items-center gap-6 text-sm font-bold font-semibold text-[15px]">
                <a href="{{ route('home') }}"
                    class="text-secondary text-primary-hover transition-colors duration-300 ">
                    Home
                </a>
                <a href="{{ route('allcategory') }}"
                    class="text-secondary text-primary-hover transition-colors duration-300 ">
                    Categories
                </a>

            </nav>

            <!-- Search & Theme Toggle -->
            <div class="flex items-center gap-4">
                <!-- Search -->
                <form action="{{ route('posts.search') }}" method="GET" class="hidden md:block">
                    <div class="flex w-64 items-center rounded-lg border border-theme bg-card overflow-hidden">
                        <input type="search" name="q" placeholder="Search..."
                            class="flex-1 bg-card py-2 px-3 text-sm text-text placeholder:text-text-secondary focus:outline-none" />
                        <button type="submit"
                            class="px-3 py-2 text-text-secondary hover:text-primary text-primary-hover transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 13.65z" />
                            </svg>
                        </button>
                    </div>
                </form>

                <!-- Theme Toggle Button -->
                <button id="theme-toggle"
                    class="p-2 rounded-lg text-primary hover:bg-primary-hover hover:text-card transition-colors">
                    <!-- Moon -->
                    <svg id="moon-icon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z">
                        </path>
                    </svg>

                    <!-- Sun -->
                    <svg id="sun-icon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z">
                        </path>
                    </svg>
                </button>

                <!-- Mobile Menu Toggle -->
                <button id="mobile-menu-button"
                    class="md:hidden p-2 rounded-lg text-text-secondary hover:bg-card transition-colors">
                    <svg id="menu-icon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg id="close-icon" class="w-6 h-6 hidden" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden hidden mt-2 border-t border-theme py-4">
            <div class="flex flex-col gap-4 px-4">
                <!-- Home link -->
                <a href="{{ route('home') }}"
                    class="text-secondary font-semibold transition-colors duration-300 py-2 hover:text-primary">
                    Home
                </a>

                <!-- Categories (copy y hệt desktop) -->
                <a href="{{ route('allcategory') }}"
                    class="text-secondary font-semibold transition-colors duration-300 py-2 hover:text-primary">
                    Categories </a>

                <!-- Search -->
                <form action="{{ route('posts.search') }}" method="GET" class="mt-4 w-full">
                    <div
                        class="flex w-64 md:w-full items-center rounded-lg border border-theme bg-card overflow-hidden">
                        <input type="search" name="q" placeholder="Search..."
                            class="flex-1 bg-card py-2 px-3 text-sm text-text placeholder:text-text-secondary focus:outline-none" />
                        <button type="submit"
                            class="px-3 py-2 text-text-secondary hover:text-primary transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 13.65z" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    </div>
</header>

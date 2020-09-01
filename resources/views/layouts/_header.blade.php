<header id="nav-menu"
    class="md:ml-16 w-64 h-full fixed top-0 left-0 z-50 md:z-10 bg-mirage-500 md:border-l border-r border-gray-600 transform -translate-x-full md:transform-none">
    <div class="py-2 px-4 md:hidden flex justify-between items-center">
        <h2 class="text-white text-xl font-semibold">{{ __('messages.account_info') }}</h2>

        <button id="nav-menu-close-btn"
            class="p-2 -mr-2 text-blue-500 hover:bg-blue-500 hover:bg-opacity-25 focus:outline-none focus:shadow-outline rounded-full">
            <svg class="w-6 h-6 fill-current" viewBox="0 0 20 20">
                <path
                    d="M10 8.586L2.929 1.515 1.515 2.929 8.586 10l-7.071 7.071 1.414 1.414L10 11.414l7.071 7.071 1.414-1.414L11.414 10l7.071-7.071-1.414-1.414L10 8.586z" />
            </svg>
        </button>
    </div>

    <section class="py-3 px-4 border-t md:border-t-0 border-gray-600">
        <div>
            <a class="inline-block hover:shadow-outline focus:outline-none focus:shadow-outline rounded-full"
                href="{{ route('profile', auth()->user()->username) }}">
                <img class="w-12 h-12 inline-block rounded-full"
                    src="https://i.pravatar.cc/48?img={{ auth()->user()->id }}">
            </a>
        </div>

        <div class="mt-2">
            <a class="inline-block group focus:outline-none focus:shadow-outline"
                href="{{ route('profile', auth()->user()->username) }}">
                <p class="text-white font-bold group-hover:underline">
                    {{ auth()->user()->name }}</p>
                <p class="text-gray-500 group-hover:underline">
                    {{ '@' . auth()->user()->username }}</p>
            </a>
        </div>

        <div class="mt-2">
            <a class="inline-block text-white hover:underline focus:outline-none focus:shadow-outline"
                href="{{ route('profile.following', auth()->user()->username) }}">
                <span class="text-white font-bold">{{ auth()->user()->following_count }}</span> <span
                    class="text-gray-500">{{ __('messages.following') }}</span>
            </a>

            <a class="ml-4 inline-block text-white hover:underline focus:outline-none focus:shadow-outline"
                href="{{ route('profile.followers', auth()->user()->username) }}">
                <span class="text-white font-bold">{{ auth()->user()->followers_count }}</span> <span
                    class="text-gray-500">{{ __('messages.followers') }}</span>
            </a>
        </div>
    </section>

    <nav class="py-3 px-4 border-t border-gray-600">
        <div>
            <a class="-ml-3 inline-block group focus:outline-none focus:shadow-outline rounded-full"
                href="{{ route('home') }}">
                <div class="py-2 px-3 inline-flex items-center
                {{ Route::currentRouteName() === 'home' ? 'text-blue-500' : 'text-white' }}
                group-hover:bg-blue-500 group-hover:bg-opacity-25 group-hover:text-blue-500 rounded-full">
                    <svg class="w-6 h-6 fill-current" viewBox="0 0 20 20">
                        <path d="M8 20H3V10H0L10 0l10 10h-3v10h-5v-6H8v6z" />
                    </svg>

                    <span class="ml-4 text-xl font-semibold">{{ __('messages.home') }}</span>
                </div>
            </a>
        </div>

        <div class="mt-2">
            <a class="-ml-3 inline-block group focus:outline-none focus:shadow-outline rounded-full"
                href="{{ route('explore') }}">
                <div class="py-2 px-3 inline-flex items-center
                {{ Route::currentRouteName() === 'explore' ? 'text-blue-500' : 'text-white' }}
                group-hover:bg-blue-500 group-hover:bg-opacity-25 group-hover:text-blue-500 rounded-full">
                    <svg class="w-6 h-6 fill-current" viewBox="0 0 20 20">
                        <path
                            d="M10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20zM7.88 7.88l-3.54 7.78 7.78-3.54 3.54-7.78-7.78 3.54zM10 11a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                    </svg>

                    <span class="ml-4 text-xl font-semibold">{{ __('messages.explore') }}</span>
                </div>
            </a>
        </div>

        <div class="mt-2">
            <a class="-ml-3 inline-block group focus:outline-none focus:shadow-outline rounded-full"
                href="{{ route('profile', auth()->user()->username) }}">
                <div class="py-2 px-3 inline-flex items-center
                {{ isset($user) && auth()->user()->is($user) && Route::currentRouteName() === 'profile' ? 'text-blue-500' : 'text-white' }}
                group-hover:bg-blue-500 group-hover:bg-opacity-25 group-hover:text-blue-500 rounded-full">
                    <svg class="w-6 h-6 fill-current" viewBox="0 0 20 20">
                        <path
                            d="M5 5a5 5 0 0 1 10 0v2A5 5 0 0 1 5 7V5zM0 16.68A19.9 19.9 0 0 1 10 14c3.64 0 7.06.97 10 2.68V20H0v-3.32z" />
                    </svg>

                    <span class="ml-4 text-xl font-semibold">{{ __('messages.profile') }}</span>
                </div>
            </a>
        </div>
    </nav>

    <div class="py-3 px-4 border-t border-gray-600">
        <a class="-ml-3 inline-block group focus:outline-none focus:shadow-outline rounded-full"
            href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <div
                class="py-2 px-3 inline-flex items-center text-white group-hover:bg-blue-500 group-hover:bg-opacity-25 group-hover:text-blue-500 rounded-full">
                <span class="text-xl font-semibold">{{ __('messages.log_out') }}</span>
            </div>
        </a>

        <form id="logout-form" class="hidden" method="POST" action="{{ route('logout') }}">
            @csrf
        </form>
    </div>
</header>

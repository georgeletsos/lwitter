<article class="py-3 px-4 flex {{ isset($noBorderTop) ? '' : 'border-t border-gray-600'}}">
    <div class="flex-shrink-0">
        <a class="inline-block hover:shadow-outline focus:outline-none focus:shadow-outline rounded-full"
            href="{{ route('profile', $tweet->user->username) }}">
            <img class="w-12 h-12 rounded-full" src="https://i.pravatar.cc/48?img={{ $tweet->user->id }}">
        </a>
    </div>

    <div class="ml-4 flex-grow">
        <a class="inline-block group focus:outline-none focus:shadow-outline"
            href="{{ route('profile', $tweet->user->username) }}">
            <p class="text-white font-bold group-hover:underline">
                {{ $tweet->user->name }}</p>
            <p class="text-gray-500 group-hover:underline">
                {{ '@' . $tweet->user->username }}</p>
        </a>

        <p class="mt-2 text-white">{{ $tweet->body }}</p>

        <div class="mt-2 flex">
            <div>
                @include('tweets._like-btn', ['tweet' => $tweet])
            </div>

            <div class="ml-2">
                @include('tweets._dislike-btn', ['tweet' => $tweet])
            </div>
        </div>
    </div>
</article>
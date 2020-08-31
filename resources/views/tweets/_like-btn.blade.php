<form method="POST" action="{{ route('tweet.like', $tweet->id) }}">
    @csrf

    @if ($tweet->isLikedBy(auth()->user()))
    @method('DELETE')
    @endif

    <button class="py-2 px-3 -ml-3 flex items-center bg-mirage-500
        {{ $tweet->isLikedBy(auth()->user()) ? 'text-blue-500' : 'text-gray-500' }}
        hover:bg-blue-500 hover:bg-opacity-25 hover:text-blue-500 focus:outline-none focus:shadow-outline rounded-full"
        type="submit">
        <svg class="w-5 h-5 fill-current transform scale-x-neg-1" viewBox="0 0 20 20">
            <path
                d="M11 0h1v3l3 7v8a2 2 0 0 1-2 2H5c-1.1 0-2.31-.84-2.7-1.88L0 12v-2a2 2 0 0 1 2-2h7V2a2 2 0 0 1 2-2zm6 10h3v10h-3V10z" />
        </svg>
        <span class="ml-2 text-sm">{{ $tweet->likes_count }}</span>
    </button>
</form>

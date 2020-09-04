<form method="POST" action="{{ route('tweet.dislike', $tweet->id) }}">
    @csrf

    @if ($tweet->isDislikedBy(auth()->user()))
    @method('DELETE')
    @endif

    <button class="py-2 px-3 flex items-center
        {{ $tweet->isDislikedBy(auth()->user()) ? 'text-red-500' : 'text-gray-500' }}
        hover:bg-red-500 hover:bg-opacity-25 hover:text-red-500 focus:outline-none focus:shadow-outline rounded-full"
        type="submit">
        <svg class="w-5 h-5 fill-current transform scale-x-neg-1" viewBox="0 0 20 20">
            <path
                d="M11 20a2 2 0 0 1-2-2v-6H2a2 2 0 0 1-2-2V8l2.3-6.12A3.11 3.11 0 0 1 5 0h8a2 2 0 0 1 2 2v8l-3 7v3h-1zm6-10V0h3v10h-3z" />
        </svg>
        <span class="ml-2 text-sm">{{ $tweet->dislikes_count }}</span>
    </button>
</form>

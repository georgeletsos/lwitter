<article class="py-3 px-4 flex {{ isset($noBorderTop) ? '' : 'border-t border-gray-600'}}">
    <div class="flex-shrink-0">
        <a class="inline-block hover:shadow-outline focus:outline-none focus:shadow-outline rounded-full"
            href="{{ route('profile', $user->username) }}">
            <img class="w-12 h-12 rounded-full" src="https://i.pravatar.cc/48?img={{ $user->id }}">
        </a>
    </div>

    <div class="px-1 ml-3 flex-grow overflow-hidden flex justify-between items-center">
        <a class="inline-block overflow-hidden group focus:outline-none focus:shadow-outline"
            href="{{ route('profile', $user->username) }}">
            <p class="text-white font-bold truncate group-hover:underline">
                {{ $user->name }}</p>
            <p class="text-gray-500 group-hover:underline">
                {{ '@' . $user->username }}</p>
        </a>

        <div class="ml-4">
            @if (auth()->user()->isFollowing($user))
            @include('profiles._unfollow-btn', ['user' => $user])
            @elseif (!auth()->user()->is($user))
            @include('profiles._follow-btn', ['user' => $user])
            @endif
        </div>
    </div>
</article>
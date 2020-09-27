@extends('layouts.master')

@section('title', $user->name . ' (@' . $user->username . ')')

@section('heading', $user->name)

@section('heading-content')
    @include('layouts._heading')
@endsection

@section('content')
    <section class="border-b border-gray-600">
        <div class="w-full h-32 bg-gray-700"></div>

        <div class="py-3 px-4">
            <div class="flex justify-between items-center">
                <div class="p-1 -mt-12 bg-mirage-500 rounded-full">
                    <img class="w-20 h-20 rounded-full" src="https://i.pravatar.cc/80?img={{ $user->id }}">
                </div>

                @if (auth()
            ->user()
            ->is($user))
                    <a href="{{ route('profile.edit', $user->username) }}" class="btn">{{ __('messages.edit_profile') }}</a>
                @elseif (auth()->user()->isFollowing($user))
                    @include('profiles._unfollow-btn', ['user' => $user])
                @else
                    @include('profiles._follow-btn', ['user' => $user])
                @endif
            </div>

            <div class="mt-2">
                <p class="text-white text-xl font-semibold">{{ $user->name }}</p>

                <p class="text-gray-500">{{ '@' . $user->username }}</p>

                <div class="mt-1 text-gray-500 flex items-center">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                        <path
                            d="M1 4c0-1.1.9-2 2-2h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4zm2 2v12h14V6H3zm2-6h2v2H5V0zm8 0h2v2h-2V0zM5 9h2v2H5V9zm0 4h2v2H5v-2zm4-4h2v2H9V9zm0 4h2v2H9v-2zm4-4h2v2h-2V9zm0 4h2v2h-2v-2z" />
                    </svg>

                    <span class="ml-2">{{ __('messages.joined') . ' ' . $user->created_at->format('M Y') }}</span>
                </div>
            </div>

            <div class="mt-2">
                <a class="inline-block text-white hover:underline focus:outline-none focus:shadow-outline"
                    href="{{ route('profile.following', $user->username) }}">
                    <span class="text-white font-bold">{{ $user->following_count }}</span> <span
                        class="text-gray-500">{{ __('messages.following') }}</span>
                </a>

                <a class="ml-4 inline-block text-white hover:underline focus:outline-none focus:shadow-outline"
                    href="{{ route('profile.followers', $user->username) }}">
                    <span class="text-white font-bold">{{ $user->followers_count }}</span> <span
                        class="text-gray-500">{{ __('messages.followers') }}</span>
                </a>
            </div>
        </div>
    </section>

    <section class="divide-y divide-gray-600">
        @forelse ($tweets as $tweet)
            @include('tweets._tweet', ['tweet' => $tweet, 'user' => $user])
        @empty
            <p class="py-3 px-4 text-white">{{ __('messages.no_tweets_yet') }}</p>
        @endforelse
    </section>

    {{ $tweets->links() }}
@endsection

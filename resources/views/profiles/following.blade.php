@extends('layouts.master')

@section('title', __('messages.people_followed_by') . ' ' . $user->name . ' (@' . $user->username . ')')

@section('heading', $user->name)

@section('heading-content')
    @include('layouts._heading')

    <nav class="border-b-2 border-gray-600" role="navigation">
        <ul class="bg-mirage-500 flex">
            <li class="mb-px w-1/2">
                <span class="tab-item active cursor-pointer">{{ __('messages.following') }}</span>
            </li>
            <li class="w-1/2">
                <a class="tab-item"
                    href="{{ route('profile.followers', $user->username) }}">{{ __('messages.followers') }}</a>
            </li>
        </ul>
    </nav>
@endsection

@section('content')
    <section class="divide-y divide-gray-600">
        @forelse ($following as $followingUser)
            @include('profiles._follower', ['user' => $followingUser])
        @empty
            <p class="py-3 px-4 text-white text-center">{{ __('messages.no_following_yet') }}</p>
        @endforelse
    </section>

    {{ $following->links() }}
@endsection

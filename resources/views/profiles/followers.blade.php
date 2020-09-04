@extends('layouts.master')

@section('title', __('messages.people_following') . ' ' . $user->name . ' (@' . $user->username .')')

@section('heading', $user->name)

@section('heading-content')
@include('layouts._heading')

<nav class="border-b-2 border-gray-600" role="navigation">
    <ul class="bg-mirage-500 flex">
        <li class="w-1/2">
            <a class="tab-item"
                href="{{ route('profile.following', $user->username) }}">{{ __('messages.following') }}</a>
        </li>
        <li class="mb-px w-1/2">
            <span class="tab-item active cursor-pointer">{{ __('messages.followers') }}</span>
        </li>
    </ul>
</nav>
@endsection

@section('content')
<section>
    @forelse ($followers as $follower)
    @if ($loop->first)
    @include('profiles._follower', ['user' => $follower, 'noBorderTop' => true])
    @else
    @include('profiles._follower', ['user' => $follower])
    @endif
    @empty
    <p class="py-3 px-4 text-white text-center border-t border-gray-600">{{ __('messages.no_followers_yet') }}</p>
    @endforelse

    {{ $followers->links() }}
</section>
@endsection

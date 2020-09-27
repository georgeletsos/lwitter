@extends('layouts.master')

@section('title', __('messages.explore'))

@section('heading', __('messages.explore'))

@section('heading-content')
    @include('layouts._heading')
@endsection

@section('content')
    <section class="divide-y divide-gray-600">
        @forelse ($tweets as $tweet)
            @include('tweets._tweet', ['tweet' => $tweet])
        @empty
            <p class="py-3 px-4 text-white">{{ __('messages.nothing_new_is_going_on') }}</p>
        @endforelse
    </section>

    {{ $tweets->links() }}
@endsection

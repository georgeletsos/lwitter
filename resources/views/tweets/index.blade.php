@extends('layouts.master')

@section('title', __('messages.home'))

@section('heading', __('messages.home'))

@section('heading-content')
    @include('layouts._heading')
@endsection

@section('content')
    <section class="divide-y divide-gray-600">
        @include('tweets._publish-tweet-panel')

        @forelse ($tweets as $tweet)
            @include('tweets._tweet', ['tweet' => $tweet])
        @empty
            <p class="py-3 px-4 text-white">{{ __('messages.no_tweets_yet') }}!</p>
        @endforelse
    </section>

    {{ $tweets->links() }}
@endsection

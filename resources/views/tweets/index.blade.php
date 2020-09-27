@extends('layouts.master')

@section('title', __('messages.home'))

@section('heading', __('messages.home'))

@section('heading-content')
    @include('layouts._heading')
@endsection

@section('content')
    <section>
        @include('tweets._publish-tweet-panel')

        @forelse ($tweets as $tweet)
            @include('tweets._tweet', ['tweet' => $tweet])
        @empty
            <p class="py-3 px-4 text-white border-t border-gray-600">{{ __('messages.no_tweets_yet') }}!</p>
        @endforelse

        {{ $tweets->links() }}
    </section>
@endsection

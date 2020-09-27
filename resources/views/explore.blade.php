@extends('layouts.master')

@section('title', __('messages.explore'))

@section('heading', __('messages.explore'))

@section('heading-content')
    @include('layouts._heading')
@endsection

@section('content')
    <section>
        @forelse ($tweets as $tweet)
            @if ($loop->first)
                @include('tweets._tweet', ['tweet' => $tweet, 'noBorderTop' => true])
            @else
                @include('tweets._tweet', ['tweet' => $tweet])
            @endif
        @empty
            <p class="py-3 px-4 text-white border-t border-gray-600">{{ __('messages.nothing_new_is_going_on') }}</p>
        @endforelse

        {{ $tweets->links() }}
    </section>
@endsection

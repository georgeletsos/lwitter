@extends('layouts.master')

@section('title', __('messages.edit_profile'))

@section('heading', __('messages.edit_profile'))

@section('heading-content')
    @include('layouts._heading')
@endsection

@section('content')
    <section>
        <div class="w-full h-32 bg-gray-700"></div>

        <div class="py-3 px-4">
            <div class="p-1 -mt-12 bg-mirage-500 inline-block rounded-full">
                <img class="w-20 h-20 rounded-full" src="https://i.pravatar.cc/80?img={{ $user->id }}">
            </div>
        </div>

        <form class="pb-3 px-4" method="POST" action="{{ route('profile.update', $user->username) }}">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="name" class="block">{{ __('messages.name') }}</label>

                <input id="name" class="form-control" type="text" name="name"
                    placeholder="{{ __('messages.add_your_name') }}" value="{{ $user->name }}" required autocomplete="name"
                    autofocus>
            </div>

            @error('name')
            <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
            @enderror

            <div class="mt-4 form-group">
                <label for="username"
                    class="block">{{ __('messages.username') . ' (@' . __('messages.username') . ')' }}</label>

                <input id="username" class="form-control" type="text" name="username"
                    placeholder="{{ __('messages.choose_your_username') }}" value="{{ $user->username }}" required>
            </div>

            @error('username')
            <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
            @enderror

            <div class="mt-4 form-group">
                <label for="email" class="block">{{ __('messages.email') }}</label>

                <input id="email" class="form-control" type="email" name="email"
                    placeholder="{{ __('messages.add_your_email') }}" value="{{ $user->email }}" required
                    autocomplete="email">
            </div>

            @error('email')
            <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
            @enderror

            <div class="mt-4 form-group">
                <label for="password" class="block">{{ __('messages.new_password') }}</label>

                <input id="password" class="form-control" type="password" name="password" autocomplete="new-password">
            </div>

            @error('password')
            <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
            @enderror

            <div class="mt-4 form-group">
                <label for="password-confirm" class="block">{{ __('messages.confirm_password') }}</label>

                <input id="password-confirm" class="form-control" type="password" name="password_confirmation"
                    autocomplete="new-password">
            </div>

            <button
                class="mt-3 md:mt-4 mr-4 md:mr-0 btn fixed md:relative top-0 right-0 z-10 transform md:transform-none -translate-y-px"
                type="submit">{{ __('messages.save') }}</button>
        </form>
    </section>
@endsection

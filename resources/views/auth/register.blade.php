@extends('layouts.auth')

@section('title', __('messages.sign_up'))

@section('content')
    <div class="flex justify-center text-white">
        <svg class="w-12 h-12 fill-current" viewBox="0 0 20 20">
            <path
                d="M19.9554745,3.91978102 C19.2212409,4.24540146 18.4321898,4.46547445 17.6040146,4.56445255 C18.4493431,4.05773723 19.0984672,3.25540146 19.4041606,2.29941606 C18.6131387,2.76854015 17.7369343,3.10927007 16.8043796,3.29291971 C16.0575182,2.49722628 14.9935036,2 13.8159854,2 C11.5548905,2 9.72175182,3.83306569 9.72175182,6.0940146 C9.72175182,6.41489051 9.7580292,6.72737226 9.82781022,7.0270073 C6.42518248,6.85627737 3.40846715,5.22635036 1.38919708,2.74941606 C1.03678832,3.35408759 0.834890511,4.05737226 0.834890511,4.80766423 C0.834890511,6.2280292 1.55773723,7.48116788 2.65627737,8.21532847 C1.98510949,8.19408759 1.35386861,8.00992701 0.801824818,7.70328467 C0.801532847,7.72036496 0.801532847,7.73751825 0.801532847,7.75474453 C0.801532847,9.73839416 2.21277372,11.3931387 4.08569343,11.7691971 C3.74211679,11.8627737 3.38043796,11.9127737 3.0070073,11.9127737 C2.74321168,11.9127737 2.48671533,11.8871533 2.23678832,11.8393431 C2.75773723,13.4659124 4.26970803,14.649562 6.06124088,14.6826277 C4.66007299,15.7806569 2.89474453,16.4351825 0.976642336,16.4351825 C0.64620438,16.4351825 0.320291971,16.4158394 0,16.3780292 C1.81182482,17.539635 3.96386861,18.2173723 6.27591241,18.2173723 C13.8064234,18.2173723 17.9243796,11.9789051 17.9243796,6.56875912 C17.9243796,6.39124088 17.920438,6.21467153 17.9125547,6.03912409 C18.7124088,5.46189781 19.4065693,4.74080292 19.9554745,3.91978102">
            </path>
        </svg>
    </div>

    <p class="mt-4 text-xl text-white font-semibold">{{ __('messages.create_your_account_for') . ' ' . config('app.name') }}
    </p>

    <form class="mt-4 w-full" method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group">
            <label for="name" class="block">{{ __('messages.name') }}</label>

            <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required
                autocomplete="name" autofocus>
        </div>

        @error('name')
        <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
        @enderror

        <div class="mt-4 form-group">
            <label for="username"
                class="block">{{ __('messages.username') . ' (@' . __('messages.username') . ')' }}</label>

            <input id="username" class="form-control" type="text" name="username" value="{{ old('username') }}" required>
        </div>

        @error('username')
        <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
        @enderror

        <div class="mt-4 form-group">
            <label for="email" class="block">{{ __('messages.email') }}</label>

            <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required
                autocomplete="email">
        </div>

        @error('email')
        <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
        @enderror

        <div class="mt-4 form-group">
            <label for="password" class="block">{{ __('messages.password') }}</label>

            <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password">
        </div>

        @error('password')
        <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
        @enderror

        <div class="mt-4 form-group">
            <label for="password-confirm" class="block">{{ __('messages.confirm_password') }}</label>

            <input id="password-confirm" class="form-control" type="password" name="password_confirmation" required
                autocomplete="new-password">
        </div>

        <button class="mt-4 btn" type="submit">{{ __('messages.sign_up') }}</button>
    </form>
@endsection

<form method="POST" action="{{ route('profile.follow', $user->username)}}">
    @csrf

    <button type="submit" class="btn">{{ __('messages.follow') }}</button>
</form>

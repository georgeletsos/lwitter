<form method="POST" action="{{ route('profile.unfollow', $user->username) }}">
    @csrf
    @method('DELETE')

    <button type="submit" class="btn btn-red">{{ __('messages.unfollow') }}</button>
</form>

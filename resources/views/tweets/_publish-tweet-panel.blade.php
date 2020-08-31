<div class="py-3 px-4">
    <form class="ml-16" method="POST" action="{{ route('tweets') }}">
        @csrf

        <textarea
            class="w-full h-16 bg-mirage-500 placeholder-gray-500 focus:placeholder-gray-400 text-white text-xl focus:outline-none resize-none"
            name="body" placeholder="{{ __('messages.whats_happening') }}" autofocus></textarea>

        @error('body')
        <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror

        <div class="mt-1 flex justify-end">
            <button type="submit" class="btn btn-lg btn-blue border-0">{{ __('messages.tweet') }}</button>
        </div>
    </form>
</div>

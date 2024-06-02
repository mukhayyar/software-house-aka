<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile photo.") }}
        </p>
    </header>
    <form method="POST" action="{{ route('profile.photo.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- Profile Photo -->
        <div class="mt-4">
            <x-input-label for="photo" :value="__('Profile Photo')" />
            <div class="flex items-center mt-2">
                <img src="{{ Auth::user()->avatar() }}" alt="{{ Auth::user()->name }}" class="w-20 h-20 rounded-full mr-4">
            </div>
            <input type="file" name="photo" id="photo" class="block mt-1 w-full">
            <x-input-error :messages="$errors->get('photo')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4 mt-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('User Avatar') }}
        </h2>
        <img src="{{ "/storage/avatars/$user->avatar" }}" alt="User Avatar"
            style="width:50px; height:50px; border: 1px solid transparent; border-radius:50%">

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Update and Save your avatar.') }}
        </p>
    </header>

    {{-- <img src="{{ URL::to('images/cute_dp_image-3098.jpg') }}" width="100" height="100">
    <img src="{{ asset('images/cute_dp_image-3098.jpg') }}" width="100" height="100"> --}}


    @if (session()->has('success'))
        <div style="color: grey; font-weight:900;">
            {{ session('success') }}
        </div>
    @endif

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.avatar') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="avatar" :value="__('Avatar')" />
            <x-text-input id="avatar" name="avatar" type="file" class="mt-1 block w-full" :value="old('avatar', $user->avatar)"
                autofocus autocomplete="avatar" />
            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
        </div>



        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>


        </div>
    </form>
</section>

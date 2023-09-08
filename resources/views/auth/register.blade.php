<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Họ Tên')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
         <!-- Nghề Nghiệp -->
         <div class="mt-4">
            <x-input-label for="job" :value="__('Nghề Nghiệp')" />
            <x-text-input id="job" class="block mt-1 w-full" type="text" name="job" :value="old('job')"  />
            <x-input-error :messages="$errors->get('job')" class="mt-2" />
        </div>

         <!-- Địa Chỉ -->
         <div class="mt-4">
            <x-input-label for="diachi" :value="__('Địa chỉ')" />
            <x-text-input id="diachi" class="block mt-1 w-full" type="text" name="diachi" :value="old('diachi')"  />
            <x-input-error :messages="$errors->get('diachi')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Mật Khẩu')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Xác nhận mật khẩu')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Bạn đã đăng ký rồi?') }}
            </a>

            <x-primary-button class="ml-4" style="background-color:#4e73df">
                {{ __('Đăng Ký') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

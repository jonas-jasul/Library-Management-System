<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <h2 id="loginTitle">Library Management System </h2>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}" x-data="{role_id: 2}"> 
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

             <div class="mt-4">
                <x-jet-label for="role_id" value="{{ __('Register as: ') }}" />
                <select name="role_id" x-model="role_id" class="block mt-1 w-full">
                    <option value="2">User</option>
                    <option value="3">Admin</option>
                </select>
            </div>

             <div class="mt-4" x-show="role_id == 2">
                <x-jet-label for="member_school" value="{{ __('School') }}" />
                <x-jet-input id="member_school" class="block mt-1 w-full" type="text" name="member_school" :value="old('member_school')" />
            </div>

            <div class="mt-4" x-show="role_id == 2">
                <x-jet-label for="member_phone_num" value="{{ __('Phone Number') }}" />
                <x-jet-input id="member_phone_num" class="block mt-1 w-full" type="text" name="member_phone_num" :value="old('member_phone_num')" />
            </div>

            <div class="mt-4" x-show="role_id == 3">
                <x-jet-label for="qualification" value="{{ __('Qualification') }}" />
                <x-jet-input id="qualification" class="block mt-1 w-full" type="text" name="qualification" :value="old('qualification')" />
            </div>
            

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>

@extends("frontEnd.layouts.app")
@section("main")
<main style="margin-top: 75px; margin-bottom: 4px; background: linear-gradient(#d9aac7, #450a3b);border-radius: 12px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12"><i class="fa fa-user-circle-o d-flex justify-content-center justify-content-lg-center" style="color: #450a3b;font-size: 100px;margin-top: 11px;"></i>

                <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <label class="float-left" for="name" style="color: rgb(255,255,255);">{{ __('messages.Name') }}</label>
                <input class="form-control"id="name"  type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="{{ __('messages.Name') }}"  style="background: #450a3b;">
            </div>

            <div class="mt-4">
                <label for="email" class="float-left" style="color: rgb(255,255,255);">{{ __('messages.Email') }}</label>
                <input id="email" class="form-control" type="email" name="email" :value="old('email')" placeholder="{{ __('messages.Email') }}" name="email" style="background: rgb(69,10,59);" required>


            </div>

            <div class="mt-4">
                <label for="password" class="float-left" style="color: rgb(255,255,255);">{{ __('messages.Password') }}</label>
                <input id="password" class="form-control" type="password" placeholder="{{ __('messages.Password') }}" name="password" required autocomplete="new-password" style="background: #450a3b;">

            </div>

            <div class="mt-4">
                <label for="password_confirmation" class="float-left" style="color: rgb(255,255,255);">{{ __('messages.Confirm Password') }}</label>
                <input id="password_confirmation" class="form-control" type="password" placeholder="{{ __('messages.Confirm Password') }}" name="password_confirmation" required autocomplete="new-password" style="background: #450a3b;">

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
                <a class="underline text-sm text-gray-600 hover:text-gray-900" style="color: var(--pink);" href="{{ route('login') }}">
                    {{ __('messages.Already registered?') }}
                </a>
                <button class="btn btn-primary border rounded-pill w-25" type="submit" style="margin-top: 5px;margin-bottom: 5px;background: rgb(69,10,59);border-color: rgba(102,16,242,0.75);">{{ __('messages.Register') }}</button>


            </div>
        </form>


            </div>
        </div>
    </div>
</main>
@endsection

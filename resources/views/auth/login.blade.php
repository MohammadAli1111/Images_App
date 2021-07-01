@extends("frontEnd.layouts.app")
@section("main")
    <main style="margin-top: 75px;margin-bottom: 7px; ;background: linear-gradient(#d9aac7, #450a3b);border-radius: 12px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12"><i class="fa fa-user-circle-o d-flex justify-content-center justify-content-lg-center" style="color: #450a3b;font-size: 100px;margin-top: 11px;"></i>
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label class="float-left" style="color: rgb(255,255,255);">{{__('messages.Email')}}:</label>
                            <input class="form-control" type="email" placeholder="{{__('messages.Email')}}" name="email" style="background: rgb(69,10,59);">

                            <label class="float-left" style="color: rgb(255,255,255);">{{__('messages.Password')}}:</label>
                            <input class="form-control" type="password" placeholder="{{__('messages.Password')}}" name="password" style="background: #450a3b;">

                            <div class="block mt-4">
                                <label for="remember_me" class="flex items-center">
                                    <x-jet-checkbox id="remember_me" name="remember" />
                                    <span class="ml-2 text-sm text-gray-600">{{ __('messages.Remember me') }}</span>
                                </label>
                            </div>

                            <button class="btn btn-primary border rounded-pill w-25" type="submit" style="margin-top: 5px;background: rgb(69,10,59);border-color: rgba(102,16,242,0.75);">{{__('messages.Login')}}</button>
                        </div>
                        <hr style="background: #ffffff;">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" style="color: var(--pink);" href="{{ route('password.request') }}">
                                {{ __('messages.Forgot your password?') }}
                            </a>
                        @endif
                        <p style="color: rgb(255,255,255);">{{__("messages.Don't have an account?")}}&nbsp;<a href="/register" style="color: var(--pink);">{{__('messages.Sign in')}}</a></p>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

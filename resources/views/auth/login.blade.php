<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
           <!--  <x-jet-authentication-card-logo /> -->
        </x-slot>


        <x-jet-validation-errors class="mb-3 rounded-0" />

        @if (session('status'))
            <div class="alert alert-success mb-3 rounded-0" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="card-body ">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <x-jet-label value="{{ __('البريد الإلكتروني') }}" />

                    <x-jet-input class="{{ $errors->has('email') ? 'is-invalid' : '' }}" type="email"
                                 name="email" :value="old('email')" required />
                    <x-jet-input-error for="email"></x-jet-input-error>
                </div>

                <div class="form-group">
                    <x-jet-label value="{{ __('كلمة المرور') }}" />

                    <x-jet-input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password"
                                 name="password" required autocomplete="current-password" />
                    <x-jet-input-error for="password"></x-jet-input-error>
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label mr-3" for="remember">
                            {{ __('تذكرني') }}
                        </label>
                    </div>
                </div>

                <div class="mb-0">

                <div class="d-flex justify-content-center align-items-baseline">
                    <x-jet-button class="btn">
                            {{ __('تسجيل الدخول') }}
                        </x-jet-button>
                        </div>
                    <!-- <div class="d-flex justify-content-center align-items-baseline mt-2">
                        @if (Route::has('password.request'))
                            <a class="text-muted mr-3" href="{{ route('password.request') }}">
                                {{ __('هل نسيت كلمة المرور؟') }}
                            </a>
                        @endif

                      
                    </div> -->
                    
                </div>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
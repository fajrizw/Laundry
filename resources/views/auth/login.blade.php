{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset("assets/css/bootstrap-min.css") }}">
  <link rel="stylesheet" href="{{ asset("assets/css/bootstrap.css") }}">
  
<section class="vh-100" style="background-color: #7DA0FA;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 ">
          <form action="{{ route("login") }}" class="mt-4" method="POST">
            @csrf
            <div class="d-flex justify-content-center mb-2">
                    <img src="img/welcome.svg" style=" width: 60%;" alt="Welcome">
                </div>
            <div class="mb-3">
                <label for="" class="form-label text-sm">Email</label>
                <input type="email" name="email" id="email"  class="form-control bg-white @error('email') is-invalid @enderror">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="" class="form-label text-sm">Password </label>
                <input type="password" name="password" id="password" class="form-control bg-white @error('password') is-invalid @enderror">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        
            <div class="mb-5">
                <button class="btn btn-outline-dark form-control mb-4 font-weight-bold" style="font-family: Verdana, sans-serif;">{{ __('Masuk') }}</button>
            </div>
</form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset("vendors/js/vendor.bundle.base.js") }}"></script>
  <script src="{{ asset("assets/js/bootstrap.js") }}"></script>
</section>


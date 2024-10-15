@extends('layouts.auth')
@section('content')
    <div class="row align-items-center justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card">
                <div class="card-body p-4">
                    <div class="text-center mt-2">
                        <h5 class="text-primary">Bienvenue !</h5>
                        <p class="text-muted">Connectez-vous pour continuer sur E-achive.</p>
                    </div>
                    <div class="p-2 mt-4">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="email">Email</label>
                                <input type="text" name="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" id="email" placeholder="Enter Email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="float-end"> <a href="#" class="text-muted">Forgot
                                        password?</a> </div>
                                <label class="form-label" for="userpassword">Mot de passe</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" id="userpassword" placeholder="Enter password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="form-check-input" id="auth-remember-check">
                                <label class="form-check-label" for="auth-remember-check">Remember me</label>
                            </div>
                            <div class="mt-3 text-end">
                                <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">Se Connecter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- <div class="mt-5 text-center">
            <p>©
                <script>
                    document.write(new Date().getFullYear())
                </script> Minible. Crafted with <i class="mdi mdi-heart text-danger"></i> by
                Themesbrand
            </p>
        </div> --}}
        </div>
    </div>
@endsection

@extends('layouts.app')
@section('content')
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    {!! Toastr::message() !!}
                    <h1 class="auth-title">Connexion</h1>
                    <p class="auth-subtitle mb-2">Entrer les données utiliser durant la création de votre compte.</p>
                    @if(session()->has('error'))
                        <div class="text-danger text-center text-bold">
                            {{ session()->get('error') }}
                        </div>
                    @endif
                    <br>
                    <form method="POST" action="{{ route('login') }}" class="md-float-material">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Entrer votre email">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" placeholder="Entrer votre Mot de passe">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" value="remember_me" id="remember_me" name="remember_me">
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Se souvenir de moi
                            </label>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Connexion</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">Vous n'avez pas de compte? <a href="{{route('register')}}"
                                class="font-bold">Inscription
                                </a>.</p>
                        <p><a class="font-bold" href="{{ route('forget-password') }}">Mot de passe oublié?</a>.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">
                </div>
            </div>
        </div>
    </div>
@endsection

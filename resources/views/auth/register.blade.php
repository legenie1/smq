@extends('layouts.app')
@section('content')
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    {{-- div for navs select --}}
                    <div class="col-12">
                        <div class="nav nav-pills" id="v-pills-tab" role="tablist" aria-orientation="horizontal">
                            <a class="nav-link active btn btn-outline-primary" id="v-pills-home-tab" style="font-size: 22px;"
                                data-bs-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home"
                                aria-selected="true">Devenir
                                Membre</a> &nbsp &nbsp
                            <a class="nav-link btn btn-outline-primary" id="v-pills-profile-tab" style="font-size: 20px;"
                                data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                                aria-selected="false">Créer une Tontine</a>
                        </div>
                    </div>
                    {{-- end div navs select --}}
                    <div class="col-12">
                        <div class="tab-content" id="v-pills-tabContent">
                            {{-- Création d'un membre --}}
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                aria-labelledby="v-pills-home-tab">
                                <br>
                                {{-- <form method="POST" action="{{ route('register') }}" class="md-float-material">
                                    @csrf --}}
                                    {{-- <div class="form-group position-relative has-icon-left mb-4">
                                        <input type="text"
                                            class="form-control form-control-lg @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name') }}" placeholder="Entrer Votre Nom">
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div> --}}
                                    {{-- insert defaults --}}
                                    {{-- <input type="hidden" class="image" name="image" value="photo_defaults.jpg"> --}}

                                    {{-- <div class="form-group position-relative has-icon-left mb-4">
                                        <input type="text"
                                            class="form-control form-control-lg @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" placeholder="Entrer Votre Email">
                                        <div class="form-control-icon">
                                            <i class="bi bi-envelope"></i>
                                        </div>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div> --}}

                                    {{-- <div class="form-group position-relative has-icon-left mb-4">
                                        <input type="number"
                                            class="form-control form-control-lg @error('phone_number') is-invalid @enderror"
                                            name="phone_number" value="{{ old('phone_number') }}"
                                            placeholder="Entrer Votre Numéro">
                                        <div class="form-control-icon">
                                            <i class="bi bi-phone"></i>
                                        </div>
                                        @error('phone_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div> --}}

                                    <div class="form-group position-relative has-icon-left mb-4">
                                        <fieldset class="form-group">
                                            {{-- <select class="form-select @error('association_id') is-invalid @enderror"
                                                name="association_id" id="association_id"
                                                value="{{ old('association_id') }}">
                                                <option selected disabled>Selectionner une asssociation</option>
                                                @foreach ($associations as $key => $item)
                                                    <option value="{{ $item->id }}"> {{ $item->libelle }}
                                                    </option>
                                                @endforeach
                                            </select> --}}
                                            {{-- <select name="association_id[]" id="association_id" class="form-control select2"
                                                multiple="multiple" required>
                                                @foreach ($associations as $id => $associations)
                                                    <option value="{{ $id }}"
                                                        {{ in_array($id, old('association_id', []))}}>
                                                        {{ $associations->libelle }} {{ $associations->id }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="form-control-icon">
                                                <i class="bi bi-exclude"></i>
                                            </div>
                                        </fieldset>
                                        @error('association_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group position-relative has-icon-left mb-4">
                                        <input type="password"
                                            class="form-control form-control-lg @error('password') is-invalid @enderror"
                                            name="password" placeholder="Entrer Votre Mot De Passe">
                                        <div class="form-control-icon">
                                            <i class="bi bi-shield-lock"></i>
                                        </div>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group position-relative has-icon-left mb-4">
                                        <input type="password" class="form-control form-control-lg"
                                            name="password_confirmation" placeholder="Confirmer Votre Mot De Passe">
                                        <div class="form-control-icon">
                                            <i class="bi bi-shield-check"></i>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-4">Inscription</button>
                                </form>
                                <div class="text-center mt-5 text-lg fs-4">
                                    <p class='text-gray-600'>Avez-vous déjà un compte? <a href="{{ route('login') }}"
                                            class="font-bold">Connexion</a>.</p>
                                </div>
                            </div> --}}
                            {{-- Fin Création d'une tontine --}}

                            {{-- Création d'une tontine --}}
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                aria-labelledby="v-pills-profile-tab">
                                <br>
                                <form method="POST" action="{{ route('userAssoc') }}" class="md-float-material">
                                    @csrf
                                    {{-- <div class="form-group position-relative has-icon-left mb-4">
                                        <input type="text"
                                            class="form-control form-control-lg @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name') }}" placeholder="Entrer Votre Nom">
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div> --}}
                                    {{-- insert defaults --}}
                                    {{-- <input type="hidden" class="image" name="image" value="photo_defaults.jpg"> --}}

                                    {{-- <div class="form-group position-relative has-icon-left mb-4">
                                        <input type="text"
                                            class="form-control form-control-lg @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" placeholder="Entrer Votre Email">
                                        <div class="form-control-icon">
                                            <i class="bi bi-envelope"></i>
                                        </div>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div> --}}

                                    {{-- <div class="form-group position-relative has-icon-left mb-4">
                                        <input type="number"
                                            class="form-control form-control-lg @error('phone_number') is-invalid @enderror"
                                            name="phone_number" value="{{ old('phone_number') }}"
                                            placeholder="Entrer Votre Numéro">
                                        <div class="form-control-icon">
                                            <i class="bi bi-phone"></i>
                                        </div>
                                        @error('phone_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div> --}}

                                    {{-- <input type="hidden" class="role_name" name="role_name" value="Admin"> --}}

                                    {{-- <div class="form-group position-relative has-icon-left mb-4">
                                        <input type="text"
                                            class="form-control form-control-lg @error('libelle') is-invalid @enderror"
                                            name="libelle" value="{{ old('libelle') }}"
                                            placeholder="Entrer Le Nom de L'association">
                                        <div class="form-control-icon">
                                            <i class="bi bi-hexagon"></i>
                                        </div>
                                        @error('libelle')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div> --}}

                                    {{-- <div class="form-group position-relative has-icon-left mb-4">
                                        <input type="text"
                                            class="form-control form-control-lg @error('session') is-invalid @enderror"
                                            name="session" value="{{ old('session') }}"
                                            placeholder="Entrer La Session e.x: Juin - Juillet">
                                        <div class="form-control-icon">
                                            <i class="bi bi-hexagon"></i>
                                        </div>
                                        @error('session')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div> --}}

                                    {{-- <div class="form-group position-relative has-icon-left mb-4">
                                        <input type="text"
                                            class="form-control form-control-lg @error('start') is-invalid @enderror"
                                            name="start" value="{{ old('start') }}"
                                            placeholder="Valider La Date de Début" onfocus="(this.type='date')">
                                        <div class="form-control-icon">
                                            <i class="bi bi-calendar"></i>
                                        </div>
                                        @error('start')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div> --}}

                                    {{-- <div class="form-group position-relative has-icon-left mb-4">
                                        <input type="text"
                                            class="form-control form-control-lg @error('end') is-invalid @enderror"
                                            name="end" value="{{ old('end') }}" placeholder="Valider La Date de Fin"
                                            onfocus="(this.type='date')">
                                        <div class="form-control-icon">
                                            <i class="bi bi-calendar"></i>
                                        </div>
                                        @error('end')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div> --}}

                                    {{-- <div class="form-group position-relative has-icon-left mb-4">
                                        <input type="password"
                                            class="form-control form-control-lg @error('password') is-invalid @enderror"
                                            name="password" placeholder="Entrer Votre Mot De Passe">
                                        <div class="form-control-icon">
                                            <i class="bi bi-shield-lock"></i>
                                        </div>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group position-relative has-icon-left mb-4">
                                        <input type="password" class="form-control form-control-lg"
                                            name="password_confirmation" placeholder="Confirmer Votre Mot De Passe">
                                        <div class="form-control-icon">
                                            <i class="bi bi-shield-check"></i>
                                        </div>
                                    </div> --}}
                                    {{-- <button class="btn btn-primary btn-block btn-lg shadow-lg mt-4">Créer Ma
                                        Tontine</button> --}}
                                </form>
                                <div class="text-center mt-5 text-lg fs-4">
                                    <p class='text-gray-600'>Avez-vous déjà un compte? <a href="{{ route('login') }}"
                                            class="font-bold">Connexion</a>.</p>
                                </div>
                            </div>
                            {{-- Fin Création d'une tontine --}}
                        </div>
                        {{-- </div> --}}
                        {{-- </div>
                        </div> --}}
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

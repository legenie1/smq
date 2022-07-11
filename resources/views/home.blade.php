@extends('layouts.master')
@section('content')
    @if (Auth::user()->role_name == 'Super' || Auth::user()->role_name == 'Admin' || Auth::user()->role_name == 'Membre' && Auth::user()->status == 'Active')
            <div class="page-heading">
                <h3>Statistiques de profil</h3>
            </div>
            {{-- message --}}
            {!! Toastr::message() !!}
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon purple">
                                                    <i class="iconly-boldShow"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Taux de correction</h6>
                                                <h6 class="font-extrabold mb-0">{{ $activity_logs }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon blue">
                                                    <i class="iconly-boldProfile"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Taux d'action correctives</h6>
                                                <h6 class="font-extrabold mb-0">{{ $societes }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon green">
                                                    <i class="iconly-boldAdd-User"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Taux de satidfaction client</h6>
                                                <h6 class="font-extrabold mb-0">{{ $users }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon red">
                                                    <i class="iconly-boldBookmark"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Chauffeurs</h6>
                                                <h6 class="font-extrabold mb-0">{{ $chauffeurs }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Profile Visit</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="chart-profile-visit"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="card" data-bs-toggle="modal" data-bs-target="#default">
                            <div class="card-body py-4 px-5">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-xl">
                                        <img src="{{ URL::to('/images/' . Auth::user()->avatar) }}"
                                            alt="{{ Auth::user()->avatar }}">
                                    </div>
                                    <div class="ms-3 name">
                                        <h5 class="font-bold">{{ Auth::user()->name }}</h5>
                                        {{-- <h6 class="text-muted mb-0">{{ Auth::user()->email }}</h6> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- user profile modal --}}
                        <div class="card-body">
                            <!--Basic Modal -->
                            <div class="modal fade text-left" id="default" tabindex="-1" aria-labelledby="myModalLabel1"
                                style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myModalLabel1">User Profile</h5>
                                            <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Nom</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control" name="fullName"
                                                                    value="{{ Auth::user()->name }}" readonly>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-person"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Addresse Email</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="email" class="form-control" name="email"
                                                                    value="{{ Auth::user()->email }}" readonly>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-envelope"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Telephone</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="number" class="form-control"
                                                                    value="{{ Auth::user()->phone_number }}" readonly>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-phone"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label>Statut</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"
                                                                    value="{{ Auth::user()->status }}" readonly>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-bag-check"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label>Rôle</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"
                                                                    value="{{ Auth::user()->role_name }}" readonly>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-exclude"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Fermer</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- end user profile modal --}}

                        <div class="card">
                            <div class="card-header">
                                <h4>Taux d'actions correctives</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-visitors-profile"></div>
                            </div>
                        </div>
                    </div>
                </section>
        </div>

    @elseif (Auth::user()->role_name == '' && Auth::user()->status == 'Desactiver')
        <link rel="stylesheet" href="{{ URL::to('assets/css/login.css') }}">
            {!! Toastr::message() !!}
            @if (session()->has('error'))
                <div class="text-danger text-center text-bold">
                    {{ session()->get('error') }}
                </div>
            @endif
            <div class="page-content">
                <div class="container">
                    <input type="checkbox" id="flip">
                    <div class="cover">
                        <div class="front">
                        </div>
                        <div class="back">
                        </div>
                    </div>
                    <div class="forms">
                        <div class="form-content">
                            <div class="login-form">
                                <div class="title">Rejoindre une association</div>
                                <form method="POST" action="{{ route('validate_member') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                                    <div class="input-boxes">
                                        <div class="input-box">
                                            <i class="fas fa-user"></i>
                                            <input type="number" class="@error('cni') is-invalid @enderror" name="cni"
                                                value="{{ old('cni') }}" placeholder="Numéro de CNI"
                                                required>
                                        </div>
                                        <div class="input-box">
                                            <i class="fas fa-user"></i>
                                            <select class="@error('association_id') is-invalid @enderror"
                                                name="association_id" id="association_id"
                                                value="{{ old('association_id') }}">
                                                <option selected disabled>Selectionner une asssociation</option>
                                                @foreach ($associationlist as $item)
                                                    <option value="{{ $item->id }}"> {{ $item->libelle }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="button input-box">
                                            <input type="submit" value="Rejoindre">
                                        </div>
                                        <div class="text sign-up-text">Je veux enregistrer mon association ? <label
                                                for="flip">Enregistrer</label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="signup-form">
                                <div class="title">Créer une association</div>
                                <form method="POST" action="{{ route('validate_assoc') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                                    <div class="input-boxes">
                                        <div class="input-box">
                                            <i class="fas fa-user"></i>
                                            <input type="number" class="@error('cni') is-invalid @enderror" name="cni"
                                                value="{{ old('cni') }}" placeholder="Numéro de CNI"
                                                required>
                                        </div>

                                        <div class="input-box">
                                            <i class="fas fa-user"></i>
                                            <input type="text" class="@error('libelle') is-invalid @enderror"
                                                name="libelle" value="{{ old('libelle') }}"
                                                placeholder="Nom de L'association" required />
                                        </div>

                                        <div class="input-box">
                                            <i class="fas fa-user"></i>
                                            <input type="text" class="@error('session') is-invalid @enderror"
                                                name="session" value="{{ old('session') }}"
                                                placeholder="Session e.x: Juin - Juillet" required />
                                        </div>

                                        <div class="input-box">
                                            <i class="fas fa-user"></i>
                                            <input type="text" class="@error('start') is-invalid @enderror" name="start"
                                                value="{{ old('start') }}" placeholder="Date de Début"
                                                onfocus="(this.type='date')" required />
                                        </div>

                                        <div class="input-box">
                                            <i class="fas fa-user"></i>
                                            <input type="text"
                                                class="@error('end') is-invalid @enderror"
                                                name="end" value="{{ old('end') }}" placeholder="Date de Fin"
                                                onfocus="(this.type='date')" required />
                                        </div>

                                        <div class="button input-box">
                                            <input type="submit" value="Créer">
                                        </div>

                                        <div class="text sign-up-text">Je désire rejoindre une association ? <label
                                                for="flip">Rejoindre</label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- @endsection --}}

            </div>


            {{-- en attente de l'activation par l'administrateur --}}
        @elseif (Auth::user()->role_name == 'Membre' && Auth::user()->status == 'Desactiver')

            <link rel="stylesheet" href="{{ URL::to('assets/css/login.css') }}">
                <header class="mb-3">
                    <a href="#" class="burger-btn d-block d-xl-none" style="color:white">
                        <i class="bi bi-justify fs-3"></i>
                    </a>
                </header>
                <div class="page-content">
                    <div class="container">
                        <input type="checkbox" id="flip">
                        <div class="forms">
                            {{-- Here is for the hidden items --}}
                            {!! Toastr::message() !!}
                            <div class="form-content">
                                @if (session()->has('error'))
                                    <div class="text-danger text-center text-bold">
                                        {{ session()->get('error') }}
                                    </div>
                                @endif
                                <div class="login-form">
                                    <div class="titl"
                                        style="width: 520px; text-align:center;font-weight:800px;font-size:15px">Vous
                                        recevrez un
                                        message de validation
                                        après acceptation par l'administrateur de l'association</div>
                                    <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                                    <center>
                                        <div class="button input-box" style="width: 520px; text-align:center;">
                                            <input type="submit" value="Restez-connectez">
                                        </div>
                                    </center>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- @endsection --}}

                </div>

    @endif

@endsection

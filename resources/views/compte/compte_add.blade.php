@extends('layouts.master')
@section('content')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Informations</h3>
                    <p class="text-subtitle text-muted">Informations à remplir</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Tableau de Bord</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Etats des Comptes</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        {{-- message --}}
        {!! Toastr::message() !!}

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Entrer Les Information</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-horizontal" action="{{ route('compte.store') }}" method="POST">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <input type="hidden" class="form-control @error('libelle') is-invalid @enderror"
                                        value="{{ Auth::user()->id }}" placeholder="{{ Auth::user()->id }}"
                                        id="first-name-icon" name="nom_id">

                                    <div class="col-md-4">
                                        <label>Montant</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="number"
                                                    class="form-control @error('montant') is-invalid @enderror"
                                                    value="{{ old('montant') }}" placeholder="Entrer le montant"
                                                    id="first-name-icon" name="montant">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-cash"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-4">
                                    <label>Associaion</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group position-relative has-icon-left mb-4">
                                        <fieldset class="form-group">
                                            <select class="form-select" name="status" id="status">
                                                <option selected disabled>Choisir l'association</option>
                                                @foreach ($data3 as $key => $value)
                                                <option value="{{ $value->id }}"> {{ $value->libelle }}</option>
                                                @endforeach  
                                            </select>
                                            <div class="form-control-icon">
                                                <i class="bi bi-bag-check"></i>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div> --}}

                                    <div class="col-md-4">
                                        <label>Activité</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group position-relative has-icon-left mb-4">
                                            <fieldset class="form-group">
                                                <select class="form-select" name="activite_id" id="activite_id">
                                                    <option selected disabled>Choisir l'activité</option>
                                                    @foreach ($data2 as $key => $value)
                                                        <option value="{{ $value->id }}"> {{ $value->libelle }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-bag-check"></i>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Enregistrer</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Annuler</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-start">
                    <p>2021 &copy; Soeng Souy</p>
                </div>
                <div class="float-end">
                    <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a href="#">Soeng
                            Souy</a></p>
                </div>
            </div>
        </footer>
    </div>
@endsection

@extends('layouts.master')
@section('content')
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
                            <li class="breadcrumb-item active" aria-current="page">Gestion des Activités</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    
    {{-- message --}}
    {!! Toastr::message() !!}

    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-horizontal" action="{{ route('activitenew.store') }}" method="POST">
                        @csrf
                        <div class="form-body">
                            <div class="row">

                                <input type="hidden" value="{{ Auth::user()->id }}" name="id">
                                <input type="hidden" value="{{ Auth::user()->association_id }}" name="association_id">

                                <div class="col-md-4">
                                    <label>Activités</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group position-relative has-icon-left mb-4">
                                        <fieldset class="form-group">
                                            <select class="form-select" name="activite" id="activite">
                                                <option selected disabled>Choisir l'activité</option>
                                                @foreach ($activites as $key => $value)
                                                <option value="{{ $value->id }}"> {{ $value->libelle }}</option>
                                                @endforeach  
                                            </select>
                                            <div class="form-control-icon">
                                                <i class="bi bi-bag-check"></i>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
    
                                <div class="col-md-4">
                                    <label>Libellé</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" class="form-control @error('libelle') is-invalid @enderror" value="{{ old('libelle') }}"
                                                placeholder="Entrer le libellé" id="first-name-icon" name="libelle">
                                            <div class="form-control-icon">
                                                <i class="bi bi-hexagon"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Description</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}"
                                                placeholder="Entrer la description" id="first-name-icon" name="description">
                                            <div class="form-control-icon">
                                                <i class="bi bi-hexagon"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Montant</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="number" class="form-control @error('montant') is-invalid @enderror" value="{{ old('montant') }}"
                                                placeholder="Entrer le montant" id="first-name-icon" name="montant">
                                            <div class="form-control-icon">
                                                <i class="bi bi-cash"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-md-4">
                                    <label>Statut</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group position-relative has-icon-left mb-4">
                                        <fieldset class="form-group">
                                            <select class="form-select" name="status" id="status">
                                                <option selected disabled>Choisir le statut</option>
                                                @foreach ($userStatus as $key => $value)
                                                <option value="{{ $value->type_name }}"> {{ $value->type_name }}</option>
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
                                    <a href="{{ route('activitenew.index') }}" class="btn btn-light-secondary me-1 mb-1">Annuler</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <br>
    <footer>
        <div class="footer clearfix mb-0 text-muted">
            <div class="float-start">
                <p>2021 &copy; Gesta</p>
            </div>
            <div class="float-end">
                <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                href="#">Gesta</a></p>
            </div>
        </div>
    </footer>
@endsection
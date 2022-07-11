@extends('layouts.master')
@section('content')
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Informations</h3>
                    <p class="text-subtitle text-muted">Entrer Les Informations</p>
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
                        <form class="form form-horizontal" action="{{ route('processus.store') }}" method="POST">
                            @csrf @method('POST')
                            <input type="hidden" value="{{ Auth::user()->id }}" name="user">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Libellé du processus</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text"
                                                    class="form-control @error('libelle') is-invalid @enderror"
                                                    value="{{ old('libelle') }}" placeholder="Enter le nom du processus"
                                                    id="first-libelle-icon" name="nom">
                                                @error('libelle')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <div class="form-control-icon">
                                                    <i class="bi bi-hexagon-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Enregistrer</button>
                                        <a href="{{ route('processus.index') }}"
                                            class="btn btn-light-secondary me-1 mb-1">Retour</a>
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

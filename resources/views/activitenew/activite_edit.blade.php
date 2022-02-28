@extends('layouts.master')
@section('content')
    <style>
        .avatar.avatar-im .avatar-content,
        .avatar.avatar-xl img {
            width: 40px !important;
            height: 40px !important;
            font-size: 1rem !important;
        }

        .form-group[class*=has-icon-].has-icon-lefts .form-select {
            padding-left: 2rem;
        }

    </style>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Gestion des Associations</h3>
                    <p class="text-subtitle text-muted">Détails</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Tableau de Bord</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Modifier l'activité</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-horizontal" action="{{ route('activitenew.update', $data[0]->id) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf @method('PUT')
                            <input type="hidden" name="id" value="{{ $data[0]->id }}">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Activité</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group position-relative has-icon-left mb-4">
                                            <fieldset class="form-group">
                                                <select class="form-select" name="activite" id="activite">
                                                    <option value="{{ $data[0]->activite }}"
                                                        {{ $data[0]->activites->libelle == $data[0]->activites->libelle ? 'selected' : '' }}>
                                                        {{ $data[0]->activites->libelle }}
                                                    </option>
                                                    @foreach ($activites as $key => $value)
                                                        <option value="{{ $value->id }}">
                                                            {{ $value->libelle }}</option>
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
                                                <input type="text"
                                                    class="form-control @error('libelle') is-invalid @enderror"
                                                    value="{{ $data[0]->libelle }}" placeholder="Entrer le libelle"
                                                    id="first-name-icon" name="libelle">
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
                                                <input type="text"
                                                    class="form-control @error('description') is-invalid @enderror"
                                                    value="{{ $data[0]->description }}"
                                                    placeholder="Entrer la description" id="first-name-icon"
                                                    name="description">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-hexagon"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Association</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group position-relative has-icon-left mb-4">
                                            <fieldset class="form-group">
                                                <select class="form-select" name="association_id" id="association_id">
                                                    <option value="{{ $data[0]->association_id }}"
                                                        {{ $data[0]->associations->libelle == $data[0]->associations->libelle ? 'selected' : '' }}>
                                                        {{ $data[0]->associations->libelle }}
                                                    </option>
                                                    @foreach ($associations as $key => $value)
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

                                    <div class="col-md-4">
                                        <label>Montant</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text"
                                                    class="form-control @error('montant') is-invalid @enderror"
                                                    value="{{ $data[0]->montant }}" placeholder="Entrer la montant"
                                                    id="first-name-icon" name="montant">
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
                                                    <option value="{{ $data[0]->status }}"
                                                        {{ $data[0]->status == $data[0]->status ? 'selected' : '' }}>
                                                        {{ $data[0]->status }}
                                                    </option>
                                                    @foreach ($userStatus as $key => $value)
                                                        <option value="{{ $value->type_name }}">
                                                            {{ $value->type_name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-bag-check"></i>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>


                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Modifier</button>
                                        <a href="{{ route('activitenew.index') }}"
                                            class="btn btn-light-secondary me-1 mb-1">Retour</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
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
                <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a href="#">Gesta</a>
                </p>
            </div>
        </div>
    </footer>
@endsection

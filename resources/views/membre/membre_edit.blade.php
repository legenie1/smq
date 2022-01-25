@extends('layouts.master')
@section('content')
<div id="main">
    <style>
        .avatar.avatar-im .avatar-content, .avatar.avatar-xl img {
            width: 40px !important;
            height: 40px !important;
            font-size: 1rem !important;
        }
        .form-group[class*=has-icon-].has-icon-lefts .form-select {
            padding-left: 2rem;
        }

    </style>
    
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Gestion des Associations</h3>
                    <p class="text-subtitle text-muted">Pour que l'utilisateur vérifie sa liste</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Tableau de Bord</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Gestion des Associations</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div> 
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Détails</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-horizontal" action="{{ route('membre.update', $data[0]->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf @method('PUT')
                            <input type="hidden" name="id" value="{{ $data[0]->id }}">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Nom</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control"
                                                    placeholder="Nom" id="first-name-icon" name="name" value="{{ $data[0]->name }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control @error('session') is-invalid @enderror" value="{{ $data[0]->email_address }}"
                                                    placeholder="Entrer la session" id="first-name-icon" name="email">
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
                                                <input type="text" class="form-control @error('phone_number') is-invalid @enderror" value="{{ $data[0]->phone_number }}"
                                                    placeholder="Entrer votre contact" id="first-name-icon" name="phone_number">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-phone"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>CNI</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control @error('cni') is-invalid @enderror" value="{{ $data[0]->cni }}"
                                                    placeholder="Entrer notre numéro de CNI" name="cni">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person-badge-fill"></i>
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
                                                    <option value="{{ $data[0]->associations->id }}" {{ ( $data[0]->associations->libelle == $data[0]->associations->libelle) ? 'selected' : ''}}> 
                                                        {{ $data[0]->associations->libelle }}
                                                    </option>
                                                    @foreach ($userAssociations as $key => $value)
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
                                        <label>Poste</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group position-relative has-icon-left mb-4">
                                            <fieldset class="form-group">
                                                <select class="form-select" name="role_name" id="role_name">
                                                    <option value="{{ $data[0]->role_name }}" {{ ( $data[0]->role_name == $data[0]->role_name) ? 'selected' : ''}}> 
                                                        {{ $data[0]->role_name }}
                                                    </option>
                                                    @foreach ($roleType as $key => $value)
                                                    <option value="{{ $value->role_type }}"> {{ $value->role_type }}</option>
                                                    @endforeach  
                                                </select>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-bag-check"></i>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Statut</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group position-relative has-icon-left mb-4">
                                            <fieldset class="form-group">
                                                <select class="form-select" name="status" id="status">
                                                    <option value="{{ $data[0]->status }}" {{ ( $data[0]->status == $data[0]->status) ? 'selected' : ''}}> 
                                                        {{ $data[0]->status }}
                                                    </option>
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
                                        <button type="submit"
                                            class="btn btn-primary me-1 mb-1">Modifier</button>
                                        <a  href="{{ route('membre.index') }}"
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
    <footer>
        <div class="footer clearfix mb-0 text-muted ">
            <div class="float-start">
                <p>2021 &copy; Soeng Souy</p>
            </div>
            <div class="float-end">
                <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                href="http://soengsouy.com">Soeng Souy</a></p>
            </div>
        </div>
    </footer>
</div>
@endsection
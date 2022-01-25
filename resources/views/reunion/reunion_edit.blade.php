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
                    <h3>Gestion des Activités</h3>
                    <p class="text-subtitle text-muted">Pour que l'utilisateur vérifie sa liste</p>
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
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Détails</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-horizontal" action="{{ route('reunion.update', $data[0]->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf @method('PUT')
                            <input type="hidden" name="id" value="{{ $data[0]->id }}">
                            <div class="form-body">
                                <div class="row">
                                    <section class="section">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                    
                                                    <textarea name="contenu" id="summernote" cols="30" rows="40">{{ $data[0]->contenu }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                    
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit"
                                                class="btn btn-primary me-1 mb-1">Modifier</button>
                                            <a  href="{{ route('reunion.index') }}"
                                                class="btn btn-light-secondary me-1 mb-1">Retour</a>
                                        </div>
                                    </section>
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
                <p>2022 &copy; Gesta</p>
            </div>
            <div class="float-end">Gesta
            </div>
        </div>
    </footer>
</div>
@endsection
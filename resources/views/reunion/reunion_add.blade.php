@extends('layouts.master')
@section('content')
    {{-- message --}}
    {!! Toastr::message() !!}
        <div class="page-heading">
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
                                <li class="breadcrumb-item active" aria-current="page">Gestion des Reunions</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <form class="form form-horizontal" action="{{ route('reunion.store') }}" method="POST">
                @csrf @method('POST')
                <section class="section">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Saisir le Rapport de La Reunion</h4>
                                </div>

                                <textarea name="contenu" id="summernote" cols="30" rows="40"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-1 mb-1">Enregistrer</button>
                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Annuler</button>
                    </div>
                </section>
            </form>
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
    </div>
@endsection

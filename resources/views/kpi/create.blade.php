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
                        <li class="breadcrumb-item active" aria-current="page">Gestion des kpi</li>
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

                    <!-- // Basic multiple Column Form section start -->
                    <section id="multiple-column-form">
                        <div class="row match-height">
                            <div class="col-12">
                                <div class="card">
                                    {{-- <div class="card-header">
                                <h4 class="card-title">PLAN D'AMELIORATION CONTINUE</h4>
                            </div> --}}
                                    <div class="card-content">
                                        <div class="card-body">


                                            <form class="form" action="{{ route('kpi.store') }}" method="POST">
                                                @csrf @method('POST')


                                                <br>
                                                <h5 class="text pt-4" style="color: rgb(41, 29, 29)">Taux de réalisation de
                                                    l'objectif</h5>
                                                    <div class="row">
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="company-column">Evaluation de l'fficacité</label>
                                                                <select name="trimestre" id="company-column"
                                                                class="form-control form-select">
                                                                <option value="Trimestre 1">Trimestre 1</option>
                                                                <option value="Trimestre 2">Trimestre 2</option>
                                                                <option value="Trimestre 3">Trimestre 3</option>
                                                                <option value="Trimestre 4">Trimestre 4</option>
                                                            </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <div class="row">

                                                    
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="first-name-column">Chiffres d'affaires</label>
                                                            <input type="number" id="first-name-column"
                                                                class="form-control" placeholder="" name="chiffre">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="last-name-column">Objectif CA</label>
                                                            <input type="number" id="last-name-column" class="form-control"
                                                                placeholder="" name="objectif">
                                                        </div>
                                                    </div>
                                                    {{-- <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="last-name-column">Valeur cible</label>
                                                            <input type="number" id="last-name-column" class="form-control"
                                                                placeholder="" name="val1">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="last-name-column">Cumul</label>
                                                            <input type="number" id="last-name-column" class="form-control"
                                                                placeholder="" name="cumul1">
                                                        </div>
                                                    </div> --}}
                                                </div>



                                                <br>
                                                <h5 class="text pt-4" style="color: rgb(41, 29, 29)">Taux de renouvellement
                                                </h5>
                                                <div class="row">

                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="first-name-column">Nb de polices renouvélées</label>
                                                            <input type="number" id="first-name-column"
                                                                class="form-control" placeholder="" name="police_renouvele">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="last-name-column">Nb de polices à
                                                                renouveller</label>
                                                            <input type="number" id="last-name-column" class="form-control"
                                                                placeholder="" name="police_a_renouvele">
                                                        </div>
                                                    </div>
                                                    {{-- <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="last-name-column">Valeur cible</label>
                                                            <input type="number" id="last-name-column" class="form-control"
                                                                placeholder="" name="val2">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="last-name-column">Cumul</label>
                                                            <input type="number" id="last-name-column" class="form-control"
                                                                placeholder="" name="cumul2">
                                                        </div>
                                                    </div> --}}
                                                </div>



                                                <br>
                                                <h5 class="text pt-4" style="color: rgb(41, 29, 29)">Taux d'encaissement sur
                                                    excercise</h5>
                                                <div class="row">

                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="first-name-column">Total encaissement</label>
                                                            <input type="number" id="first-name-column"
                                                                class="form-control" placeholder="" name="total_encais1">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="last-name-column">Total primes émises ttc</label>
                                                            <input type="number" id="last-name-column"
                                                                class="form-control" placeholder="" name="total_prime1">
                                                        </div>
                                                    </div>
                                                    {{-- <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="last-name-column">Valeur cible</label>
                                                            <input type="number" id="last-name-column"
                                                                class="form-control" placeholder="" name="val3">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="last-name-column">Cumul</label>
                                                            <input type="number" id="last-name-column"
                                                                class="form-control" placeholder="" name="cumul3">
                                                        </div>
                                                    </div> --}}
                                                </div>



                                                <br>
                                                <h5 class="text pt-4" style="color: rgb(41, 29, 29)">Taux d'encaissement
                                                    sur aéré</h5>
                                                <div class="row">
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="first-name-column">Total encaissement</label>
                                                            <input type="number" id="first-name-column"
                                                                class="form-control" placeholder="" name="total_encais2">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="last-name-column">Total primes émises ttc</label>
                                                            <input type="number" id="last-name-column"
                                                                class="form-control" placeholder="" name="total_prime2">
                                                        </div>
                                                    </div>
                                                    {{-- <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="last-name-column">Valeur cible</label>
                                                            <input type="number" id="last-name-column"
                                                                class="form-control" placeholder="" name="val4">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="last-name-column">Cumul</label>
                                                            <input type="number" id="last-name-column"
                                                                class="form-control" placeholder="" name="cumul4">
                                                        </div>
                                                    </div> --}}
                                                </div>



                                                <div class="col-12 d-flex justify-content-start mt-4">
                                                    <button type="submit"
                                                        class="btn btn-primary me-1 mb-1 w-50">Enregistrer</button>
                                                    <a href="{{ back() }}"
                                                        class="btn btn-light-secondary me-1 mb-1 w-50">Annuler</a>
                                                </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                </section>
                <!-- // Basic multiple Column Form section end -->
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
                        href="#">Gesta</a>
                </p>
            </div>
        </div>
    </footer>
@endsection

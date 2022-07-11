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
                        <li class="breadcrumb-item active" aria-current="page">Plan d'amélioration continu</li>
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
                <h4 class="card-title">PLAN D'AMELIORATION CONTINUE</h4>
            </div>


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

                                    <form class="form" action="{{route('pac.store')}}" method="POST">
                                        @csrf @method('POST')
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="first-name-column">Date d'enregistrement</label>
                                                    <input type="date" id="first-name-column" value="{{ $data[0]->input1 }}" class="form-control"
                                                        placeholder="Date d'enregistrement" name="input1">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="last-name-column">Processus concerné</label>
                                                    <input type="text" id="last-name-column" class="form-control" value="{{ $data[0]->input2 }}"
                                                        name="input2">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="city-column">Origine de l'action</label>
                                                    <input type="text" id="city-column" class="form-control" value="{{ $data[0]->input3 }}" name="input3">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="country-floating">Détails de l'anomalie</label>
                                                    <input type="text" id="country-floating" class="form-control" value="{{ $data[0]->input4 }}"
                                                        name="input4">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="company-column">Type d'anomalie</label>
                                                    <input type="text" id="company-column" class="form-control"
                                                        value="{{ $data[0]->input5 }}" name="input5" >
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="company-column">Référencement (Voir feuille en bas)</label>
                                                    <input type="text" id="company-column" class="form-control"
                                                        value="{{ $data[0]->input6 }}" name="input6">
                                                </div>
                                            </div>

                                            <br>
                                            <h5 class="text pt-4" style="color: red">A remplir uniquement en cas d'insatifaction</h5>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="company-column">Identité de l'emetteur</label>
                                                    <input type="text" id="company-column" class="form-control"
                                                        value="{{ $data[0]->input7 }}" name="input7">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="company-column">Sugestions de l'emeteur</label>
                                                    <input type="text" id="company-column" class="form-control"
                                                        value="{{ $data[0]->input8 }}" name="input8">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="company-column">Référencement (Voir feuille en bas)</label>
                                                    <input type="text" id="company-column" class="form-control"
                                                        value="{{ $data[0]->input9 }}" name="input9">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="company-column">Retour à l'emetteur ?</label>
                                                    <select value="{{ $data[0]->input10 }}" name="input10" id="company-column"
                                                        class="form-control form-select">
                                                        <option value="Oui">Oui</option>
                                                        <option value="Non">Non</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="company-column">Avis de l'emetteur (Satisfaction) ?</label>
                                                    <select value="{{ $data[0]->input11 }}" name="input11" id="company-column"
                                                        class="form-control form-select">
                                                        <option value="Oui">Oui</option>
                                                        <option value="Non">Non</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <br>
                                            <h5 class="text pt-4" style="color: green">A remplir obligatoirement</h5>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="company-column">Correction(s)</label>
                                                    <input type="text" id="company-column" class="form-control"
                                                        value="{{ $data[0]->input12 }}" name="input12">
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="company-column">Responsable de la Correction</label>
                                                    <input type="text" id="company-column" class="form-control"
                                                        value="{{ $data[0]->input13 }}" name="input13">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="company-column">Date fin de Correction</label>
                                                    <input type="date" id="company-column" class="form-control"
                                                        value="{{ $data[0]->input14 }}" name="input14">
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="company-column">Livrables</label>
                                                    <input type="text" id="company-column" class="form-control"
                                                        value="{{ $data[0]->input15 }}" name="input15">
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="company-column">Etat de réalisation de correction</label>
                                                    <select value="{{ $data[0]->input16 }}" name="input16" id="company-column"
                                                        class="form-control form-select">
                                                        <option value="Réalisé">Réalisé</option>
                                                        <option value="En cours">En cours</option>
                                                        <option value="Non déclenchée">Non déclenchée</option>
                                                    </select>
                                                </div>
                                            </div>
                                             
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="company-column">Evaluation de la réalisation</label>
                                                    <input type="number" id="company-column" class="form-control"
                                                        value="{{ $data[0]->input17 }}" name="input17">
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="company-column">Cause(s) de l'anomalie</label>
                                                    <input type="text" id="company-column" class="form-control"
                                                        value="{{ $data[0]->input18 }}" name="input18">
                                                </div>
                                            </div>

                                            <br>
                                            <h5 class="text pt-4" >A remplir si necessaire</h5>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="company-column">Action(s) Corrective(s)</label>
                                                    <input type="text" id="company-column" class="form-control"
                                                        value="{{ $data[0]->input19 }}" name="input19">
                                                </div>
                                            </div>
                                            
                                            <br>
                                            <h5 class="text pt-4" style="color: red">Obligatoire si action(s) corrective(s) identifiee(s)</h5>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="company-column">Responsable de l'AC</label>
                                                    <input type="text" id="company-column" class="form-control"
                                                        value="{{ $data[0]->input21 }}" name="input21">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="company-column">Livrables</label>
                                                    <input type="file" id="company-column" class="form-control"
                                                        value="{{ $data[0]->input20 }}" name="input20">
                                                </div>
                                                
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="company-column">Date de fin de l'AC</label>
                                                    <input type="date" id="company-column" class="form-control"
                                                        value="{{ $data[0]->input22 }}" name="input22"
                                                        placeholder="Fixer un délai">
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="company-column">Evaluation de l'éfficacité de l'action </label>
                                                    <input type="text" id="company-column" class="form-control"
                                                        value="{{ $data[0]->input23 }}" name="input23">
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="company-column">Date d'évaluation de l'efficacité de l'AC</label>
                                                    <input type="date" id="company-column" class="form-control"
                                                        value="{{ $data[0]->input1 }}" name="input24">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="company-column">Evaluation de la réalisation</label>
                                                    <select value="{{ $data[0]->input25 }}" name="input25" id="company-column"
                                                    class="form-control form-select">
                                                    <option value="0%">0%</option>
                                                    <option value="25%">25%</option>
                                                    <option value="50%">50%</option>
                                                    <option value="75%">75%</option>
                                                    <option value="100%">100%</option>
                                                </select>
                                                </div>
                                            </div>

                                            <br>
                                            <h5 class="text pt-4" style="color: red">A remplir si necessaire</h5>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="company-column">Objectif atteint par l'AC ?</label>
                                                    <select value="{{ $data[0]->input26 }}" name="input26" id="company-column"
                                                        class="form-control form-select">
                                                        <option value="Oui">Oui</option>
                                                        <option value="Non">Non</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="company-column" style="color:red">Si Objectif non atteint. Recherche de Cause(s)</label>
                                                    <input type="text" id="company-column" class="form-control"
                                                        value="{{ $data[0]->input27 }}" name="input27">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="company-column" style="color:red">Action(s) Corrective(s) 2nd essai</label>
                                                    <input type="text" id="company-column" class="form-control"
                                                        value="{{ $data[0]->input28 }}" name="input28">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="company-column">Responsable de l'AC/Date de fin</label>
                                                    <input type="text" id="company-column" class="form-control"
                                                        value="{{ $data[0]->input29 }}" name="input29">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="company-column">Livrables</label>
                                                    <input type="file" id="company-column" class="form-control"
                                                        value="{{ $data[0]->input30 }}" name="input30">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="company-column">Date d'évaluation de l'fficacité de l'AC</label>
                                                    <input type="date" id="company-column" class="form-control"
                                                        value="{{ $data[0]->input31 }}" name="input31">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="company-column">Evaluation de l'fficacité</label>
                                                    <select value="{{ $data[0]->input32 }}" name="input32" id="company-column"
                                                    class="form-control form-select">
                                                    <option value="0%">0%</option>
                                                    <option value="25%">25%</option>
                                                    <option value="50%">50%</option>
                                                    <option value="75%">75%</option>
                                                    <option value="100%">100%</option>
                                                </select>
                                                </div>
                                            </div>



                                            <br>
                                            <h5 class="text pt-4" style="color: red">A remplir obligatoirement</h5>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="company-column">Objectif atteint par l'AC ?</label>
                                                    <select value="{{ $data[0]->input33 }}" name="input33" id="company-column"
                                                        class="form-control form-select">
                                                        <option value="Oui">Oui</option>
                                                        <option value="Non">Non</option>
                                                    </select>
                                                </div>
                                            </div>

                                            
                                            <textarea type="text" id="company-column" class="form-control"
                                            value="{{ $data[0]->input34 }}" name="input34" cols="10" rows="10">

                                            </textarea>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="company-column">Date de clotûre</label>
                                                    <input type="date" id="company-column" class="form-control"
                                                        value="{{ $data[0]->input35 }}" name="input35">
                                                </div>
                                            </div>

                                            <div class="col-12 d-flex justify-content-start">
                                                <button type="submit" class="btn btn-primary me-1 mb-1 w-50">Enregistrer</button>
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

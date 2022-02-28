@extends('layouts.master')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Gestion Des Activités</h3>
                    <p>Activités de votre Association</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Tableau de Bord</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Gestion des Activités</li>
                        </ol>
                        <ol class="breadcrumb">
                            <a class="" href="{{ route('activitenew.create') }}"><span
                                    class="badge bg-info"><i class="bi bi-person-plus-fill"></i>Ajouter</span></a>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        {{-- message --}}
        {!! Toastr::message() !!}
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Activité</th>
                                <th>Libellé</th>
                                <th>Description</th>
                                @if (Auth::user()->rolename = 'Super')
                                    <th>Association</th>
                                @endif
                                <th>Montant</th>
                                <th>Date de Fin</th>
                                <th>Statut</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                                <tr>
                                    <td class="id">{{ ++$key }}</td>
                                    <td class="name">{{ $item->activites->libelle }}</td>
                                    <td class="email">{{ $item->libelle }}</td>
                                    <td class="email">{{ $item->description }}</td>
                                    @if (Auth::user()->rolename = 'Super')
                                        <td class="email">{{ $item->associations->libelle }}</td>
                                    @endif
                                    <td class="email">$ {{ $item->montant }}</td>
                                    <td class="phone_number">{{ $item->created_at }}</td>
                                    @if ($item->status == 'Active')
                                        <td class="status"><span
                                                class="badge bg-success">{{ $item->status }}</span></td>
                                    @endif
                                    @if ($item->status == 'Desactiver')
                                        <td class="status"><span
                                                class="badge bg-danger">{{ $item->status }}</span></td>
                                    @endif
                                    @if ($item->status == null)
                                        <td class="status"><span
                                                class="badge bg-danger">{{ $item->status }}</span></td>
                                    @endif
                                    <td class="text-center">
                                        <form action="{{ route('activitenew.destroy', $item->id) }}" method="post">
                                            {{-- <a href="{{ route('activitenew.create') }}">
                                                <span class="badge bg-info"><i class="bi bi-person-plus-fill"></i></span>
                                            </a> --}}
                                            <a href="{{ route('activitenew.edit', $item->id) }}">
                                                <span class="badge bg-success"><i class="bi bi-pencil-square"></i></span>
                                            </a>
                                            @csrf @method('DELETE')
                                            <button style="border: none;"
                                                onclick="return confirm('Etes-vous sûre de vouloir supprimer cette activités?')"><span
                                                    class="badge bg-danger"><i class="bi bi-trash"></i></span></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
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

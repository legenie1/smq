@extends('layouts.master')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Gestion Des Associations</h3>
                    <p class="text-subtitle text-muted">Pour que l'utilisateur vérifie sa liste</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Tableau de Bord</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Gestion des Associations</li>
                        </ol>
                        <ol class="breadcrumb">
                            <a class="" href="{{ route('association.create') }}"><span class="badge bg-info"><i class="bi bi-person-plus-fill"></i>Ajouter</span></a>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        {{-- message --}}
        {!! Toastr::message() !!}
        <section class="section">
            <div class="card">
                <div class="card-header">
                    Association Datatable
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Session</th>
                                <th>Date de Début</th>
                                <th>Date de Fin</th>
                                <th>Statut</th>
                                <th class="text-center">Action</th>
                            </tr>    
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                                <tr>
                                    <td class="id">{{ ++$key }}</td>
                                    <td class="name">{{ $item->libelle }}</td>
                                    <td class="email">{{ $item->session }}</td>
                                    <td class="phone_number">{{ $item->start }}</td>
                                    <td class="phone_number">{{ $item->end }}</td>
                                    @if($item->status =='Active')
                                    <td class="status"><span class="badge bg-success">{{ $item->status }}</span></td>
                                    @endif
                                    @if($item->status =='Desactiver')
                                    <td class="status"><span class="badge bg-danger">{{ $item->status }}</span></td>
                                    @endif
                                    @if($item->status ==null)
                                    <td class="status"><span class="badge bg-danger">{{ $item->status }}</span></td>
                                    @endif
                                    <td class="text-center">
                                        <form action="{{ route('association.destroy', $item->id) }}" method="post">
                                            <a href="{{ route('association.create') }}">
                                                <span class="badge bg-info"><i class="bi bi-person-plus-fill"></i></span>
                                            </a>
                                            <a href="{{  route('association.edit', $item->id) }}">
                                                <span class="badge bg-success"><i class="bi bi-pencil-square"></i></span>
                                            </a>
                                                @csrf @method('DELETE')  
                                            <button style="border: none;" onclick="return confirm('Etes-vous sûre de vouloir supprimer cette association?')"><span class="badge bg-danger"><i class="bi bi-trash"></i></span></button>
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
                <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                href="#">Gesta</a></p>
            </div>
        </div>
    </footer>
@endsection

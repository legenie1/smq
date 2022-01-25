@extends('layouts.master')
@section('content')
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Gestion Des Comptes</h3>
                    <p class="text-subtitle text-muted">Pour que l'utilisateur vérifie sa liste</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Tableau de Bord</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Gestion des Comptes</li>
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
                    User Datatable
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Profil</th>
                                <th>Addresse Email</th>
                                <th>Tel</th>
                                <th>Statut</th>
                                <th>Rôle</th>
                                <th class="text-center">Action</th>
                            </tr>    
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                                <tr>
                                    <td class="id">{{ ++$key }}</td>
                                    <td class="name">{{ $item->name }}</td>
                                    <td class="name">
                                        <div class="avatar avatar-xl">
                                            <img src="{{ URL::to('/images/'. $item->avatar) }}" alt="{{ $item->avatar }}">
                                        </div>
                                    </td>
                                    <td class="email">{{ $item->email }}</td>
                                    <td class="phone_number">{{ $item->phone_number }}</td>
                                    @if($item->status =='Active')
                                    <td class="status"><span class="badge bg-success">{{ $item->status }}</span></td>
                                    @endif
                                    @if($item->status =='Desactiver')
                                    <td class="status"><span class="badge bg-danger">{{ $item->status }}</span></td>
                                    @endif
                                    @if($item->status ==null)
                                    <td class="status"><span class="badge bg-danger">{{ $item->status }}</span></td>
                                    @endif

                                    <td class="role_name"><span  class="badge bg-success">{{ $item->role_name }}</span></td>

                                    <td class="text-center">
                                        <a href="{{ route('user/add/new') }}">
                                            <span class="badge bg-info"><i class="bi bi-person-plus-fill"></i></span>
                                        </a>
                                        <a href="{{ url('view/detail/'.$item->id) }}">
                                            <span class="badge bg-success"><i class="bi bi-pencil-square"></i></span>
                                        </a>  
                                        <a href="{{ url('delete_user/'.$item->id) }}" onclick="return confirm('Etes-vous sure de vouloir supprimer ce compte?')"><span class="badge bg-danger"><i class="bi bi-trash"></i></span></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
    <footer>
        <div class="footer clearfix mb-0 text-muted ">
            <div class="float-start">
                <p>2022 &copy; Gesta</p>
            </div>
            <div class="float-end">
            </div>
        </div>
    </footer>
</div>
@endsection

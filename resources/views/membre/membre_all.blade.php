@extends('layouts.master')
@section('content')
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Gestion Des Membres</h3>
                        <p class="text-subtitle text-muted">Pour que l'utilisateur vérifie sa liste</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Tableau de Bord</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Gestion des Membres</li>
                            </ol>
                            @if (Auth::user()->role_name == 'Super' || Auth::user()->role_name == 'Admin')
                                <ol class="breadcrumb">
                                    <a class="" href="{{ route('membre.create') }}"><span
                                            class="badge bg-info"><i class="bi bi-person-plus-fill"></i>Ajouter</span></a>
                                </ol>
                            @endif

                        </nav>
                    </div>
                </div>
            </div>
            {{-- message --}}
            {!! Toastr::message() !!}
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        Membre Datatable
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom</th>
                                    <th>Avatar</th>
                                    <th>Tel</th>
                                    <th>CNI</th>
                                    <th>Poste</th>
                                    <th>Association</th>
                                    <th>Statut</th>
                                    @if (Auth::user()->role_name == 'Super' || Auth::user()->role_name == 'Admin')
                                        <th class="text-center">Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="id">{{ '#' }}</td>
                                    <td class="name">{{ Auth::user()->name }}</td>
                                    <td class="name">
                                        <div class="avatar avatar-xl">
                                            <img src="{{ URL::to('/images/' . Auth::user()->avatar) }}"
                                                alt="{{ Auth::user()->avatar }}">
                                        </div>
                                    </td>
                                    <td class="email">{{ Auth::user()->phone_number }}</td>
                                    <td class="phone_number">{{ Auth::user()->cni }}</td>
                                    <td class="phone_number">{{ Auth::user()->profil }}</td>
                                    <td class="phone_number">{{ Auth::user()->associations->libelle }}</td>
                                    @if (Auth::user()->status == 'Active')
                                        <td class="status"><span
                                                class="badge bg-success">{{ Auth::user()->status }}</span></td>
                                    @endif
                                    @if (Auth::user()->status == 'Desactiver')
                                        <td class="status"><span
                                                class="badge bg-danger">{{ Auth::user()->status }}</span></td>
                                    @endif
                                    @if (Auth::user()->status == null)
                                        <td class="status"><span
                                                class="badge bg-danger">{{ Auth::user()->status }}</span></td>
                                    @endif
                                    @if (Auth::user()->role_name == 'Super' || Auth::user()->role_name == 'Admin')
                                        <td class="text-center">
                                            <form action="{{ route('membre.destroy', Auth::user()->id) }}" method="post">
                                                <a href="{{ route('membreinvite', Auth::user()->id) }}">
                                                    <span class="badge bg-info">Inviter<i
                                                            class="bi bi-mail"></i></span>
                                                </a>
                                                <a href="{{ route('membre.create') }}">
                                                    <span class="badge bg-info"><i
                                                            class="bi bi-person-plus-fill"></i></span>
                                                </a>
                                                <a href="{{ route('membre.edit', Auth::user()->id) }}">
                                                    <span class="badge bg-success"><i
                                                            class="bi bi-pencil-square"></i></span>
                                                </a>
                                                @csrf @method('DELETE')
                                                <button style="border: none;"
                                                    onclick="return confirm('Etes-vous sûre de vouloir supprimer cette membre?')"><span
                                                        class="badge bg-danger"><i
                                                            class="bi bi-trash"></i></span></button>
                                            </form>
                                        </td>
                                    @endif

                                </tr>
                                <?php
                                // $mem = 0;
                                ?>
                                @foreach ($data as $key => $item)
                                    <tr>
                                        <td class="id">{{ ++$key }}</td>
                                        <td class="name">{{ $item->name }}</td>
                                        <td class="name">
                                            <div class="avatar avatar-xl">
                                                <img src="{{ URL::to('/images/' . $item->avatar) }}"
                                                    alt="{{ $item->avatar }}">
                                            </div>
                                        </td>
                                        <td class="email">{{ $item->phone_number }}</td>
                                        <td class="phone_number">{{ $item->cni }}</td>
                                        <td class="phone_number">{{ $item->profil }}</td>
                                        <td class="phone_number">{{ $item->associations->libelle }}</td>
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
                                        @if (Auth::user()->role_name == 'Super' || Auth::user()->role_name == 'Admin')
                                            <td class="text-center">
                                                <form action="{{ route('membre.destroy', $item->id) }}" method="post">
                                                    <a href="{{ route('membreinvite', $item->id) }}">
                                                        <span class="badge bg-info">Inviter<i
                                                                class="bi bi-mail"></i></span>
                                                    </a>
                                                    <a href="{{ route('membre.create') }}">
                                                        <span class="badge bg-info"><i
                                                                class="bi bi-person-plus-fill"></i></span>
                                                    </a>
                                                    <a href="{{ route('membre.edit', $item->id) }}">
                                                        <span class="badge bg-success"><i
                                                                class="bi bi-pencil-square"></i></span>
                                                    </a>
                                                    @csrf @method('DELETE')
                                                    <button style="border: none;"
                                                        onclick="return confirm('Etes-vous sûre de vouloir supprimer cette membre?')"><span
                                                            class="badge bg-danger"><i
                                                                class="bi bi-trash"></i></span></button>
                                                </form>
                                            </td>
                                        @endif
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

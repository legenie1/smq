@extends('layouts.master')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Gestion Des KPI</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Tableau de Bord</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Gestion des kpi</li>
                        </ol>
                        <ol class="breadcrumb">
                            <a class="" href="{{ route('kpi.create') }}"><span class="badge bg-info"><i
                                        class="bi bi-person-plus-fill"></i>Ajouter</span></a>
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
                                <th>#</th>
                                <th>Trimestre</th>
                                <th>Taux de réalisation de l'objectif</th>
                                <th>Taux de renouvellement</th>
                                <th>Taux d'encaissement exercice</th>
                                <th>Taux d'encaissement arrieres</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($data as $key => $item)
                                <tr>
                                    <td class="id">{{ ++$key }}</td>
                                    <td class="name">{{ $item->trimestre }}</td>
                                    <td class="name text-center">{{ round(($item->chiffre / $item->objectif) * 100, 2) }} %
                                    </td>
                                    <td class="name text-center">
                                        {{ round(($item->police_renouvele / $item->police_a_renouvele) * 100,2) }} %</td>
                                    <td class="name text-center">
                                        {{ round(($item->total_encais1 / $item->total_prime1) * 100, 2) }} %
                                    </td>
                                    <td class="name text-center">
                                        {{ round(($item->total_encais2 / $item->total_prime2) * 100, 2) }} %
                                    </td>
                                    <td class="text-center">
                                        <form action="{{ route('kpi.destroy', $item->id) }}" method="post">
                                            <a href="{{ route('kpi.edit', $item->id) }}">
                                                <span class="badge bg-success"><i class="bi bi-pencil-square"></i></span>
                                            </a>

                                            @csrf @method('DELETE')
                                            <button style="border: none;"
                                                onclick="return confirm('Etes-vous sûre de vouloir supprimer ce kpi?')"><span
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

        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <div id="bar-chart"></div>
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


    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script>
        $(function() {
            Highcharts.chart('bar-chart', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'KPI par trimestre'
                },
                xAxis: {
                    categories: <?= $terms ?>,
                    crosshair: true
                },
                // yAxis: {
                //     min: 0,
                //     title: {
                //         text: ''
                //     }
                // },
                yAxis: [{
                    title: {
                        text: 'Primary Axis'
                    },
                    plotLines: [{
                        value: 0,
                        width: 2,
                        zIndex: 1
                    }],
                    gridLineWidth: 0
                }, {
                    title: {
                        text: 'Secondary Axis'
                    },
                    opposite: true
                }],
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key} Marks</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y}</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: <?= $data2 ?>
            });
        });
    </script>
@endsection

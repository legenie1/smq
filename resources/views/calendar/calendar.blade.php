@extends('layouts.master')
@section('content')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                },
                // initialDate: '2020-09-12',
                navLinks: true, // can click day/week names to navigate views
                nowIndicator: true,

                weekNumbers: true,
                weekNumberCalculation: 'ISO',

                editable: true,
                selectable: true,
                dayMaxEvents: true,

                events: {!! json_encode($events) !!}

            });

            calendar.render();
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

        <h3 class="page-title">{{ trans('global.systemCalendar') }}</h3>
        <div class="card">
            <div class="card-header">
                {{-- @can('event_create') --}}
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('events.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.event.title_singular') }}
                        </a>
                    </div>
                </div>
                {{-- @endcan --}}
            </div>

            <div class="card-body">

                <div id="calendar"></div>

            </div>
        </div>

    @endsection

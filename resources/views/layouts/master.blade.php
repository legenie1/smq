<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMQ-NSIA</title>
    <link rel="shortcut icon" href="{{ URL::to('assets/images/favicon.png') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::to('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/vendors/iconly/bold.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/css/app.css') }}">
    <link rel="shortcut icon" href="{{ URL::to('assets/images/favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ URL::to('assets/vendors/simple-datatables/style.css') }}">
    {{-- Summermote style --}}
    <link rel="stylesheet" href="{{ URL::to('assets/vendors/summernote/summernote-lite.min.css') }}">
    {{-- calendar part --}}
    <link href="{{ URL::to('assets/lib/main.css') }}" rel='stylesheet' />
    <script src="{{ URL::to('assets/lib/main.js') }}"></script>
    {{-- message toastr --}}
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="{{ URL::to('assets/vendors/toastify/toastify.css') }}">
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

</head>
<style>
    .form-group[class*=has-icon-].has-icon-left .form-select {
        padding-left: 2.5rem;
    }

</style>

<body>
    <div id="app">
        @if (Auth::user()->role_name == 'Admin' || (Auth::user()->role_name == 'Super' && Auth::user()->status == 'Active'))
            @include('sidebar.dashboard')
            <div id="main" class='layout-navbar'>
                @include('navbar.navbar')
                <div id="main-content" class='layout-navbar'>
                    @yield('content')
                </div>
            </div>

        @elseif (Auth::user()->role_name == 'Membre' && Auth::user()->status == 'Active')
            @include('sidebar.membre')
            <div id="main" class='layout-navbar'>
                @include('navbar.navbar')
                <div id="main-content" class='layout-navbar'>
                    @yield('content')
                </div>
            </div>
        @elseif (Auth::user()->role_name == '' && Auth::user()->status == 'Desactiver')
            @include('sidebar.new')
            @yield('content')
        @elseif (Auth::user()->role_name == 'Membre' && Auth::user()->status == 'Desactiver')
            @include('sidebar.new')
            @yield('content')
        @endif


        {{-- @yield('menu') --}}
        {{-- content main page --}}


    </div>

    <script src="{{ URL::to('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::to('assets/vendors/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ URL::to('assets/js/pages/dashboard.js') }}"></script>
    <script src="{{ URL::to('assets/js/main.js') }}"></script>

    <script src="{{ URL::to('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ URL::to('assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ URL::to('assets/vendors/toastify/toastify.js') }}"></script>
    <script src="{{ URL::to('assets/js/extensions/toastify.js') }}"></script>

    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
    <script src="{{ URL::to('assets/vendors/summernote/summernote-lite.min.js') }}"></script>
    <script>
        $('#summernote').summernote({
            tabsize: 2,
            height: 120,
        })
        $("#hint").summernote({
            height: 100,
            toolbar: false,
            placeholder: 'type with apple, orange, watermelon and lemon',
            hint: {
                words: ['apple', 'orange', 'watermelon', 'lemon'],
                match: /\b(\w{1,})$/,
                search: function(keyword, callback) {
                    callback($.grep(this.words, function(item) {
                        return item.indexOf(keyword) === 0;
                    }));
                }
            }
        });
    </script>
    <script src="{{ URL::to('assets/js/main.js') }}"></script>

</body>

</html>

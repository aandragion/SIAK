<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Starter</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href={{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}>
    <!-- Theme style -->
    <link rel="stylesheet" href={{ asset('lte/dist/css/adminlte.min.css') }}>
    <link rel="stylesheet" href="{{ asset('lte/plugins/toastr/toastr.min.css') }}">
</head>

<script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('lte/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('lte/plugins/toastr/toastr.min.js') }}"></script>
<script>
    toastr.options = {
        "newestOnTop": false,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "500",
        "timeOut": "3000",
        "extendedTimeOut": "500",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    $(function() {
        $('.toastrDefaultSuccess').click(function() {
            toastr.success('1 Data mahasiswa ditambahkan')

        });
    });
</script>
<script>
    .dropdown - menu show {
        padding: 10 px;
    }
</script>
<script src="{{ asset('lte/dist/js/adminlte.min.js') }}"></script>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        @include('admin/header')
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="margin:0;padding:50px;padding-top:0px;">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <h1 class="mt-5"><b>Input Kurikulum Mata Kuliah</b></h1>
                    <div class="row mb-2 mt-3">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-md-2">
                                    Program Studi
                                </div>
                                <div class="col-sm-2">
                                    <b>{{ $s_kmatkul->nama_jurusan }}</b>
                                </div>
                            </div>
                        </div><!-- /.col -->
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-md-2">
                                    Kurikulum
                                </div>
                                <div class="col-sm-2">
                                    <b>{{ $s_kmatkul->nama_kurikulum }}</b>
                                </div>
                            </div>
                        </div><!-- /.col -->
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-md-2">
                                    Periode
                                </div>
                                <div class="col-sm-2">
                                    <b>{{ $s_kmatkul->nama_periode }} / {{ $s_kmatkul->smt_periode }}</b>
                                </div>
                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                    <div class="row">
                        <a {{ $a = $s_kmatkul->jumlah_semester }} hidden></a>
                        @if ($a > 6)
                            @for ($i = 1; $i <= 8; $i++)
                            <a    {{ $b = $s_kmatkul->smt_periode }} @endphp hidden></a>
                                @if ( $b == 'Genap')
                                    @if ($i % 2 == 0)
                                    <div class="col-6">
                                        <div class="card card-primary">
                                            <div class="card-header bg-dark">
                                                <h3 class="card-title">Semester {{ $i }}</h3>
                                                <div class="card-tools">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary dropdown-toggle"
                                                            data-toggle="dropdown" id='tombols'>
                                                            Tambah
                                                        </button>
                                                        <div class="dropdown-menu" style="padding:10px;">
                                                            <form action="{{ route('create-kmatkul') }}" method="post">
                                                                {{ csrf_field() }}
    
                                                                <input class="form-control"
                                                                    id="myInput{{ $i }}" type="text"
                                                                    placeholder="Search..">
    
                                                                @foreach ($s_matkul as $item)
                                                                    <input id="id_kurikulum" name="id_kurikulum"
                                                                        value="{{ $s_kmatkul->id_kurikulum }}"
                                                                        hidden></input>
    
                                                                    <input id="semester" name="semester"
                                                                        value="{{ $i }}" hidden></input>
                                                                    <div id="search1">
    
                                                                    </div>
                                                                @endforeach
    
                                                                <table class="table-hover " id="dataTable" width="100%"
                                                                    cellspacing="0">
                                                                    <thead>
                                                                        <tr>
    
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="myTable{{ $i }}">
                                                                        <?php $no=1; foreach ($s_matkul as $row): ?>
                                                                        <a {{ $resnew = DB::table('kmatkul')->where('id_matkul', $row->id_matkul)->where('kmatkul.id_kurikulum', $idkur)->count() }}
                                                                            hidden></a>
                                                                        @if ($resnew > 0)
                                                                            <tr class="odd gradeX">
                                                                                <td><button class="btn"
                                                                                        style="color: rgb(0, 0, 0)"
                                                                                        type="submit" id="id_matkul"
                                                                                        name="id_matkul"
                                                                                        value="{{ $row->id_matkul }}"
                                                                                        hidden>{{ $row->nama_matkul }}</button>
                                                                                </td>
                                                                            </tr>
                                                                        @else
                                                                            <tr class="odd gradeX">
                                                                                <td><button class="btn"
                                                                                        style="color: rgb(0, 0, 0)"
                                                                                        type="submit" id="id_matkul"
                                                                                        name="id_matkul"
                                                                                        value="{{ $row->id_matkul }}">{{ $row->nama_matkul }}</button>
                                                                                </td>
                                                                            </tr>
                                                                        @endif
                                                                        <?php endforeach; ?>
    
                                                                    </tbody>
                                                                </table>
    
    
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.card-tools -->
                                            </div>
    
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                                <table class="table  " id="dataTable" width="100%" cellspacing="0">
                                                    <thead>
                                                        <a {{ $res = DB::table('kmatkul')->join('matkul', 'matkul.id_matkul', '=', 'kmatkul.id_matkul')->where('id_kurikulum', $s_kmatkul->id_kurikulum)->where('semester', $i)->get() }}
                                                            hidden></a>
                                                        @foreach ($res as $item)
                                                            <tr>
                                                                <td>{{ $item->nama_matkul }}</td>
                                                                <td>{{ $item->kode_matkul }}</td>
                                                                <td>{{ $item->sks }} </td>
    
                                                                <td>
                                                                    <a
                                                                        href="{{ url('delete-kmatkul', $item->id_kmatkul) }}"><i></i>delete</a>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </thead>
                                                    <tbody id="myTable">
    
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <script>
                                            $(document).ready(function() {
                                                $("#myInput{{ $i }}").on("keyup", function() {
                                                    var value = $(this).val().toLowerCase();
                                                    $("#myTable{{ $i }} tr").filter(function() {
                                                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                                    });
                                                });
                                            });
                                        </script>
                                    </div>
                                    @endif
                                @elseif($b  == 'Ganjil')
                                    @if ($i % 2 == 1)
                                    <div class="col-6">
                                        <div class="card card-primary">
                                            <div class="card-header bg-dark">
                                                <h3 class="card-title">Semester {{ $i }}</h3>
                                                <div class="card-tools">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary dropdown-toggle"
                                                            data-toggle="dropdown" id='tombols'>
                                                            Tambah
                                                        </button>
                                                        <div class="dropdown-menu" style="padding:10px;">
                                                            <form action="{{ route('create-kmatkul') }}" method="post">
                                                                {{ csrf_field() }}
    
                                                                <input class="form-control"
                                                                    id="myInput{{ $i }}" type="text"
                                                                    placeholder="Search..">
    
                                                                @foreach ($s_matkul as $item)
                                                                    <input id="id_kurikulum" name="id_kurikulum"
                                                                        value="{{ $s_kmatkul->id_kurikulum }}"
                                                                        hidden></input>
    
                                                                    <input id="semester" name="semester"
                                                                        value="{{ $i }}" hidden></input>
                                                                    <div id="search1">
    
                                                                    </div>
                                                                @endforeach
    
                                                                <table class="table-hover " id="dataTable" width="100%"
                                                                    cellspacing="0">
                                                                    <thead>
                                                                        <tr>
    
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="myTable{{ $i }}">
                                                                        <?php $no=1; foreach ($s_matkul as $row): ?>
                                                                        <a {{ $resnew = DB::table('kmatkul')->where('id_matkul', $row->id_matkul)->where('kmatkul.id_kurikulum', $idkur)->count() }}
                                                                            hidden></a>
                                                                        @if ($resnew > 0)
                                                                            <tr class="odd gradeX">
                                                                                <td><button class="btn"
                                                                                        style="color: rgb(0, 0, 0)"
                                                                                        type="submit" id="id_matkul"
                                                                                        name="id_matkul"
                                                                                        value="{{ $row->id_matkul }}"
                                                                                        hidden>{{ $row->nama_matkul }}</button>
                                                                                </td>
                                                                            </tr>
                                                                        @else
                                                                            <tr class="odd gradeX">
                                                                                <td><button class="btn"
                                                                                        style="color: rgb(0, 0, 0)"
                                                                                        type="submit" id="id_matkul"
                                                                                        name="id_matkul"
                                                                                        value="{{ $row->id_matkul }}">{{ $row->nama_matkul }}</button>
                                                                                </td>
                                                                            </tr>
                                                                        @endif
                                                                        <?php endforeach; ?>
    
                                                                    </tbody>
                                                                </table>
    
    
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.card-tools -->
                                            </div>
    
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                                <table class="table  " id="dataTable" width="100%" cellspacing="0">
                                                    <thead>
                                                        <a {{ $res = DB::table('kmatkul')->join('matkul', 'matkul.id_matkul', '=', 'kmatkul.id_matkul')->where('id_kurikulum', $s_kmatkul->id_kurikulum)->where('semester', $i)->get() }}
                                                            hidden></a>
                                                        @foreach ($res as $item)
                                                            <tr>
                                                                <td>{{ $item->nama_matkul }}</td>
                                                                <td>{{ $item->kode_matkul }}</td>
                                                                <td>{{ $item->sks }} </td>
    
                                                                <td>
                                                                    <a
                                                                        href="{{ url('delete-kmatkul', $item->id_kmatkul) }}"><i></i>delete</a>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </thead>
                                                    <tbody id="myTable">
    
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <script>
                                            $(document).ready(function() {
                                                $("#myInput{{ $i }}").on("keyup", function() {
                                                    var value = $(this).val().toLowerCase();
                                                    $("#myTable{{ $i }} tr").filter(function() {
                                                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                                    });
                                                });
                                            });
                                        </script>
                                    </div>
                                    @endif
                                @endif
                            @endfor
                        @elseif ($a == 6)
                            @for ($i = 1; $i <= 6; $i++)
                            <a    {{ $b = $s_kmatkul->smt_periode }} @endphp hidden></a>
                            @if ( $b == 'Genap')
                                @if ($i % 2 == 0)
                                <div class="col-6">
                                    <div class="card card-primary">
                                        <div class="card-header bg-dark">
                                            <h3 class="card-title">Semester {{ $i }}</h3>
                                            <div class="card-tools">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary dropdown-toggle"
                                                        data-toggle="dropdown" id='tombols'>
                                                        Tambah
                                                    </button>
                                                    <div class="dropdown-menu" style="padding:10px;">
                                                        <form action="{{ route('create-kmatkul') }}" method="post">
                                                            {{ csrf_field() }}

                                                            <input class="form-control"
                                                                id="myInput{{ $i }}" type="text"
                                                                placeholder="Search..">

                                                            @foreach ($s_matkul as $item)
                                                                <input id="id_kurikulum" name="id_kurikulum"
                                                                    value="{{ $s_kmatkul->id_kurikulum }}"
                                                                    hidden></input>

                                                                <input id="semester" name="semester"
                                                                    value="{{ $i }}" hidden></input>
                                                                <div id="search1">

                                                                </div>
                                                            @endforeach

                                                            <table class="table-hover " id="dataTable" width="100%"
                                                                cellspacing="0">
                                                                <thead>
                                                                    <tr>

                                                                    </tr>
                                                                </thead>
                                                                <tbody id="myTable{{ $i }}">
                                                                    <?php $no=1; foreach ($s_matkul as $row): ?>
                                                                    <a {{ $resnew = DB::table('kmatkul')->where('id_matkul', $row->id_matkul)->where('kmatkul.id_kurikulum', $idkur)->count() }}
                                                                        hidden></a>
                                                                    @if ($resnew > 0)
                                                                        <tr class="odd gradeX">
                                                                            <td><button class="btn"
                                                                                    style="color: rgb(0, 0, 0)"
                                                                                    type="submit" id="id_matkul"
                                                                                    name="id_matkul"
                                                                                    value="{{ $row->id_matkul }}"
                                                                                    hidden>{{ $row->nama_matkul }}</button>
                                                                            </td>
                                                                        </tr>
                                                                    @else
                                                                        <tr class="odd gradeX">
                                                                            <td><button class="btn"
                                                                                    style="color: rgb(0, 0, 0)"
                                                                                    type="submit" id="id_matkul"
                                                                                    name="id_matkul"
                                                                                    value="{{ $row->id_matkul }}">{{ $row->nama_matkul }}</button>
                                                                            </td>
                                                                        </tr>
                                                                    @endif
                                                                    <?php endforeach; ?>

                                                                </tbody>
                                                            </table>


                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.card-tools -->
                                        </div>

                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table class="table  " id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <a {{ $res = DB::table('kmatkul')->join('matkul', 'matkul.id_matkul', '=', 'kmatkul.id_matkul')->where('id_kurikulum', $s_kmatkul->id_kurikulum)->where('semester', $i)->get() }}
                                                        hidden></a>
                                                    @foreach ($res as $item)
                                                        <tr>
                                                            <td>{{ $item->nama_matkul }}</td>
                                                            <td>{{ $item->kode_matkul }}</td>
                                                            <td>{{ $item->sks }} </td>

                                                            <td>
                                                                <a
                                                                    href="{{ url('delete-kmatkul', $item->id_kmatkul) }}"><i></i>delete</a>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </thead>
                                                <tbody id="myTable">

                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <script>
                                        $(document).ready(function() {
                                            $("#myInput{{ $i }}").on("keyup", function() {
                                                var value = $(this).val().toLowerCase();
                                                $("#myTable{{ $i }} tr").filter(function() {
                                                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                                });
                                            });
                                        });
                                    </script>
                                </div>
                                @endif
                            @elseif($b  == 'Ganjil')
                                @if ($i % 2 == 1)
                                <div class="col-6">
                                    <div class="card card-primary">
                                        <div class="card-header bg-dark">
                                            <h3 class="card-title">Semester {{ $i }}</h3>
                                            <div class="card-tools">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary dropdown-toggle"
                                                        data-toggle="dropdown" id='tombols'>
                                                        Tambah
                                                    </button>
                                                    <div class="dropdown-menu" style="padding:10px;">
                                                        <form action="{{ route('create-kmatkul') }}" method="post">
                                                            {{ csrf_field() }}

                                                            <input class="form-control"
                                                                id="myInput{{ $i }}" type="text"
                                                                placeholder="Search..">

                                                            @foreach ($s_matkul as $item)
                                                                <input id="id_kurikulum" name="id_kurikulum"
                                                                    value="{{ $s_kmatkul->id_kurikulum }}"
                                                                    hidden></input>

                                                                <input id="semester" name="semester"
                                                                    value="{{ $i }}" hidden></input>
                                                                <div id="search1">

                                                                </div>
                                                            @endforeach

                                                            <table class="table-hover " id="dataTable" width="100%"
                                                                cellspacing="0">
                                                                <thead>
                                                                    <tr>

                                                                    </tr>
                                                                </thead>
                                                                <tbody id="myTable{{ $i }}">
                                                                    <?php $no=1; foreach ($s_matkul as $row): ?>
                                                                    <a {{ $resnew = DB::table('kmatkul')->where('id_matkul', $row->id_matkul)->where('kmatkul.id_kurikulum', $idkur)->count() }}
                                                                        hidden></a>
                                                                    @if ($resnew > 0)
                                                                        <tr class="odd gradeX">
                                                                            <td><button class="btn"
                                                                                    style="color: rgb(0, 0, 0)"
                                                                                    type="submit" id="id_matkul"
                                                                                    name="id_matkul"
                                                                                    value="{{ $row->id_matkul }}"
                                                                                    hidden>{{ $row->nama_matkul }}</button>
                                                                            </td>
                                                                        </tr>
                                                                    @else
                                                                        <tr class="odd gradeX">
                                                                            <td><button class="btn"
                                                                                    style="color: rgb(0, 0, 0)"
                                                                                    type="submit" id="id_matkul"
                                                                                    name="id_matkul"
                                                                                    value="{{ $row->id_matkul }}">{{ $row->nama_matkul }}</button>
                                                                            </td>
                                                                        </tr>
                                                                    @endif
                                                                    <?php endforeach; ?>

                                                                </tbody>
                                                            </table>


                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.card-tools -->
                                        </div>

                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table class="table  " id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <a {{ $res = DB::table('kmatkul')->join('matkul', 'matkul.id_matkul', '=', 'kmatkul.id_matkul')->where('id_kurikulum', $s_kmatkul->id_kurikulum)->where('semester', $i)->get() }}
                                                        hidden></a>
                                                    @foreach ($res as $item)
                                                        <tr>
                                                            <td>{{ $item->nama_matkul }}</td>
                                                            <td>{{ $item->kode_matkul }}</td>
                                                            <td>{{ $item->sks }} </td>

                                                            <td>
                                                                <a
                                                                    href="{{ url('delete-kmatkul', $item->id_kmatkul) }}"><i></i>delete</a>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </thead>
                                                <tbody id="myTable">

                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <script>
                                        $(document).ready(function() {
                                            $("#myInput{{ $i }}").on("keyup", function() {
                                                var value = $(this).val().toLowerCase();
                                                $("#myTable{{ $i }} tr").filter(function() {
                                                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                                });
                                            });
                                        });
                                    </script>
                                </div>
                                @endif
                            @endif
                            @endfor
                        @endif

                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        @include('admin/footer')
        @include('sweetalert::alert')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->


    <script type="text/javascript">
        $('#searchody').on('keyup', function() {
            $value = $(this).val();

            $.ajax({
                type: 'get',
                url: '{{ URL::to('search') }}',
                data: {
                    'search': $value
                },
                success: function(data) {
                    $('#search1').html(data);
                }
            });
        })
    </script>


    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'csrftoken': '{{ csrf_token() }}'
            }
        });
    </script>

</body>

</html>

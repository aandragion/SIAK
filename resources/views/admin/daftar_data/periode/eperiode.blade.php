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

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        @include('admin/header')
        <!-- /.navbar -->


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="margin:0;">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <h1 class="mt-5"><b>Daftar Periode</b></h1>
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-left">
                                <div class="row mb-2">
                                </div>
                            </ol>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                    <div class="panel-body">
                        <form action="{{ route('update-periode', $e_periode->id_periode) }}" method="post">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputEstimatedBudget">Nama Periode</label>
                                    <input type="text" id="nama_periode" name="nama_periode"
                                        value="{{ $e_periode->nama_periode }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputEstimatedBudget">Semester</label>
                                    <select class="form-control" name="smt_periode" id="smt_periode">
                                        <option selected disabled> Pilih Semester</option>
                                        {{ $opsi_tersimpan = $e_periode->smt_periode }}

                                        <option {{ 'Ganjil' == $opsi_tersimpan ? 'selected' : '' }} value=" Ganjil ">
                                            Ganjil
                                        </option>
                                        <option {{ 'Genap' == $opsi_tersimpan ? 'selected' : '' }} value=" Genap ">
                                            Genap
                                        </option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputEstimatedBudget">Periode Awal</label>
                                    <input type="date" id="tgl_awal" name="tgl_awal"
                                        value="{{ $e_periode->tgl_awal }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputEstimatedBudget">Periode Akhir</label>
                                    <input type="date" id="tgl_akhir" name="tgl_akhir"
                                        value="{{ $e_periode->tgl_akhir }}" class="form-control">
                                </div>
                            </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>

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
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
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
</body>

</html>

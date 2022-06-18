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
                    <h1 class="mt-5"><b>Daftar Mata Kuliah</b></h1>
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

                        <form action="{{ route('update-matkul', $e_matkul->id_matkul) }}" method="post">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputEstimatedBudget">Kode Mata Kuliah</label>
                                    <input type="text" id="nama_ruangan" name="nama_ruangan"
                                        value="{{ $e_matkul->kode_matkul }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputEstimatedBudget">Nama Mata Kuliah</label>
                                    <input type="text" id="nama_matkul" name="nama_matkul" value="{{ $e_matkul->nama_matkul }}"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputEstimatedBudget">SKS</label>
                                    <input type="text" id="sks" name="sks" value="{{ $e_matkul->sks }}"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputEstimatedBudget">Program Studi</label>
                                    <input type="text" id="sks" name="sks" value="{{ $e_matkul->sks }}"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputEstimatedBudget">Program Studi</label>
                                    <select class="form-control" name="id_programstudi" id="id_programstudi">
                                        <option selected disabled> Pilih Program Studi</option>
                                        {{ $opsi_tersimpan = $e_matkul->id_programstudi }}
                                        
                                        @foreach ($d_prodi as $item)
                                        <option {{ ($item->id_programstudi == $opsi_tersimpan) ? 'selected'
                                        : '' ; }} value="{{ $item->id_programstudi }}">
                                            {{ $item->nama_jurusan }}
                                        </option>
                                    @endforeach
                                       
                                    </select>
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

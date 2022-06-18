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
                    <h1 class="mt-5"><b>Daftar Program Studi</b></h1>
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

                        <form action="{{ route('update-prodi', $e_prodi->id_programstudi) }}" method="post">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputEstimatedBudget">Kode Jurusan</label>
                                    <input type="text" id="kode_jurusan" name="kode_jurusan"
                                        value="{{ $e_prodi->kode_jurusan }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputEstimatedBudget">Nama Jurusan</label>
                                    <input type="text" id="nama_jurusan" name="nama_jurusan" value="{{ $e_prodi->nama_jurusan }}"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputEstimatedBudget">Jenjang</label>
                                    <select class="form-control" name="jenjang" id="jenjang">
                                      <option selected disabled> Pilih Program Studi</option>
                                      {{ $opsi_tersimpan = $e_prodi->jenjang }}
                                      
                                          <option {{ ("D3" == $opsi_tersimpan) ? 'selected'
                                            : '' ; }} value=" D3 ">D3
                                          </option>
                                          <option {{ ("D4" == $opsi_tersimpan) ? 'selected'
                                            : '' ; }} value=" D4 ">D4
                                          </option>
                                     
                                  </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputEstimatedBudget">Jumlah Semester</label>
                                    <select class="form-control" name="jumlah_semester" id="jumlah_semester">
                                      <option selected disabled> Pilih Program Studi</option>
                                      {{ $opsi_tersimpan = $e_prodi->jumlah_semester }}
                                      <?php
                                      for ($i = 1; $i <= 10; $i++) {
                                        echo "
                                        <option value='$i'";
                                            if ($opsi_tersimpan == $i) {
                                                echo 'selected';
                                            }
                                            echo ">$i</option>";
                                        }
                                        ?>
                                  </select>
                                </div>
								<div class="form-group">
									<label for="inputEstimatedBudget">Angkatan Prodi</label>
									<input type="number" id="kode_jurusan" name="angkatan_prodi" class="form-control"
                                    placeholder="Input Angkatan Prodi" value="{{$e_prodi->angkatan_prodi}}">
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

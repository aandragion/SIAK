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
			@if ($errors->any())
			<div class="alert alert-danger">
			<ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
			</ul>
			</div>
			@endif
                <div class="container-fluid">
                    <h1 class="mt-5"><b>Daftar Program Studi</b></h1>
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-left">
                                <div class="row mb-2">
                                    <div>
                                        <button type="button" class="btn btn-flat btn-block btn-success ml-2 mt-1"
                                            data-toggle="modal" data-target="#modal-lg">+ Tambah
                                            Data</button>
                                    </div>
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
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped " id="dataTable" width="100%"
                                cellspacing="0">
                                <thead>
                                    <tr  class="bg-dark ">
                                        <th>
                                            <center /> No
                                        </th>
                                        <th>
                                            <center /> Kode Jurusan
                                        </th>
                                        <th>
                                            <center /> Nama Jurusan Perkuliahan
                                        </th>
                                        <th>
                                            <center /> Jenjang
                                        </th>
                                        <th>
                                            <center /> Jumlah Semester
                                        </th>
                                        <th>
                                            <center /> Aksi
                                        </th>
                                    </tr>
                                    
                                </thead>
                                <tbody id="myTable">
									@php $no = 1; @endphp
									@php if(isset($_GET['page'])){$i=$_GET['page']*10-9;}else{$i=1;} @endphp
                                    @foreach ($d_prodi as $item)
                                        <tr>
                                            <th>
                                                <center />{{ $i++ }}
                                            </th>
                                            <td>{{ $item->kode_jurusan }}</td>
                                            <td>{{ $item->nama_jurusan }}</td>
                                            <td>{{ $item->jenjang }}</td>
                                            <td>{{ $item->jumlah_semester }}</td>
                                            <td>
                                                <a href="{{ url('e-prodi', $item->id_programstudi) }}"><i
                                                        class="fas fa-edit"></i> Edit</a> |
                                                <a href="{{ url('delete-prodi', $item->id_programstudi) }}"><i
                                                        class="fas fa-trash-alt" style="color:red"></i>delete</a> </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
		<div class='text-center' style="margin-top:25px;">
		{{$d_prodi->links()}}
		</div>
        <!-- /.content-wrapper -->

        <div class="modal fade" id="modal-lg">
            <div class="modal-dialog modal-lg">
                <form action="{{ route('create-prodi') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Input Program Studi</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{-- <div class="form-group">
                                <label for="inputEstimatedBudget">ID Ruang</label>
                                <input type="text" id="id_ruang" name="id_ruang"class="form-control">
                            </div> --}}
                            <div class="form-group">
                                <label for="inputEstimatedBudget">Kode Jurusan</label>
                                <input type="text" id="kode_jurusan" name="kode_jurusan" class="form-control"
                                    placeholder="Input Kode Jurusan" value="{{old('kode_jurusan')}}">
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedBudget">Nama Jurusan Perkuliahan</label>
                                <input type="text" id="nama_jurusan" name="nama_jurusan" class="form-control"
                                    placeholder="Input Jurusan Perkuliahan" value="{{old('nama_jurusan')}}">
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedBudget">Jenjang</label>
                                <select class="form-control " name="jenjang" id="jenjang">
                                    <option selected disabled> Pilih Jenjang</option>
                                    <option value='D3' @if (old('jenjang') == 'D3' ) selected='selected' @endif> D3</option>
                                    <option value='D4' @if (old('jenjang') == 'D4' ) selected='selected' @endif> D4</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedBudget">Jumlah Semester</label>
                                <select class="form-control " name="jumlah_semester" id="jumlah_semester">
                                    <option selected disabled> Pilih Semester</option>
                                    <?php
                                    for ($i = 1; $i <= 10; $i++) {
                                        ?>    
                                    <option value='<?php echo $i ?>' @if (old('jumlah_semester') == $i ) selected='selected' @endif><?php echo $i; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
							<div class="form-group">
                                <label for="inputEstimatedBudget">Angkatan Prodi</label>
                                <input type="number" id="kode_jurusan" name="angkatan_prodi" class="form-control"
                                    placeholder="Input Angkatan Prodi" value="{{old('angkatan_prodi')}}">
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <div class="row mb-2">
                                <div>
                                    <button type="submit"
                                        class="btn btn-block btn-flat btn-success mt-1 toastrDefaultSuccess">Simpan</button>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-block btn-flat btn-danger ml-3 mt-1"
                                        data-dismiss="modal">Kembali</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <div class="modal fade" id="modal-edit">
            <div class="modal-dialog modal-lg">
                <form action="{{ route('create-ruang') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Input Ruang Perkuliahan</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{-- <div class="form-group">
                                <label for="inputEstimatedBudget">ID Ruang</label>
                                <input type="text" id="id_ruang" name="id_ruang"class="form-control">
                            </div> --}}
                            <div class="form-group">
                                <label for="inputEstimatedBudget">Nama Ruang Perkuliahan</label>
                                <input type="text" id="nama_ruang" name="nama_ruang" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedBudget">Lokasi</label>
                                <input type="text" id="lokasi" name="lokasi" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <div class="row mb-2">
                                <div>
                                    <button type="submit"
                                        class="btn btn-block btn-flat btn-success mt-1 toastrDefaultSuccess">Simpan</button>
                                </div>
                                <div>
                                    <button type="button"
                                        class="btn btn-block btn-flat btn-danger ml-3 mt-1toastrDefaultSuccess"
                                        data-dismiss="modal">Kembali</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

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
	<style>
	.pagination{
		display:inline-flex;
	}
	</style>
</body>

</html>

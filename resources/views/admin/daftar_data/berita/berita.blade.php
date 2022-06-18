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
                    <h1 class="mt-5"><b>Daftar Berita</b></h1>
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
                                    <tr class="bg-dark ">
                                        <th>
                                            <center /> No
                                        </th>
                                        <th>
                                            <center /> Judul
                                        </th>
                                        <th>
                                            <center /> Isi
                                        </th>
                                        <th>
                                            <center /> Author
                                        </th>
										<th>
                                            <center /> Gambar
                                        </th>
                                        <th>
                                            <center /> Keterangan Berita
                                        </th>
                                        <th>
                                            <center /> Action
                                        </th>
                                    </tr>
                                    
                                </thead>
                                <tbody id="myTable">
								@php $no = 1; @endphp
								@php if(isset($_GET['page'])){$i=$_GET['page']*10-9;}else{$i=1;} @endphp
                                    @forelse ($d_berita as $item)
                                        <tr>
                                            <th>
                                                <center />{{ $i++ }}
                                            </th>
                                            <td>{{ $item->judul }}</td>
                                            <td>{{ $item->isi }}</td>
                                            <td>{{ $item->author }}</td>
                                            <td><img src='/foto_berita/{{ $item->gambar }}' style="width:120px;"></td>
                                            <td>{{ $item->keterangan_brt }}</td>
                                            
                                            <td>
                                                <a href="{{ url('e-berita', $item->id_berita) }}"><i
                                                        class="fas fa-edit"></i> Edit</a> |
                                                <a href="{{ url('delete-berita', $item->id_berita) }}"><i
                                                        class="fas fa-trash-alt" style="color:red"></i>delete</a> </a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr><td colspan="12" class="text-center">Data belum ada</td></tr>
                                @endforelse
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
		{{$d_berita->links()}}
		</div>
        <!-- /.content-wrapper -->

        <div class="modal fade" id="modal-lg">
            <div class="modal-dialog modal-lg">
                <form action="{{ route('create-berita') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Input Berita</h4>
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
                                <label for="inputEstimatedBudget">Judul</label>
                                <input type="text" id="nik" name="judul" class="form-control" placeholder="Input Judul" value="{{old('judul')}}">
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedBudget">Isi</label>
                                <input type="text" id="nidn" name="isi" class="form-control"
                                    placeholder="Input Isi" value="{{old('isi')}}">
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedBudget">Author</label>
                                <input type="text" id="nama_dosen" name="author" class="form-control"
                                    placeholder="Input Author" value="{{old('author')}}">
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedBudget">Keterangan Berita</label>
                                <input type="text" id="jabatan" name="keterangan_brt" class="form-control"
                                    placeholder="Input Keterangan Berita" value="{{old('keterangan_brt')}}">
                            </div>
                            
							<div class="form-group">
								
                                <label for="inputEstimatedBudget">Gambar Berita</label>
                                <input type="file" id="photo" name="gambar" class="form-control"
                                    placeholder="Input Gambar Berita" value="{{old('gambar')}}">
								
								
                            </div>
							<div class="holder">
								<img id="imgPreview" src="#" alt="foto berita" style="width:150px;"/>
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
	<script>
		$(document).ready(()=>{
      $('#photo').change(function(){
        const file = this.files[0];
        console.log(file);
        if (file){
          let reader = new FileReader();
          reader.onload = function(event){
            console.log(event.target.result);
            $('#imgPreview').attr('src', event.target.result);
          }
          reader.readAsDataURL(file);
        }
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

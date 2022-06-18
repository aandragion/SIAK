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
                    <h1 class="mt-5"><b>Daftar Dosen</b></h1>
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
                        <form action="{{ route('update-dosen', $e_dosen->id_dosen) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group">
                                <label for="inputEstimatedBudget">NIK</label>
                                <input type="text" id="nik" name="nik" class="form-control"
                                value="{{ $e_dosen->nik }}" placeholder="Input NIK">
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedBudget">NIDN</label>
                                <input type="text" id="nidn" name="nidn" class="form-control"
                                value="{{ $e_dosen->nidn }}" placeholder="Input NIDN">
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedBudget">Nama Dosen</label>
                                <input type="text" id="nama_dosen" name="nama_dosen" class="form-control"
                                    value="{{ $e_dosen->nama_dosen }}" placeholder="Input Dosen">
                            </div>
                            <div class="form-group">
                              <label for="inputEstimatedBudget">Jabatan</label>
                              <input type="text" id="jabatan" name="jabatan" class="form-control"
                                  value="{{ $e_dosen->jabatan }}" placeholder="Input Jabatan">
                          </div>
                          <div class="form-group">
                              <label for="inputEstimatedBudget">Jenis Kelamin</label>
                              <select class="form-control" name="jns_kelamin_dsn" id="jns_kelamin_dsn">
                                <option selected disabled> Pilih Jenis Kelamin</option>
                                      {{ $opsi_tersimpan = $e_dosen->jns_kelamin_dsn }}
                                      
                                          <option {{ ("Laki-Laki" == $opsi_tersimpan) ? 'selected'
                                            : '' ; }} value=" Laki-Laki ">Laki-Laki
                                          </option>
                                          <option {{ ("Perempuan" == $opsi_tersimpan) ? 'selected'
                                            : '' ; }} value=" Perempuan ">Perempuan
                                          </option>
                                     
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="inputEstimatedBudget">Tempat Lahir</label>
                            <input type="text" id="tempat_lahir_dsn" name="tempat_lahir_dsn" class="form-control"
                                value="{{ $e_dosen->tempat_lahir_dsn }}" placeholder="Input Tempat Lahir">
                        </div>
                        <div class="form-group">
                            <label for="inputEstimatedBudget">Tanggal Lahir</label>
                            <input type="date" id="tgl_lahir_dsn" name="tgl_lahir_dsn" class="form-control"
                                value="{{ $e_dosen->tgl_lahir_dsn }}" placeholder="Input Tanggal Lahir">
                        </div>
                        <div class="form-group">
                            <label for="inputEstimatedBudget">Alamat</label>
                            <input type="text" id="alamat_dsn" name="alamat_dsn" class="form-control"
                                value="{{ $e_dosen->alamat_dsn }}" placeholder="Input Alamat">
                        </div>
                        <div class="form-group">
                          <label for="inputEstimatedBudget">No Tlp</label>
                          <input type="text" id="tlp_dsn" name="tlp_dsn" class="form-control"
                              value="{{ $e_dosen->tlp_dsn }}" placeholder="Input No Telp">
                      </div>
                      <div class="form-group">
                          <label for="inputEstimatedBudget">Pendidikan</label>
                          <input type="text" id="pendidikan" name="pendidikan" class="form-control"
                              value="{{ $e_dosen->pendidikan }}" placeholder="Input Pendidikan">
                      </div>
					  <div class="form-group">
								
                                <label for="inputEstimatedBudget">Foto Dosen</label>
                                <input type="file" id="photo" name="photo_dsn" class="form-control"
                                    placeholder="Input Pendidikan" value="{{$e_dosen->photo_dsn}}">
								
								
                      </div>
					   <div class="holder">
								<img id="imgPreview" src="/foto_dosen/{{$e_dosen->photo_dsn}}" alt="foto dosen" style="width:150px;"/>
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
</body>

</html>

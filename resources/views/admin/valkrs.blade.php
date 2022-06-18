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
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/toastr/toastr.min.css') }}">

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        @include('admin/header')
        <!-- /.navbar -->

		
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="margin:0">
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
                    <h1 class="mt-5"><b>VALIDASI KRS MAHASISWA</b></h1>
                    <div class="row mb-2">
					{{--<div class="col-sm-6">
                            <ol class="breadcrumb float-sm-left">
                                <div class="row mb-2">
                                    <div>
                                        <button type="button" class="btn btn-block btn-secondary ml-2 mt-1"
                                            data-toggle="modal" data-target="#modal-lg">Tambah
                                            Data</button>
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-block btn-secondary ml-3 mt-1"
                                            data-toggle="modal" data-target="#import">Import</button>
                                        <a type="button" href="{{ route('export-mhs') }}"
                                            class="btn btn-block btn-secondary ml-3 mt-1" hidden>Export</a>
                                    </div>
									<div>
                                        <button type="button" class="btn btn-block btn-secondary ml-4 mt-1"
                                             onclick="window.location='downloadmhs/mahasiswas 2.xlsx'">Download Template Excel
										</button>
                                        
                                    </div>
                                </div>
                            </ol>
					</div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <a {{ $jur = DB::table('jurusan')->get(); }}
                                    hidden></a>
                                <div class="row ">
                                    <select class="custom-select" class="filter" style="width: auto;" id="mySelect">
                                        <option value="a">Jurusan</option>
										@foreach($jur as $rowjur)
										<option>{{$rowjur->nama_jurusan}}</option>
										@endforeach	
                                    </select>
                                    <select class="custom-select ml-2 mr-2" class="filter" style="width: auto;" id="mySelect2">
                                        <option value="a">Tahun</option>
                                        <?php
										$thn_skr = date('Y');
										for ($i = $thn_skr; $i >= 2007; $i--) {
										echo "
										<option value='$i'";
										echo ">$i</option>";
										}
										?>
                                    </select>

                                    <div class="card-tools">
                                        <div class="input-group input-group mr-5" style="width: 150px;">
                                            <div class="input-group input-group mr-5" style="width: 150px;">
                                                <input type="text" id="myInput" name="table_search" class="form-control float-right"
                                                    placeholder="Search">
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </ol>
					</div><!-- /.col -->--}}
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">IMPORT DATA</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('import-mhs') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>PILIH FILE</label>

                                    <input type="file" name='file' required='required' class="form-control-file border">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                                <button type="submit" class="btn btn-success">IMPORT</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
			
			<div class="content">
			<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link " id="link1" href="/valkrs/{{$val_mhs->id_mhs}}/1">SEMESTER 1</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="link2" href="/valkrs/{{$val_mhs->id_mhs}}/2">SEMESTER 2</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="link3" href="/valkrs/{{$val_mhs->id_mhs}}/3">SEMESTER 3</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="link4" href="/valkrs/{{$val_mhs->id_mhs}}/4">SEMESTER 4</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="link5" href="/valkrs/{{$val_mhs->id_mhs}}/5">SEMESTER 5</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="link6" href="/valkrs/{{$val_mhs->id_mhs}}/6">SEMESTER 6</a>
  </li>
  {{--<li class="nav-item">
    <a class="nav-link disabled" href="#">Semester 6</a>
  </li>--}}
</ul>

			</div>
			
			<div class="content">
			<div class='container-fluid bg-olive' style="padding:10px;">
				<div class="row">
					<div class="col-1">
					NAMA
					</div>
					<div class="col-2">
					: {{$val_mhs->nama_mhs}}
					</div>
					<div class="col-1">
					PEMBAYARAN 
					</div>
					<div class="col">
					: 
					@if($semester <= $val_mhs->smt_mahasiswa)
					{{$val_mhs->bayar_mhs}}
					@else
					BELUM LUNAS	
					@endif	
					</div>
				</div>
				<div class="row">
					<div class="col-1">
					PROGRAM STUDI
					</div>
					<div class="col-2">
					: {{$val_mhs->nama_jurusan}}
					</div>
					<div class="col-1">
					JUMLAH SKS 
					</div>
					<div class="col">
					: {{$krs1}} SKS
					</div>
				</div>
				<div class="row">
					<div class="col-1">
					NIM
					</div>
					<div class="col-2">
					: {{$val_mhs->nim}}
					</div>
					<div class="col-1">
					STATUS 
					</div>
					<div class="col">
					: {{$val_mhs->status}}
					</div>
				</div>
			</div>
			</div>
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid" style="padding:0px;">
                    @yield('content')
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped " id="dataTable" width="100%"
                                cellspacing="0">
                                <thead>
                                    <tr class="bg-dark ">
                                        <th>No</th>
                                        <th>
                                            <center /> Kode/Matakuliah
                                        </th>
                                        
                                        <th>
                                            <center /> Program Studi
                                        </th>
                                        <th>
                                            <center /> SKS
                                        </th>
										<th>
                                            <center /> Kelas
                                        </th>
                                        <th>
                                            <center /> Jam/Ruang
                                        </th>
										<th>
                                            <center /> Validasi
                                        </th>
                                        <th>
                                            <center /> Status
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    @php $no = 1; @endphp
									@php if(isset($_GET['page'])){$i=$_GET['page']*10-9;}else{$i=1;} @endphp
                                    @forelse ($krs as $item)
                                        <tr class="odd gradeX">
                                            <th>
                                                <center />{{$i++}}
                                            </th>
                                            <td>{{ $item->kode_matkul }} / {{$item->nama_matkul}}</td>
                                            <td>{{ $item->nama_jurusan }}</td>
                                            <td>{{ $item->sks }} SKS</td>
                                            <td>{{ $item->kelas }}</td>
                                            <td>{{ $item->jam_mulai }}-{{ $item->jam_selesai }} / {{ $item->nama_ruangan }}</td>
                                            <td><center/>
											@if($item->status_krs == 'acc')
												<a class="" href="{{ url('editstatuskrsx', $item->id_krs) }}" style="color:red;">
                                                                        Batalkan </a>
											@else
                                                <a class="" href="{{ url('editstatuskrsy', $item->id_krs) }}" style="color:#3d9970;">
                                                                        Validasi </a>
											@endif
                                            </td>
											@if($item->status_krs == 'acc')
											<td><center/><img src='/icon_baru/centang.png' style="border-radius:100px;width:35px;"></td>
											@else
											<td><center/><img src='/icon_baru/kali.png' style="border-radius:100px;width:36px;"></td>
											@endif
                                        </tr>
                                    @empty
                                               <tr><td colspan="8" class="text-center">Data belum ada</td></tr>
                                       @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
		<div class='text-center' style="margin-top:25px;">
		{{$krs->links()}}
		</div>
        <!-- /.content-wrapper -->

        <!-- /.modal -->
@foreach ($krs as $item)
										<div class="modal fade" id="modal-dp{{ $item->id_mhs}}">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Edit Status Mahasiswa
                                                                </h4>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                              <div class="row" style="padding:15px;">
                                                                    <div class="col-7">
                                                                        <div class="row mt-3 mb-3">
                                                                            <a class="col-3 "
                                                                                style="color: rgb(0, 0, 0)">Nama
                                                                                Calon Mahasiswa</a>
                                                                            <a class="col-8 "
                                                                                style="color: rgb(0, 0, 0)">
                                                                                {{ $item->nama_mhs }} </a>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <a class="col-3 "
                                                                                style="color: rgb(0, 0, 0)">Email
                                                                                </a>
                                                                            <a class="col-8 "
                                                                                style="color: rgb(0, 0, 0)">
                                                                                {{ $item->email }} </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-5">
                                                                        <div class="row mt-3 mb-3">
                                                                            <a class="col-3 "
                                                                                style="color: rgb(0, 0, 0)">No HP</a>
                                                                            <a class="col-5 "
                                                                                style="color: rgb(0, 0, 0)">
                                                                                {{ $item->no_tlp }} </a>
                                                                        </div>
                                                                        <div class="row mt-3 mb-3">
                                                                            <a class="col-3 "
                                                                                style="color: rgb(0, 0, 0)">Status</a>
                                                                           
																			<a class="col-5 "
                                                                                style="color: rgb(0, 0, 0)">
                                                                                {{ $item->status }} </a>
																							
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="card">
                                                                    <div class="card-header bg-dark">
                                                                        <div class="row">
                                                                            <div class="col-3">
                                                                                <a>Pilih Status</a>
                                                                            </div>
                                                                            {{-- <div class="col-3">
																		<a>Rencana Pertemuan</a>
																			</d		iv>
																			<div class="col-3">
																			<a>Jabatan mengajar</a>
																			</div> --}}
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-body">
																	 <a hidden {{ $bln = date('m') }}></a>

                                                                        <div>
                                                                            <form
                                                                                action="/edit-mhs/{{$item->id_mhs}}"
                                                                                method='post'>
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <div class="row">
                                                                                    <div class="col-10">
																					<select
                                                                                            class="form-control-sm "
                                                                                            name="status" id="tahun">
                                                                                            <option value='Aktif' @if (old('status') == 'Aktif') selected="selected" @endif> Aktif</option>
																							<option value='Tidak Aktif' @if (old('status') == 'Tidak Aktif') selected="selected" @endif> Tidak Aktif</option>
																							<option value='Cuti' @if (old('status') == 'Cuti') selected="selected" @endif> Cuti</option>
																							<option value='Drop Out' @if (old('status') == 'Drop Out') selected="selected" @endif> Drop Out</option>
																							<option value='Transfer' @if (old('status') == 'Transfer') selected="selected" @endif> Transfer</option>
																							<option value='Pindahan' @if (old('status') == 'Pindahan') selected="selected" @endif> Pindahan</option>
																								
                                                                                         
																					</select>

                                                                                    </div>
                                                                                    <div class="col-2">
                                                                                        <button type='submit'
                                                                                            name='send' value='Apply'
                                                                                            class="btn bg-olive btn-xs ml-2 mt-1">Apply</button>

                                                                                    </div>
                                                                            </form>
                                                                            
                                                                        </div>



                                                                        {{-- <div class="col-3">
																			<input type="text" class="form-control" id="usr"
																				placeholder="Input Jm Pertemuan"></input>
																				</div>
																			<div class="col-3">
																			<input type="text" class="form-control" id="usr"
																			placeholder="Input Jm Pertemuan"></input>
																			</div> --}}
																			</div>
																			</div>
																			</div>
																			{{-- <div class="col-2">
																			<button type="button" class="btn btn-block bg-olive btn-xs ml-2 mt-1" data-toggle="modal"
																			data-target="#modal-lg">+ Tambah
																			Kelas</button>
																			</div> --}}
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                        </div>
										<div class="modal fade" id="modal-sp{{ $item->id_mhs}}">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Edit Semester Mahasiswa
                                                                </h4>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                              <div class="row" style="padding:15px;">
                                                                    <div class="col-7">
                                                                        <div class="row mt-3 mb-3">
                                                                            <a class="col-3 "
                                                                                style="color: rgb(0, 0, 0)">Nama
                                                                                Calon Mahasiswa</a>
                                                                            <a class="col-8 "
                                                                                style="color: rgb(0, 0, 0)">
                                                                                {{ $item->nama_mhs }} </a>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <a class="col-3 "
                                                                                style="color: rgb(0, 0, 0)">Email
                                                                                </a>
                                                                            <a class="col-8 "
                                                                                style="color: rgb(0, 0, 0)">
                                                                                {{ $item->email }} </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-5">
                                                                        <div class="row mt-3 mb-3">
                                                                            <a class="col-3 "
                                                                                style="color: rgb(0, 0, 0)">No HP</a>
                                                                            <a class="col-5 "
                                                                                style="color: rgb(0, 0, 0)">
                                                                                {{ $item->no_tlp }} </a>
                                                                        </div>
                                                                        <div class="row mt-3 mb-3">
                                                                            <a class="col-3 "
                                                                                style="color: rgb(0, 0, 0)">Status</a>
                                                                           
																			<a class="col-5 "
                                                                                style="color: rgb(0, 0, 0)">
                                                                                {{ $item->status }} </a>
																							
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="card">
                                                                    <div class="card-header bg-dark">
                                                                        <div class="row">
                                                                            <div class="col-3">
                                                                                <a>Pilih Status Semesteran</a>
                                                                            </div>
                                                                            {{-- <div class="col-3">
																		<a>Rencana Pertemuan</a>
																			</d		iv>
																			<div class="col-3">
																			<a>Jabatan mengajar</a>
																			</div> --}}
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-body">
																	 <a hidden {{ $bln = date('m') }}></a>

                                                                        <div>
                                                                            <form
                                                                                action="/editsmt-mhs/{{$item->id_mhs}}"
                                                                                method='post'>
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <div class="row">
                                                                                    <div class="col-10">
																					<select
                                                                                            class="form-control-sm "
                                                                                            name="status" id="tahun">
                                                                                            <option value='Lolos' @if (old('status') == 'Lolos') selected="selected" @endif> Lolos</option>
																							<option value='Tidak Lolos' @if (old('status') == 'Tidak Lolos') selected="selected" @endif> Tidak Lolos</option>
																						 
																					</select>

                                                                                    </div>
                                                                                    <div class="col-2">
                                                                                        <button type='submit'
                                                                                            name='send' value='Apply'
                                                                                            class="btn bg-olive btn-xs ml-2 mt-1">Apply</button>

                                                                                    </div>
                                                                            </form>
                                                                            
                                                                        </div>



                                                                        {{-- <div class="col-3">
																			<input type="text" class="form-control" id="usr"
																				placeholder="Input Jm Pertemuan"></input>
																				</div>
																			<div class="col-3">
																			<input type="text" class="form-control" id="usr"
																			placeholder="Input Jm Pertemuan"></input>
																			</div> --}}
																			</div>
																			</div>
																			</div>
																			{{-- <div class="col-2">
																			<button type="button" class="btn btn-block bg-olive btn-xs ml-2 mt-1" data-toggle="modal"
																			data-target="#modal-lg">+ Tambah
																			Kelas</button>
																			</div> --}}
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                        </div>
										</div
        <!-- /.content-wrapper -->@endforeach
        
        <!-- /.modal -->

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
    <!-- Toastr -->
    <script src="{{ asset('lte/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('lte/dist/js/adminlte.min.js') }}"></script>
		{{--<script>
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
		</script>--}}

    <script>
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
            });
        
        
        var str=""
        $('#mySelect, #mySelect2').on('change',function(){
    
        var rows = $('#myTable tr');
        rows.hide();
    
        var sub = $("#mySelect2").val();
        var select= $('#mySelect').val();
        if (select == "a" && sub == "a"){
            rows.show();
        }
        else if (sub == "a"){
            if (select != "a") str=":contains('" + select + "')"
            else str=""
        }else if (select == "a"){
            if (sub != "a") str=":contains('" + sub + "')"
            else str=""
        }else{
            str=":contains('" + sub + "'):contains('" + select + "')"
        }
        rows.filter(str).show();
        console.log(sub, select,str);
        });
        </script>

    {{--  <script>
		$(document).ready(function(){
		$("#myInput").on("keyup", function() {
		var value = $(this).val().toLowerCase();
		$("#myTable tr").filter(function() {
		$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});
		});
		
		$("#mySelect").change(function() {
		var value = $(this).val().toLowerCase();
		var value2 = $('#mySelect').val().toLowerCase();
		$("#myTable tr").filter(function() {
		$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});
		});
		
		$("#mySelect2").change(function() {
		var value = $(this).val().toLowerCase();
		$("#myTable tr").filter(function() {
		$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});
		});
		
		$('#tabelguys').ddTableFilter();
		});
		
		
	</script>  --}}
	<style>
	.pagination{
		display:inline-flex;
	}
	.nav-tabs .nav-link{
		border:white;
		background-color:#6eb796;
		color:white;
	}
	.nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active{
		color:white;
		background-color:#3d9970;
	}
	</style>
	@php
if($semester == 1){
@endphp
<script>
 $('#link1').css({'background-color':'#3d9970'});
</script>
@php
}else if($semester == 2){
@endphp
<script>
 $('#link2').css({'background-color':'#3d9970'});
</script>
@php
}if($semester == 3){
@endphp
<script>
 $('#link3').css({'background-color':'#3d9970'});
</script>
@php
}if($semester == 4){
@endphp
<script>
 $('#link4').css({'background-color':'#3d9970'});
</script>
@php
}else if($semester == 5){
@endphp
<script>
 $('#link5').css({'background-color':'#3d9970'});
</script>
@php
}else if($semester == 6){
@endphp
<script>
 $('#link6').css({'background-color':'#3d9970'});
</script>
@php
}
@endphp
</body>

</html>

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
                    
                    <div class="row mb-2 mt-5">
                      <h1 class="col-sm-10"><b>Daftar PMB</b></h1> 
                        <div class="col-sm-1">
							<div class="card-tools">
                                        <div class="input-group input-group mr-5" style="width: 200px;">
                                            <div class="input-group input-group mr-5" style="width: 150px;">
                                                <input type="text" id="myInput" name="table_search" class="form-control float-right"
                                                    placeholder="Search">
                                               
                                            </div>
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
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped " id="dataTable" width="100%"
                                cellspacing="0">
                                <thead>
                                    <tr class="bg-dark ">
                                        <th>
                                            <center /> No
                                        </th>
										{{--<th>
                                            <center /> No Registrasi
                                        </th>
                                        <th>
                                            <center /> Id Jalur Masuk
                                        </th>
                                        <th>
                                            <center /> Id Jalur Pendaftaran
                                        </th>--}}
                                        <th>
                                            <center /> Id Program Studi
                                        </th>
                                        {{--<th>
                                            <center /> Id Periode Pendaftaran
                                        </th>--}}
                                        <th>
                                            <center /> Nama Calon Mahasiswa
                                        </th>
                                        <th>
                                            <center /> Email
                                        </th>
										<th>
                                            <center /> No HP
                                        </th>
										<th>
                                            <center /> Status
                                        </th>
										<th>
                                            <center /> Action
                                        </th>
                                    </tr>
                                    
                                </thead>
                                <tbody id="myTable">
									@php $no = 1; @endphp
									@php if(isset($_GET['page'])){$i=$_GET['page']*10-9;}else{$i=1;} @endphp
                                    @foreach ($d_pmb as $item)
                                        <tr>
											<th><center>{{$i++}}</th>
										{{--<td>{{ $item->no_registrasi }}</td>
                                            <td>{{ $item->id_jalurmasuk }}</td>
										<td>{{ $item->id_jalurpendaftaran }}</td>--}}
                                            <td>{{ $item->nama_jurusan }}</td>
												{{--    <td>{{ $item->id_periodependaftaran }}</td>--}}
                                            <td>{{ $item->nama_calon_mahasiswa }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->no_hp }}</td>
											@if($item->usertype == 'mhs')
                                            <td>Lolos</td>
											@else
											 <td>Tidak Lolos</td>
											@endif
                                            <td>
                                                <a class="fas fa-edit" href="/mk"
                                                                        data-toggle="modal"
                                                                        data-target="#modal-dp{{ $item->id}}">
                                                                        Edit Status </a>
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
		{{$d_pmb->links()}}
		</div>
		@foreach ($d_pmb as $item)
										<div class="modal fade" id="modal-dp{{ $item->id}}">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Edit Status Calon Mahasiswa
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
                                                                                {{ $item->nama_calon_mahasiswa }} </a>
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
                                                                                {{ $item->no_hp }} </a>
                                                                        </div>
                                                                        <div class="row mt-3 mb-3">
                                                                            <a class="col-3 "
                                                                                style="color: rgb(0, 0, 0)">Status</a>
                                                                            @if($item->usertype == 'user')
																			<a class="col-5 "
                                                                                style="color: rgb(0, 0, 0)">
                                                                                Tidak Lolos </a>
																			@else
																			<a class="col-5 "
                                                                                style="color: rgb(0, 0, 0)">
                                                                                Lolos </a>
																			@endif					
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
<?php

																	
if ($bln == 10){
		$userg = DB::table('users')->join('jurusan','jurusan.id_programstudi','=','users.id_programstudi')->select('jurusan.*','users.*')->where('users.id',$item->id)->first();
		 if($userg->id_programstudi == '31'){
			//$mhsnew=DB::table('mahasiswa')->where('nim','not like','19%')->where('nim','not like','20%')->where('nim','not like','21%')->where('id_programstudi',31)->orderBy('id_mhs','DESC')->limit(1)->first();
			$mhsnew=DB::table('mahasiswa')->where('id_programstudi','31')->where('id_mhs','>','85')->orderBy('id_mhs','DESC')->limit(1)->first();
			$findmhs=DB::table('mahasiswa')->where('id_mhs','>','85')->where('id_programstudi','31')->count();
		 }else if($userg->id_programstudi == '32'){
			//$mhsnew=DB::table('mahasiswa')->where('nim','not like','19%')->where('nim','not like','20%')->where('nim','not like','21%')->where('id_programstudi',32)->orderBy('id_mhs','DESC')->where('nim','!=','')->limit(1)->first();
			$mhsnew=DB::table('mahasiswa')->where('id_programstudi','32')->where('id_mhs','>','84')->orderBy('id_mhs','DESC')->limit(1)->first();
			$findmhs=DB::table('mahasiswa')->where('id_mhs','>','84')->where('id_programstudi','32')->count();
		 }else if($userg->id_programstudi == '33'){
			//$mhsnew=DB::table('mahasiswa')->where('nim','not like','19'.'%')->orWhere('nim','not like','20'.'%')->orWhere('nim','not like','21'.'%')->orWhere('id_programstudi',33)->orderBy('id_mhs','DESC')->where('nim','!=','')->limit(1)->first();
			$mhsnew=DB::table('mahasiswa')->where('id_programstudi','33')->where('id_mhs','>','84')->orderBy('id_mhs','DESC')->limit(1)->first();
			$findmhs=DB::table('mahasiswa')->where('id_mhs','>','84')->where('id_programstudi','33')->count();	
		 }
		 
		 
		 date_default_timezone_set('Asia/Jakarta');
		 $tahunskr = date('Y');
		 
		 if($mhsnew){
		 $nimterakhir=$mhsnew->nim;
		 $nimpotong=(int)substr($nimterakhir,6,2);
		 $nimpotong9=(int)substr($nimterakhir,6,3);
		 $nimpotong99=(int)substr($nimterakhir,7,2);
		 //echo $nimterakhir;
		 }
		 
		 if($findmhs < 1){
			
			$nimsekarang='001';
		 }
		 else if($nimpotong9 == '009'){
			$nimhasil=(int)substr($nimterakhir,8,1);
			$nimsekarang='0'.$nimhasil+1;
		 }
		 else if($nimpotong99 == '099'){
			$nimhasil=(int)substr($nimterakhir,7,2);
			$nimsekarang=$nimhasil+1;
		 }
		 else if($nimpotong == '00'){
			$nimhasil=(int)substr($nimterakhir,8,1);
			$nimsekarang='00'.$nimhasil+1; 
		 }else if($nimpotong == '01' || $nimpotong == '02' || $nimpotong == '03' || $nimpotong == '04' || $nimpotong == '05' || $nimpotong == '06' || 
			$nimpotong == '07' || $nimpotong == '08' || $nimpotong == '09'){
			$nimhasil=(int)substr($nimterakhir,7,2);
			$nimsekarang='0'.$nimhasil+1;
		 }else {
			$nimhasil=(int)substr($nimterakhir,6,3);
			$nimsekarang=$nimhasil+1; 
		 }
		 
		 //echo ' '.$nimsekarang;
		 $thnmasuk = substr($userg->created_at,2,2);
		 
		 $angkatanprd='0'.$userg->angkatan_prodi;
		 $prodiangka=substr($userg->id_programstudi,1,1);
		 $kodeprodi = $userg->kode_jurusan;
		 $jalurpendaftar = $userg->id_jalurpendaftaran;
		 
		 $nim = $thnmasuk.$angkatanprd.$prodiangka.$jalurpendaftar.$nimsekarang;
		 
		 $idbaru=$item->id;
		 $cekmhs = DB::table('mahasiswa')->where('id',$item->id)->count();
		 $cekmhs1 = DB::table('mahasiswa')->where('id',$item->id)->where('nim','')->count();
		 
		 if($cekmhs1 > 0){
		 $idmhs5=DB::table('mahasiswa')->where('id',$item->id)->first();
		 DB::table('mahasiswa')->where('id',$item->id)->delete();		
		 		
			
		 DB::table('mahasiswa')->insert([
			'id_mhs' => $idmhs5->id_mhs,
            'nama_mhs'=> $userg->nama_calon_mahasiswa,
            'email'=> $userg->email,
            'no_tlp'=> $userg->no_hp,
            'id'=> $idbaru,
			'id_programstudi'=> $userg->id_programstudi,
			'angkatan' => $tahunskr,
			'status' => 'Aktif',
            'nim'=> $nim,
			'smt_mahasiswa' => 1,
        ]);
		}
		 
			
		
}		
?>
                                                                        <div>
                                                                            <form
                                                                                action="/create-pmban/{{$item->id}}"
                                                                                method='post'>
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <div class="row">
                                                                                    <div class="col-10">
																					<select
                                                                                            class="form-control-sm "
                                                                                            name="status" id="tahun">
                                                                                            <option value='user'> Tidak Lolos</option>
                                                                                                <option
                                                                                                    value="mhs">
                                                                                                    Lolos
                                                                                                </option>
                                                                                         
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

        <div class="modal fade" id="modal-lg">
            <div class="modal-dialog modal-lg">
                <form action="{{ route('create-skalan') }}" method="post">
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
                                <label for="inputEstimatedBudget">Grade</label>
                                <input type="text" id="grade" name="grade" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedBudget">Mutu</label>
                                <input type="text" id="mutu" name="mutu" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedBudget">Nilai Atas</label>
                                <input type="text" id="n_atas" name="n_atas" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedBudget">Nilai Bawah</label>
                                <input type="text" id="n_bawah" name="n_bawah" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedBudget">Keterangan</label>
                                <input type="text" id="keterangan" name="keterangan" class="form-control">
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
	
<style>
.pagination{
	display:inline-flex;
}
</style>
<?php
if($bln == 9){
$akt=DB::table('jurusan')->where('id_programstudi','31')->first();
$akt2=DB::table('jurusan')->where('id_programstudi','32')->first();
$akt3=DB::table('jurusan')->where('id_programstudi','33')->first();
$bd=(int)$akt->angkatan_prodi;
$ak=(int)$akt2->angkatan_prodi;
$ti=(int)$akt3->angkatan_prodi;
DB::table('jurusan')->where('id_programstudi','31')->increment('angkatan_prodi');	
DB::table('jurusan')->where('id_programstudi','32')->update(['angkatan_prodi' => $ak+1]);	
DB::table('jurusan')->where('id_programstudi','33')->update(['angkatan_prodi' => $ti+1]);	
}
?>
</body>

</html>

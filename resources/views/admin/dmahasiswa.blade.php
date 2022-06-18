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
                    <h1 class="mt-5"><b>Daftar Mahasiswa</b></h1>
                    <div class="row mb-2">
                        <div class="col-sm-6">
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
                        </div><!-- /.col -->
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
                                        <th>No</th>
                                        <th>
                                            <center /> Nama
                                        </th>
                                        <th>
                                            <center /> NIM
                                        </th>
                                        <th>
                                            <center /> Program Studi
                                        </th>
                                        <th>
                                            <center /> Status
                                        </th>
                                        <th>
                                            <center /> Angkatan
                                        </th>
										<th>
                                            <center /> Semester
                                        </th>
                                        <th>
                                            <center /> Detail
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    @php $no = 1; @endphp
									@php if(isset($_GET['page'])){$i=$_GET['page']*10-9;}else{$i=1;} @endphp
                                    @foreach ($mahasiswa as $item)
                                        <tr class="odd gradeX">
                                            <th>
                                                <center />{{$i++}}
                                            </th>
                                            <td>{{ $item->nama_mhs }}</td>
                                            <td>{{ $item->nim }}</td>
                                            <td>{{ $item->nama_jurusan }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td>{{ $item->angkatan }}</td>
                                            <td>{{ $item->smt_mahasiswa }}</td>
                                            <td>
                                                <center /><a href="{{ url('s-mhs', $item->id_mhs) }}">Detail</a> | 
												<a class="" href="/mk"
                                                                        data-toggle="modal"
                                                                        data-target="#modal-dp{{ $item->id_mhs}}">
                                                                        Edit Status </a> | 
												<a class="" href="/mk"
                                                                        data-toggle="modal"
                                                                        data-target="#modal-sp{{ $item->id_mhs}}">
                                                                        Edit Semester </a>						
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
		<div class='text-center' style="margin-top:25px;">
		{{$mahasiswa->links()}}
		</div>
        <!-- /.content-wrapper -->

        <!-- /.modal -->
@foreach ($mahasiswa as $item)
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
        <div class="modal fade" id="modal-lg">
            <div class="modal-dialog modal-lg">
                <form action="{{ route('create-mhs') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Data Mahasiswa</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="inputEstimatedBudget">NIM</label> <label style="color: red">*</label>
                                <input type="text" id="nim" name="nim" class="form-control" placeholder="Input NIM" value="{{old('nim')}}">
                            </div>
							
                            <div class="form-group">
                                <label for="inputEstimatedBudget">Nama Mahasiswa</label> <label
                                    style="color: red">*</label>
                                <input type="text" id="nama_mhs" name="nama_mhs" class="form-control"
                                    placeholder="Input Nama Mahasiswa" value="{{old('nama_mhs')}}">
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedBudget">Tempat Lahir</label> <label
                                    style="color: red">*</label>
                                <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control"
                                    placeholder="Input Tempat Lahir" value="{{old('tempat_lahir')}}">
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedBudget">Tanggal Lahir</label> <label
                                    style="color: red">*</label>
                                <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control"
                                    placeholder="Input Tanggal Lahir" value="{{old('tgl_lahir')}}">
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedBudget">Jenis Kelamin</label> <label
                                    style="color: red">*</label>
                                <select class="form-control" name="jns_kelamin" id="jns_kelamin" >
                                    <option selected disabled> Pilih Jenis Kelamin</option>
                                    <option value='Laki-Laki' @if (old('jns_kelamin') == 'Laki-Laki') selected="selected" @endif> Laki-Laki</option>
                                    <option value='Perempuan' @if (old('jns_kelamin') == 'Perempuan') selected="selected" @endif> Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedBudget">Anak Ke</label>
                                    <input type="number" id="anak_ke" name="anak_ke" class="form-control"
                                    placeholder="Input Anak Ke" value="{{old('anak_ke')}}">
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedBudget">Jumlah Saudara</label>
                                    <input type="number" id="jml_saudara" name="jml_saudara" class="form-control"
                                    placeholder="Input Jumlah Saudara" value="{{old('jml_saudara')}}">
                            </div>

                            <div class="form-group">
                                <label for="inputEstimatedBudget">Agama</label> <label style="color: red">*</label>
                                <select class="form-control" name="agama" id="agama">
                                    <option selected disabled> Pilih Agama</option>
                                    <option value='Buddha' @if (old('agama') == 'Buddha') selected="selected" @endif> Buddha</option>
                                    <option value='Hindu' @if (old('agama') == 'Hindu') selected="selected" @endif> Hindu</option>
                                    <option value='Islam' @if (old('agama') == 'Islam') selected="selected" @endif> Islam</option>
                                    <option value='Katolik' @if (old('agama') == 'Katolik') selected="selected" @endif> Katolik</option>
                                    <option value='Khonghucu' @if (old('agama') == 'Khonghucu') selected="selected" @endif> Khonghucu</option>
                                    <option value='Protestan' @if (old('agama') == 'Protestan') selected="selected" @endif> Protestan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedBudget">Jalur Masuk</label> <label
                                    style="color: red">*</label>
                                <select class="form-control" name="id_jalurmasuk" id="id_jalurmasuk">
                                    <option selected disabled> Pilih Jalur Masuk</option>
                                    @foreach ($jmasuk as $item)
                                        <option value="{{ $item->id_jalurmasuk }}" @if (old('id_jalurmasuk') == $item->id_jalurmasuk) selected="selected" @endif>{{ $item->jalur_masuk }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedBudget">Program Studi</label> <label
                                    style="color: red">*</label>
                                <select class="form-control" name="id_programstudi" id="id_programstudi">
                                    <option selected disabled> Pilih Program Studi</option>
                                    @foreach ($prodi as $item)
                                        <option value="{{ $item->id_programstudi }}" @if (old('id_programstudi') == $item->id_programstudi) selected="selected" @endif>{{ $item->nama_jurusan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedBudget">Angkatan</label> <label style="color: red">*</label>
                                <select class="form-control " name="angkatan" id="angkatan">
                                    <option selected disabled> Pilih Angkatan</option>
                                    <?php
                                    $thn_skr = date('Y');
                                    for ($i = $thn_skr; $i >= 2007; $i--) {
                                    ?>    
                                    <option value='<?php echo $i ?>' @if (old('angkatan') == $i ) selected='selected' @endif><?php echo $i; ?></option>
                                    <?php
									}
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedBudget">No Tlp</label> <label style="color: red">*</label>
                                <input type="text" id="no_tlp" name="no_tlp" class="form-control"
                                    placeholder="Input No Telp" value="{{old('no_tlp')}}">
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedBudget">Alamat</label>
                                <input type="text" id="alamat" name="alamat" class="form-control"
                                    placeholder="Input Alamat" value="{{old('alamat')}}">
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedBudget">RT</label>
                                <input type="text" id="rt" name="rt" class="form-control" placeholder="Input RT" value="{{old('rt')}}">
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedBudget">RW</label>
                                <input type="text" id="rw" name="rw" class="form-control" placeholder="Input RW" value="{{old('rw')}}">
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedBudget">Dusun</label>
                                <input type="text" id="Dusun" name="dusun" class="form-control"
                                    placeholder="Input Dusun" value="{{old('dusun')}}">
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedBudget">Kelurahan</label> <label style="color: red">*</label>
                                <input type="text" id="Kelurahan" name="kelurahan" class="form-control"
                                    placeholder="Input Kelurahan" value="{{old('kelurahan')}}">
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedBudget">Kecamatan</label> <label style="color: red">*</label>
                                <input type="text" id="kecamatan" name="kecamatan" class="form-control"
                                    placeholder="Input Kecamatan" value="{{old('kecamatan')}}">
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedBudget">Kode Pos</label>
                                <input type="text" id="kode_pos" name="kode_pos" class="form-control"
                                    placeholder="Input Kode Pos" value="{{old('kode_pos')}}">
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedBudget">Jenis Tinggal</label>
                                <select class="form-control" name="jns_tinggal" id="jns_tinggal">
                                    <option selected disabled> Pilih Alat Transportasi</option>
                                    <option value='Kos' @if (old('jns_tinggal') == 'Kos') selected="selected" @endif> Kos</option>
                                    <option value='Bersama Orang Tua' @if (old('jns_tinggal') == 'Bersama Orang Tua') selected="selected" @endif> Bersama Orang Tua</option>
                                    <option value='Asrama' @if (old('jns_tinggal') == 'Asrama') selected="selected" @endif> Asrama</option>
                                    <option value='Panti Asuhan' @if (old('jns_tinggal') == 'Panti Asuhan') selected="selected" @endif> Panti Asuhan</option>
                                    <option value='Bersama Wali' @if (old('jns_tinggal') == 'Bersama Wali') selected="selected" @endif> Bersama Wali</option>
                                    <option value='Lainnya' @if (old('jns_tinggal') == 'Lainnya') selected="selected" @endif> Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedBudget">Alat Transportasi</label>
                                <input type="text" id="alat_tranportasi" name="alat_tranportasi" class="form-control"
                                    placeholder="Input Alat Transportasi" value="{{old('alat_tranportasi')}}">
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedBudget">Email</label> <label style="color: red">*</label>
                                <input type="text" id="email" name="email" class="form-control"
                                    placeholder="Input Email" value="{{old('email')}}">
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedBudget">NIK</label> <label style="color: red">*</label>
                                <input type="text" id="nik" name="nik" class="form-control" placeholder="Input NIK" value="{{old('nik')}}">
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedBudget">NISN</label> <label style="color: red">*</label>
                                <input type="text" id="nisn" name="nisn" class="form-control"
                                    placeholder="Input NISN" value="{{old('nisn')}}">
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedBudget">NPWP</label>
                                <input type="text" id="npwp" name="npwp" class="form-control"
                                    placeholder="Input NPWP" value="{{old('npwp')}}">
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedBudget">Kewarganegaraan</label> <label
                                    style="color: red">*</label>
                                <input type="text" id="kewarganegaraan" name="kewarganegaraan" class="form-control"
                                    placeholder="Input Kewarganegaraan" value="{{old('kewarganegaraan')}}">
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedBudget">Penerima KPS</label>
                                <select class="form-control" name="kps" id="kps">
                                    <option selected disabled> Pilih Status</option>
                                    <option value='Iya' @if (old('kps') == 'Iya') selected="selected" @endif> Iya</option>
                                    <option value='Tidak' @if (old('kps') == 'Tidak') selected="selected" @endif> Tidak</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedBudget">Status</label>
                                <select class="form-control" name="status" id="status">
                                    <option selected disabled> Pilih Status</option>
                                    <option value='Aktif' @if (old('status') == 'Aktif') selected="selected" @endif> Aktif</option>
                                    <option value='Tidak Aktif' @if (old('status') == 'Tidak Aktif') selected="selected" @endif> Tidak Aktif</option>
                                    <option value='Cuti' @if (old('status') == 'Cuti') selected="selected" @endif> Cuti</option>
                                    <option value='Drop Out' @if (old('status') == 'Drop Out') selected="selected" @endif> Drop Out</option>
                                    <option value='Transfer' @if (old('status') == 'Transfer') selected="selected" @endif> Transfer</option>
                                    <option value='Pindahan' @if (old('status') == 'Pindahan') selected="selected" @endif> Pindahan</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-primary toastrDefaultSuccess">Simpan</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </form>
            </div>
            <!-- /.modal-dialog -->
        </div>
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
	</style>
</body>

</html>

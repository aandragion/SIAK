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
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        @include('admin/header')
        <!-- /.navbar -->



        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="margin:0;padding:50px;padding-top:0px;">
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
                    <h1 class="mt-5"><b>KELAS DAN JADWAL PERKULIAHAN</b></h1>
                    {{-- -<div class="row mb-2">
                        <div class="col-sm-12 mt-2">
                            <div class="row">
                                <div class="col-md-2">
                                    Program Studi
                                </div>
								 <div class="col-sm-2">
                                    <select class="form-control-sm" name="tahun" id="tahun" onchange="location = this.value;">
                                        <option selected disabled> Pilih Program Studi</option>
                                        @foreach ($kelas as $item)
                                            <option value="/{{ $item->nama_jurusan }}">{{ $item->nama_jurusan }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
								<div class="col-sm-2">
                                    <select class="form-control-sm" name="tahun" id="tahun" >
                                        <option selected disabled> Pilih Program Studi</option>
                                        @foreach ($kelas as $item)
                                            <option value="{{ $item->nama_jurusan }}">{{ $item->nama_jurusan }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-sm-2 ">
                                    Periode
                                </div>
                                <div class="col-sm-1 ">
                                    <select class="form-control-sm " name="tahun" id="tahun" >
                                        <option selected disabled> Pilih Periode</option>
                                        @foreach ($periode as $item)
                                            <option value="{{ $item->id_periode }}">{{ $item->nama_periode }}
                                                {{ $item->smt_periode }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
								<div class="col-md-2 text-right">
                                     <button type="submit" class="btn bg-olive btn-success rounded-pill pl-4 pr-4">Filter</button>
                                </div>
                            </div>
                        </div><!-- /.col -->
                        <div class="col-sm-12 mt-2">
                            <div class="row">
                                <div class="col-md-2 ">
                                    Kurikulum
                                </div>
                                <div class="col-sm-2 ">
                                    <select class="form-control-sm" name="tahun" id="tahun">
                                        <option selected disabled> Pilih Kurikulum</option>
                                        @foreach ($kurikulum as $item)
                                            <option value="{{ $item->id_kurikulum }}">{{ $item->nama_kurikulum }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-sm-2 ">
                                    Semester
                                </div>
                                <div class="col-sm-1 ">
                                    <select class="form-control-sm " name="tahun" id="tahun">
                                        <option selected disabled> Pilih Semester</option>
                                        <?php
                                        for ($i = 1; $i <= 10; $i++) {
                                            echo "<option value='$i'";
                                            echo ">$i</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
						
						<!-- /.col -->
                    </div><!-- /.row --> --}}
                    <form action="{{ route('create-filter') }}" method="post">
                        {{ csrf_field() }}
                        <div class="row mb-2">
                            <div class="col-sm-12 mt-2">
                                <div class="row">
                                    <div class="col-md-2">
                                        Program Studi
                                    </div>

                                    <div class="col-sm-2">
                                        <select class="form-control-sm" name="jurusan" id="tahun">
                                            <option value=""> Pilih Program Studi</option>
                                            @foreach ($kelas as $item)
                                                <option value="{{ $item->nama_jurusan }}">{{ $item->nama_jurusan }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-sm-2 ">
                                        Periode
                                    </div>
                                    <div class="col-sm-1 ">
                                        <select class="form-control-sm " name="periode" id="tahun">
                                            <option value=""> Pilih Periode</option>
                                            @foreach ($periode as $item)
                                                <option value="{{ $item->id_periode }}">{{ $item->nama_periode }}
                                                    {{ $item->smt_periode }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2 text-right">
                                        <button type="submit"
                                            class="btn bg-olive btn-success rounded-pill pl-4 pr-4">Filter</button>
                                    </div>
                                </div>
                            </div><!-- /.col -->
                            <div class="col-sm-12 mt-2">
                                <div class="row">
                                    <div class="col-md-2 ">
                                        Kurikulum
                                    </div>
                                    <div class="col-sm-2 ">
                                        <select class="form-control-sm" name="kurikulum" id="tahun">
                                            <option value=""> Pilih Kurikulum</option>
                                            @foreach ($kurikulum as $item)
                                                <option value="{{ $item->nama_kurikulum }}">
                                                    {{ $item->nama_kurikulum }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-sm-2 ">
                                        Semester
                                    </div>
                                    <div class="col-sm-1 ">
                                        <select class="form-control-sm " name="semester" id="tahun">
                                            <option value=""> Pilih Semester</option>
                                            <?php
                                            for ($i = 1; $i <= 10; $i++) {
                                                echo "<option value='$i'";
                                                echo ">$i</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <!-- /.col -->
                        </div><!-- /.row -->
                    </form>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content" id='search'>
                <div class="container-fluid">
                    @yield('content')
                    @if ($jmlkmatkul > 0)
                        <div id="accordion">

                            @foreach ($kmatkul as $item)
                                <div class="card">

                                    <div class="card-header card-link bg-dark " data-toggle="collapse"
                                        href="#{{ $item->kode_matkul }}">
                                        <a>
                                            {{ $item->nama_matkul }} [ {{ $item->sks }} SKS |
                                            {{ $item->kode_matkul }} | Semester {{ $item->semester }} | {{ $item->nama_jurusan }} | {{$item->nama_periode}} {{$item->smt_periode}} | {{$item->nama_kurikulum}} ]
                                        </a>
                                        <li class=" nav-item d-none d-sm-inline-block  float-right">
                                            <div class="row">
                                                <div>
                                                    <button type="button"
                                                        class="btn btn-block bg-olive btn-xs ml-2 mt-1"
                                                        data-toggle="modal" data-target="#{{ $item->kode_matkul }}"
                                                        {{ $hasil = $item->nama_matkul }}>Tambah Kelas</button>
                                                </div>
                                                <?php
                                                $link = mysqli_connect('localhost', 'root', '', 'pmbpolimercia');
                                                $idmatkul = $item->id_kmatkul;
                                                $jadwal = mysqli_query($link, "select * from jadwal INNER JOIN ruangan ON ruangan.id = jadwal.id where id_kmatkul = '$idmatkul' ");
                                                $kelas = mysqli_num_rows($jadwal);
                                                ?>
                                                <div>
                                                    <button type="button"
                                                        class="btn btn-block btn-default btn-xs ml-3 mt-1"><?php echo $kelas; ?>
                                                        Kelas </button>
                                                </div>
                                                <div class="dropdown-toggle ml-4 d-flex align-items-center"></div>
                                            </div>
                                        </li>
                                    </div>
                                    <div class="modal fade" id="{{ $item->kode_matkul }}">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <form action="{{ route('create-jadwal') }}" method="post">
                                                    {{ csrf_field() }}
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="row mt-3 mb-3">
                                                                    <a class="col-5  "
                                                                        style="color: rgb(0, 0, 0)">Program Studi</a>
                                                                    <a class="col-7 "
                                                                        style="color: rgb(0, 0, 0)">
                                                                        {{ $item->nama_jurusan }} </a>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <a class="col-5  "
                                                                        style="color: rgb(0, 0, 0)">Semester</a>
                                                                    <a class="col-5 "
                                                                        style="color: rgb(0, 0, 0)">
                                                                        {{ $item->nama_periode }}
                                                                        {{ $item->smt_periode }} </a>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <a class="col-5  "
                                                                        style="color: rgb(0, 0, 0)">Kurikulum</a>
                                                                    <a class="col-5 "
                                                                        style="color: rgb(0, 0, 0)">
                                                                        {{ $item->nama_kurikulum }} </a>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <a class="col-5  "
                                                                        style="color: rgb(0, 0, 0)">Mata Kuliah</a>
                                                                    <a class="col-5 "
                                                                        style="color: rgb(0, 0, 0)">
                                                                        {{ $item->kode_matkul }} -
                                                                        {{ $item->nama_matkul }} </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="mt-3 mb-3 col-md-12 text-right">
                                                                    <?php
                                                                    date_default_timezone_set('Asia/Jakarta');
                                                                    echo date('d-M-Y'); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="navbar navbar-olive justify-content-center">
                                                            <a style="color: rgb(255, 255, 255)">Jadwal Mingguan</a>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="row mt-3 mb-3">
                                                                    <a class="col-6 "
                                                                        style="color: rgb(0, 0, 0)">Kelas</a>
                                                                    <input class="col-5 " type="text"
                                                                        class="form-control" id="id_kmatkul"
                                                                        name="id_kmatkul"
                                                                        value=" {{ $item->id_kmatkul }}"
                                                                        hidden></input>
                                                                    <input class="col-5 " type="text"
                                                                        class="form-control" id="kelas" name="kelas"
                                                                        placeholder="Input Kelas" value="{{old('kelas')}}"></input>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <a class="col-6 "
                                                                        style="color: rgb(0, 0, 0)">Hari</a>
                                                                    <select class="form-control-sm col-5" name="hari"
                                                                        id="hari">
                                                                        <option selected disabled> Pilih Hari</option>
                                                                        <option value='Senin' @if (old('hari') == 'Senin') selected="selected" @endif> Senin</option>
                                                                        <option value='Selasa' @if (old('hari') == 'Selasa') selected="selected" @endif> Selasa</option>
                                                                        <option value='Rabu' @if (old('hari') == 'Rabu') selected="selected" @endif> Rabu</option>
                                                                        <option value='Kamis' @if (old('hari') == 'Kamis') selected="selected" @endif> Kamis</option>
                                                                        <option value='Jumat' @if (old('hari') == 'Jumat') selected="selected" @endif> Jumat</option>
                                                                        {{--  <option value='Sabtu'> Sabtu</option>
                                                                        <option value='Minggu'> Minggu</option>  --}}
                                                                    </select>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <a class="col-6 "
                                                                        style="color: rgb(0, 0, 0)">Jam Mulai</a>
                                                                    <input class="col-5 " type="time"
                                                                        name="jam_mulai" id="jam_mulai"
                                                                        class="form-control"
                                                                        onkeyup="Waktumasuk();" value="{{old('jam_mulai')}}"/>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <a class="col-6 "
                                                                        style="color: rgb(0, 0, 0)">Kapasitas Peserta
                                                                        Kelas</a>
                                                                    <input class="col-5 " type="text"
                                                                        class="form-control" id="usr" name="kapasitas"
                                                                        placeholder="Input Jumlah Peserta" value="{{old('kapasitas')}}"></input>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="row mt-3 mb-3">
                                                                    <a class="col-12"
                                                                        style="color: rgb(255, 255, 255)">dsf</a>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <a class="col-6 "
                                                                        style="color: rgb(0, 0, 0)">Ruang</a>
                                                                    <select class="form-control-sm" name="id" id="id">
                                                                        <option selected disabled> Pilih Ruangan
                                                                        </option>
                                                                        @foreach ($ruangan as $item1)
                                                                            <option value="{{ $item1->id }}" @if (old('id') == $item1->id) selected="selected" @endif>
                                                                                {{ $item1->nama_ruangan }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <a class="col-6 "
                                                                        style="color: rgb(0, 0, 0)">Jam selesai</a>
                                                                    <input class="col-5 " type="time"
                                                                        name="jam_selesai" id="jam_selesai"
                                                                        class="form-control"
                                                                        onkeyup="Waktumasuk();" value="{{old('jam_selesai')}}"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 text-right">
                                                            <button type="submit"
                                                                class="btn bg-olive btn-success rounded-pill pl-4 pr-4">Simpan</button>
                                                        </div>

                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <div id="{{ $item->kode_matkul }}" class="collapse"
                                        data-parent="#accordion">
                                        <div class="card-body">

                                            <table cellpadding="30">
                                                {{-- {{ $jadwal = Jadwal::all();  }} --}}
                                                <?php
										
										$idmatkul = $item->id_kmatkul;
										$jadwal=mysqli_query($link,"select * from jadwal INNER JOIN ruangan ON ruangan.id = jadwal.id INNER JOIN dosen ON dosen.id_dosen = jadwal.id_dosen 
										where id_kmatkul = '$idmatkul' ");
										while($data=mysqli_fetch_assoc($jadwal)){
										?>
                                                <tr>
                                                    <td>
                                                        <li><?php echo $data['kelas']; ?></li>
                                                    </td>
                                                    <td>
                                                        <li><?php echo $data['hari']; ?></li>
                                                    </td>
                                                    <td>
                                                        <li><?php echo $data['jam_mulai'] . '-' . $data['jam_selesai']; ?></li>
                                                    </td>
                                                    <td>
                                                        <li><?php echo $data['nama_ruangan']; ?></li>
                                                    </td>
                                                    <td>
                                                        <li><?php echo $data['nama_dosen']; ?></li>
                                                    </td>
                                                    <td style="position:absolute;right:30px;">
                                                        <li class=" nav-item d-none d-sm-inline-block">
                                                            <div class="row d-flex align-items-center">
                                                                <div>
                                                                    <a type="button"   href="{{ url('s_nilai', $data['id_jadwal']) }}"
                                                                        class="btn btn-block bg-olive btn-xs ml-2 mt-1">Detail
                                                                        Peserta</a>
                                                                </div>
                                                                <div class="btn-group ml-3 d-flex align-items-center">
                                                                    <a class="btn btn-xs  text-left" href="/mk"
                                                                        data-toggle="modal"
                                                                        data-target="#modal-dp<?php echo $data['id_jadwal']; ?>">
                                                                        edit </a>
                                                                    <form action="/kelas/<?php echo $data['id_jadwal']; ?>"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button class="btn btn-xs  text-left"> delete
                                                                        </button>
                                                                    </form>
                                                                    <a class="btn btn-xs  active text-left"
                                                                        href="#" hidden>
                                                                        print
                                                                    </a>
                                                                    <a class="btn btn-xs  active text-left"
                                                                        href="#" hidden> copy
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </td>
                                                </tr>

                                                <div class="modal fade" id="modal-dp<?php echo $data['id_jadwal']; ?>">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Dosen Pengajar Kelas Kuliah
                                                                </h4>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-7">
                                                                        <div class="row mt-3 mb-3">
                                                                            <a class="col-3 "
                                                                                style="color: rgb(0, 0, 0)">Program
                                                                                Studi</a>
                                                                            <a class="col-8 "
                                                                                style="color: rgb(0, 0, 0)">
                                                                                {{ $item->nama_jurusan }} </a>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <a class="col-3 "
                                                                                style="color: rgb(0, 0, 0)">Mata
                                                                                Kuliah</a>
                                                                            <a class="col-8 "
                                                                                style="color: rgb(0, 0, 0)">
                                                                                {{ $item->nama_matkul }} </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-5">
                                                                        <div class="row mt-3 mb-3">
                                                                            <a class="col-3 "
                                                                                style="color: rgb(0, 0, 0)">Periode</a>
                                                                            <a class="col-5 "
                                                                                style="color: rgb(0, 0, 0)">
                                                                                {{ $item->nama_periode }}
                                                                                {{ $item->smt_periode }} </a>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <a class="col-3 "
                                                                                style="color: rgb(0, 0, 0)">Kelas</a>
                                                                            <a class="col-5 "
                                                                                style="color: rgb(0, 0, 0)"><?php echo $data['nama_ruangan']; ?></a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="card">
                                                                    <div class="card-header bg-dark">
                                                                        <div class="row">
                                                                            <div class="col-3">
                                                                                <a>Nama Dosen Pengajar</a>
                                                                            </div>
                                                                            {{-- <div class="col-3">
                                        <a>Rencana Pertemuan</a>
                                    </div>
                                    <div class="col-3">
                                        <a>Jabatan mengajar</a>
                                    </div> --}}
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <div>
                                                                            <form
                                                                                action="/create-dosen/<?php echo $data['id_jadwal']; ?>"
                                                                                method='post' class="row">
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <div class="row">
                                                                                    <div class="col-10">
                                                                                        <select
                                                                                            class="form-control-sm "
                                                                                            name="dosen" id="tahun">
                                                                                            <option value='100'> Pilih
                                                                                                Dosen</option>
                                                                                            @foreach ($dosen as $item1)
                                                                                                <option
                                                                                                    value="{{ $item1->id_dosen }}">
                                                                                                    {{ $item1->nama_dosen }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </select>

                                                                                    </div>
                                                                                    <div class="col-1">
                                                                                        <button type='submit'
                                                                                            name='send' value='Apply'
                                                                                            class="btn bg-olive btn-xs ml-2 mt-1">Apply</button>

                                                                                    </div>
                                                                            </form>
                                                                            <form
                                                                                action="/create-dosen/<?php echo $data['id_jadwal']; ?>"
                                                                                method='post' class="row">
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <div class="col-1">
                                                                                    <div class="col-10" hidden>
                                                                                        <select
                                                                                            class="form-control-sm "
                                                                                            name="dosen" id="tahun">
                                                                                            <option value="100"> Pilih
                                                                                                Dosen</option>

                                                                                        </select>

                                                                                    </div>
                                                                                    <button type='submit' name='send'
                                                                                        value='Apply'
                                                                                        class="btn bg-light btn-xs ml-2 mt-1">Reset</button>

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
                                        <?php	
										}
										?>
                                        </table>

                                    </div>
                                </div>




                        </div>
                    @endforeach


                    {{-- @foreach ($hasil as $items)
{{ $items->nama_matkul }}
    @endforeach --}}

                    {{-- <div class="card">
                            <div class="card-header">
                                <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                                    Collapsible Group Item #2
                                </a>
                            </div>
                            <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    Lorem ipsum..
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                                    Collapsible Group Item #3
                                </a>
                            </div>
                            <div id="collapseThree" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    Lorem ipsum..
                                </div>
                            </div>
                        </div> --}}

                </div>
            @else
                <div class="card-header card-link bg-dark text-center" data-toggle="collapse">
                    <h4>Tidak ada data.</h4>
                </div>

                @endif
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- /.modal -->

    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                {{-- <div class="modal-header">
                        <h4 class="modal-title">Tambah Data Mahasiswa</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div> --}}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="row mt-3 mb-3">
                                <a class="col-6  " style="color: rgb(0, 0, 0)">Program Studi</a>
                                <a class="col-5 " style="color: rgb(0, 0, 0)"> Data Program studi </a>
                            </div>
                            <div class="row mb-3">
                                <a class="col-6  " style="color: rgb(0, 0, 0)">Semester</a>
                                <a class="col-5 " style="color: rgb(0, 0, 0)"> Data Program studi </a>
                            </div>
                            <div class="row mb-3">
                                <a class="col-6  " style="color: rgb(0, 0, 0)">Kurikulum</a>
                                <a class="col-5 " style="color: rgb(0, 0, 0)"> Data Program studi </a>
                            </div>
                            <div class="row mb-3">
                                <a class="col-6  " style="color: rgb(0, 0, 0)">Mata Kuliah</a>
                                <a class="col-5 " style="color: rgb(0, 0, 0)"> </a>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mt-3 mb-3 col-md-12 text-right">
                                <?php
                                date_default_timezone_set('Asia/Jakarta');
                                echo date('d-M-Y'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="navbar navbar-olive justify-content-center">
                        <a style="color: rgb(255, 255, 255)">Jadwal Mingguan</a>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="row mt-3 mb-3">
                                <a class="col-6 " style="color: rgb(0, 0, 0)">Kelas</a>
                                <select class="form-control-sm col-5" name="tahun" id="tahun">
                                    <option selected disabled> Pilih Kelas</option>

                                </select>
                            </div>
                            <div class="row mb-3">
                                <a class="col-6 " style="color: rgb(0, 0, 0)">Hari</a>
                                <select class="form-control-sm col-5" name="tahun" id="tahun">
                                    <option selected disabled> Pilih Hari</option>
                                    <option value='Senin'> Senin</option>
                                    <option value='Selasa'> Selasa</option>
                                    <option value='Rabu'> Rabu</option>
                                    <option value='Kamis'> Kamis</option>
                                    <option value='Jumat'> Jumat</option>
                                    <option value='Sabtu'> Sabtu</option>
                                    <option value='Minggu'> Minggu</option>
                                </select>
                            </div>
                            <div class="row mb-3">
                                <a class="col-6 " style="color: rgb(0, 0, 0)">Jam Mulai</a>
                                <input class="col-5 " type="time" name="waktu_mulai_masuk"
                                    id="waktu_mulai_masuk" class="form-control" onkeyup="Waktumasuk();" />
                            </div>
                            <div class="row mb-3">
                                <a class="col-6 " style="color: rgb(0, 0, 0)">Kapasitas Peserta Kelas</a>
                                <input class="col-5 " type="text" class="form-control" id="usr"
                                    placeholder="Input Jumlah Peserta"></input>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row mt-3 mb-3">
                                <a class="col-12" style="color: rgb(255, 255, 255)">dsf</a>
                            </div>
                            <div class="row mb-3">
                                <a class="col-6 " style="color: rgb(0, 0, 0)">Ruang</a>
                                <select class="form-control-sm col-5" name="tahun" id="tahun">
                                    <option selected disabled> Pilih Ruang</option>

                                </select>
                            </div>
                            <div class="row mb-3">
                                <a class="col-6 " style="color: rgb(0, 0, 0)">Jam selesai</a>
                                <input class="col-5 " type="time" name="waktu_mulai_masuk"
                                    id="waktu_mulai_masuk" class="form-control" onkeyup="Waktumasuk();" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 text-right">
                        <button type="button" class="btn bg-olive btn-success rounded-pill pl-4 pr-4">Simpan</button>
                    </div>

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- /.modal -->


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
    <script src="{{ asset('lte/dist/js/adminlte.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            var hal = $('.hal').attr('href');


            $.ajax({
                url: '/admin/isifile.php' + $('.hal').attr('href'),
                type: 'GET',

                success: function(result) {
                    $('#search').html(result);

                }
            });

        });
    </script>


</body>

</html>

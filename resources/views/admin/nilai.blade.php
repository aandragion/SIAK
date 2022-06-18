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
                <div class="container-fluid">
                    <h1 class="mt-5"><b>Input Nilai</b></h1>
                    <div class="row mb-2">
                        <div class="col-sm-12 mt-2">

                        </div><!-- /.col -->
                        <div class="col-sm-12 mt-2">

                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                    <div class="row">

                        <div class="col-4 ">
                            <div class="row">
                                <div class="col-4">
                                    <p>Program Studi</p>
                                </div>
                                <div class="col-8">
                                    <p><b>{{ $shownilai->jenjang }} - {{ $shownilai->nama_jurusan }}</b></p>
                                </div>
                                <div class="col-4">
                                    <p>Mata Kuliah</p>
                                </div>
                                <div class="col-8">
                                    <p><b>{{ $shownilai->kode_matkul }} - {{ $shownilai->nama_matkul }} -
                                            {{ $shownilai->sks }} SKS</b></p>
                                </div>
                                <div class="col-4">
                                    <p>Kurikulum</p>
                                </div>
                                <div class="col-8">
                                    <p><b>{{ $shownilai->nama_kurikulum }}</b></p>
                                </div>
                                <div class="col-4">
                                    <p>Kapasitas</p>
                                </div>
                                <div class="col-8">
                                    <p><b>{{ $shownilai->kapasitas }}</b></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 ">
                            <div class="row">
                                <div class="col-3">
                                    <p>Periode</p>
                                </div>
                                <div class="col-8">
                                    <p><b>{{ $shownilai->nama_periode }} - {{ $shownilai->smt_periode }}</b></p>
                                </div>
                                <div class="col-3">
                                    <p>Nama Kelas</p>
                                </div>
                                <div class="col-8">
                                    <p><b>{{ $shownilai->kelas }}</b></p>
                                </div>
                                <div class="col-3">
                                    <p>Dosen</p>
                                </div>
                                <div class="col-8">
                                    <p><b>{{ $shownilai->nama_dosen }}</b></p>
                                </div>
                                <div class="col-3">
                                    <p>Peserta</p>
                                </div>
                                <a {{ $res = DB::table('krs')->where('id_jadwal', $shownilai->id_jadwal)->count('id_jadwal') }}
                                    hidden>
                                </a>
                                <div class="col-8">
                                    <p><b>{{ $res }}</b></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 ">

                            <div class="col-md-12 text-right" hidden>
                                <a href="#" name="vote" value="edit" type="submit" 
                                    class="btn bg-olive btn-success rounded-pill pl-4 pr-4"><b>EDIT</b></a>
                            </div>
                        </div>

                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table   " id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="bg-dark">
                                        <th>
                                            <center /> No
                                        </th>
                                        <th>
                                            NIM
                                        </th>
                                        <th>
                                            Nama
                                        </th>
                                        <th>
                                            UTS
                                        </th>
                                        <th>
                                            UAS
                                        </th>
                                        <th>
                                            <center /> Mutu
                                        </th>
                                        <th>
                                            <center /> Jumlah
                                        </th>
                                        <th>
                                            <center /> Grade
                                        </th>
                                        <th>
                                            <center /> Lulus
                                        </th>
                                        <th>
                                            <center /> Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    @php $no = 1; @endphp
                                    @forelse ($s_krs as $item)
                                        <tr>
                                            <th>
                                                <center />{{ $no++ }}
                                            </th>
                                            <td>{{ $item->nim }}</td>
                                            <td>
                                                {{ $item->nama_mhs }}
                                            </td>
                                           
                                           
                                                <td> {{ $item->uts }} </td>
                                                <td>{{ $item->uas }} </td>
                                                <td>{{ $item->mutu }} </td>
                                               <a hidden {{ $a= $item->mutu  }} {{  $b=$shownilai->sks }}> </a>
                                                <td>{{  $a*$b; }}</td>
                                                <td> {{ $item->grade }} </td>
                                                <td>{{ $item->keterangan }} </td>
                                               
                                                <td>
                                                    <center />
                                                    <a href="{{ url('e-nilai', $item->id_krs) }}"> Nilai</a>
                                                </td>
                                          
                                        </tr>
                                        @empty
                                        <tr><td colspan="9" class="text-center">Data belum ada</td></tr>
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
        <!-- /.content-wrapper -->

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



</body>

</html>

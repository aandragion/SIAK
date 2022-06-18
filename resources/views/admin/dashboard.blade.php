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
<style>
    .box {
        width: 400px;
        height: 200px;
        ;
    }

</style>

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
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Beranda</h1>
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
                    <div><b>Jadwal Mengajar</b></div>
                    <div class="row">
                        <div class="col-4">
                            <div class="box bg-olive" style="padding:20px;">
                                <div class="inner">
                                    <p>Identitas Perguruan Tinggi </p>
                                    <h3>Politeknik Mercusuar Indonesia (Polimercia)</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="box bg-olive" style="padding:20px;">
                                <div class="inner ml-3">
                                    <p class="">Semester Aktif</p>
                                    <a hidden {{ $bln = date('m') }}></a>
                                    @if ($bln < 9 && $bln >= 3)
                                        <a hidden {{ $thn = date('Y') }} {{ $thn1 = date('Y') - 1 }}
                                            {{ $smt = 'Genap' }}></a>
                                        <p><b>{{ $thn1 }}/{{ $thn }} {{ $smt }}</b></p>
                                    @else
                                        <a hidden {{ $thn = date('Y') }} {{ $thn1 = date('Y') + 1 }}
                                            {{ $smt = 'Ganjil' }}></a>
                                        <p><b>{{ $thn }}/{{ $thn1 }} {{ $smt }}</b></p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="box  bg-olive" style="padding:20px;">
                                <div class="inner">
                                    <p class="mb-5">Mahasiswa</p>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="description-block">
                                                <a {{ $res = DB::table('mahasiswa')->where('status', 'Aktif')->count('id_mhs') }}
                                                    hidden>
                                                </a>
                                                <span>Aktif</span>
                                                <h2><b>{{ $res }}</b></h2>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-4">
                                            <div class="description-block">
                                                <a hidden>{{ $thn = date('Y') }}</a>
                                                <a {{ $res2 = DB::table('mahasiswa')->where('angkatan', $thn)->count('id_mhs') }}
                                                    hidden>
                                                </a>
                                                <span>Baru</span>
                                                <h2><b>{{ $res2 }}</b></h2>

                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-4">
                                            <div class="description-block">
                                                <a {{ $res3 = DB::table('mahasiswa')->where('status', 'Lulus')->count('id_mhs') }}
                                                    hidden>
                                                </a>
                                                <span>Lulus</span>
                                                <h2><b>{{ $res3 }}</b></h2>

                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        @for ($i = 1; $i <= 8; $i++)
                            <div>
                                <div>
                                    <p><b> Semester {{ $i }}</b></p>
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
                                                        <center /> Hari
                                                    </th>
                                                    <th>
                                                        <center /> Jam
                                                    </th>
                                                    <th>
                                                        <center /> Kode
                                                    </th>
                                                    <th>
                                                        <center /> Mata Kuliah
                                                    </th>
                                                    <th>
                                                        <center /> Kelas
                                                    </th>
                                                    <th>
                                                        <center /> Ruang
                                                    </th>
                                                    <th>
                                                        <center /> Dosen
                                                    </th>
                                                    <th>
                                                        <center /> Nilai
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody id="myTable">
                                                <a hidden {{ $bln = date('m') }}></a>
                                                @if ($bln < 9 && $bln >= 3)
                                                    <a {{ $thn = date('Y') }} {{ $thn1 = date('Y') - 1 }}
                                                        {{ $smt = 'Genap' }}
                                                        {{ $res = DB::table('jadwal')->join('kmatkul', 'kmatkul.id_kmatkul', '=', 'jadwal.id_kmatkul')->join('ruangan', 'ruangan.id', '=', 'jadwal.id')->join('dosen', 'dosen.id_dosen', '=', 'jadwal.id_dosen')->join('matkul', 'matkul.id_matkul', '=', 'kmatkul.id_matkul')->join('kurikulum', 'kurikulum.id_kurikulum', '=', 'kmatkul.id_kurikulum')->join('periode', 'periode.id_periode', '=', 'kurikulum.id_periode')->where('kmatkul.semester', $i)->where('periode.nama_periode', $thn1 . '/' . $thn)->where('periode.smt_periode', $smt)->get() }}
                                                        hidden>
                                                    </a>
                                                @else
                                                    <a {{ $thn = date('Y') }} {{ $thn1 = date('Y') + 1 }}
                                                        {{ $smt = 'Ganjil' }}
                                                        {{ $res = DB::table('jadwal')->join('kmatkul', 'kmatkul.id_kmatkul', '=', 'jadwal.id_kmatkul')->join('ruangan', 'ruangan.id', '=', 'jadwal.id')->join('dosen', 'dosen.id_dosen', '=', 'jadwal.id_dosen')->join('matkul', 'matkul.id_matkul', '=', 'kmatkul.id_matkul')->join('kurikulum', 'kurikulum.id_kurikulum', '=', 'kmatkul.id_kurikulum')->join('periode', 'periode.id_periode', '=', 'kurikulum.id_periode')->where('kmatkul.semester', $i)->where('periode.nama_periode', $thn . '/' . $thn1)->where('periode.smt_periode', $smt)->get() }}
                                                        hidden>
                                                    </a>
                                                @endif
                                                @php $no = 1; @endphp
                                                @forelse ($res as $item)
                                                    <tr>
                                                        <th>
                                                            <center />{{ $no++ }}
                                                        </th>
                                                        <td>{{ $item->hari }}</td>
                                                        <td>
                                                            <center />
                                                            {{ $item->jam_mulai }}-{{ $item->jam_selesai }}
                                                        </td>
                                                        <td>
                                                            <center />{{ $item->kode_matkul }}
                                                        </td>
                                                        <td>{{ $item->nama_matkul }} </td>
                                                        <td>
                                                            <center />{{ $item->kelas }}
                                                        </td>
                                                        <td>{{ $item->nama_ruangan }} </td>
                                                        <td>{{ $item->nama_dosen }} </td>
                                                        <td>
                                                            <center />
                                                            <a type="button" class="btn btn-block btn-outline-secondary"
                                                                href="{{ url('s_nilai', $item->id_jadwal) }}"><i></i><b>Nilai</b></a>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="9" class="text-center">Data belum ada</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endfor
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
</body>

</html>

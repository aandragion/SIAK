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
        <div class="content-wrapper" style="margin:0;">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <h1 class="mt-5"><b>Detail Mahasiswa</b></h1>
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-left">
                                <div class="row mb-2">

                                </div>
                            </ol>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">

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
                        <div class="col-md-3">
                            <div class="card card-defauld card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="{{ asset('lte/dist/img/logopolimercia.png') }}"
                                            alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center"><b>{{ $so_mhs->nama_mhs }}</b></h3>

                                    <p class=" text-center"><b>{{ $so_mhs->jenjang }} -
                                            {{ $so_mhs->nama_jurusan }}</b></p>


                                    <div class="col-md-12 text-center">
                                        <a href="#"
                                            class="btn bg-olive btn-success rounded-pill pl-4 pr-4"><b>{{ $so_mhs->status }}</b></a>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <div class="btn-group-vertical w-100 mb-2">

                                <a class="btn bg-olive btn-outline-success text-left active"
                                    href="{{ url('s-mhs', $so_mhs->id_mhs) }}"> Data
                                    Mahasiswa </a>
                                <a class="btn bg-olive btn-outline-success text-left"
                                    href="{{ url('sa-mhs', $so_mhs->id_mhs) }}"> Data Akademik
                                </a>
                                <a class="btn bg-olive btn-outline-success text-left" href="/valkrs/{{$so_mhs->id_mhs}}/{{$so_mhs->smt_mahasiswa}}"> Kartu Rencana
                                    Studi
                                </a>
                                {{--<a class="btn bg-olive btn-outline-success text-left" href="/akm"> Aktivitas Kuliah
								Mahasiswa </a>--}}
                                {{-- <a class="btn bg-olive btn-outline-success text-left" href="/khs"> Kartu Hasil Studi
                                </a> --}}
                                {{--<a class="btn bg-olive btn-outline-success text-left" href="/bayar_mhs"> Tagihan dan
								Pembayaran Mahasiswa </a>--}}
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="btn-group">
                                <a class="btn btn-outline-secondary text-left"
                                    href="{{ url('s-mhs', $so_mhs->id_mhs) }}"> Data
                                    Diri </a>
                                <a class="btn btn-outline-secondary text-left"
                                    href="{{ url('sd-mhs', $so_mhs->id_mhs) }}"> Data
                                    Pendidikan </a>
                                <a class="btn btn-outline-secondary active text-left"
                                    href="{{ url('so-mhs', $so_mhs->id_mhs) }}"> Data Orang
                                    Tua </a>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-4 mt-4">
                                        <div class="card card-olive card-outline">
                                            <div class="card-body box-profile">

                                                <h3 class="profile-username text-center">Ayah</h3>

                                                <ul class="list-group list-group-unbordered mb-3">
                                                    <li class="list-group-item">
                                                        <b>NIK</b>
                                                        <a class="float-right" style="color: black">
                                                            @forelse ($ortu as $item)
                                                                    {{ $item->nik_ayah }}
                                                            @empty
                                                                Data belum ada
                                                            @endforelse
                                                        </a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Nama</b>
                                                        <a class="float-right" style="color: black">
                                                            @forelse ($ortu as $item)
                                                                    {{ $item->nama_ayah }}
                                                            @empty
                                                                Data belum ada
                                                            @endforelse
                                                        </a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Tanggal Lahir</b>
                                                        <a class="float-right" style="color: black">
                                                            @forelse ($ortu as $item)
                                                                    {{ $item->tgllhr_ayah }}
                                                            @empty
                                                                Data belum ada
                                                            @endforelse
                                                        </a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Pendidikan</b>
                                                        <a class="float-right" style="color: black">
                                                            @forelse ($ortu as $item)
                                                                    {{ $item->pendidikan_ayah }}
                                                            @empty
                                                                Data belum ada
                                                            @endforelse
                                                        </a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Pekerjaan</b>
                                                        <a class="float-right" style="color: black">
                                                            @forelse ($ortu as $item)
                                                                    {{ $item->kerja_ayah }}
                                                            @empty
                                                                Data belum ada
                                                            @endforelse
                                                        </a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Penghasilan</b>
                                                        <a class="float-right" style="color: black">
                                                            @forelse ($ortu as $item)
                                                                    {{ $item->hsl_ayah }}
                                                            @empty
                                                                Data belum ada
                                                            @endforelse
                                                        </a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Alamat Orang Tua</b>
                                                        <a class="float-right" style="color: black">
                                                            @forelse ($ortu as $item)
                                                                    {{ $item->alamat_ortu }}
                                                            @empty
                                                                Data belum ada
                                                            @endforelse
                                                        </a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>No Telp Orang Tua</b>
                                                        <a class="float-right" style="color: black">
                                                            @forelse ($ortu as $item)
                                                                    {{ $item->tlp_ortu }}
                                                            @empty
                                                                Data belum ada
                                                            @endforelse
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                    </div>
                                    <div class="col-4 mt-4">
                                        <div class="card card-olive card-outline">
                                            <div class="card-body box-profile">

                                                <h3 class="profile-username text-center">Ibu</h3>

                                                <ul class="list-group list-group-unbordered mb-3">
                                                    <li class="list-group-item">
                                                        <b>NIK</b>
                                                        <a class="float-right" style="color: black">
                                                            @forelse ($ortu as $item)
                                                                    {{ $item->nik_ibu }}
                                                            @empty
                                                                Data belum ada
                                                            @endforelse
                                                        </a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Nama</b>
                                                        <a class="float-right" style="color: black">
                                                            @forelse ($ortu as $item)
                                                                    {{ $item->nama_ibu }}
                                                            @empty
                                                                Data belum ada
                                                            @endforelse
                                                        </a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Tanggal Lahir</b>
                                                        <a class="float-right" style="color: black">
                                                            @forelse ($ortu as $item)
                                                                    {{ $item->tgllhr_ibu }}
                                                            @empty
                                                                Data belum ada
                                                            @endforelse
                                                        </a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Pendidikan</b>
                                                        <a class="float-right" style="color: black">
                                                            @forelse ($ortu as $item)
                                                                    {{ $item->pendidikan_ibu }}
                                                            @empty
                                                                Data belum ada
                                                            @endforelse
                                                        </a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Pekerjaan</b>
                                                        <a class="float-right" style="color: black">
                                                            @forelse ($ortu as $item)
                                                                    {{ $item->kerja_ibu }}
                                                            @empty
                                                                Data belum ada
                                                            @endforelse
                                                        </a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Penghasilan</b>
                                                        <a class="float-right" style="color: black">
                                                            @forelse ($ortu as $item)
                                                                    {{ $item->hsl_ibu }}
                                                            @empty
                                                                Data belum ada
                                                            @endforelse
                                                        </a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Alamat Orang Tua</b>
                                                        <a class="float-right" style="color: black">
                                                            @forelse ($ortu as $item)
                                                                    {{ $item->alamat_ortu }}
                                                            @empty
                                                                Data belum ada
                                                            @endforelse
                                                        </a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>No Telp Orang Tua</b>
                                                        <a class="float-right" style="color: black">
                                                            @forelse ($ortu as $item)
                                                                    {{ $item->tlp_ortu }}
                                                            @empty
                                                                Data belum ada
                                                            @endforelse
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                    </div>
                                    <div class="col-4 mt-4">
                                        <div class="card card-olive card-outline">
                                            <div class="card-body box-profile">

                                                <h3 class="profile-username text-center">Wali</h3>

                                                <ul class="list-group list-group-unbordered mb-3">
                                                    <li class="list-group-item">
                                                        <b>Nama</b>
                                                        <a class="float-right" style="color: black">
                                                            @forelse ($ortu as $item)
                                                                    {{ $item->nama_wali }}
                                                            @empty
                                                                Data belum ada
                                                            @endforelse
                                                        </a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Tanggal Lahir</b>
                                                        <a class="float-right" style="color: black">
                                                            @forelse ($ortu as $item)
                                                                    {{ $item->tgllhr_wali }}
                                                            @empty
                                                                Data belum ada
                                                            @endforelse
                                                        </a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Pendidikan</b>
                                                        <a class="float-right" style="color: black">
                                                            @forelse ($ortu as $item)
                                                                    {{ $item->pendidikan_wali }}
                                                            @empty
                                                                Data belum ada
                                                            @endforelse
                                                        </a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Pekerjaan</b>
                                                        <a class="float-right" style="color: black">
                                                            @forelse ($ortu as $item)
                                                                    {{ $item->kerja_wali }}
                                                            @empty
                                                                Data belum ada
                                                            @endforelse
                                                        </a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Penghasilan</b>
                                                        <a class="float-right" style="color: black">
                                                            @forelse ($ortu as $item)
                                                                    {{ $item->hsl_wali }}
                                                            @empty
                                                                Data belum ada
                                                            @endforelse
                                                        </a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Alamat Orang Tua</b>
                                                        <a class="float-right" style="color: black">
                                                            @forelse ($ortu as $item)
                                                                    {{ $item->alamat_wali }}
                                                            @empty
                                                                Data belum ada
                                                            @endforelse
                                                        </a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>No Telp Orang Tua</b>
                                                        <a class="float-right" style="color: black">
                                                            @forelse ($ortu as $item)
                                                                    {{ $item->tlp_wali }}
                                                            @empty
                                                                Data belum ada
                                                            @endforelse
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
    <!-- Toastr -->
    <script src="{{ asset('lte/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('lte/dist/js/adminlte.min.js') }}"></script>
    <script>
        .btn - group.special {
                display: flex;
            }

            .special.btn {
                flex: 1
            }
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

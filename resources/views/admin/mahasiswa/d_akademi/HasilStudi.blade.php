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

                                    <h3 class="profile-username text-center"><b>{{ $shs_mhs->nama_mhs }}</b></h3>

                                    <p class=" text-center"><b>{{ $shs_mhs->jenjang }} - {{ $shs_mhs->nama_jurusan }}</b></p>


                                    <div class="col-md-12 text-center">
                                        <a href="#"
                                            class="btn bg-olive btn-success rounded-pill pl-4 pr-4"><b>{{ $shs_mhs->status }}</b></a>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <div class="btn-group-vertical w-100 mb-2">
                                <a class="btn bg-olive btn-outline-success text-left" href="{{ url('s-mhs', $shs_mhs->id_mhs) }}"> Data Mahasiswa
                                </a>
                                <a class="btn bg-olive btn-outline-success text-left active" href="{{ url('sa-mhs', $shs_mhs->id_mhs) }}"> Data
                                    Akademik </a>
                                <a class="btn bg-olive btn-outline-success text-left" href="/valkrs/{{$shs_mhs->id_mhs}}/{{$shs_mhs->smt_mahasiswa}}"> Kartu Rencana Studi
                                </a>
                                {{--<a class="btn bg-olive btn-outline-success text-left" href="/akm"> Aktivitas Kuliah
								Mahasiswa </a>--}}
                                {{--  <a class="btn bg-olive btn-outline-success text-left" href="/khs"> Kartu Hasil Studi
                                </a>  --}}
                                {{--<a class="btn bg-olive btn-outline-success text-left" href="/bayar_mhs"> Tagihan dan
                                    Pembayaran
								Mahasiswa </a>--}}
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="btn-group ">
                                <a class="btn btn-outline-secondary text-left" href="{{ url('sa-mhs', $shs_mhs->id_mhs) }}"> Mata
                                    Kuliah </a>
                                <a class="btn btn-outline-secondary text-left" href="{{ url('st-mhs', $shs_mhs->id_mhs) }}"> Transkrip </a>
                                <a class="btn btn-outline-secondary active text-left" href="{{ url('shs-mhs', $shs_mhs->id_mhs) }}"> Hasil Studi
                                </a>
                            </div>
                            <div class="row">
                                <div class="col-6 mt-2 mb-2">
                                    Tahun Akademik
                                    <select class="form-control-sm ml-2 mr-2" name="tahun" id="mySelect">
                                        <option value="a">All</option>
                                        <?php
                                        $tg_awal = date('Y') - 16;
                                        $tgl_akhir = date('Y');
                                        for ($i = $tgl_akhir; $i >= $tg_awal; $i--) {
                                            echo "
                                        <option value='$i'";
                                            if (date('Y') == $i) {
                                                echo 'selected';
                                            }
                                            echo ">$i</option>";
                                        }
                                        ?>
                                    </select>
                                    Semester
                                    <select class="form-control-sm ml-2" name="semester" id="mySelect2">
                                        <a hidden {{  $bln=   date('m')  }}></a>
                                    @if ($bln < 9 && $bln>=3)
                                        <option value='Genap' selected hidden>Genap</option>
                                    @else
                                        <option value='Ganjil' selected hidden>Ganjil</option>
                                    @endif  
                                    <option value="a">All</option>
                                    <option value='Ganjil'>Ganjil</option>
                                    <option value='Genap'>Genap</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <ol class=" float-sm-right">
                                        <div class="row ">
                                            <div class="col-md-12 text-center">
                                                <a href="#"
                                                    class="btn bg-olive btn-success rounded-pill pl-4 pr-4"><b>Print</b></a>
                                            </div>
                                        </div>
                                    </ol>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table  table-bordered table-striped " id="dataTable"
                                        width="100%" cellspacing="0">
                                        <thead>
                                            <tr class="bg-dark">
                                                <th>No</th>
                                                <th>
                                                    <center /> Kode Mata Kuliah
                                                </th>
                                                <th>
                                                    <center /> Nama Mata Kuliah
                                                </th>
                                                <th>
                                                    <center /> SKS
                                                </th>
                                                <th>
                                                    <center /> Nilai Huruf
                                                </th>
												<th hidden>
                                                    <center /> Semester
                                                </th>
												<th hidden>
                                                    <center /> Tahun Akademik
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="myTable1">
                                            @php $no = 1; 
                                            $t_sks = 0;
                                            $jml = 0;
                                            $ips = 0;
                                            $i = 0;@endphp
                                            @forelse ($krs as $item)
											<tr class="odd gradeX">
                                            <th>
                                                <center />{{ $no++ }}
                                            </th>
                                            <td>{{ $item->kode_matkul }}</td>
                                            <td>{{ $item->nama_matkul }}</td>
                                            <td>{{ $item->sks }}</td>
                                            <td>{{ $item->grade }}</td>
                                            <td hidden>{{ $item->smt_periode }}</td>
                                            <td hidden>{{ $item->nama_periode }}</td> 
                                            <a hidden {{ $a = $item->mutu }} {{ $b = $item->sks }}>
                                                {{ $c = $a * $b }}
                                            </a>
											</tr>
                                           
                                            {{-- hitungan ips --}}
                                            @php($t_sks += $item->sks)
                                            @php($jml += $c)
                                            @php($ips = $jml / $t_sks)
                                            @php($i = 1)
                                            @empty
                                            <tr><td colspan="6" class="text-center">Data belum ada</td></tr>
                                            @php($i = 0)
                                            @endforelse
                                            @if ($i<= 0)
                                              sf
                                            @else
                                            <tr>
                                                <td colspan="4">IPS</td>
                                                <td>
                                                    <center />
                                                    {{ number_format($ips, 2, '.', '.') }}
                                                </td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
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

    <script>
        $(document).ready(function(){
        
        var str=""
        var rows = $('#myTable1 tr');
        rows.hide();	
        var sub = $("#mySelect2").val();
        var select= $('#mySelect').val();	
        str=":contains('" + select + "'):contains('" + sub + "')"
        rows.filter(str).show();
        
        $('#mySelect, #mySelect2').on('change',function(){
    
        var rows = $('#myTable1 tr');
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
        
        });
        </script>

    {{--  <script>
		
		$(document).ready(function(){
		
            var value = $("#mySelect").val().toLowerCase();
            $("#myTable1 tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });

            
		
		$("#mySelect").change(function() {
		var value = $(this).val().toLowerCase();
		$("#myTable1 tr").filter(function() {
		$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});
		});
		
		$("#mySelect2").change(function() {
		var value = $(this).val().toLowerCase();
		$("#myTable1 tr").filter(function() {
		$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});
		});
		
		
		});
	</script>   --}}
</body>

</html>

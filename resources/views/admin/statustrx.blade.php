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
                    <h1 class="mt-5"><b>Daftar Pembayaran SPP</b></h1>
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
					 <div class="row mb-2">
                        <div class="col-sm-8">
                          
                                <div class="row mb-2">
                                    <div>
                                        <button type="button" class="btn btn-flat btn-block btn-success ml-2 mt-1"
                                            data-toggle="modal" data-target="#modal-lg">+ Tambah
                                            Data</button>
                                    </div>
                                </div>
								
                        
                        </div><!-- /.col -->
						<select class="custom-select" class="filter" style="width: auto;" id="mySelect">
                                        <option value="a">- Bulan -</option>
										
										<option value="Januari">Januari</option>
										<option value="Februari">Februari</option>
										<option value="Maret">Maret</option>
										<option value="April">April</option>
										<option value="Mei">Mei</option>
										<option value="Juni">Juni</option>
										<option value="Juli">Juli</option>
										<option value="Agustus">Agustus</option>
										<option value="September">September</option>
										<option value="Oktober">Oktober</option>
										<option value="November">November</option>
										<option value="Desember">Desember</option>
										
                        </select>
                                    <select class="custom-select ml-2 mr-2" class="filter" style="width: auto;" id="mySelect2">
                                        <option value="a">- Tahun -</option>
                                        <?php
										$thn_skr = date('Y');
										for ($i = $thn_skr; $i >= 2007; $i--) {
										echo "
										<option value='$i-'";
										echo ">$i</option>";
										}
										?>
                        </select>   
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
                                            <center /> Nama Mahasiswa
                                        </th>
                                        <th>
                                            <center /> Tanggal Pembayaran
                                        </th>
                                        <th>
                                            <center /> SPP
                                        </th>
										<th>
                                            <center /> Bulan
                                        </th>
                                        <th>
                                            <center /> Jumlah Yang Dibayar
                                        </th>
										<th>
                                            <center /> Kekurangan
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
                                            <th><center>{{ $i++ }}</th>
                                            <td>{{ $item->nama_mhs }}</td>
                                            <td>{{ $item->tanggal_setor }}</td>
											<?php
											$link = mysqli_connect('localhost', 'root', '', 'pmbpolimercia');
											$idpembayaran = $item->id_pembayaranspp;
											$spp1 = mysqli_query($link, "select * from tb_pembayaranspp INNER JOIN tb_aturpembayaranspp 
											ON tb_aturpembayaranspp.id_spp = tb_pembayaranspp.id_spp where id_pembayaranspp = '$idpembayaran' ");
											$hasilspp = mysqli_fetch_array($spp1);
											?>
                                            <td><?php echo $hasilspp['keterangan'].' ( Rp.'.number_format($hasilspp['biaya'],2,',','.').' ) '; ?></td>
                                            <td>{{$item->bulan}}</td>
                                            <td>{{ 'Rp. '.number_format($item->bayar,2,',','.') }}</td>
                                            <td>{{ 'Rp. '.number_format($hasilspp['biaya']-$item->bayar,2,',','.') }}</td>
                                            <td>{{ $item->statusspp }}</td>
                                            
                                            <td>
											{{--<a class="fas fa-edit" href="/mk"
                                                                        data-toggle="modal"
                                                                        data-target="#modal-dp{{ $item->id_pembayaranspp}}">
											Edit Status </a>--}}
												<a href="/mk" data-toggle="modal" data-target="#modal-dp{{ $item->id_pembayaranspp}}"><i
                                                        class="fas fa-edit"></i> Edit</a> |
                                                <a href="{{ url('delete-trx', $item->id_pembayaranspp) }}"><i class="fas fa-trash-alt"
                                                        style="color:red"></i>delete</a> </a>
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
										<div class="modal fade" id="modal-dp{{ $item->id_pembayaranspp}}">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Edit Pembayaran Mahasiswa
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
                                                                                style="color: rgb(0, 0, 0)">Nama Mahasiswa</a>
                                                                            <a class="col-8 "
                                                                                style="color: rgb(0, 0, 0)">
                                                                                {{ $item->nama_mhs }} </a>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <a class="col-3 "
                                                                                style="color: rgb(0, 0, 0)">SPP
                                                                                </a>
																			<?php
																			$link = mysqli_connect('localhost', 'root', '', 'pmbpolimercia');
																			$idpembayaran = $item->id_pembayaranspp;
																			$spp1 = mysqli_query($link, "select * from tb_pembayaranspp INNER JOIN tb_aturpembayaranspp 
																			ON tb_aturpembayaranspp.id_spp = tb_pembayaranspp.id_spp where id_pembayaranspp = '$idpembayaran' ");
																			$hasilspp = mysqli_fetch_array($spp1);
																			?>
																			
                                                                            <a class="col-8 "
                                                                                style="color: rgb(0, 0, 0)">
                                                                                <?php echo $hasilspp['keterangan'].' ( Rp.'.number_format($hasilspp['biaya'],2,',','.').' ) '; ?> </a>
																			
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-5">
                                                                        <div class="row mt-3 mb-3">
                                                                            <a class="col-3 "
                                                                                style="color: rgb(0, 0, 0)">Tanggal Dibayar</a>
                                                                            <a class="col-5 "
                                                                                style="color: rgb(0, 0, 0)">
                                                                                {{ $item->tanggal_setor }} </a>
                                                                        </div>
                                                                        <div class="row mt-3 mb-3">
                                                                            <a class="col-3 "
                                                                                style="color: rgb(0, 0, 0)">Status</a>
                                                                           
																			<a class="col-5 "
                                                                                style="color: rgb(0, 0, 0)">
                                                                                {{ $item->statusspp }} </a>
																			
																			
																					
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
                                                                       <div class="modal-dialog modal-lg">
                <form action="update-trx/{{$item->id_pembayaranspp}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-content" style="box-shadow:none;border:none;">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Data Pembayaran</h4>
                            {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>--}}
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="inputEstimatedBudget">Nama Mahasiswa</label> <label
                                    style="color: red">*</label>
                                <select class="form-control" name="id_mhs" id="jns_kelamin">
                                    <option value='{{$item->id_mhs}}'> {{$item->nama_mhs}}</option>
									@foreach($mahasiswa as $dmhs)
                                    <option value='{{$dmhs->id_mhs}}'> {{$dmhs->nama_mhs}}</option>
									@endforeach
                                </select>
                            </div>
							<div class="form-group">
                                <label for="inputEstimatedBudget">Pilih SPP</label> <label
                                    style="color: red">*</label>
                                <select class="form-control" name="id_spp" id="jns_kelamin">
                                    <option value='{{$item->id_spp}}'> {{$item->id_spp}} | {{$item->keterangan}} | {{'Rp. '.number_format($item->biaya,2,',','.')}}</option>
                                    @foreach($spp as $dspp)
                                    <option value='{{$dspp->id_spp}}'> {{$dspp->id_spp}} | {{$dspp->keterangan}} | {{'Rp. '.number_format($dspp->biaya,2,',','.')}}</option>
									@endforeach
                                </select>
                            </div>
							<div class="form-group">
                                <label for="inputEstimatedBudget">Pilih Bulan</label> <label
                                    style="color: red">*</label>
                                <select class="form-control" name="bulan" id="jns_kelamin">
                                    
										<option value='{{$item->bulan}}'> {{$item->bulan}}</option>
                                    	<option value="Januari">Januari</option>
										<option value="Februari">Februari</option>
										<option value="Maret">Maret</option>
										<option value="April">April</option>
										<option value="Mei">Mei</option>
										<option value="Juni">Juni</option>
										<option value="Juli">Juli</option>
										<option value="Agustus">Agustus</option>
										<option value="September">September</option>
										<option value="Oktober">Oktober</option>
										<option value="November">November</option>
										<option value="Desember">Desember</option>
									
                                </select
                            <div class="form-group">
                                <label for="inputEstimatedBudget">Tanggal Pembayaran</label> <label
                                    style="color: red">*</label>
                                <input type="datetime-local" id="tgl_lahir" name="tanggal_setor" class="form-control"
                                    placeholder="Input Tanggal Pembayaran" value="<?php echo date('Y-m-d\TH:i:s', strtotime($item->tanggal_setor)); ?>">
                            </div>
							<div class="form-group">
                                <label for="inputEstimatedBudget">Dibayar</label>
                                    <input type="number" id="anak_ke" name="bayar" class="form-control"
                                    placeholder="<?php echo 'Rp. '.number_format($item->bayar,2,',','.'); ?>" value="{{$item->bayar}}">
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedBudget">Status</label> <label
                                    style="color: red">*</label>
                                <select class="form-control" name="statusspp" id="jns_kelamin">
									<option value='{{$item->statusspp}}'> {{$item->statusspp}}</option>
                                    <option value='Cicil' @if (old('statusspp') == 'Cicil') selected="selected" @endif> Cicil</option>
                                    <option value='Lunas' @if (old('statusspp') == 'Lunas') selected="selected" @endif> Lunas</option>
                                </select>
                            </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-primary toastrDefaultSuccess">Simpan</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </form>
                <!-- /.modal-content -->
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
                <form action="{{ route('create-trx') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Data Pembayaran</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="inputEstimatedBudget">Nama Mahasiswa</label> <label
                                    style="color: red">*</label>
                                <select class="form-control" name="id_mhs" id="jns_kelamin">
                                    <option selected disabled> Pilih Nama Mahasiswa</option>
									@foreach($mahasiswa as $dmhs)
                                    <option value='{{$dmhs->id_mhs}}' @if (old('id_mhs') == $dmhs->id_mhs) selected="selected" @endif> {{$dmhs->nama_mhs}}</option>
									@endforeach
                                </select>
                            </div>
							<div class="form-group">
                                <label for="inputEstimatedBudget">Pilih SPP</label> <label
                                    style="color: red">*</label>
                                <select class="form-control" name="id_spp" id="sppan">
                                    <option selected disabled> Pilih SPP</option>
                                    @foreach($spp as $dspp)
                                    <option title='{{$dspp->biaya}}' value='{{$dspp->id_spp}}' @if (old('id_spp') == $dspp->id_spp) selected="selected" @endif> {{$dspp->id_spp}} | {{$dspp->keterangan}} | {{'Rp. '.number_format($dspp->biaya,2,',','.')}}</option>
									@endforeach
                                </select>
                            </div>
							<div class="form-group">
                                <label for="inputEstimatedBudget">Pilih Bulan</label> <label
                                    style="color: red">*</label>
                                <select class="form-control" name="bulan" id="bulan">
                                    <option selected disabled> Pilih Bulan</option>
									
                                    	<option value="Januari" @if (old('bulan') == 'Januari') selected="selected" @endif>Januari</option>
										<option value="Februari" @if (old('bulan') == 'Februari') selected="selected" @endif>Februari</option>
										<option value="Maret" @if (old('bulan') == 'Maret') selected="selected" @endif>Maret</option>
										<option value="April" @if (old('bulan') == 'April') selected="selected" @endif>April</option>
										<option value="Mei" @if (old('bulan') == 'Mei') selected="selected" @endif>Mei</option>
										<option value="Juni" @if (old('bulan') == 'Juni') selected="selected" @endif>Juni</option>
										<option value="Juli" @if (old('bulan') == 'Juli') selected="selected" @endif>Juli</option>
										<option value="Agustus" @if (old('bulan') == 'Agustus') selected="selected" @endif>Agustus</option>
										<option value="September" @if (old('bulan') == 'September') selected="selected" @endif>September</option>
										<option value="Oktober" @if (old('bulan') == 'Oktober') selected="selected" @endif>Oktober</option>
										<option value="November" @if (old('bulan') == 'November') selected="selected" @endif>November</option>
										<option value="Desember" @if (old('bulan') == 'Desember') selected="selected" @endif>Desember</option>
									
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedBudget">Tanggal Pembayaran</label> <label
                                    style="color: red">*</label>
                                <input type="datetime-local" id="tgl_lahir" name="tanggal_setor" class="form-control"
                                    placeholder="Input Tanggal Lahir" value="<?php echo date('Y-m-d\TH:i:s', strtotime(now())); ?>">
                            </div>
							<div class="form-group">
                                <label for="inputEstimatedBudget">Dibayar</label> <label
                                    style="color: red">*</label>
                                    <input type="number" id="bayar" name="bayar" class="form-control"
                                    placeholder="Biaya Yang Dibayar" value="{{old('bayar')}}">
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedBudget">Status</label> <label
                                    style="color: red">*</label>
                                <select class="form-control" name="statusspp" id="statusspp">
                                    <option value='Cicil' @if (old('statusspp') == 'Cicil') selected="selected" @endif> Cicil</option>
                                    <option value='Lunas' @if (old('statusspp') == 'Lunas') selected="selected" @endif> Lunas</option>
                                </select>
                            </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-primary toastrDefaultSuccess">Simpan</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </form>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
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
	<script>
		
		
		$("#bayar").on("keyup", function() {
			
		var bayar1=parseInt($('#bayar').val());
		var spp1=parseInt($('#sppan :selected').attr('title'));
		
		if(bayar1 >= spp1){
			$('#statusspp').val('Lunas');
		}else{
			$('#statusspp').val('Cicil');
		}
		});
		
	</script>
		
<style>
	.pagination{
		display:inline-flex;
	}
	</style>
</body>

</html>

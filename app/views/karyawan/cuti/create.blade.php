@extends('master')

@section('content')
<!-- select2 -->
{{ HTML::style('assets/css/plugins/select2/select2.css') }}
<!-- Datepicker -->
{{ HTML::style('assets/css/plugins/datepicker/datepicker.css') }}
<!-- Datepicker -->
{{ HTML::script('assets/js/plugins/datepicker/bootstrap-datepicker.js') }}
<!-- select2 -->
{{ HTML::script('assets/js/plugins/select2/select2.min.js') }}
<body>
	@include('menu')
	</div>
	<div class="container-fluid" id="content"> <!-- <div class="container-fluid nav-hidden" id="content"> -->
		@include('karyawan.left')
		<div id="main">
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>Buat Cuti</h1>
					</div>
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="{{Url::asset('/')}}">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="{{Url::asset('karyawan/cuti')}}">Cuti</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="#">Buat Cuti</a>
						</li>
					</ul>
					<div class="close-bread">
						<a href="#"><i class="icon-remove"></i></a>
					</div>
				</div>
				@if($errors->any())
					<div class="alert alert-error" style="margin-top:15px">
						<button type="button" class="close" data-dismiss="alert">×</button>
						<strong>Errors!</strong> {{$errors->first()}}
					</div>
				@endif
				<div class="row-fluid">
					<div class="span12">
						<div class="box">
							<div class="box-title">
							</div>
							<div class="box-content nopadding">
								{{ Form::open(array('route' => 'karyawan.cuti.store', 'class' => 'form-horizontal form-column form-bordered')) }}
								<form action="#" method="POST" class="">
									<div class="span6">
										<div class="control-group">
											<label for="tanggalmulai" class="control-label">Tanggal Awal</label>
											<div class="controls">
												<input type="text" name="tanggalmulai" id="tanggalmulai" class="input-block-level datepick" required>
											</div>
										</div><div class="control-group">
											<label for="alasan" class="control-label">Alasan</label>
											<div class="controls">
												<select name="alasan" id="alasan" class='input-block-level' required>
													<option value="" selected>-Pilih Alasan-</option>
													<option value="1">Cuti</option>
													<option value="2">Cuti Melahirkan</option>
													<option value="3">Sakit</option>
													<option value="4">Berduka Cita</option>
													<option value="5">Pernikahan</option>
													<option value="6">Khitanan/Baptis</option>
												</select>
											</div>
										</div>
									</div>
									<div class="span6">
										<div class="control-group">
											<label for="tanggalselesai" class="control-label">Tanggal Akhir</label>
											<div class="controls">
												<input type="text" name="tanggalselesai" id="tanggalselesai" class="input-block-level datepick" required>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">Surat Dokter</label>
											<div class="controls">
												<label class="radio">
													<input type="radio" name="suratdokter" value=1> Ada
												</label>
												<label class="radio">
													<input type="radio" name="suratdokter" value=2> Tidak Ada
												</label>
											</div>
										</div>
										<div class="control-group">
											<label for="pengganti" class="control-label">Pengganti</label>
											<div class="controls">
												<select name="pengganti" id="pengganti" class='select2-me input-block-level' required>
													<option value="" selected>-Pilih Pengganti-</option>
													@foreach($data['karyawan'] as $karyawan)
													@if(($karyawan->user->iduser == Auth::user()->iduser) OR $karyawan->user->idjabatan <> 6 OR $karyawan->status == 1)

													@else
													<option value="{{$karyawan->nokaryawan}}">{{ $karyawan->user->nama_lengkap}}</option>
													@endif
													@endforeach
												</select>
											</div>
										</div>
									</div>
									<div class="span12">
										<div class="form-actions">
											<button type="submit" class="btn btn-primary">Buat Surat Cuti</button>
											<button type="button" class="btn">Cancel</button>
										</div>
									</div>
								{{Form::close()}}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


@stop
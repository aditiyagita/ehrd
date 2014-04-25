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
						<h1>Cuti</h1>
					</div>
					<div class="pull-right">
						<ul class="minitiles">
							<li class='grey'>
								<a href="#"><i class="icon-cogs"></i></a>
							</li>
							<li class='lightgrey'>
								<a href="#"><i class="icon-globe"></i></a>
							</li>
						</ul>
						<ul class="stats">
							<li class='satgreen'>
								<i class="icon-money"></i>
								<div class="details">
									<span class="big">$324,12</span>
									<span>Balance</span>
								</div>
							</li>
							<li class='lightred'>
								<i class="icon-calendar"></i>
								<div class="details">
									<span class="big">February 22, 2013</span>
									<span>Wednesday, 13:56</span>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="more-login.html">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="layouts-sidebar-hidden.html">Layouts</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="layouts-fixed.html">Fixed layout</a>
						</li>
					</ul>
					<div class="close-bread">
						<a href="#"><i class="icon-remove"></i></a>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<div class="box">
							<div class="box-title">
								<h3><i class="icon-list"></i> Surat Cuti</h3>
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
												<textarea name="alasan" id="alasan" rows="5" class="input-block-level"></textarea>
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
													<option value="{{$karyawan->idkaryawan}}">{{ $karyawan->user->nama_lengkap}}</option>
													@endforeach
												</select>
											</div>
										</div>
									</div>
									<div class="span12">
										<div class="form-actions">
											<button type="submit" class="btn btn-primary">Save changes</button>
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
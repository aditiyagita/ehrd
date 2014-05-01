@extends('master')

@section('content')

<body>
	@include('menu')
	</div>
	<div class="container-fluid" id="content"> <!-- <div class="container-fluid nav-hidden" id="content"> -->
		@include('hrdmanager.left')
		<div id="main">
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>Absensi</h1>
					</div>
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="{{Url::asset('/')}}">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="{{Url::asset('hrdmanager/absensi')}}">Absensi</a>
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

							</div>
							<div class="box-content nopadding">
							{{ Form::open(array('url' => 'hrdmanager/absensi-karyawan/accept')) }}
								<input type="hidden" name="bulan" value="{{$data['input']['bulan']}}">
								<input type="hidden" name="tahun" value="{{$data['input']['tahun']}}">
								<table class="table table-hover table-nomargin dataTable table-bordered usertable">
									<thead>
										<tr>
											<th><input type="checkbox" name="check_all" id="check_all"></th>
											<th width="10%">No</th>
											<th width="10%">No Karyawan</th>
											<th width="40%">Nama</th>
											<th width="40%">Department</th>
											<th width="10%">Kehadiran</th>
											<th width="10%">Terlambat</th>
											<th width="10%">Jam Lembur</th>
										</tr>
									</thead>
									<tbody>
										<?php $i=1; ?>
										@foreach($data['absensi'] as $absensi)
											<tr>
												<td><input type="checkbox" name="check[]" id="check" value="{{ $absensi->nokaryawan }}"></td>
												<td><center>{{ $i }}</center></td>
												<td>{{ $absensi->nokaryawan }}</td>
												<td>{{ $absensi->nama_lengkap }}</td>
												<td>{{ $absensi->department }}</td>
												<td>{{ $absensi->hadir }}</td>
												<td>{{ $absensi->terlambat }}</td>
												<td>{{ $absensi->jamlembur }}</td>
											</tr>
											<?php $i++; ?>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
						<div style="float:right">
							<input type="submit"class="btn btn-large btn-brown" value="Accept Absensi"/>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@stop



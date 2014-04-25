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
								<table class="table table-hover table-nomargin dataTable table-bordered">
									<thead>
										<tr>
											<th width="10%">No</th>
											<th width="10%">Tanggal</th>
											<th width="10%">No Karyawan</th>
											<th width="40%">Nama</th>
											<th width="10%">Kehadiran</th>
											<th width="10%">Masuk</th>
											<th width="10%">Keluar</th>
											<th width="10%">Lembur</th>
										</tr>
									</thead>
									<tbody>
										<?php $i=1; ?>
										@foreach($data['absensi'] as $absensi)
											<tr>
												<td><center>{{ $i }}</center></td>
												<td>{{ date("d M Y", strtotime($absensi->tanggal)) }}</td>
												<td>{{ $absensi->nokaryawan }}</td>
												<td>{{ $absensi->karyawan->user->nama_lengkap }}</td>
												<td>{{ $absensi->kehadiran }}</td>
												<td>{{ $absensi->telat }}</td>
												<td>{{ $absensi->pulang }}</td>
												<td>{{ $absensi->lembur }}</td>
											</tr>
											<?php $i++; ?>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@stop
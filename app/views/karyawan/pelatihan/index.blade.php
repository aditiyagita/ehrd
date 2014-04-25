@extends('master')

@section('content')

<body>
	@include('menu')
	</div>
	<div class="container-fluid" id="content"> <!-- <div class="container-fluid nav-hidden" id="content"> -->
		@include('karyawan.left')
		<div id="main">
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>Pelatihan</h1>
					</div>
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="{{Url::asset('/')}}">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="{{Url::asset('karyawan/pelatihan')}}">Pelatihan</a>
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
											<th width="5%">No</th>
											<th width="10%">Tanggal Mulai</th>
											<th width="10%">Tanggal Selesai</th>
											<th width="40%">Judul</th>
											<th width="10%">Kuota</th>
											<th width="10%">Sisa</th>
											<th class='hidden-480 width="20%'>Detail</th>
										</tr>
									</thead>
									<tbody>
										<?php $i=1; ?>
										@foreach($data['pelatihan'] as $pelatihan)
											<tr>
												<td><center>{{ $i }}</center></td>
												<td>{{ date("d M Y", strtotime($pelatihan->tanggalmulai)) }}</td>
												<td>{{ date("d M Y", strtotime($pelatihan->tanggalselesai)) }}</td>
												<td>{{ $pelatihan->judul }}</td>
												<td>{{ $pelatihan->kuota }}</td>
												<td>{{ $sisa = $pelatihan->kuota-count($pelatihan->peserta) }}</td>
												<td class='hidden-480'>
													@if($sisa > 0)
													<center>
														<a href="{{ Url::asset('karyawan/pelatihan/'.$pelatihan->idpelatihan.'') }}" class="btn" rel="tooltip" title="Detail"><i class="icon-search"></i></a>
													</center>
													@endif
												</td>
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
@extends('master')

@section('content')

<body>
	@include('menu')
	</div>
	<div class="container-fluid" id="content"> <!-- <div class="container-fluid nav-hidden" id="content"> -->
		@include('hrdstaff.left')
		<div id="main">
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>Lamaran</h1>
					</div>
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="{{Url::asset('hrdstaff/')}}">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="{{Url::asset('hrdstaff/lamaran')}}">Lamaran</a>
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
											<th width="10%">Tanggal Akhir</th>
											<th width="20%">Posisi</th>
											<th width="35%">Judul</th>
											<th width="10%">Pelamar</th>
											<th width="15%">Status</th>
											<th class='hidden-480 width="20%'>Operasi</th>
										</tr>
									</thead>
									<tbody>
										<?php $i=1; ?>
										@foreach($data['jobvacancy'] as $jobvacancy)
											<tr>
												<td><center>{{ $i }}</center></td>
												<td>{{  date('d M Y', strtotime($jobvacancy->tanggalakhir)) }}</td>
												<td>{{ $jobvacancy->posisi }}</td>
												<td>{{ $jobvacancy->judul }}</td>
												<td><center>{{ count($jobvacancy->lamaran) }} orang</center></td>
												<td>
													<center>
													@if((date('Y-m-d')) < ($jobvacancy->tanggalakhir))
														<span class="btn btn-mini btn-blue">Masih Berlaku</span>
													@else
														<span class="btn btn-mini btn-red">Ditutup</span>
													@endif
													</center>
												</td>
												<td class='hidden-480'>
													<center>
														<a href="{{ Url::asset('hrdstaff/list-lamaran/'.$jobvacancy->idlowongan) }}" class="btn btn-green" rel="tooltip" title="Terima Lamaran"><i class="icon-filter"></i></a>
													</center>
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
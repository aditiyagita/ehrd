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
						<h1>Cuti</h1>
					</div>
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="{{Url::asset('hrdstaff/')}}">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="{{Url::asset('hrdstaff/cuti')}}">Cuti</a>
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
											<th width="15%">Tanggal Mulai</th>
											<th width="15%">Tanggal Selesai</th>
											<th width="25%">Nama</th>
											<th width="15%">Alasan</th>
											<th width="10%">Range</th>
											<td>Status</td>
											<th class='hidden-480 width="20%'>Operasi</th>
										</tr>
									</thead>
									<tbody>
										<?php $i=1; ?>
										@foreach($data['cuti'] as $cuti)
											<tr>
												<td><center>{{ $i }}</center></td>
												<td>{{ date("d M Y", strtotime($cuti->tanggalmulai)) }}</td>
												<td>{{ date("d M Y", strtotime($cuti->tanggalselesai)) }}</td>
												<td>{{$cuti->karyawan->user->nama_lengkap}}</td>
												<td>
													@if($cuti->alasan == 1)
		                                                Cuti
		                                            @elseif($cuti->alasan == 2)
		                                                Cuti Melahirkan
		                                            @elseif($cuti->alasan == 3)
		                                                Sakit
		                                            @elseif($cuti->alasan == 4)
		                                                Berduka Cita
		                                            @elseif($cuti->alasan == 5)
		                                                Pernikahan
		                                            @elseif($cuti->alasan == 6)
		                                                Khitanan/Baptis
		                                            @else
		                                                Cuti
		                                            @endif
												</td>
												<td>{{$cuti->range}}</td>
												<td>
													@if($cuti->status == 1)
														<span class="btn btn-small btn-inverse btn-red">Unapprove</span>
													@else
														<span class="btn btn-small btn-inverse btn-blue">Approve</span>
													@endif
												</td>
												<td class='hidden-480'>
													<center>
														<a href="{{URL::asset('hrdstaff/cuti/'.$cuti->idcuti)}}" class="btn" rel="tooltip" title="Detail Cuti"><i class="icon-search"></i></a>
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
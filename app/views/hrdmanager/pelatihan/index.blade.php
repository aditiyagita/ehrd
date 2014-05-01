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
							<a href="{{Url::asset('hrdmanager/pelatihan')}}">Pelatihan</a>
						</li>
					</ul>
					<div class="close-bread">
						<a href="#"><i class="icon-remove"></i></a>
					</div>
				</div>
				@if($cek = Session::get('success'))
					<div class="alert alert-success" style="margin-top:15px">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Berhasil!</strong>
                        {{ Session::get('success') }}
                    </div>
				@endif
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
											<th width="10%">Status</th>
											<th width="10%" class='hidden-480 width="20%'>Operasi</th>
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
												<td>
													@if(($pelatihan->status == 3) OR ($pelatihan->status == 5))
														<span class="label label-satgreen">Sudah Dibayar</span>
													@elseif($pelatihan->status == 2)	
														<span class="label">Sudah Disetujui</span>
													@elseif($pelatihan->status == 4)	
														<span class="label label-lightred">Tidak Disetujui</span>
													@else
														<span class="label label-lightblue">Belum Disetujui</span>
													@endif
												</td>
												<td class='hidden-480'>
													<center>
														@if(date('Y-m-d') < $pelatihan->tanggalmulai)
															@if(($pelatihan->status == 3) OR ($pelatihan->status == 5))

															@elseif($pelatihan->status == 2 )

															@elseif($pelatihan->status == 4)

															@else
															<a href="{{ Url::asset('hrdmanager/approve-pelatihan/'.$pelatihan->idpelatihan.'') }}" class="btn btn-blue" rel="tooltip" title="Approve"><i class="icon-ok-sign"></i></a>
															<a href="{{ Url::asset('hrdmanager/notapprove-pelatihan/'.$pelatihan->idpelatihan.'') }}" class="btn btn-red" rel="tooltip" title="Not Approve"><i class="icon-ban-circle"></i></a>
															@endif
															
														@endif	
														<a href="{{ Url::asset('hrdmanager/pelatihan/'.$pelatihan->idpelatihan.'') }}" class="btn" rel="tooltip" title="Detail"><i class="icon-search"></i></a>
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
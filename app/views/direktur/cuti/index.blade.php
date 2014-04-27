@extends('master')

@section('content')

<body>
	@include('menu')
	</div>
	<div class="container-fluid" id="content"> <!-- <div class="container-fluid nav-hidden" id="content"> -->
		@include('direktur.left')
		<div id="main">
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>Cuti</h1>
					</div>
					<div class="pull-right"  style="padding-top:15px">
						<a href="#modal-1" role="button" class="btn btn-brown btn-large" data-toggle="modal"><i class="icon-print"></i> Cetak Cuti</a>
					</div>
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="{{Url::asset('/')}}">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="{{Url::asset('direktur/cuti')}}">Cuti</a>
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
											<th width="10%">No. Karyawan</th>
											<th width="35%">Nama Lengkap</th>
											<th width="10%">Alasan</th>
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
												<td>{{$cuti->nokaryawan}}</td>
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
													@else
														Khitanan/Baptis
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
														<a href="{{URL::asset('direktur/cetak-cuti/'.$cuti->idcuti)}}" class="btn btn-blue" rel="tooltip" title="Cetak Cuti"><i class="icon-print"></i></a>
														<!-- <a href="javascript:hapusAction({{ $cuti->idcuti }})" class="btn btn-red" rel="tooltip" title="Batal Cuti"><i class="icon-remove-sign"></i></a> -->
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

<div id="modal-1" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h3 id="myModalLabel1">Tanggal Permohonan Cuti/Izin</h3>
    </div>
    {{ Form::open(array('route' => 'direktur.cuti.store', 'class' => 'form-horizontal')) }}
    <?php $bulan = array('Januari', 'Febuari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'); ?>
    <div class="modal-body">
        <div class="control-group">
            <label class="control-label">Dari</label>
            <div class="controls">
                <select class="span1" id="darihari" name="darihari">
					<option selected>- Pilih Hari -</option>
					@for($i=1;$i<32;$i++)
					@if($i< 10)
					<option value="0{{$i}}">{{$i}}</option>
					@else
					<option value="{{$i}}">{{$i}}</option>
					@endif
					@endfor
				</select>
				<select class="span2" id="daribulan" name="daribulan">
					<option selected="">- Pilih Bulan -</option>
					<?php $i = 1; ?>
					@foreach($bulan as $b)
					@if($i< 10)
					<option value="0{{$i}}">{{$b}}</option>
					@else
					<option value="{{$i}}">{{$b}}</option>
					@endif
					<?php $i++; ?>
					@endforeach
				</select>
				<select class="span1" id="daritahun" name="daritahun">
					<option selected="">- Pilih Tahun -</option>
					@for($i=date('Y')-5; $i<date('Y')+6; $i++)
					<option value="{{$i}}">{{$i}}</option>
					@endfor
				</select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Sampai</label>
            <div class="controls">
                <select class="span1" id="sampaihari" name="sampaihari">
					<option selected>- Pilih Hari -</option>
					@for($i=1;$i<32;$i++)
					@if($i< 10)
					<option value="0{{$i}}">{{$i}}</option>
					@else
					<option value="{{$i}}">{{$i}}</option>
					@endif
					@endfor
				</select>
				<select class="span2" id="sampaibulan" name="sampaibulan">
					<option selected="">- Pilih Bulan -</option>
					<?php $i = 1; ?>
					@foreach($bulan as $b)
					@if($i< 10)
					<option value="0{{$i}}">{{$b}}</option>
					@else
					<option value="{{$i}}">{{$b}}</option>
					@endif
					<?php $i++; ?>
					@endforeach
				</select>
				<select class="span1" id="sampaitahun" name="sampaitahun">
					<option selected="">- Pilih Tahun -</option>
					@for($i=date('Y')-5; $i<date('Y')+6; $i++)
					<option value="{{$i}}">{{$i}}</option>
					@endfor
				</select>
            </div>
        </div>
    </div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		<button class="btn btn-primary">Save changes</button>
	</div>
    {{ Form::close() }}
</div>

@stop
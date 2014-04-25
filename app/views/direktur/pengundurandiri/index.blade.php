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
						<h1>Pengunduran Diri</h1>
					</div>
					<div class="pull-right"  style="padding-top:15px">
						<a href="#modal-1" role="button" class="btn btn-brown btn-large" data-toggle="modal"><i class="icon-print"></i> Cetak Pengunduran Diri</a>
					</div>
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="{{Url::asset('/')}}">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="{{Url::asset('direktur/pengunduran-diri')}}">Pengunduran Diri</a>
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
											<th width="15%">Tanggal</th>
											<th width="20%">Nama Lengkap</th>
											<th width="40%">Alasan</th>
											<th width="70%">Status</th>
											<th class='hidden-480 width="20%'>Operasi</th>
										</tr>
									</thead>
									<tbody>
										<?php $i=1; ?>
										@foreach($data['pengunduran'] as $pengunduran)
											<tr>
												<td><center>{{ $i }}</center></td>
												<td>{{ date("d M Y", strtotime($pengunduran->tanggalsurat)) }}</td>
												<td>{{ $pengunduran->karyawan->user->nama_lengkap }}</td>
												<td>{{ $pengunduran->alasan }}</td>
												<td>
													@if($pengunduran->status == 2)
														<span class="label label-satgreen">Sudah Disetujui</span>
													@else
														<span class="label label-lightred">Belum Disetujui</span>
													@endif
												</td>
												<td class='hidden-480'>
													<center>
														<a href="{{ URL::asset('direktur/cetak-pengunduran-diri/'.$pengunduran->idpengundurandiri ) }}" class="btn btn-blue" rel="tooltip" title="Cetak Pengunduran Diri"><i class="icon-print"></i></a>
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
        <h3 id="myModalLabel1">Tanggal Pengunduran Diri</h3>
    </div>
    {{ Form::open(array('route' => 'direktur.pengunduran-diri.store', 'class' => 'form-horizontal')) }}
    <?php $bulan = array('Januari', 'Febuari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'); ?>
    <div class="modal-body">
        <div class="control-group">
            <label class="control-label">Dari</label>
            <div class="controls">
                <select class="span1" id="darihari" name="darihari">
					<option selected>- Pilih Hari -</option>
					@for($i=1;$i<32;$i++)
					<option value="{{$i}}">{{$i}}</option>
					@endfor
				</select>
				<select class="span2" id="daribulan" name="daribulan">
					<option selected="">- Pilih Bulan -</option>
					<?php $i = 1; ?>
					@foreach($bulan as $b)
					<option value="{{$i}}">{{$b}}</option>
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
					<option value="{{$i}}">{{$i}}</option>
					@endfor
				</select>
				<select class="span2" id="sampaibulan" name="sampaibulan">
					<option selected="">- Pilih Bulan -</option>
					<?php $i = 1; ?>
					@foreach($bulan as $b)
					<option value="{{$i}}">{{$b}}</option>
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
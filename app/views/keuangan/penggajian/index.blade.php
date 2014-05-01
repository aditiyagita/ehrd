@extends('master')

@section('content')

<body>
	@include('menu')
	</div>
	<div class="container-fluid" id="content"> <!-- <div class="container-fluid nav-hidden" id="content"> -->
		@include('keuangan.left')
		<div id="main">
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>Penggajian</h1>
					</div>
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="{{Url::asset('/')}}">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="{{Url::asset('direktur/penggajian')}}">Penggajian</a>
						</li>
					</ul>
					<div class="close-bread">
						<a href="#"><i class="icon-remove"></i></a>
					</div>
				</div>
				@if($cek = Session::get('success'))
					<div class="alert alert-success" style="margin-top:15px">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Berhasil...</strong>
                        {{ Session::get('success') }}
                    </div>
				@elseif($cek = Session::get('warning'))
					<div class="alert" style="margin-top:15px">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Oopss...</strong>
                        {{ Session::get('warning') }}
                    </div>
                @elseif($cek = Session::get('info'))
					<div class="alert alert-info" style="margin-top:15px">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Info...</strong>
                        {{ Session::get('info') }}
                    </div>
				@endif
				<div class="row-fluid">
					<div class="span12">
						<div class="box">
							<div class="box-title">
							</div>
							<div class="box-content">
								<?php $bulan = array('Januari', 'Febuari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'); ?>
								{{ Form::open(array('route' => 'keuangan.penggajian.store', 'class' => 'form-horizontal')) }}
									<div class="control-group">
							            <label class="control-label">Bulan</label>
							            <div class="controls">
							                <select class="span4" id="bulan" name="bulan" required>
												<option selected="">- Pilih Bulan -</option>
												<?php $i = 1; ?>
												@foreach($bulan as $b)
												<option value="{{$i}}">{{$b}}</option>
												<?php $i++; ?>
												@endforeach
											</select>
							            </div>
							        </div>
							        <div class="control-group">
							            <label class="control-label">Tahun</label>
							            <div class="controls">
							                <select class="span4" id="tahun" name="tahun" required>
												<option selected="">- Pilih Tahun -</option>
												@for($i=date('Y')-5; $i<date('Y')+6; $i++)
												<option value="{{$i}}">{{$i}}</option>
												@endfor
											</select>
							            </div>
							        </div>
							        <div class="control-group">
							            <label class="control-label">Cetak Ke</label>
							            <div class="controls">
							                <select class="span4" id="tahun" name="cetak" required>
												<option selected="">- Pilih Cetak -</option>
												<option value="pdf">PDF</option>
												<option value="excel">Excel</option>
											</select>
							            </div>
							        </div>
							        <div class="form-actions">
										<button type="submit" class="btn btn-brown btn-large">Cetak Laporan</button>
										<button type="button" class="btn btn-large">Cancel</button>
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
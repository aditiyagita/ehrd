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
							<a href="{{Url::asset('direktur/absensi')}}">Absensi</a>
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
							<div class="box-content">
								<?php $bulan = array('Januari', 'Febuari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'); ?>
								{{ Form::open(array('route' => 'direktur.absensi.store', 'class' => 'form-horizontal')) }}
									<div class="control-group">
							            <label class="control-label">Bulan</label>
							            <div class="controls">
							                <select class="span4" id="bulan" name="bulan">
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
							                <select class="span4" id="tahun" name="tahun">
												<option selected="">- Pilih Tahun -</option>
												@for($i=date('Y')-5; $i<date('Y')+6; $i++)
												<option value="{{$i}}">{{$i}}</option>
												@endfor
											</select>
							            </div>
							        </div>
							        <div class="form-actions">
										<button type="submit" class="btn btn-primary">Save changes</button>
										<button type="button" class="btn">Cancel</button>
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
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
						<h1>Setting Cuti</h1>
					</div>
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="{{Url::asset('hrdstaff/')}}">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="{{Url::asset('hrdstaff/setting-cuti')}}">Setting Cuti</a>
						</li>
					</ul>
					<div class="close-bread">
						<a href="#"><i class="icon-remove"></i></a>
					</div>
				</div>
				@if($errors->any())
					<div class="alert alert-success" style="margin-top:15px">
						<button type="button" class="close" data-dismiss="alert">×</button>
						<strong>Update!</strong> {{$errors->first()}}
					</div>
					@endif
				<div class="row-fluid">
					<div class="span12">
						<div class="box">
							<div class="box-title">
							
							</div>
							{{ Form::open(array('route' => 'hrdstaff.setting-cuti.store', 'class' => 'form-horizontal')) }}
							<div class="box-content" style="padding-top:10px">
								<?php $i=0; ?>
								@foreach($data['settingcuti'] as $settingcuti)
								<div class="control-group">
                                    <label for="tanggalakhir" class="control-label">{{ $settingcuti->jeniscuti }}</label>
                                    <div class="controls">
                                    	<input type="hidden" name="settingid[{{$i}}]" value="{{$settingcuti->idsettingcuti}}">
                                        <input type="number" name="settingvalue[{{$i}}]" value="{{ $settingcuti->jumlahhari }}" class="input-block-level" required>
                                    </div>
                                </div>
                                <?php $i++; ?>
                                @endforeach
                                <div class="control-group">	
                                	<div style="padding-top:10px; float:right;">
                                        <button type="submit" class="btn btn-large btn-primary">Save changes</button>
                                        <button type="button" class="btn btn-large">Cancel</button>
                                    </div>
                                </div>	
							</div>
							{{Form::close()}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop
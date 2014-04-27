@extends('master')

@section('content')
<!-- Datepicker -->
{{ HTML::style('assets/css/plugins/datepicker/datepicker.css') }}
<!-- Datepicker -->
{{ HTML::script('assets/js/plugins/datepicker/bootstrap-datepicker.js') }}
<!-- CKEditor -->
{{ HTML::script('assets/js/plugins/ckeditor/ckeditor.js') }}
<!-- Plupload -->
{{ HTML::style('assets/css/plugins/plupload/jquery.plupload.queue.css') }}  
<!-- PLUpload -->
{{ HTML::script('assets/js/plugins/plupload/plupload.full.js') }}
{{ HTML::script('assets/js/plugins/plupload/jquery.plupload.queue.js') }}
{{ HTML::script('assets/js/plugins/fileupload/bootstrap-fileupload.min.js') }}
<body>
<body>
	@include('menu')
	</div>
	<div class="container-fluid" id="content"> <!-- <div class="container-fluid nav-hidden" id="content"> -->
		@include('hrdstaff.left')
		<div id="main">
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>Tambah Pelatihan</h1>
					</div>
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="{{Url::asset('hrdstaff/')}}">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="{{Url::asset('hrdstaff/pelatihan')}}">Pelatihan</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="#">Tambah Pelatihan</a>
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
								{{ Form::open(array('route' => 'hrdstaff.pelatihan.store', 'class' => 'form-horizontal form-wysiwyg')) }}
								<div class="box-content nopadding" style="padding-top:15px">
									<br>
									<div class="control-group">
										<label for="tanggalmulai" class="control-label">Tanggal Mulai</label>
										<div class="controls">
											<input type="text" name="tanggalmulai" id="tanggalmulai" class="input-block-level datepick" required>
										</div>
									</div>
									<div class="control-group">
										<label for="tanggalselesai" class="control-label">Tanggal Selesai</label>
										<div class="controls">
											<input type="text" name="tanggalselesai" id="tanggalselesai" class="input-block-level datepick" required>
										</div>
									</div>
									<div class="control-group">
										<label for="biaya" class="control-label">Lokasi</label>
										<div class="controls">
											<input type="text" name="lokasi" id="lokasi" class="input-block-level" required>
										</div>
									</div>
									<div class="control-group">
										<label for="biaya" class="control-label">Biaya</label>
										<div class="controls">
											<input type="number" name="biaya" id="biaya" class="input-block-level" min="1" max="999999999999" required>
										</div>
									</div>									
									<div class="control-group">
										<label for="biaya" class="control-label">No. Rekening</label>
										<div class="controls">
											<input type="number" name="norekening" id="norekening" class="input-block-level" min="1" max="9999999999999" required>
										</div>
									</div>									
									<div class="control-group">
										<label for="atasnama" class="control-label">Atas Nama</label>
										<div class="controls">
											<input type="text" name="atasnama" id="atasnama" class="input-block-level" required>
										</div>
									</div>									
									<div class="control-group">
										<label for="biaya" class="control-label">Nama Bank</label>
										<div class="controls">
											<input type="text" name="namabank" id="namabank" class="input-block-level" required>
										</div>
									</div>
									<div class="control-group">
										<label for="biaya" class="control-label">DP</label>
										<div class="controls">
											<input type="number" name="dp" id="dp" class="input-block-level" min="1" max="999999999999">
										</div>
									</div>
									<div class="control-group">
										<label for="biaya" class="control-label">Pelunasan</label>
										<div class="controls">
											<input type="number" name="pelunasan" id="pelunasan" class="input-block-level" min="1" max="999999999999">
										</div>
									</div>
									<div class="control-group">
										<label for="kuota" class="control-label">Kuota</label>
										<div class="controls">
											<input type="number" name="kuota" id="kuota" class="input-block-level" min="1" max="9999" required>
										</div>
									</div>
									<div class="control-group">
										<label for="judul" class="control-label">Judul</label>
										<div class="controls">
											<input type="text" name="judul" id="judul" class="input-block-level" required>
										</div>
									</div>
								</div>
								<div class="box-title" style="margin-top:0px; padding-left:0px;">
									<h3>Uraian</h3>
								</div>
								<div class="box-content nopadding">
									<div class='form-wysiwyg'>
										 <textarea name="ck" class='ckeditor' rows="5"></textarea> 
										<div style="padding-top:10px; float:right;">
											<button type="submit" class="btn btn-large btn-brown">Save changes</button>
											<button type="button" class="btn btn-large">Cancel</button>
										</div>
									</div>
								</div>
								{{ Form::close() }}

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop
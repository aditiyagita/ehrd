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
	@include('menu')
	</div>
	<div class="container-fluid" id="content"> <!-- <div class="container-fluid nav-hidden" id="content"> -->
		@include('karyawan.left')
		<div id="main">
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>Create Pengunduran Diri</h1>
					</div>
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="{{Url::asset('/')}}">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="{{Url::asset('karyawan/pengunduran-diri/create')}}">Pengunduran Diri Create</a>
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
								{{ Form::open(array('route' => 'karyawan.pengunduran-diri.store', 'class' => 'form-horizontal form-wysiwyg')) }}
								<div class="box-content nopadding" style="padding-top:15px">
									<br>
									<div class="control-group">
                                            <label for="kepada" class="control-label">Kepada</label>
                                            <div class="controls">
                                                <input type="text" name="kepada" id="kepada" placeholder="Kepada" class="input-block-level" required>
                                            </div>
                                        </div>
									<div class="control-group">
											<label for="tanggalsurat" class="control-label">Tanggal Surat</label>
											<div class="controls">
												<input type="text" name="tanggalsurat" id="tanggalsurat" class="input-block-level datepick" required>
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
									<!-- <form action="#" method="POST" class='form-wysiwyg'> -->
										<!-- <textarea name="ck" class='ckeditor span12' rows="5"></textarea> -->
									<!-- </form>	 -->
								</div>
									{{ Form::close() }}

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop
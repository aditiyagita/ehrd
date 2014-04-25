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
<script type="text/javascript">
function checkSize(max_img_size)
{
    var input = document.getElementById("upload");
    // check for browser support (may need to be modified)
    if(input.files && input.files.length == 1)
    {           
        if (input.files[0].size > max_img_size) 
        {
            alert("The file must be less than " + (max_img_size/1024/1024) + "MB");
            return false;
        }
    }

    return true;
}
</script>
<body>
	@include('menu')
	</div>
	<div class="container-fluid" id="content"> <!-- <div class="container-fluid nav-hidden" id="content"> -->
		@include('hrdstaff.left')
		<div id="main">
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>Tambah Lowongan</h1>
					</div>
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="{{Url::asset('hrdstaff/')}}">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="{{Url::asset('hrdstaff/job-vacancy')}}">Lowongan</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="#">Tambah Lowongan</a>
						</li>
					</ul>
					<div class="close-bread">
						<a href="#"><i class="icon-remove"></i></a>
					</div>
				</div>
				@if($errors->any())
                    <div class="alert alert-error" style="margin-top:15px">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Error!</strong>
                        <ul>
                        	 @foreach ($errors->all() as $error)
						      <li>{{ $error }}</li>
						  @endforeach
                        </ul>
                    </div>
                @endif
				<div class="row-fluid">
					<div class="span12">
						<div class="box">
								<div class="box-title">
								</div>
								{{ Form::open(array('route' => 'hrdstaff.job-vacancy.store', 'files'=> 'true', 'onsubmit' => 'return checkSize(2097152)', 'class' => 'form-horizontal form-wysiwyg')) }}
								<div class="box-content nopadding" style="padding-top:15px">
									<br>
									<div class="control-group">
											<label for="tanggalakhir" class="control-label">Tanggal Akhir</label>
											<div class="controls">
												<input type="text" name="tanggalakhir" id="tanggalakhir" class="input-block-level datepick" required>
											</div>
										</div>
										<div class="control-group">
											<label for="department" class="control-label">Department</label>
											<div class="controls">
												<select name="department" id="department" class='input-block-level' required>
													<option SELECTED>-Pilih Department-</option>
						                            @foreach ($data['department'] as $department)
						                                <option value="{{ $department->iddepartment }}">{{ $department->department }}</option>
						                            @endforeach
												</select>
											</div>
										</div>
										<div class="control-group">
                                            <label for="posisi" class="control-label">Posisi</label>
                                            <div class="controls">
                                                <input type="text" name="posisi" id="posisi" placeholder="Posisi" class="input-block-level" required>
                                            </div>
                                        </div>
										<div class="control-group">
											<label for="department" class="control-label">Judul</label>
											<div class="controls">
												<input type="text" name="judul" id="judul" placeholder="Judul" class="input-block-level" required>
											</div>
										</div>
										<div class="control-group">
                                            <label for="no_passport" class="control-label">Foto</label>
                                            <div class="controls">
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"></div>
                                                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                    <div>
                                                        <span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                                                            <input type="file" name="imagefile" id="upload"	accept="image/png, image/jpeg">
                                                        </span>
                                                        <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                                    </div>
                                                </div>
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
											<button type="submit" class="btn btn-large btn-primary">Save changes</button>
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
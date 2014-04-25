@extends('master')

@section('content')
<!-- Datepicker -->
{{ HTML::style('assets/css/plugins/datepicker/datepicker.css') }}
<!-- Datepicker -->
{{ HTML::script('assets/js/plugins/datepicker/bootstrap-datepicker.js') }}
<!-- Plupload -->
{{ HTML::style('assets/css/plugins/plupload/jquery.plupload.queue.css') }}	
<!-- PLUpload -->
{{ HTML::script('assets/js/plugins/plupload/plupload.full.js') }}
{{ HTML::script('assets/js/plugins/plupload/jquery.plupload.queue.js') }}
{{ HTML::script('assets/js/plugins/fileupload/bootstrap-fileupload.min.js') }}
<script type="text/javascript">
	$('.carousel').carousel({
		interval: 3000
	});
	$("#warga_negara").change(function () {
	  alert($(this).attr('value'));
	});
</script>
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
		<div id="left">
		</div>
		<div id="main">
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>My Profile</h1>
					</div>
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="{{Url::asset('/')}}">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="#">My Profile</a>
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
								<h3>
								</h3>
							</div>
								{{ Form::model($data["user"], array('method' => 'PATCH','files'=> 'true', 'onsubmit' => 'return checkSize(2097152)', 'class' => 'form-vertical login-column', 'route' => array('resume.update', $data["user"]->iduser))) }}
            						{{ Form::hidden('id', $data['user']->iduser) }}
									<div class="box">
										<div class="box-content nopadding">
											<div class="span6"  >
												<div class="control-group">
													<label for="no_passport" class="control-label">Foto</label>
													<div class="controls">
														<div class="fileupload fileupload-new" data-provides="fileupload">
															<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"></div>
															<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
															<div>
																<span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
																	<input type="file" name="imagefile" accept="image/png, image/jpeg" id="upload">
																</span>
																<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
															</div>
														</div>
													</div>
												</div>
												<div class="control-group">
													<label for="nama_panggilan" class="control-label">Nama Panggilan</label>
													<div class="controls">
														<input type="text" name="nama_panggilan" id="nama_panggilan" placeholder="Nama Panggilan" value="{{ $data['user']->nama_panggilan }}" class="input-block-level" required>
													</div>
												</div>
												<div class="control-group">
													<label for="alamat" class="control-label">Alamat</label>
													<div class="controls">
														<textarea name="alamat" id="textarea" rows="5" class="input-block-level" required>{{ $data['user']->alamat }}</textarea>
													</div>
												</div>
												<div class="control-group">
													<label for="kode_pos" class="control-label">Kode Pos</label>
													<div class="controls">
														<input type="number" name="kode_pos" id="kode_pos" placeholder="Kode Pos"  value="{{ $data['user']->kode_pos }}" class="input-block-level" min="1" max="99999" required>
													</div>
												</div>
												<div class="control-group">
													<label for="kode_pos" class="control-label">Warga Negara</label>
													<div class="controls">
														<input type="text" name="warga_negara" id="warga_negara" placeholder="Warga Negara"  value="{{ $data['user']->warga_negara }}" class="input-block-level" readonly>
													</div>
												</div>
												@if($data['user']->warga_negara == "Indonesia")
												<div class="control-group">
													<label for="no_ktp" class="control-label">No. KTP</label>
													<div class="controls">
														<input type="number" name="no_ktp" id="no_ktp" placeholder="Nama Lengkap" value="{{ $data['user']->no_ktp }}" class="input-block-level" min="1" max="999999999999" required>
													</div>
												</div>
												@else
												<div class="control-group">
													<label for="no_passport" class="control-label">No. Passport</label>
													<div class="controls">
														<input type="number" name="no_passport" id="no_passport" placeholder="No. Passport" value="{{ $data['user']->no_passport }}" class="input-block-level" min="1" max="999999999999" required>
													</div>
												</div>
												@endif
												<div class="control-group">
													<label for="kacamata" class="control-label">Apakah Anda Memakai Kacamata?</label>
													<div class="controls">
														@if ($data['user']->kacamata == 1)
														<label class='radio'>
															<input type="radio" name="kacamata" value=1 CHECKED> Ya
														</label>
														<label class='radio'>
															<input type="radio" name="kacamata" value=2> Tidak
														</label>
														@else
														<label class='radio'>
															<input type="radio" name="kacamata" value=1> Ya
														</label>
														<label class='radio'>
															<input type="radio" name="kacamata" value=2 CHECKED> Tidak
														</label>
														@endif
													</div>
												</div>
											</div>
											<div class="span6" >
												<div class="control-group">
													<label for="nama_lengkap" class="control-label">Nama Lengkap</label>
													<div class="controls">
														<input type="text" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" value="{{ $data['user']->nama_lengkap }}" class="input-block-level" required>
													</div>
												</div>
												<div class="control-group">
													<label for="no_hp" class="control-label">No. Handphone</label>
													<div class="controls">
														<input type="number" name="no_hp" id="no_hp" placeholder="No Handphone" value="{{ $data['user']->no_hp }}" class="input-block-level" min="0" max="999999999999" required>
													</div>
												</div>
												<div class="control-group">
													<label for="tempat_lahir" class="control-label">Tempat Lahir</label>
													<div class="controls">
														<input type="text" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="{{ $data['user']->tempat_lahir }}" class="input-block-level" required><br>
													</div>
												</div>
												<div class="control-group">
		                                            <label for="tanggal_lahir" class="control-label">Tanggal Lahir</label>
		                                            <div class="controls">
		                                                <input type="text" name="tanggal_lahir" value="{{ date('m/d/Y', strtotime($data['user']->tanggal_lahir)) }}" id="tanggalakhir" class="input-block-level datepick" required>
		                                            </div>
		                                        </div>
												<div class="control-group">
													<label for="jenis_kelamin" class="control-label">Jenis Kelamin</label>
													<div class="controls">
														@if ($data['user']->jenis_kelamin == 1)
														<label class='radio'>
															<input type="radio" name="jenis_kelamin" value=1 CHECKED> Laki-Laki
														</label>
														<label class='radio'>
															<input type="radio" name="jenis_kelamin" value=2> Perempuan
														</label>
														@else
														<label class='radio'>
															<input type="radio" name="jenis_kelamin" value=1> Laki-Laki
														</label>
														<label class='radio'>
															<input type="radio" name="jenis_kelamin" value=2 CHECKED> Perempuan
														</label>
														@endif
													</div>
												</div>
												<div class="control-group">
													<label for="idagama" class="control-label">Agama</label>
													<div class="controls">
														<select name="agama" id="agama" class='input-block-level' required>
															<?php $i=1;?>
															@foreach ($data['agama'] as $agama)
								                                @if ( $data['user']->agama == $i)
								                                    <option value="{{ $i }}" SELECTED>{{ $agama }}</option>
								                                @else
								                                    <option value="{{ $i }}">{{ $agama }}</option>
								                                @endif
								                            <?php $i++ ?>
								                            @endforeach
														</select>
													</div>
												</div>
												<div class="control-group">
													<label for="status_kawin" class="control-label">Status Perkawinan</label>
													<div class="controls">
														<select name="status_kawin" id="status_kawin" class='input-block-level' required>
															<?php $i=1;?>
															@foreach($data['statuskawin'] as $statuskawin)
																@if($i == $data['user']->status_kawin)
																	<option value="{{$i}}" SELECTED>{{$statuskawin}}</option>
																@else
																	<option value="{{$i}}">{{$statuskawin}}</option>
																@endif
															<?php $i++ ?>
															@endforeach
														</select>
													</div>
												</div>	
												<div class="control-group">
													<label for="tinggibadan" class="control-label">Tinggi Badan</label>
													<div class="controls">
														<input type="number" name="tinggi_badan" id="tinggibadan" placeholder="Tinggi Badan"  value="{{ $data['user']->tinggi_badan }}" class="input-block-level" min="1" max="999" required>
													</div>
												</div>
												<div class="control-group">
													<label for="beratbadan" class="control-label">Berat Badan</label>
													<div class="controls">
														<input type="number" name="berat_badan" id="beratbadan" placeholder="Berat Badan"  value="{{ $data['user']->berat_badan }}" class="input-block-level" min="1" max="999" required>
													</div>
												</div>
												<div class="form-actions">
													<button type="submit" class="btn btn-brown btn-primary" id="i_submit">Update Profile</button>
													<button type="button" class="btn">Cancel</button>
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
	</div>

@stop
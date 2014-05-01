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
			var i = 0;
			var x = 0;
			$(document).ready(function(){
				$("input:radio[name=kewarganegaraan]").click(function(){ // bind a function to the change event
			        if( $(this).is(":checked") ){ // check if the radio is checked
			            var val = $(this).val(); // retrieve the value
			            //var i = 0;
			            if (val == 1){
			            	if(i>0){
					          $("#kontens").remove();
					          i--;
					        } else {
					          i = 0;
					        }
					        if(x == 0){
					        	x++;
					        	var addKtp = "<input type='number' name='noktp' placeholder='No. KTP' class='input-block-level' min='1' max='9999999999999'  required>";
					          	$("#addisi").append("<div id='konten'><div class='control-group'><label for='noktp' class='control-label'>No. KTP</label><div class='controls'>"+addKtp+"</div></div></div>");
					          
					        }
			            }else{
			            	if(i == 0){
			            	i++;	
			            	var addWarganegara = "<input type='text' name='warganegara' placeholder='Warga Negara' class='input-block-level' required>";
			            	var addPassport = "<input type='number' name='nopassport' placeholder='No. Passport' class='input-block-level' min='1' max='9999999999999' required>";
			            	var appWarganegara = "<div id='konten'><div class='control-group'><label for='appWarganegara	 ' class='control-label'>Warga Negara</label><div class='controls'>"+addWarganegara+"</div></div></div>";
			            	var appPassport = "<div id='konten'><div class='control-group'><label for='passport' class='control-label'>No. Passport</label><div class='controls'>"+addPassport+"</div></div></div>";
			            	$("#addisi").append("<div id='kontens'>"+appWarganegara+appPassport+"</div>");
			            	}
			            	if(x>0){
					          $("#konten").remove();
					          x--;
					        } else {
					          x = 0;
					        }
			            }
			        }
			    });
			});
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
						<h1>Karyawan</h1>
					</div>
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="{{Url::asset('hrdstaff/')}}">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="{{Url::asset('hrdstaff/karyawan')}}">Karyawan</a>
						</li>
					</ul>
					<div class="close-bread">
						<a href="#"><i class="icon-remove"></i></a>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<div class="box" style="padding-top:20px">
									{{ Form::open(array('route' => 'hrdstaff.karyawan.store', 'class' => 'form-horizontal')) }}
										<div class="box-content nopadding" >
											<div class="span6"  >
												<!-- <div class="control-group">
													<label for="no_passport" class="control-label">Foto</label>
													<div class="controls">
														<div class="fileupload fileupload-new" data-provides="fileupload">
															<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"></div>
															<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
															<div>
																<span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
																	<input type="file" name="imagefile">
																</span>
																<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
															</div>
														</div>
													</div>
												</div> -->
												<div class="control-group">
													<label for="username" class="control-label">Username</label>
													<div class="controls">
														<input type="text" name="username" id="username" placeholder="Username" class="input-block-level" required>
													</div>
												</div>
												<div class="control-group">
													<label for="password" class="control-label">Password</label>
													<div class="controls">
														<input type="text" name="password" id="password" placeholder="Password" class="input-block-level" required>
													</div>
												</div>
												<div class="control-group">
													<label for="email" class="control-label">Email</label>
													<div class="controls">
														<input type="email" name="email" id="email" placeholder="Email" class="input-block-level" required>
													</div>
												</div>
												<div class="control-group">
													<label for="namabank" class="control-label">Nama Bank</label>
													<div class="controls">
														<input type="text" name="namabank" id="namabank" placeholder="Nama Bank" class="input-block-level" required>
													</div>
												</div>
												<div class="control-group">
													<label for="norekening" class="control-label">No. rekening</label>
													<div class="controls">
														<input type="number" name="norekening" id="norekening" placeholder="No. Rekening" class="input-block-level"  min="1" max="9999999999999" required>
													</div>
												</div>
												<div class="control-group">
													<label for="alamat" class="control-label">Alamat</label>
													<div class="controls">
														<textarea name="alamat" id="textarea" rows="5" class="input-block-level" required></textarea>
													</div>
												</div>
												<div class="control-group">
													<label for="kode_pos" class="control-label">Kode Pos</label>
													<div class="controls">
														<input type="number" name="kode_pos" id="kode_pos" placeholder="Kode Pos"  class="input-block-level" min="1" max="99999" required>
													</div>
												</div>
												<div class="control-group">
													<label for="kewarganegaraan" class="control-label">Kewarganegaraan</label>
													<div class="controls">
														<label class='radio'>
															<input type="radio" id="kewarganegaraan" name="kewarganegaraan" value=1 required> Warga Negara Indonesia
														</label>
														<label class='radio'>
															<input type="radio" id="kewarganegaraan" name="kewarganegaraan" value=2> Warga Negara Asing
														</label>
													</div>
												</div>
												<div id="addisi"></div>
												<div class="control-group">
													<label for="idagama" class="control-label">Agama</label>
													<div class="controls">
														<select name="agama" id="agama" class='input-block-level' required>
															<option value="" SELECTED>-Pilih Agama-</option>
															<?php $i=1;?>
															@foreach ($data['agama'] as $agama)
																<option value="{{ $i }}">{{ $agama }}</option>
								                            <?php $i++ ?>
								                            @endforeach
														</select>
													</div>
												</div>
												<div class="control-group">
													<label for="status_kawin" class="control-label">Status Perkawinan</label>
													<div class="controls">
														<select name="status_kawin" id="status_kawin" class='input-block-level' required>
															<option value="" SELECTED>-Pilih Status Perkawinan-</option>
															<?php $i=1;?>
															@foreach($data['statuskawin'] as $statuskawin)
																<option value="{{$i}}">{{$statuskawin}}</option>
															<?php $i++ ?>
															@endforeach
														</select>
													</div>
												</div>
												<div class="control-group">
													<label for="kacamata" class="control-label">Memakai Kacamata?</label>
													<div class="controls">
														<select name="kacamata" id="kacamata" class='input-block-level' required>
															<option value="" SELECTED>-Pilih Kacamata-</option>
															<option value="1" >Ya</option>
															<option value="2" >Tidak</option>
														</select>
													</div>
												</div>	
											</div>
											<div class="span6" >
												<?php
												if($data['nokaryawan'] < 100){
													$isi = "0".$data['nokaryawan'];
												}else{
													$isi = $data['nokaryawan'];
												}
												?>
												<div class="control-group">
													<label for="nokaryawan" class="control-label">No. Karyawan</label>
													<div class="controls">
														<input type="text" name="nokaryawan" id="nokaryawan" value="{{ $isi }}" class="input-block-level" readonly>
													</div>
												</div>
												<div class="control-group">
													<label for="department" class="control-label">Department</label>
													<div class="controls">
														<select name="department" id="department" class='input-block-level' required>
															<option value="" SELECTED>-Pilih Department-</option>
															<?php $i=1;?>
															@foreach ($data['department'] as $department)
																<option value="{{ $department->iddepartment }}">{{ $department->department }}</option>
								                            <?php $i++ ?>
								                            @endforeach
														</select>
													</div>
												</div>
												<div class="control-group">
													<label for="gaji" class="control-label">Gaji</label>
													<div class="controls">
														<input type="number" name="gaji" id="gaji" placeholder="Gaji" class="input-block-level" min="1" max="9999999999999" required>
													</div>
												</div>
												<div class="control-group">
													<label for="tunjanganjabatan" class="control-label">Tunjangan Jabatan</label>
													<div class="controls">
														<input type="number" name="tunjanganjabatan" id="no_passport" placeholder="Tunjangan Jabatan" min="0" max="999999999" class="input-block-level" required>
													</div>
												</div>
												<div class="control-group">
                                                    <label for="tunjanganjabatan" class="control-label">Tunjangan Harian</label>
                                                    <div class="controls">
                                                        <input type="number" name="tunjanganharian" id="tunjanganharian" placeholder="Tunjangan Harian" min="0" max="999999" class="input-block-level" required>
                                                    </div>
                                                </div>
												<div class="control-group">
													<label for="nama_lengkap" class="control-label">Nama Lengkap</label>
													<div class="controls">
														<input type="text" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap"class="input-block-level" required>
													</div>
												</div>
												<div class="control-group">
													<label for="nama_panggilan" class="control-label">Nama Panggilan</label>
													<div class="controls">
														<input type="text" name="nama_panggilan" id="nama_panggilan" placeholder="Nama Panggilan" class="input-block-level" required>
													</div>
												</div>
												<div class="control-group">
													<label for="no_hp" class="control-label">No. Handphone</label>
													<div class="controls">
														<input type="number" name="no_hp" id="no_hp" placeholder="No Handphone" class="input-block-level" required>
													</div>
												</div>
												<div class="control-group">
													<label for="no_telp" class="control-label">No. Telpon</label>
													<div class="controls">
														<input type="number" name="no_telp" id="no_telp" placeholder="No Telpon" class="input-block-level" required>
													</div>
												</div>
												<div class="control-group">
													<label for="tempat_lahir" class="control-label">Tempat Lahir</label>
													<div class="controls">
														<input type="text" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" class="input-block-level" required><br>
													</div>
												</div>
												<div class="control-group">
		                                            <label for="tanggal_lahir" class="control-label">Tanggal Lahir</label>
		                                            <div class="controls">
		                                                <input type="text" name="tanggal_lahir" id="tanggalakhir" class="input-block-level datepick" required>
		                                            </div>
		                                        </div>
												<div class="control-group">
													<label for="jenis_kelamin" class="control-label">Jenis Kelamin</label>
													<div class="controls">
														<label class='radio'>
															<input type="radio" name="jenis_kelamin" value=1 required> Laki-Laki
														</label>
														<label class='radio'>
															<input type="radio" name="jenis_kelamin" value=2> Perempuan
														</label>
													</div>
												</div>
												<div class="control-group">
													<label for="tinggibadan" class="control-label">Tinggi Badan</label>
													<div class="controls">
														<input type="number" name="tinggi_badan" id="tinggibadan" placeholder="Tinggi Badan"  class="input-block-level" min="1" max="9999" required>
													</div>
												</div>
												<div class="control-group">
													<label for="beratbadan" class="control-label">Berat Badan</label>
													<div class="controls">
														<input type="number" name="berat_badan" id="beratbadan" placeholder="Berat Badan"  class="input-block-level" min="1" max="9999" required>
													</div>
												</div>
												<div class="form-actions">
													<button type="submit" class="btn btn-brown btn-primary">Add Karyawan</button>
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
@stop
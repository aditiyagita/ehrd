@extends('master')

@section('content')
<!-- Datepicker -->
{{ HTML::style('assets/css/plugins/datepicker/datepicker.css') }}
<!-- Datepicker -->
{{ HTML::script('assets/js/plugins/datepicker/bootstrap-datepicker.js') }}
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
					        	var addKtp = "<input type='number' name='noktp' placeholder='No. KTP' class='input-block-level' required>";
					          	$("#addisi").append("<div id='konten'><div class='control-group'><label for='noktp' class='control-label'>No. KTP</label><div class='controls'>"+addKtp+"</div></div></div>");
					          
					        }
			            }else{
			            	if(i == 0){
			            	i++;	
			            	var addWarganegara = "<input type='text' name='warganegara' placeholder='Warga Negara' class='input-block-level' required>";
			            	var addPassport = "<input type='number' name='nopassport' placeholder='No. Passport' class='input-block-level' required>";
			            	var appWarganegara = "<div id='konten'><div class='control-group'><label for='warganegara' class='control-label'>Warga Negara</label><div class='controls'>"+addWarganegara+"</div></div></div>";
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
		<body data-layout="fixed">
		@include('menu')
		<div class="container-fluid nav-hidden" id="content">
			<div id="main">
				<div class="container-fluid">
					<div class="page-header">
						@include('pelamar.pageheader')
					</div>
					<div class="breadcrumbs">
						<ul>
							<li>
								<a href="{{ url::asset('/') }}">Home</a>
								<i class="icon-angle-right"></i>
							</li>
							<li>
								<a href="{{ url::asset('register') }}">Register</a>
							</li>
						</ul>
						<div class="close-bread">
							<a href="#"><i class="icon-remove"></i></a>
						</div>
					</div>
					@if($cek = Session::get('success'))
						<div class="alert alert-success" style="margin-top:15px">
	                        <button type="button" class="close" data-dismiss="alert">×</button>
	                        <strong>Berhasil!</strong>
	                        {{ Session::get('success') }}
	                    </div>
					@endif
					<div class="row-fluid">
						<div class="span9">
							{{ Form::open(array('url' => 'do-register', 'class' => 'form-vertical form-column', 'id' => '')) }}
							<div class="box">
							<div class="box-title">
								<h3><i class="icon-list"></i> Register</h3>
							</div>
							<div class="box-content nopadding">
								<div class="span6"  style="padding-top:15px;">
									<div class="control-group">
										<label for="username" class="control-label">Username</label>
										<div class="controls">
											<input type="text" name="username" id="username" placeholder="Username" class="input-block-level" required>
										</div>
									</div>
									<div class="control-group">
										<label for="password" class="control-label">Password</label>
										<div class="controls">
											<input type="password" name="password" id="password" placeholder="Password" class="input-block-level" required>
										</div>
									</div>
								</div>
								<div class="span6" style="padding-top:15px;">
									<div class="control-group">
										<label for="email" class="control-label">Email</label>
										<div class="controls">
											<input type="text" name="email" id="email" placeholder="Email" class="input-block-level" required>
										</div>
									</div>
								</div>
							</div>
							<div class="box-title" style="margin-top:0px;">
								<h3><i class="icon-list"></i> Personal Particulars</h3>
							</div>
							<div class="box-content nopadding">
									<div class="span6" style="padding-top:15px;">
										<div class="control-group">
											<label for="namapanggil" class="control-label">Nama Panggilan</label>
											<div class="controls">
												<input type="text" name="nama_panggilan" id="namapanggil" placeholder="Nama Panggilan" class="input-block-level" required>
											</div>
										</div>
										<div class="control-group">
											<label for="notelp" class="control-label">No. Telp</label>
											<div class="controls">
												<input type="number" name="no_telp" id="notelp" placeholder="No Telpon" class="input-block-level" min="1" max="999999999999"required>
											</div>
										</div>
										<div class="control-group">
											<label for="alamat" class="control-label">Alamat</label>
											<div class="controls">
												<textarea name="alamat" id="textarea" rows="5" class="input-block-level" required></textarea>
											</div>
										</div>
										<div class="control-group">
											<label for="kodepos" class="control-label">Kode Pos</label>
											<div class="controls">
												<input type="number" name="kode_pos" id="kodepos" placeholder="Kode Pos" class="input-block-level" min="1" max="999999999999" required>
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
											<label for="agama" class="control-label">Agama</label>
											<div class="controls">
												<select name="agama" id="agama" class='input-block-level' required>
													<option selected>- Pilih Agama -</option>
													<?php $i=1; ?>
													@foreach($data['agama'] as $agama)
													<option value="{{$i}}">{{$agama}}</option>
													<?php $i++; ?>
													@endforeach
												</select>
											</div>
										</div>
									</div>
									<div class="span6" style="padding-top:15px;">
										<div class="control-group">
											<label for="namalengkap" class="control-label">Nama Lengkap</label>
											<div class="controls">
												<input type="text" name="nama_lengkap" id="namalengkap" placeholder="Nama Lengkap" class="input-block-level" required>
											</div>
										</div>
										<div class="control-group">
											<label for="nohp" class="control-label">No. Handphone</label>
											<div class="controls">
												<input type="number" name="no_hp" id="nohp" placeholder="No. Handphone" class="input-block-level" min="1" max="999999999999" required>
											</div>
										</div>
										<div class="control-group">
											<label for="tempatlahir" class="control-label">Tempat Lahir</label>
											<div class="controls">
												<input type="text" name="tempat_lahir" id="tempatlahir" placeholder="Tempat Lahir" class="input-block-level" required><br>
											</div>
										</div>
										<div class="control-group">
											<label for="tanggallahir" class="control-label">Tanggal Lahir</label>
											<div class="controls">
												<input type="text" name="tanggal_lahir" id="tanggallahir" class="input-block-level datepick" required>
											</div>
										</div>
										<div class="control-group">
											<label for="jeniskelamin" class="control-label">Jenis Kelamin</label>
											<div class="controls">
												<label class='radio'>
													<input type="radio" name="jenis_kelamin" value=1 required> Pria
												</label>
												<label class='radio'>
													<input type="radio" name="jenis_kelamin" value=2> Wanita
												</label>
											</div>
										</div>
										<div class="control-group">
											<label for="statuskawin" class="control-label">Status Perkawinan</label>
											<div class="controls">
												<select name="status_kawin" id="statuskawin" class='input-block-level' required>
													<option selected>- Pilih Status -</option>
													<?php $i=1; ?>
													@foreach($data['statuskawin'] as $stat)
													<option value="{{$i}}">{{$stat}}</option>
													<?php $i++; ?>
													@endforeach
												</select>
											</div>
										</div>
										<div class="control-group">
											<label for="kacamata" class="control-label">Apakah Anda Memakai Kacamata?</label>
											<div class="controls">
												<label class='radio'>
													<input type="radio" name="kacamata" value=1 checked> Ya
												</label>
												<label class='radio'>
													<input type="radio" name="kacamata" value=2> Tidak
												</label>
											</div>
										</div>
									</div>
									<div class="span12">
										<div class="form-actions"> 
											<button type="submit" class="btn btn-brown btn-large">Save changes</button>
											<button type="button" class="btn btn-large">Cancel</button>
										</div>
									</div>
								{{ Form::close() }}
							</div>
						</div>
						</div>
						<div class="span3">
							@include('pelamar.widget')
						</div>
					</div>
			</div>
		</div>
			
		</body>

@stop
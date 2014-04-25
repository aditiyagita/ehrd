@extends('master')

@section('content')
		<script type="text/javascript">
			$('.carousel').carousel({
			  interval: 3000
			})
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
								<a href="more-login.html">Home</a>
								<i class="icon-angle-right"></i>
							</li>
							<li>
								<a href="more-files.html">Pages</a>
								<i class="icon-angle-right"></i>
							</li>
							<li>
								<a href="more-blank.html">Blank page</a>
							</li>
						</ul>
						<div class="close-bread">
							<a href="#"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="row-fluid">
						<div class="span9">
							<div class="box">
								<div class="box-title">
									<h3><i class="icon-list"></i> User Profile</h3>
								</div>
							</div>
							<div class="row-fluid" style="margin-top:10px">
								<div class="span3">
									<img src="assets/img/demo/user-1.jpg" width="100%" style="margin-bottom:5px"/>
									<button class="btn-block btn btn-large">Change Image</button>
									<button class="btn-block btn btn-large">Edit Profile</button>
								</div>
								<div class="span9">
									{{ Form::model($data["user"], array('method' => 'PATCH', 'class' => 'form-vertical login-column', 'route' => array('resume.update', $data["user"]->iduser))) }}
            						{{ Form::hidden('id', $data['user']->iduser) }}
									<div class="box">
										<div class="box-content nopadding">
											<div class="span6"  >
												<div class="control-group">
													<label for="namapanggilan" class="control-label">Nama Panggilan</label>
													<div class="controls">
														<input type="text" name="namapanggilan" id="namapanggilan" placeholder="Nama Panggilan" value="{{ $data['user']->nama_panggilan }}" class="input-block-level">
													</div>
												</div>
												<div class="control-group">
													<label for="alamat" class="control-label">Alamat</label>
													<div class="controls">
														<textarea name="alamat" id="textarea" rows="5" class="input-block-level">{{ $data['user']->alamat }}</textarea>
													</div>
												</div>
												<div class="control-group">
													<label for="kodepos" class="control-label">Kode Pos</label>
													<div class="controls">
														<input type="text" name="kodepos" id="kodepos" placeholder="Kode Pos"  value="{{ $data['user']->kode_pos }}" class="input-block-level">
													</div>
												</div>
												<div class="control-group">
													<label for="warganegara" class="control-label">Warga Negara</label>
													<div class="controls">
														<input type="text" name="warganegara" id="warganegara" placeholder="Warga Negara"  value="{{ $data['user']->warga_negara }}" class="input-block-level">
													</div>
												</div>
												<div class="control-group">
													<label for="nopassport" class="control-label">No. Passport</label>
													<div class="controls">
														<input type="text" name="nopassport" id="nopassport" placeholder="No. Passport" value="{{ $data['user']->no_passport }}" class="input-block-level">
													</div>
												</div>
												<div class="control-group">
													<label for="nama" class="control-label">Agama</label>
													<div class="controls">
														<select name="select" id="select" class='input-block-level'>
															<option value="1">Option-1</option>
															<option value="2">Option-2</option>
															<option value="3">Option-3</option>
															<option value="4">Option-4</option>
															<option value="5">Option-5</option>
															<option value="6">Option-6</option>
															<option value="7">Option-7</option>
															<option value="8">Option-8</option>
															<option value="9">Option-9</option>
														</select>
													</div>
												</div>
												<div class="control-group">
													<label for="textarea" class="control-label">Apakah Anda Memakai Kacamata?</label>
													<div class="controls">
														<label class='radio'>
															<input type="radio" name="radio"> Ya
														</label>
														<label class='radio'>
															<input type="radio" name="radio"> Tidak
														</label>
													</div>
												</div>
											</div>
											<div class="span6" >
												<div class="control-group">
													<label for="nama" class="control-label">Nama Lengkap</label>
													<div class="controls">
														<input type="text" name="nama" id="nama" placeholder="Nama Lengkap" value="{{ $data['user']->nama_lengkap }}" class="input-block-level">
													</div>
												</div>
												<div class="control-group">
													<label for="hp" class="control-label">No. Handphone</label>
													<div class="controls">
														<input type="text" name="hp" id="hp" placeholder="No Handphone" value="{{ $data['user']->no_hp }}" class="input-block-level">
													</div>
												</div>
												<div class="control-group">
													<label for="tampatlahir" class="control-label">Tempat Lahir</label>
													<div class="controls">
														<input type="text" name="tampatlahir" id="tampatlahir" placeholder="Tempat Lahir" value="{{ $data['user']->tempat_lahir }}" class="input-block-level"><br>
													</div>
												</div>
												<div class="control-group">
													<label class="control-label">Tanggal Lahir</label>
													<div class="controls">
														<select name="select" id="select" class='span4'>
															<option value="1">Option-1</option>
															<option value="2">Option-2</option>
															<option value="3">Option-3</option>
															<option value="4">Option-4</option>
															<option value="5">Option-5</option>
															<option value="6">Option-6</option>
															<option value="7">Option-7</option>
															<option value="8">Option-8</option>
															<option value="9">Option-9</option>
														</select>
														<select name="select" id="select" class='span4'>
															<option value="1">Option-1</option>
															<option value="2">Option-2</option>
															<option value="3">Option-3</option>
															<option value="4">Option-4</option>
															<option value="5">Option-5</option>
															<option value="6">Option-6</option>
															<option value="7">Option-7</option>
															<option value="8">Option-8</option>
															<option value="9">Option-9</option>
														</select>
														<select name="select" id="select" class='span4'>
															<option value="1">Option-1</option>
															<option value="2">Option-2</option>
															<option value="3">Option-3</option>
															<option value="4">Option-4</option>
															<option value="5">Option-5</option>
															<option value="6">Option-6</option>
															<option value="7">Option-7</option>
															<option value="8">Option-8</option>
															<option value="9">Option-9</option>
														</select>
													</div>
												</div>
												<div class="control-group">
													<label for="textarea" class="control-label">Jenis Kelamin</label>
													<div class="controls">
														<label class='radio'>
															<input type="radio" name="radio"> Lorem
														</label>
														<label class='radio'>
															<input type="radio" name="radio"> Ipsum
														</label>
													</div>
												</div>
												<div class="control-group">
													<label for="noktp" class="control-label">No. KTP</label>
													<div class="controls">
														<input type="text" name="noktp" id="noktp" placeholder="Nama Lengkap" value="{{ $data['user']->no_ktp }}" class="input-block-level">
													</div>
												</div>
												<div class="control-group">
													<label for="nama" class="control-label">Status Perkawinan</label>
													<div class="controls">
														<select name="select" id="select" class='input-block-level'>
															<option value="1">Option-1</option>
															<option value="2">Option-2</option>
															<option value="3">Option-3</option>
															<option value="4">Option-4</option>
															<option value="5">Option-5</option>
															<option value="6">Option-6</option>
															<option value="7">Option-7</option>
															<option value="8">Option-8</option>
															<option value="9">Option-9</option>
														</select>
													</div>
												</div>	
												<div class="form-actions">
													<button type="submit" class="btn btn-brown btn-primary">Update Profile</button>
													<button type="button" class="btn">Cancel</button>
												</div>										
											</div>
										</div>
									{{ Form::close() }}
									</div>
								</div>
							</div>
							<div class="row-fluid">
								<div class="span12">
									<div class="box">
										<div class="box">
											<div class="box-title">
												</div>
										</div>
										<div class="box-content nopadding">
											<ul class="tabs tabs-inline tabs-top">
												<li class='active'>
													<a href="#educations" data-toggle='tab'><i class="icon-lock"></i> Educations</a>
												</li>
												<li>
													<a href="#skills" data-toggle='tab'><i class="icon-lock"></i> Skills, Course & Training</a>
												</li>
												<li>
													<a href="#security" data-toggle='tab'><i class="icon-lock"></i> Work Experience</a>
												</li>
												<li>
													<a href="#security" data-toggle='tab'><i class="icon-lock"></i> Family Records</a>
												</li>
												<li>
													<a href="#security" data-toggle='tab'><i class="icon-lock"></i> Additional</a>
												</li>
											</ul>
											<div class="tab-content padding tab-content-inline tab-content-bottom">
												<div class="tab-pane active" id="educations">
												sd
												</div>
												<div class="tab-pane" id="skills">
													asd
												</div>
												<div class="tab-pane" id="security">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque ipsum ab odio accusamus similique dicta ipsam dolor magni nemo? Laudantium numquam consectetur maiores quaerat totam cupiditate error repellendus eos quibusdam dolore ipsum sequi illo blanditiis voluptatibus veniam dicta alias tempore consequuntur reprehenderit dignissimos iste sit perferendis possimus quisquam id voluptatum explicabo ut ad accusamus neque. Commodi ipsam quia aperiam nisi id unde sapiente magnam reiciendis voluptate placeat in optio consequuntur culpa magni repudiandae veniam aut. Magni sed asperiores omnis error nemo cum minima illum rerum assumenda ipsa excepturi odit laborum doloremque iure temporibus consectetur in culpa libero iusto repellendus. Culpa perspiciatis nesciunt explicabo officiis beatae ipsam qui odio architecto asperiores ad amet aspernatur veniam ex voluptates cumque expedita reiciendis nobis incidunt harum praesentium a totam ut cum corrupti quia rem provident delectus fuga deserunt itaque aut fugiat veritatis necessitatibus inventore nisi enim aliquid quibusdam! Nihil ratione laboriosam accusamus. Iure sapiente iste odit voluptas sit reiciendis. Cum voluptatibus quia cupiditate cumque eveniet mollitia unde adipisci vel itaque ipsa est iste ducimus sed consequuntur ratione eaque voluptates et odit quod nemo quis aut repudiandae ipsum nostrum deserunt! Excepturi cum eos ut labore debitis facilis ipsum! Fugit eos dicta amet neque qui deserunt!
												</div>
											</div>
										</div>
									</div>
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
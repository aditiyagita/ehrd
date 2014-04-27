{{ HTML::script('assets/js/bootstrap.min.js') }}
<div id="navigation">
			<div class="container-fluid">
				<a href="#" id="brand"><i>JC&K</i></a>
				@if(Auth::check())
					@if((Auth::user()->idjabatan < '7'))

					@else
						<ul class='main-nav'>
							<?php $i = 0; ?>
		    				@foreach ($data['menu'] as $mn)
				                <li class="{{ $data['tanda'][$i] }}">
		   	 						<a href="{{ URL::asset($mn['link']) }}"><span>{{ $mn['menu'] }}</span></a>
		   	 					</li>
				            <?php $i++; ?>
		    				@endforeach
						</ul>
					@endif
				@else
					<ul class='main-nav'>
						<?php $i = 0; ?>
	    				@foreach ($data['menu'] as $mn)
			                <li class="{{ $data['tanda'][$i] }}">
	   	 						<a href="{{ URL::asset($mn['link']) }}"><span>{{ $mn['menu'] }}</span></a>
	   	 					</li>
			            <?php $i++; ?>
	    				@endforeach
					</ul>
				@endif
				
				<div class="user">
				@if(Auth::check())

<!-- ---------------------------------------------------------------------
--------------------------------------------------------------------------
----------------------  PELAMAR  ------------------------------------- -->

					@if(Auth::user()->idjabatan == 7)
						<?php
							$iduser = Auth::user()->iduser;
							$lamaran = new Lamaran();
							$coba = $lamaran->getListLamaran($iduser);
							$terima = $lamaran->getListTerima($iduser);
						?>
						<ul class="icon-nav">
							<li class='dropdown'>
								<a href="#" class='dropdown-toggle' data-toggle="dropdown"><i class="icon-briefcase"></i>
									@if($terima <> 0)
										<span class="label label-lightred">{{ $terima }}</span>
									@endif
								</a>
								<ul class="dropdown-menu pull-right message-ul">
									@if(count($coba) == 0)
									<li>
										<a href="#">
											<img src="{{ URL::asset('assets/img/demo/user-1.jpg') }}" alt="">
											<div class="details">
												<div class="name">Belum Melamar</div>
												<div class="message">
													Maaf, Anda belum melamar kerja
												</div>
											</div>
										</a>
									</li>
									@else
									@foreach($coba as $cb)
									<li>
										<a href="{{URL::asset('job-vacancy/'.$cb->lowongan->idlowongan)}}">
											<img src="{{ URL::asset('assets/img/demo/user-1.jpg') }}" alt="">
											<div class="details">
												<div class="name">{{ $cb->lowongan->judul }}</div>
												<div class="message">
													{{ substr(str_replace(array('<h1>','</h1>','<h2>','</h2>','</br>','<ol>','</ol>','<li>','</li>', '<p>','</p>', '<br />'), ' ', $cb->lowongan->uraian), 0, 15	) }}
												</div>
											</div>
										</a>
									</li>
									@endforeach
									@endif
									<li>
										<a href="{{URL::asset('application')}}" class='more-messages'>Lihat My Application <i class="icon-arrow-right"></i></a>
									</li>
								</ul>
							</li>
						</ul>
						<div class="dropdown">
							<a href="#" class='dropdown-toggle' data-toggle="dropdown">{{ Auth::user()->nama_panggilan }} 
								@if((Auth::user()->foto) == '')
								<img src="{{ URL::asset('assets/images/user/default.jpg') }}" width="27px" />
								@else
								<img src="{{ URL::asset('assets/images/user/'.Auth::user()->foto) }}" width="27px"/>
								@endif
							<ul class="dropdown-menu pull-right">
								<li>
									<a href="{{Url::asset('resume')}}">My Resume</a>
								</li>
								<li>
									<a href="{{URL::asset('application')}}">My Application</a>
								</li>
								@if(Auth::check())
									<li>
										<a href="{{ URL::asset('logout') }}">Logout</a>
									</li>
								@endif
							</ul>
						</div>

<!-- ---------------------------------------------------------------------
--------------------------------------------------------------------------
----------------------HRD STAFF------------------------------------- -->

					@elseif(Auth::user()->idjabatan == 1)
						<?php
							$notif = new Notifikasi();
							$notifikasi = $notif->getNotifikasi();
							$total = count($notifikasi);
						?>
						<script type="text/javascript">
							 $(document).ready(function() { 
						        $('.notif').click(function(){
						            var url = "{{ URL::asset('updatenotification') }}"; 
						            $.ajax({
									  type: "GET",
									  url: url
									});
									$('.ceks').fadeOut("slow");
						        });
						    });
						</script>
						<ul class="icon-nav">
							<li class='dropdown notif'>
								<a href="#" class='dropdown-toggle' data-toggle="dropdown"><i class="icon-globe"></i>

									@if($total <> 0)
										<span class="label label-lightred ceks">{{ $total }}</span>
									@endif
								</a>
								<ul class="dropdown-menu pull-right message-ul">
									@if($total == 0)
									<li>
										<a href="#">
											<img src="{{ URL::asset('assets/img/demo/user-1.jpg') }}" alt="">
											<div class="details">
												<div class="name">Kosong</div>
												<div class="message">
													Tidak Ada Notifikasi
												</div>
											</div>
										</a>
									</li>
									@else
										@if(count($notifikasi) > 0)
										@foreach($notifikasi as $not)
										<li>
											@if($not->type <> 'Cuti')
											<a href="{{URL::asset('hrdstaff/pelatihan')}}">
											<img src="{{ URL::asset('assets/img/demo/user-1.jpg') }}" alt="">
												<div class="details">
													<div class="name">{{$not->type}}</div>
													<div class="message">
													{{ $not->uraian }}
													</div>
												</div>
											</a>
											@endif
										</li>
										@endforeach
										@endif
									@endif
								</ul>
							</li>
						</ul>
						
						<div class="dropdown">
							<a href="#" class='dropdown-toggle' data-toggle="dropdown">{{ Auth::user()->nama_panggilan }} 
								@if((Auth::user()->foto) == '')
								<img src="{{ URL::asset('assets/images/user/default.jpg') }}" width="27px" />
								@else
								<img src="{{ URL::asset('assets/images/user/'.Auth::user()->foto) }}" width="27px"/>
								@endif
							<ul class="dropdown-menu pull-right">
								<li>
									<a href="{{Url::asset('myprofile')}}">My Profile</a>
								</li>
								@if(Auth::check())
									<li>
										<a href="{{ URL::asset('logout') }}">Logout</a>
									</li>
								@endif
							</ul>
						</div>

<!-- ---------------------------------------------------------------------
--------------------------------------------------------------------------
----------------------HRD MANAGER------------------------------------- -->

					@elseif(Auth::user()->idjabatan == 2)
						<?php
							$iduser 			= Auth::user()->iduser;
							$pelatihan 			= new Pelatihan();
							$cuti 				= new Cuti();
							$pengundurandiri 	= new PengunduranDiri();
							$coba 				= $pelatihan->getNotif();
							$coba1 				= $cuti->getNotif();
							$coba2 				= $pengundurandiri->getNotif();
							$total 				= count($coba)+count($coba1)+count($coba2);
						?>
						<ul class="icon-nav">
							<li class='dropdown'>
								<a href="#" class='dropdown-toggle' data-toggle="dropdown"><i class="icon-globe"></i>

									@if($total <> 0)
										<span class="label label-lightred">{{ $total }}</span>
									@endif
								</a>
								<ul class="dropdown-menu pull-right message-ul">
									@if($total == 0)
									<li>
										<a href="#">
											<img src="{{ URL::asset('assets/img/demo/user-1.jpg') }}" alt="">
											<div class="details">
												<div class="name">Kosong</div>
												<div class="message">
													Tidak Ada Notifikasi
												</div>
											</div>
										</a>
									</li>
									@else
										@if(count($coba) > 0)
										<li>
											<a href="{{URL::asset('hrdmanager/pelatihan')}}">
												<img src="{{ URL::asset('assets/img/demo/user-1.jpg') }}" alt="">
												<div class="details">
													<div class="name">Pelatihan</div>
													<div class="message">
													{{ count($coba) }} Pelatihan Belum Disetujui
													</div>
												</div>
											</a>
										</li>
										@endif

										@if(count($coba1) > 0)
										<li>
											<a href="{{URL::asset('hrdmanager/cuti')}}">
												<img src="{{ URL::asset('assets/img/demo/user-1.jpg') }}" alt="">
												<div class="details">
													<div class="name">Cuti Karyawan</div>
													<div class="message">
														{{ count($coba1) }} Cuti Karyawan Belum Disetujui
													</div>
												</div>
											</a>
										</li>
										@endif

										@if(count($coba2) > 0)
										<li>
											<a href="{{URL::asset('hrdmanager/pengunduran-diri')}}">
												<img src="{{ URL::asset('assets/img/demo/user-1.jpg') }}" alt="">
												<div class="details">
													<div class="name">Pengunduran Diri</div>
													<div class="message">
														{{ count($coba2) }} Pengunduran Diri Belum Disetujui
													</div>
												</div>
											</a>
										</li>
										@endif
									@endif
								</ul>
							</li>
						</ul>
						
						<div class="dropdown">
							<a href="#" class='dropdown-toggle' data-toggle="dropdown">{{ Auth::user()->nama_panggilan }} 
								@if((Auth::user()->foto) == '')
								<img src="{{ URL::asset('assets/images/user/default.jpg') }}" width="27px" />
								@else
								<img src="{{ URL::asset('assets/images/user/'.Auth::user()->foto) }}" width="27px"/>
								@endif
							<ul class="dropdown-menu pull-right">
								<li>
									<a href="{{Url::asset('myprofile')}}">My Profile</a>
								</li>
								@if(Auth::check())
									<li>
										<a href="{{ URL::asset('logout') }}">Logout</a>
									</li>
								@endif
							</ul>
						</div>

<!-- ---------------------------------------------------------------------
--------------------------------------------------------------------------
----------------------  KEUANGAN  ------------------------------------- -->

					@elseif(Auth::user()->idjabatan == 5)
						<?php
							$iduser 			= Auth::user()->iduser;
							$pelatihan 			= new Pelatihan();
							$coba 				= $pelatihan->getNotif();
							$total 				= count($coba);
						?>
						<ul class="icon-nav">
							<li class='dropdown'>
								<a href="#" class='dropdown-toggle' data-toggle="dropdown"><i class="icon-globe"></i>

									@if($total <> 0)
										<span class="label label-lightred">{{ $total }}</span>
									@endif
								</a>
								<ul class="dropdown-menu pull-right message-ul">
									@if($total == 0)
									<li>
										<a href="#">
											<img src="{{ URL::asset('assets/img/demo/user-1.jpg') }}" alt="">
											<div class="details">
												<div class="name">Kosong</div>
												<div class="message">
													Tidak Ada Notifikasi
												</div>
											</div>
										</a>
									</li>
									@else
										@if(count($coba) > 0)
										<li>
											<a href="{{URL::asset('keuangan/pelatihan')}}">
												<img src="{{ URL::asset('assets/img/demo/user-1.jpg') }}" alt="">
												<div class="details">
													<div class="name">Pelatihan</div>
													<div class="message">
													{{ count($coba) }} Pelatihan Belum Dikonfirmasi
													</div>
												</div>
											</a>
										</li>
										@endif
									@endif
								</ul>
							</li>
						</ul>
						
						<div class="dropdown">
							<a href="#" class='dropdown-toggle' data-toggle="dropdown">{{ Auth::user()->nama_panggilan }} 
								@if((Auth::user()->foto) == '')
								<img src="{{ URL::asset('assets/images/user/default.jpg') }}" width="27px" />
								@else
								<img src="{{ URL::asset('assets/images/user/'.Auth::user()->foto) }}" width="27px"/>
								@endif
							<ul class="dropdown-menu pull-right">
								<li>
									<a href="{{Url::asset('myprofile')}}">My Profile</a>
								</li>
								@if(Auth::check())
									<li>
										<a href="{{ URL::asset('logout') }}">Logout</a>
									</li>
								@endif
							</ul>
						</div>

<!-- ---------------------------------------------------------------------
--------------------------------------------------------------------------
----------------------  KARYAWAN  ------------------------------------- -->

						@elseif(Auth::user()->idjabatan == 6)
						<?php
							$notif = new Notifikasi();
							$notifikasi = $notif->getNotifikasi();
							$total = count($notifikasi);
						?>
						<script type="text/javascript">
							 $(document).ready(function() { 
						        $('.notif').click(function(){
						            var url = "{{ URL::asset('updatenotification') }}"; 
						            $.ajax({
									  type: "GET",
									  url: url
									});
									$('.ceks').fadeOut("slow");
						        });
						    });
						</script>
						<ul class="icon-nav">
							<li class='dropdown notif'>
								<a href="#" class='dropdown-toggle' data-toggle="dropdown"><i class="icon-globe"></i>

									@if($total <> 0)
										<span class="label label-lightred ceks">{{ $total }}</span>
									@endif
								</a>
								<ul class="dropdown-menu pull-right message-ul">
									@if($total == 0)
									<li>
										<a href="#">
											<img src="{{ URL::asset('assets/img/demo/user-1.jpg') }}" alt="">
											<div class="details">
												<div class="name">Kosong</div>
												<div class="message">
													Tidak Ada Notifikasi
												</div>
											</div>
										</a>
									</li>
									@else
										@if(count($notifikasi) > 0)
										@foreach($notifikasi as $not)
										<li>
											@if($not->type == 'Cuti')
											<a href="{{URL::asset('karyawan/cuti')}}">
											@else
											<a href="{{URL::asset('karyawan/pelatihan')}}">
											@endif
											<img src="{{ URL::asset('assets/img/demo/user-1.jpg') }}" alt="">
												<div class="details">
													<div class="name">{{$not->type}}</div>
													<div class="message">
													{{ $not->uraian }}
													</div>
												</div>
											</a>
										</li>
										@endforeach
										@endif
									@endif
								</ul>
							</li>
						</ul>
						
						<div class="dropdown">
							<a href="#" class='dropdown-toggle' data-toggle="dropdown">{{ Auth::user()->nama_panggilan }} 
								@if((Auth::user()->foto) == '')
								<img src="{{ URL::asset('assets/images/user/default.jpg') }}" width="27px" />
								@else
								<img src="{{ URL::asset('assets/images/user/'.Auth::user()->foto) }}" width="27px"/>
								@endif
							<ul class="dropdown-menu pull-right">
								<li>
									<a href="{{Url::asset('myprofile')}}">My Profile</a>
								</li>
								@if(Auth::check())
									<li>
										<a href="{{ URL::asset('logout') }}">Logout</a>
									</li>
								@endif
							</ul>
						</div>
					@else
						
						<div class="dropdown">
							<a href="#" class='dropdown-toggle' data-toggle="dropdown">{{ Auth::user()->nama_panggilan }} 
								@if((Auth::user()->foto) == '')
								<img src="{{ URL::asset('assets/images/user/default.jpg') }}" width="27px" />
								@else
								<img src="{{ URL::asset('assets/images/user/'.Auth::user()->foto) }}" width="27px"/>
								@endif
							<ul class="dropdown-menu pull-right">
								<li>
									<a href="{{Url::asset('myprofile')}}">My Profile</a>
								</li>
								@if(Auth::check())
									<li>
										<a href="{{ URL::asset('logout') }}">Logout</a>
									</li>
								@endif
							</ul>
						</div>
						@endif
				@else
						<ul class="main-nav">
						<div class="dropdown">
							<a href="#" class='dropdown-toggle' data-toggle="dropdown">Sign In <img src="{{URL::asset('assets/img/demo/login.png')}}" alt=""></a>
							<div class="dropdown-menu pull-right" style="padding:17px;">
								{{ Form::open(array('url' => 'do', 'class' => 'form', 'id' => 'formLogin')) }}
					                <input name="uname" type="text" placeholder="Username"> 
					                <input name="upw" type="password" placeholder="Password"><br>
					                <button type="submit" id="btnLogin" class="btn btn-block">Login</button>
					                <br>
					                Don't have an account? <a href="{{ URL::asset('register') }}">Register</a>	
					            {{ Form::close() }}
							</div>
						</div>
						</ul>
				@endif
				</div>
			</div>
		</div>
		@if(Auth::check())

		@else
			@if($errors->any())
				<div class="alert alert-error">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Warning!</strong> {{$errors->first()}}
				</div>
			@endif
		@endif

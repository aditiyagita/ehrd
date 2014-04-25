<div id="navigation">
			<div class="container-fluid">
				<a href="#" id="brand">FLAT</a>
				<ul class='main-nav'>
					<?php $i = 0; ?>
    				@foreach ($data['menu'] as $mn)
		                <li class="{{ $data['tanda'][$i] }}">
   	 						<a href="{{ URL::asset($mn['link']) }}"><span>{{ $mn['menu'] }}</span></a>
   	 					</li>
		            <?php $i++; ?>
    				@endforeach
					@if(Session::has('user'))
						<li>
							<a href="{{ URL::asset('logout') }}">
								<img src="../img/email-login.jpg" alt="" style="display:block;">
							</a>
						</li>
					@endif
				</ul>
				@if(Session::has('user'))
					<div class="user">
						<ul class="icon-nav">
							<li class='dropdown'>
								<a href="#" class='dropdown-toggle' data-toggle="dropdown"><i class="briefcase"></i><span class="label label-lightred">4</span></a>
								<ul class="dropdown-menu pull-right message-ul">
									<li>
										<a href="#">
											<img src="backend/img/demo/user-1.jpg" alt="">
											<div class="details">
												<div class="name">Jane Doe</div>
												<div class="message">
													Lorem ipsum Commodo quis nisi ...
												</div>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<img src="backend/img/demo/user-2.jpg" alt="">
											<div class="details">
												<div class="name">John Doedoe</div>
												<div class="message">
													Ut ad laboris est anim ut ...
												</div>
											</div>
											<div class="count">
												<i class="icon-comment"></i>
												<span>3</span>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<img src="backend/img/demo/user-3.jpg" alt="">
											<div class="details">
												<div class="name">Bob Doe</div>
												<div class="message">
													Excepteur Duis magna dolor!
												</div>
											</div>
										</a>
									</li>
									<li>
										<a href="components-messages.html" class='more-messages'>Go to Message center <i class="icon-arrow-right"></i></a>
									</li>
								</ul>
							</li>

							<li class="dropdown sett">
								<a href="#" class='dropdown-toggle' data-toggle="dropdown"><i class="icon-cog"></i></a>
								<ul class="dropdown-menu pull-right theme-settings">
									<li>
										<span>Layout-width</span>
										<div class="version-toggle">
											<a href="#" class='set-fixed'>Fixed</a>
											<a href="#" class="active set-fluid">Fluid</a>
										</div>
									</li>
									<li>
										<span>Topbar</span>
										<div class="topbar-toggle">
											<a href="#" class='set-topbar-fixed'>Fixed</a>
											<a href="#" class="active set-topbar-default">Default</a>
										</div>
									</li>
									<li>
										<span>Sidebar</span>
										<div class="sidebar-toggle">
											<a href="#" class='set-sidebar-fixed'>Fixed</a>
											<a href="#" class="active set-sidebar-default">Default</a>
										</div>
									</li>
								</ul>
							</li>
							<li class='dropdown colo'>
								<a href="#" class='dropdown-toggle' data-toggle="dropdown"><i class="icon-tint"></i></a>
								<ul class="dropdown-menu pull-right theme-colors">
									<li class="subtitle">
										Predefined colors
									</li>
									<li>
										<span class='red'></span>
										<span class='orange'></span>
										<span class='green'></span>
										<span class="brown"></span>
										<span class="blue"></span>
										<span class='lime'></span>
										<span class="teal"></span>
										<span class="purple"></span>
										<span class="pink"></span>
										<span class="magenta"></span>
										<span class="grey"></span>
										<span class="darkblue"></span>
										<span class="lightred"></span>
										<span class="lightgrey"></span>
										<span class="satblue"></span>
										<span class="satgreen"></span>
									</li>
								</ul>
							</li>
							<li class='dropdown language-select'>
								<a href="#" class='dropdown-toggle' data-toggle="dropdown"><img src="img/demo/flags/us.gif" alt=""><span>US</span></a>
								<ul class="dropdown-menu pull-right">
									<li>
										<a href="#"><img src="backend/img/demo/flags/br.gif" alt=""><span>Brasil</span></a>
									</li>
									<li>
										<a href="#"><img src="backend/img/demo/flags/de.gif" alt=""><span>Deutschland</span></a>
									</li>
									<li>
										<a href="#"><img src="backend/img/demo/flags/es.gif" alt=""><span>España</span></a>
									</li>
									<li>
										<a href="#"><img src="backend/img/demo/flags/fr.gif" alt=""><span>France</span></a>
									</li>
								</ul>
							</li>
						</ul>
						<div class="dropdown">
							<a href="#" class='dropdown-toggle' data-toggle="dropdown">John Doe <img src="img/demo/user-avatar.jpg" alt=""></a>
							<ul class="dropdown-menu pull-right">
								<li>
									<a href="more-userprofile.html">Edit profile</a>
								</li>
								<li>
									<a href="#">Account settings</a>
								</li>
								<li>
									<a href="more-login.html">Sign out</a>
								</li>
							</ul>
						</div>
					</div>
				@endif
			</div>
		</div>
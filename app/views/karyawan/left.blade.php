<div id="left">
			<form action="search-results.html" method="GET" class='search-form'>
				<div class="search-pane">
					<input type="text" name="search" placeholder="Search here...">
					<button type="submit"><i class="icon-search"></i></button>
				</div>
			</form>
			<div class="subnav subnav-hidden">
				<div class="subnav-title">
					<a href="#" class='toggle-subnav'><span>Dashboard</span></a>
				</div>
				<ul class="subnav-menu">
					<li>
						<a href="#">{{ Auth::user()->idjabatan == '1' }}</a>
					</li>
				</ul>
			</div>
			<div class="subnav subnav-hidden">
				<div class="subnav-title">
					<a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>Pelatihan</span></a>
				</div>
				<ul class="subnav-menu">
					<li>
						<a href="{{ URL::asset('karyawan/pelatihan') }}">Daftar Pelatihan</a>
					</li>
				</ul>
				<ul class="subnav-menu">
					<li>
						<a href="{{ URL::asset('karyawan/list-pelatihan') }}">Pelatihan Diikuti</a>
					</li>
				</ul>
			</div>
			<div class="subnav subnav-hidden">
				<div class="subnav-title">
					<a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>Cuti</span></a>
				</div>
				<ul class="subnav-menu">
					<li>
						<a href="{{ URL::asset('karyawan/cuti/create') }}">Buat Cuti</a>
					</li>
				</ul>
				<ul class="subnav-menu">
					<li>
						<a href="{{ URL::asset('karyawan/cuti') }}">Lihat Daftar Cuti</a>
					</li>
				</ul>
			</div>
			<div class="subnav subnav-hidden">
				<?php 
					$userid = Auth::user()->iduser;
					$user = new User();
					$dtuser = $user->getDataUser($userid);

					{

					}
				?>
				<div class="subnav-title">
					<a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>Pengunduran Diri</span></a>
				</div>
				@if(count($dtuser->karyawan->pengundurandiri) > 0)
				<ul class="subnav-menu">
					<li>
						<a href="{{ URL::asset('karyawan/pengunduran-diri') }}">Batal Pengunduran Diri</a>
					</li>
				</ul>
				@else
				<ul class="subnav-menu">
					<li>
						<a href="{{ URL::asset('karyawan/pengunduran-diri/create') }}">Buat Pengunduran Diri</a>
					</li>
				</ul>
				@endif				
			</div>
		</div>
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
					<a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>Karyawan</span></a>
				</div>
				<ul class="subnav-menu">
					<li>
						<a href="{{ URL::asset('hrdstaff/karyawan') }}">Data Karyawan</a>
					</li>
				</ul>
			</div>
			<div class="subnav subnav-hidden">
				<div class="subnav-title">
					<a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>Lowongan</span></a>
				</div>
				<ul class="subnav-menu">
					<li>
						<a href="{{ URL::asset('hrdstaff/job-vacancy') }}">Manage Lowongan</a>
					</li>
				</ul>
			</div>
			<div class="subnav subnav-hidden">
				<div class="subnav-title">
					<a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>Lamaran</span></a>
				</div>
				<ul class="subnav-menu">
					<li>
						<a href="{{ URL::asset('hrdstaff/lamaran') }}">Approve Lamaran</a>
					</li>
				</ul>
			</div>
			<div class="subnav subnav-hidden">
				<div class="subnav-title">
					<a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>Absensi</span></a>
				</div>
				<ul class="subnav-menu">
					<li>
						<a href="{{ URL::asset('hrdstaff/absensi') }}">List Absensi</a>
					</li>
				</ul>
			</div>
			<div class="subnav subnav-hidden">
				<div class="subnav-title">
					<a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>Cuti</span></a>
				</div>
				<ul class="subnav-menu">
					<li>
						<a href="{{ URL::asset('hrdstaff/setting-cuti') }}">Setting Cuti</a>
					</li>
				</ul>
				<ul class="subnav-menu">
					<li>
						<a href="{{ URL::asset('hrdstaff/cuti') }}">Manage Cuti</a>
					</li>
				</ul>
			</div>
			<div class="subnav subnav-hidden">
				<div class="subnav-title">
					<a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>Pelatihan</span></a>
				</div>
				<ul class="subnav-menu">
					<li>
						<a href="{{ URL::asset('hrdstaff/pelatihan') }}">Manage Pelatihan</a>
					</li>
				</ul>
				<ul class="subnav-menu">
					<li>
						<a href="{{ URL::asset('hrdstaff/peserta-pelatihan') }}">Peserta Pelatihan</a>
					</li>
				</ul>
			</div>
			<div class="subnav subnav-hidden">
				<div class="subnav-title">
					<a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>Pengunduran Diri</span></a>
				</div>
				<ul class="subnav-menu subnav-hidden">
					<li>
						<a href="{{Url::asset('hrdstaff/pengunduran-diri')}}">Daftar Pengunduran Diri</a>
					</li>
				</ul>
			</div>
		</div>
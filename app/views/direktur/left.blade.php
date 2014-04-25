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
					<a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>Laporan</span></a>
				</div>
				<ul class="subnav-menu">
					<li>
						<a href="{{url::asset('direktur/cuti')}}">Cuti</a>
					</li>
				</ul>
				<ul class="subnav-menu">
					<li>
						<a href="{{url::asset('direktur/pelatihan')}}">Pelatihan</a>
					</li>
				</ul>
				<ul class="subnav-menu">
					<li>
						<a href="{{url::asset('direktur/penggajian')}}">Penggajian</a>
					</li>
				</ul>
				<ul class="subnav-menu">
					<li>
						<a href="{{url::asset('direktur/absensi')}}">Absensi</a>
					</li>
				</ul>
				<ul class="subnav-menu">
					<li>
						<a href="{{url::asset('direktur/pengunduran-diri')}}">Pengunduran Diri</a>
					</li>
				</ul>
			</div>
		</div>
<div id="left">
			<div class="subnav subnav-hidden">
				<div class="subnav-title">
					<a href="#" class='toggle-subnav'><span>Dashboard</span></a>
				</div>
				<ul class="subnav-menu">
					<li>
						<a href="{{ URL::asset('/') }}">Home</a>
					</li>
				</ul>
			</div>
			<div class="subnav subnav-hidden">
				<div class="subnav-title">
					<a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>Penggajian</span></a>
				</div>
				<ul class="subnav-menu">
					<li>
						<a href="{{ URL::asset('keuangan/penggajian') }}">Daftar Penggajian</a>
					</li>
				</ul>
			</div>
			<div class="subnav subnav-hidden">
				<div class="subnav-title">
					<a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>Pelatihan</span></a>
				</div>
				<ul class="subnav-menu">
					<li>
						<a href="{{ URL::asset('keuangan/pelatihan') }}">Konfirmasi Pembayaran</a>
					</li>
				</ul>
			</div>
		</div>
<style type="text/css">
	body {
		padding : 10px;
		font-family: 'Roboto', sans-serif;
	}
	p{
		padding: 5px;
	}
	
	table.laporan
{
border-collapse:collapse;
}
table.laporan, table.laporan th, table.laporan td
{
border: 1px solid black;
}
table.laporan thead td{
	font-size: 12pt;
	padding-top: 3px;
	padding-bottom: 3px;
}
table.laporan tbody td{
	padding-left:8px;
	padding-top: 3px;
	padding-bottom: 3px;
	font-size: 9pt;
}

</style>
<center>
	<table width=100%>
		<tr>
			<td colspan=3><img src="{{ public_path().'/assets/img/hvh.jpg' }}"/></td>
			<td align="right" colspan=4><h4>LAPORAN ABSENSI<br>PT JALUR CIPTA & KOMUNIKASI ADVERTISING</h4></td>
		</tr>
		<tr>
			<td colspan=7><hr></td>
		</tr>
		<tr>
			<td width=15% colspan=7><strong>Perihal :  </strong>Laporan Absensi</td>
		</tr>
		<tr>
			<td width=15% colspan=7><strong>Periode :   </strong>{{ $data['bulan'] }} {{ $data['tahun'] }}</td>
		</tr>
		<tr>
			<td colspan=7><br></td>
		</tr>
	</table>
	<table width=100% class="laporan">
		<thead>
		<tr>
			<td width=1% align="center">No.</td>
			<td width=10% align="center">No. Pegawai</td>
			<td width=25% align="center">Nama Pegawai</td>
			<td width=25% align="center">Department</td>
			<td width=10% align="center">Hadir</td>
			<td width=10% align="center">Telat</td>
			<td width=10% align="center">Lembur</td>
		</tr>
		</thead>
		<tbody>
		<?php $i=1; ?>
		@foreach($data['absensi'] as $absensi)
		<tr>
			<td>{{$i}}</td>
			<td>{{$absensi->nokaryawan}}</td>
			<td>{{$absensi->karyawan->user->nama_lengkap}}</td>
			<td>{{$absensi->karyawan->department->department}}</td>
			<td align="center">{{$absensi->hadir}}</td>
			<td align="center">{{$absensi->terlambat}}</td>
			<td align="center">{{$absensi->lembur}}</td>
		</tr>
		<?php $i++; ?>
		@endforeach
		</tbody>
	</table>
	<br><br>
	<table width=100%>
		<tr>
			<td><center>Mengetahui,</center></td><td width=65%></td>
		</tr>
		<tr>
			<td><br><br><br><br></td><td></td>
		</tr>
		<tr>
			<td><strong>Andreas Harjanto Budiman</strong><br><br><br><br></td><td></td>
		</tr>
	</table>
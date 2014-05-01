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
}
table.laporan tbody td{
	padding-left:8px;
	font-size: 10pt;
}

</style>
<center>
	<table width=100%>
		<tr>
			<td colspan=3><img src="{{ public_path().'/assets/img/hvh.jpg' }}"/></td>
			<td align="right" colspan=4><h4>LAPORAN PELATIHAN<br>PT JALUR CIPTA & KOMUNIKASI ADVERTISING</h4></td>
		</tr>
		<tr>
			<td colspan=7><hr></td>
		</tr>
		<tr>
			<td width=15% colspan=7><strong>Perihal   </strong>: Laporan Pelatihan</td>
		</tr>
		<tr>
			<td width=15% colspan=7><strong>Nama Pelatihan   </strong>: {{ $data['pelatihan']->judul }}</td>
		</tr>
		<tr>
			<td width=15% colspan=7><strong>Tempat   </strong>: {{ $data['pelatihan']->tempat }}</td>
		</tr>
		<tr>
			<td width=15% colspan=7><strong>Waktu :   </strong>{{ date("d M Y", strtotime($data['pelatihan']->tanggalmulai))}} - {{date("d M Y", strtotime($data['pelatihan']->tanggalselesai)) }}</td>
		</tr>
		<tr>
			<td colspan=7><br></td>
		</tr>
		<tr>
			<td colspan=7>Pegawai Yang Mengikuti Pelatihan : <br></td>
		</tr>
	</table>
	
	<table width=100% class="laporan">
		<thead>
		<tr>
			<td width=1% align="center">No.</td>
			<td width=20% align="center">No. Pegawai</td>
			<td width=25% align="center">Nama Pegawai</td>
			<td width=30% align="center">Department</td>
		</tr>
		</thead>
		<tbody>
		<?php $i=1; ?>
		@foreach($data['pelatihan']->detailpelatihan as $peserta)
		<tr>
			<td>{{$i}}</td>
			<td>{{$peserta->nokaryawan}}</td>
			<td>{{$peserta->karyawan->user->nama_lengkap}}</td>
			<td>{{$peserta->karyawan->department->department}}</td>
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
			<td><center>Manager HRD</center></td><td width=65%></td>
		</tr>
		<tr>
			<td><br><br><br><br></td><td></td>
		</tr>
		<tr>
			<td><strong>Andreas Harjanto Budiman</strong><br><br><br><br></td><td></td>
		</tr>
	</table>
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
	font-size: 10pt;
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
			<td align="right" colspan=4><h4>LAPORAN PERMOHONAN CUTI/IZIN<br>PT JALUR CIPTA & KOMUNIKASI ADVERTISING</h4></td>
		</tr>
		<tr>
			<td colspan=7><hr></td>
		</tr>
		<tr>
			<td width=15% colspan=7><strong>Perihal :  </strong>Laporan Cuti</td>
		</tr>
		<tr>
			<td width=15% colspan=7><strong>Periode :   </strong>{{ date("d M Y", strtotime($data['filter']['tanggaldari']))}} - {{date("d M Y", strtotime($data['filter']['tanggalsampai'])) }}</td>
		</tr>
		<tr>
			<td width=15% colspan=7><strong>Periode :   </strong>{{ $data['filter']['tanggaldari'] }} - {{ $data['filter']['tanggalsampai'] }}</td>
		</tr>
		<tr>
			<td colspan=7><br></td>
		</tr>
	</table>
	<table width=100% class="laporan">
		<thead>
		<tr>
			<td width=1% align="center">No.</td>
			<td width=20% align="center">No. Pegawai</td>
			<td width=25% align="center">Nama Pegawai</td>
			<td width=10% align="center">Range</td>
			<td width=25% align="center">Tanggal Mulai</td>
			<td width=25% align="center">Tanggal Selesai</td>
			<td width=30% align="center">Alasan</td>
		</tr>
		</thead>
		<tbody>
		<?php $i=1; ?>
		@foreach($data['cuti'] as $cuti)
		<tr>
			<td>{{$i}}</td>
			<td>{{$cuti->karyawan->nokaryawan}}</td>
			<td>{{$cuti->karyawan->user->nama_lengkap}}</td>
			<td>{{$cuti->range}}</td>
			<td>{{date("d M Y", strtotime($cuti->tanggalmulai))}}</td>
			<td>{{date("d M Y", strtotime($cuti->tanggalselesai))}}</td>
			<td>
				@if($cuti->alasan == 1)
				Cuti
				@elseif($cuti->alasan == 2)
				Cuti Melahirkan
				@elseif($cuti->alasan == 3)
				Sakit
				@elseif($cuti->alasan == 4)
				Berduka Cita
				@elseif($cuti->alasan == 5)
				Pernikahan
				@else
				Khitanan/Baptis
				@endif
			</td>
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
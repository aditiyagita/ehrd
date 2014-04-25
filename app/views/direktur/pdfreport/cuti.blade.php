<style type="text/css">
	body {
		padding : 10px;
		font-family: 'Roboto', sans-serif;
	}
	p{
		padding: 5px;
	}
</style>
<center>
	<table width=100%>
		<tr>
			<td width=15%><img src="{{ public_path().'/assets/img/hvh.jpg' }}"/></td>
			<td align="right"><h3>Permohonan<br>Cuti/Izin Tidak Masuk Kerja</h3></td>
		</tr>
		<tr>
			<td colspan=2><hr></td>
		</tr>
		<tr>
			<td width=15%><strong>Nama :  </strong>{{ $data['cuti']->karyawan->user->nama_lengkap }}</td>
			<td></td>
		</tr>
		<tr>
			<td width=15%><strong>Department :   </strong>{{ $data['cuti']->karyawan->department->department }}</td>
			<td></td>
		</tr>
		<tr>
			<td colspan=2><br></td>
		</tr>
		<tr>
			<td colspan=2>
				<p>Bersama ini saya mohon izin untuk tidak masuk kerja dari: 
				tanggal: <u>{{ date("d M Y", strtotime($data['cuti']->tanggalmulai)) }}</u> sampai dengan tanggal: <u>{{ date("d M Y", strtotime($data['cuti']->tanggalselesai)) }}</u>
				selama: <u>{{ $data['cuti']->range }}</u> hari, karena: 
				<b>
				@if($data['cuti']->alasan == 1)
				Cuti
				@elseif($data['cuti']->alasan == 2)
				Cuti Melahirkan
				@elseif($data['cuti']->alasan == 3)
				Sakit
				@elseif($data['cuti']->alasan == 4)
				Berduka Cita
				@elseif($data['cuti']->alasan == 5)
				Pernikahan
				@else
				Khitanan/Baptis
				@endif
				</b><br><br>
				Surat Keterangan Dokter (Untuk Sakit/Cuti Melahirkan):
				@if($data['cuti']->suratdokter == 1)
				Ada
				@else
				Tidak Ada
				@endif
				<br>Yang menggantikan saya cuti adalah: {{ $data['cuti']->penggantiCuti->user->nama_lengkap }}<br><br>
				Sisa Cuti: {{ $data['settingcuti']->jumlahhari - $data['jumlahcuti'] }}  hari</p><br><br>
			</td>
		</tr>
		<tr>
			<td width=50%><center><strong>Dibuat Oleh :</strong></center></td>
			<td width=50%><center><strong>Menyetujui :</strong></center></td>
		</tr>
		<tr>
			<td width=50%></td>
			<td width=50%><center><strong>Kepala Department</strong></center></td>
		</tr>
		<tr>
			<td width=50%></td>
			<td width=50%><br><br><br></td>
		</tr>
		<tr>
			<td width=50%><center>{{ $data['cuti']->karyawan->user->nama_lengkap }}</center></td>
			<td width=50%><br></td>
		</tr>
	</table>
</center>
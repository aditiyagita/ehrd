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
			<td width=10%><img src="{{ public_path().'/assets/img/hvh.jpg' }}"/></td>
			<td align="right"><h4>PERMOHONAN PENGUNDURAN DIRI<br>PT JALUR CIPTA & KOMUNIKASI ADVERTISING</h4></td>
		</tr>
		<tr>
			<td colspan=2><hr></td>
		</tr>
		<tr>
			<td width=15%>Jakarta, {{ date("d M Y", strtotime($data['pengundurandiri']->tanggalsurat)) }}</td>
			<td></td>
		</tr>
		<tr>
			<td width=15%>
				Kepada Yth.<br>
				Kepala HRD PT. JC & K Advertising<br><br>
				Dengan Hormat,
			</td>
			<td></td>
		</tr>
		<tr>
			<td colspan=2><br></td>
		</tr>
		<tr>
			<td colspan=2>
				{{ $data['pengundurandiri']->isi }}
			</td>
		</tr>
		<tr>
			<td width=50%><strong>Hormat Saya,</strong></td>
			<td width=50%></td>
		</tr>
		<tr>
			<td width=50%>Jakarta, {{ date("d M Y", strtotime($data['pengundurandiri']->tanggalsurat)) }}</td>
			<td width=50%></td>
		</tr>
		<tr>
			<td width=50%><br><br><br><br>{{ $data['pengundurandiri']->karyawan->user->nama_lengkap }}</td>
			<td width=50%><br></td>
		</tr>
	</table>
</center>
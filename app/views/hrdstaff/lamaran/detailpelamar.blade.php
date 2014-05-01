@extends('master')

@section('content')


<body>
	@include('menu')
	</div>
	<div class="container-fluid" id="content"> <!-- <div class="container-fluid nav-hidden" id="content"> -->
		@include('hrdstaff.left')
		<div id="main">
			<div class="container-fluid">
				<div class="page-header">
					<div class="page-header">
					<div class="pull-left">
						<h1>Detail Pelamar</h1>
					</div>
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="{{Url::asset('hrdstaff/')}}">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="{{Url::asset('hrdstaff/lamaran')}}">Lamaran</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="javascript:history.back();">Daftar Pelamar</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="#">Detail Pelamar</a>
						</li>
					</ul>
					<div class="close-bread">
						<a href="#"><i class="icon-remove"></i></a>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<div class="box">
							<div class="box-title">
								<h3>
									<i class="icon-money"></i>
									Data Pribadi Pelamar
								</h3>
							</div>
							<table class="table table-striped table-bordered">
								<tr>
									<td colspan=3>
										<center>
											<img src="{{ Url::asset('assets/img/hvh.jpg')}}" width="200px"><br>
											<h4>Surat Lamaran</h4>
										</center>
									</td>
									<td width=20%>
										<center>
											@if($data['lamaran']->user->foto <> null)
												<img src="{{Url::asset('assets/images/user/'.$data['lamaran']->user->foto)}}" width="170px">
											@else
												<img src="{{ URL::asset('assets/images/user/default.jpg') }}" width="170px">
											@endif
										</center>
									</td>
								</tr>
								<tr>
									<td width=25%><b>Jabatan Yang Dilamar</b></td>
									<td width=25%>{{ $data['lamaran']->lowongan->posisi }}</td>
									<td width=25%><b>Gaji Yang Diharapkan</b></td>
									<td width=25%>Rp {{ number_format($data['lamaran']->gaji, 2) }}</td>
								</tr>
								<tr>
									<td width=25%><b>Kapan Mulai Dapat Bekerja</b></td>
									<td colspan=3>{{  date('d M Y', strtotime($data['lamaran']->mulaikerja)) }}</td>
								</tr>
								<tr>
									<td colspan=4><center><b><i>Keterangan Tentang Diri</i></b></center></td>
								</tr>
								<tr>
									<td width=25%><b>Nama Lengkap</b></td>
									<td width=25%>{{ $data['lamaran']->user->nama_lengkap }}</td>
									<td width=25%><b>Nama Panggilan</b></td>
									<td width=25%>{{ $data['lamaran']->user->nama_panggilan }}</td>
								</tr>
								<tr>
									<td width=25%><b>Alamat</b></td>
									<td width=25%>{{ $data['lamaran']->user->alamat }}</td>
									<td width=25%><b>Telepon Genggam</b></td>
									<td width=25%>{{ $data['lamaran']->user->no_hp }}</td>
								</tr>
								<tr>
									<td width=25%><b>Kode Pos</b></td>
									<td width=25%>{{ $data['lamaran']->user->kode_pos }}</td>
									<td width=25%><b>Telepon Rumah</b></td>
									<td width=25%>{{ $data['lamaran']->user->no_telp }}</td>
								</tr>
								<tr>
									<td width=25%><b>Tempat Lahir</b></td>
									<td width=25%>{{ $data['lamaran']->user->tempat_lahir }}</td>
									<td width=25%><b>Berat Badan</b></td>
									<td width=25%>{{ $data['lamaran']->user->berat_badan }}</td>
								</tr>
								<tr>
									<td width=25%><b>Tanggal Lahir</b></td>
									<td width=25%>{{ date('d M Y', strtotime($data['lamaran']->user->tanggal_lahir)) }}</td>
									<td width=25% rowspan=2><b>Tinggi Badan</b></td>
									<td width=25% rowspan=2>{{ $data['lamaran']->user->tinggi_badan }}</td>
								</tr>
								<tr>
									<td width=25%><b>Warga Negara</b></td>
									<td width=25%>{{ $data['lamaran']->user->warga_negara }}</td>
								</tr>
								<tr>
									<td width=25%><b>No. Kartu Penduduk</b></td>
									<td width=25%>{{  $data['lamaran']->user->no_ktp }}</td>
									<td width=25% rowspan=2><b>Status Pernikahan</b></td>
									<td width=25% rowspan=2>
										@if($data['lamaran']->user->status_kawin  == 1)
											Belum Kawin
										@elseif($data['lamaran']->user->status_kawin  == 2)
											Kawin
										@elseif($data['lamaran']->user->status_kawin  == 3)
											Janda
										@elseif($data['lamaran']->user->status_kawin  == 4)
											Duda
										@endif
									</td>
								</tr>
								<tr>
									<td width=25%><b>No. Passport</b></td>
									<td width=25%>{{ $data['lamaran']->user->no_passport }}</td>
								</tr>
								<tr>
									<td width=25%><b>Agama</b></td>
									<td width=25%>
										<?php $i=1;?>
										@foreach ($data['agama'] as $agama)
											@if($data['lamaran']->user->agama == $i)
												{{ $agama }}
											@endif
										<?php $i++; ?>
										@endforeach
									</td>
									<td width=25%><b>Jenis Kelamin</b></td>
									<td width=25%>@if($data['lamaran']->user->jenis_kelamin == 1) Pria @else Wanita @endif</td>
								</tr>
								<tr>
									<tr>
									<td colspan=2><b>Apakah Anda Menggunakan Kacamata?</b></td>
									<td colspan=2>@if($data['lamaran']->user->kacamata == 1) Ya @else Tidak @endif</td>
								</tr>
								</tr>
								<tr>
									<td colspan=4><center><b><i>Pendidikan</i></b></center></td>
								</tr>
								<tr>
									<td width=25%><b>Jenjang</b></td>
									<td width=25%><b>Nama Sekolah</b></td>
									<td width=25%><b>Sejak-Sampai</b></td>
									<td width=25%><b>Ijazah</b></td>
								</tr>
								@foreach($data['lamaran']->user->pendidikan as $pendidikan)
								<tr>
									<td width=25%>{{ $pendidikan->jenjang }}</td>
									<td width=25%>{{ $pendidikan->namasekolah }}</td>
									<td width=25%>{{ $pendidikan->masapendidikan }}</td>
									<td width=25%>{{ $pendidikan->ijazah }}</td>
								</tr>
								@endforeach
								<tr>
									<td colspan=4><center><b><i>Kursus Dan Pelatihan</i></b></center></td>
								</tr>
								<tr>
									<td width=25%><b>Kursus/Pelatihan</b></td>
									<td width=15%><b>Tahun</b></td>
									<td width=15%><b>Lokasi</b></td>
									<td width=45%><b>Subjek</b></td>
								</tr>
								@foreach($data['lamaran']->user->kursuspelatihan as $kursuspelatihan)
								<tr>
									<td width=25%></td>
									<td width=15%>{{ $kursuspelatihan->tahun }}</td>
									<td width=15%>{{ $kursuspelatihan->lokasi }}</td>
									<td width=45%>{{ $kursuspelatihan->subjek }}</td>
								</tr>
								@endforeach
								<tr>
									<td colspan=4><center><b><i>Kepandaian Berbahasa</i></b></center></td>
								</tr>
								<tr>
									<td width=25%><b>Kepandaian Berbahasa</b></td>
									<td width=15%><b>Bahasa</b></td>
									<td width=15%><b>Menulis</b></td>
									<td width=45%><b>Berbicara</b></td>
								</tr>
								@foreach($data['lamaran']->user->bahasa as $bahasa)
								<tr>
									<td width=25%></td>
									<td width=15%>{{ ucfirst($bahasa->bahasa) }}</td>
									<td width=15%>{{ ucfirst($bahasa->menulis) }}</td>
									<td width=45%>{{ ucfirst($bahasa->bicara) }}</td>
								</tr>
								@endforeach
								<tr>
									<td colspan=4><center><b><i>Pengalaman Kerja</i></b></center></td>
								</tr>
								@foreach($data['lamaran']->user->pengalamankerja as $pengalamankerja)
								<tr>
									<td width=25% colspan=4><b>Nama Perusahaan  :  </b> {{ $pengalamankerja->namaperusahaan }}</td>
								</tr>
								<tr>
									<td width=25% colspan=2><b>Bidang Usaha  :  </b> {{ $pengalamankerja->bidang }}</td>
									<td width=15% colspan=2><b>Gaji Per Bulan :  </b> {{ $pengalamankerja->gaji }}</td>
								</tr>
								<tr>
									<td width=25% colspan=2><b>Jabatan  :  </b> {{ $pengalamankerja->jabatan }}</td>
									<td width=15% colspan=2><b>Tunjangan-tunjangan :  </b> {{ $pengalamankerja->tunjangan }}</td>
								</tr>
								<tr>
									<td width=25% colspan=2><b>Nama Atasan  :  </b> {{ $pengalamankerja->namaatasan }}</td>
									<td width=15% colspan=2><b>Bekerja Sejak-Sampai :  </b> {{ $pengalamankerja->masakerja }}</td>
								</tr>
								<tr>
									<td width=25% colspan=2><b>Alasan Berhenti  :  </b> {{ $pengalamankerja->alasankeluar }}</td>
								</tr>
								<tr>
									<td colspan=4></td>
								</tr>
								@endforeach
								<tr>
									<td colspan=4><center><b><i>Keterangan Tentang Keluarga</i></b></center></td>
								</tr>
								<tr>
									<td width=25%><b>Nama Suami/Istri</b></td>
									<td width=25%>{{  $data['keluarga']->suamiistri }}</td>
									<td width=25%><b>Umur</b></td>
									<td width=25%>{{  $data['keluarga']->umur }}</td>
								</tr>
								<tr>
									<td width=25% colspan=2><b>Pekerjaan</b></td>
									<td width=25% colspan=2>{{  $data['keluarga']->pekerjaan }}</td>
								</tr>
								@if((count($data['keluarga']->anak) != 0))
								@foreach($data['keluarga']->anak as $anak)
								<tr>
									<td width=25%><b>Nama Anak</b></td>
									<td width=25%>{{  $anak->nama }}</td>
									<td width=25%><b>Umur</b></td>
									<td width=25%>{{  $anak->umur }}</td>
								</tr>	
								@endforeach
								@endif
								<tr>
									<td colspan=4><center><b><i>Referensi</i></b></center></td>
								</tr>
								<tr>
									<td width=35% colspan=2><b>Nama</b></td>
									<td width=25%><b>Jabatan</b></td>
									<td width=45%><b>Hubungan</b></td>
								</tr>
								<?php $i=1; ?>
								@foreach($data['lamaran']->user->referensi as $referensi)
								<tr>
									<td width=15% colspan=2>{{ ucfirst($referensi->nama) }}</td>
									<td width=15%>{{ ucfirst($referensi->jabatan) }}</td>
									<td width=45%>{{ ucfirst($referensi->hubungan) }}</td>
								</tr>
								<?php $i++; ?>
								@endforeach
								<tr>
									<td colspan=4><center><b><i>Pertanyaan</i></b></center></td>
								</tr>
								<?php $i=1; ?>
								@foreach($data['lamaran']->user->jawaban as $jawaban)
								<tr>
									<td width=15% colspan=3>{{ ucfirst($jawaban->pertanyaan->pertanyaan) }}</td>
									<td width=45%>{{ $jawaban->jawab == 1 ? 'Ya' : 'Tidak' }}</td>
								</tr>
								<tr>
									<td width=15% colspan=4><strong>Jawab  :   </strong>{{ ucfirst($jawaban->uraian) }}</td>
								</tr>
								<?php $i++; ?>
								@endforeach
							</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@stop
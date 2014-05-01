@extends('master')

@section('content')
<!-- Daterangepicker -->
{{ HTML::style('assets/css/plugins/daterangepicker/daterangepicker.css') }}
<!-- Datepicker -->
{{ HTML::style('assets/css/plugins/datepicker/datepicker.css') }}
<!-- Datepicker -->
{{ HTML::script('assets/js/plugins/datepicker/bootstrap-datepicker.js') }}
<!-- Daterangepicker -->
{{ HTML::script('assets/js/plugins/daterangepicker/daterangepicker.js') }}
{{ HTML::script('assets/js/plugins/daterangepicker/moment.min.js') }}
    	<body data-layout="fixed">
		@include('menu')
		<div class="container-fluid nav-hidden" id="content">
			<div id="main">
				<div class="container-fluid">
					<div class="page-header">
						@include('pelamar.pageheader')
					</div>
					<div class="breadcrumbs">
						<ul>
							<li>
								<a href="{{Url::asset('')}}">Home</a>
								<i class="icon-angle-right"></i>
							</li>
							<li>
								<a href="{{Url::asset('resume')}}">Resume</a>
								<i class="icon-angle-right"></i>
							</li>
							<li>
								<a href="{{Url::asset('pengalaman-kerja')}}">Pengalaman Kerja</a>
							</li>
						</ul>
						<div class="close-bread">
							<a href="#"><i class="icon-remove"></i></a>
						</div>
					</div>
					@if($errors->any())
					<div class="alert alert-success" style="margin-top:15px">
						<button type="button" class="close" data-dismiss="alert">×</button>
						<strong>Update!</strong> {{$errors->first()}}
					</div>
					@endif
					<div class="row-fluid">
						<div class="span9">
							<div class="box">
								<div class="box-title">
									<h3><i class="icon-list"></i> User Profile</h3>
								</div>
							</div>
							<div class="row-fluid" style="margin-top:10px">
								<div class="span3">
									@include('pelamar.foto')
								</div>
								<div class="span9">
									<h4>Pengalaman Kerja</h4>
									 {{ Form::open(array('route' => 'pengalaman-kerja.store', 'class' => 'form-horizontal')) }}
										<div class="control-group">
											<label for="namaperusahaan" class="control-label">Nama Perusahaan</label>
											<div class="controls">
												<input type="text" name="namaperusahaan" id="namaperusahaan" placeholder="Nama Perusahaan" class="input-block-level" data-rule-required="true" required>
											</div>
										</div>
										<div class="control-group">
											<label for="bidang" class="control-label">Bidang Usaha</label>
											<div class="controls">
												<input type="text" name="bidang" id="bidang" placeholder="Bidang Usaha" class="input-block-level" data-rule-required="true" required>
											</div>
										</div>
										<div class="control-group">
											<label for="jabatan" class="control-label">Jabatan</label>
											<div class="controls">
												<input type="text" name="jabatan" id="jabatan" placeholder="Jabatan" class="input-block-level" data-rule-required="true" required> 
											</div>
										</div>
										<div class="control-group">
											<label for="gaji" class="control-label">Gaji</label>
											<div class="controls">
												<input type="number" name="gaji" id="gaji" placeholder="Gaji" class="input-block-level" data-rule-required="true" required>
											</div>
										</div>
										<div class="control-group">
											<label for="tunjangan" class="control-label">Tunjangan</label>
											<div class="controls">
												<input type="number" name="tunjangan" id="tunjangan" placeholder="Tunjangan" class="input-block-level" data-rule-required="true" required>
											</div>
										</div>
										<div class="control-group">
											<label for="namaatasan" class="control-label">Nama Atasan</label>
											<div class="controls">
												<input type="text" name="namaatasan" id="namaatasan" placeholder="Nama Atasan" class="input-block-level" data-rule-required="true" required>
											</div>
										</div>
										<div class="control-group">
											<label for="masakerja" class="control-label">Masa Kerja</label>
											<div class="controls">
												<input type="text" name="darikerja" id="darikerja" class="span4 datepick" required> - 
												<input type="text" name="sampaikerja" id="sampaikerja" class="span4 datepick" required> 
											</div>
										</div>
										<div class="control-group">
											<label for="alasankeluar" class="control-label">Alasan Keluar</label>
											<div class="controls">
												<input type="text" name="alasankeluar" id="alasankeluar" placeholder="Alasan Keluar" class="input-block-level" data-rule-required="true" required>
											</div>
										</div>
										<div class="control-group" style="float:right">
											<button type="submit" class="btn btn-brown btn-large">Save changes</button>
											<button type="button" class="btn btn-large">Cancel</button>
										</div>
									{{Form::close()}}
									<table id="detailRetur" class="table table-hover table-nomargin">
										<tbody>
											<?php $i=1; ?>
											@foreach($data['pengalaman'] as $pengalaman)
												<tr>
													<td><b>Nama Perusahaan</b></td><td class='hidden-1024'>{{ $pengalaman->namaperusahaan }}</td>
													<td><b>Bidang</b></td><td>{{ $pengalaman->bidang }}</td>
												</tr>
												<tr>
													<td><b>Jabatan</b></td><td class='hidden-1024'>{{ $pengalaman->jabatan }}</td>
													<td><b>Gaji</b></td><td>{{ $pengalaman->gaji }}</td>
												</tr>
												<tr>
													<td><b>Tunjangan</b></td><td class='hidden-1024'>{{ $pengalaman->tunjangan }}</td>
													<td><b>Nama Atasan</b></td><td>{{ $pengalaman->namaatasan }}</td>
												</tr>
												<tr>
													<td><b>Masa Kerja</b></td><td colspan=3 class='hidden-1024'>{{ $pengalaman->masakerja }}</td>
													
												</tr>
												<tr>
													<td><b>Alasan Keluar</b></td><td colspan=2>{{ $pengalaman->alasankeluar }}</td>
													<td class='hidden-480'>
														<a class="btn" href="{{ URL::asset('pengalaman-kerja/delete/'.$pengalaman->idpengalamankerja) }}" data-original-title="Delete">
															<i class="icon-remove"></i>
														</a>
													</td>
												</tr>
												<tr>
													<td colspan=4></td>
												</tr>
											<?php $i++ ?>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="span3">
							@include('pelamar.widget')
						</div>
					</div>
			</div>
		</div>
		</body>

@stop
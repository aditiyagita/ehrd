@extends('master')

@section('content')
<!-- Datepicker -->
{{ HTML::style('assets/css/plugins/datepicker/datepicker.css') }}
<!-- Datepicker -->
{{ HTML::script('assets/js/plugins/datepicker/bootstrap-datepicker.js') }}
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
								<a href="{{Url::asset('pendidikan')}}">Pendidikan</a>
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
									<h4>Data Pendidikan</h4>
									 {{ Form::open(array('route' => 'pendidikan.store', 'class' => 'form-horizontal')) }}
										<div class="control-group">
											<label for="tahun" class="control-label">Tahun</label>
											<div class="controls">
												<input type="text" name="tahun" id="tahun" placeholder="Tahun" class="input-block-level" required>
											</div>
										</div>
										<div class="control-group">
											<label for="jenjang" class="control-label">Jenjang</label>
											<div class="controls">
												<input type="text" name="jenjang" id="jenjang" placeholder="Jenjang" class="input-block-level" required>
											</div>
										</div>
										<div class="control-group">
											<label for="nama_sekolah" class="control-label">Nama Sekolah</label>
											<div class="controls">
												<input type="text" name="nama_sekolah" id="nama_sekolah" placeholder="Nama Sekolah" class="input-block-level" required>
											</div>
										</div>
										<div class="control-group">
											<label for="ijazah" class="control-label">Ijazah</label>
											<div class="controls">
												<label class='radio'>
													<input type="radio" name="ijazah" value='ada' CHECKED> Ada
												</label>
												<label class='radio'>
													<input type="radio" name="ijazah" value='tidak'> Tidak
												</label>
											</div>
										</div>
										<div class="control-group" style="float:right">
											<button type="submit" class="btn btn-primary">Save changes</button>
											<button type="button" class="btn">Cancel</button>
										</div>
									{{Form::close()}}
									<table id="detailRetur" class="table table-hover table-nomargin">
										<thead>
											<tr>
												<th>No</th>
												<th>Tahun</th>
												<th class='hidden-350'>Jenjang</th>
												<th class='hidden-1024'>Nama Sekolah</th>
												<th class='hidden-480'>Ijazah</th>
												<th class='hidden-480' width=5%></th>
											</tr>
										</thead>
										<tbody>
											<?php $i=1; ?>
											@foreach($data['pendidikan'] as $pendidikan)
												<tr>
													<td>{{ $i }}</td>
													<td>{{ $pendidikan->masapendidikan }}</td>
													<td class='hidden-350'>{{ $pendidikan->jenjang }}</td>
													<td class='hidden-1024'>{{ $pendidikan->namasekolah }}</td>
													<td class='hidden-480'>{{ $pendidikan->ijazah }}</td>
													<td class='hidden-480'>
														<a class="btn" href="{{ URL::asset('pendidikan/delete/'.$pendidikan->idpendidikan) }}" data-original-title="Delete">
															<i class="icon-remove"></i>
														</a>
													</td>
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
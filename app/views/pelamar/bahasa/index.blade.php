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
								<a href="{{Url::asset('bahasa')}}">Bahasa</a>
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
									<h4>Bahasa</h4>
									 {{ Form::open(array('route' => 'bahasa.store', 'class' => 'form-horizontal')) }}
										<div class="control-group">
											<label for="bahasa" class="control-label">Bahasa</label>
											<div class="controls">
												<input type="text" name="bahasa" id="bahasa" placeholder="Bahasa" class="input-block-level" required>
											</div>
										</div>
										<div class="control-group">
											<label for="bicara" class="control-label">Bicara</label>
											<div class="controls">
												<select name="bicara" id="bicara" class='input-block-level' required>
													<option value="" SELECTED>-Keterangan Menulis-</option>
													<?php $i=1;?>
													@foreach ($data['ketbhs'] as $ketbhs)
								                        <option value="{{ $ketbhs }}">{{ $ketbhs }}</option>
								                    <?php $i++ ?>
								                    @endforeach
												</select>
											</div>
										</div>
										<div class="control-group">
											<label for="menulis" class="control-label">Menulis</label>
											<div class="controls">
												<select name="menulis" id="menulis" class='input-block-level' required>
													<option value="" SELECTED>-Keterangan Menulis-</option>
													<?php $i=1;?>
													@foreach ($data['ketbhs'] as $ketbhs)
								                        <option value="{{ $ketbhs }}">{{ $ketbhs }}</option>
								                    <?php $i++ ?>
								                    @endforeach
												</select>
											</div>
										</div>
										<div class="control-group" style="float:right">
											<button type="submit" class="btn btn-brown btn-large">Save changes</button>
											<button type="button" class="btn btn-large">Cancel</button>
										</div>
									{{Form::close()}}
									<table id="detailRetur" class="table table-hover table-nomargin">
										<thead>
											<tr>
												<th>No</th>
												<th>Bahasa</th>
												<th class='hidden-350'>Bicara</th>
												<th class='hidden-1024'>Menulis</th>
												<th class='hidden-480' width=5%></th>
											</tr>
										</thead>
										<tbody>
											<?php $i=1; ?>
											@if(!empty($data['bahasa']))
												@foreach($data['bahasa'] as $bahasa)
													<tr>
														<td>{{ $i }}</td>
														<td class='hidden-1024'>{{ $bahasa->bahasa }}</td>
														<td>{{ $bahasa->bicara }}</td>
														<td class='hidden-350'>{{ $bahasa->menulis }}</td>
														<td class='hidden-480'>
															<a class="btn" href="{{ URL::asset('bahasa/delete/'.$bahasa->idbahasa) }}" data-original-title="Delete">
																<i class="icon-remove"></i>
															</a>
														</td>
													</tr>
												<?php $i++ ?>
												@endforeach
											@endif
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
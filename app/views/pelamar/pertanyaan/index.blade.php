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
								<a href="{{Url::asset('pertanyaan')}}">Pertanyaan</a>
							</li>
						</ul>
						<div class="close-bread">
							<a href="#"><i class="icon-remove"></i></a>
						</div>
					</div>
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
									<h4>Pertanyaan</h4>
									@if(count($data['jawaban']) > 0)
										<table class="table table-hover table-nomargin">
											@foreach($data['jawaban'] as $jawaban)
												<tr>
													<td>{{$jawaban->pertanyaan->pertanyaan}}<br>
														<strong>Alasan : </strong>{{$jawaban->uraian}}
													</td>
													<td>
														@if($jawaban->jawab == 1)
															Ya
														@elseif($jawaban->jawab == 2)
															Tidak
														@else

														@endif
													</td>
												</tr>
											@endforeach
										</table>
									@else
									{{ Form::open(array('route' => 'pertanyaan.store', 'class' => 'form-horizontal')) }}
									<table id="detailRetur" class="table table-hover table-nomargin">
										<thead>
											<tr>
												<th>No</th>
												<th>Pertanyaan</th>
												<th class='hidden-350' width=5%>Jawaban</th>
											</tr>
										</thead>
										<tbody>
											<?php $i=0; ?>
											<?php $x=1; ?>
												@foreach($data['pertanyaan'] as $pertanyaan)
													<tr>
														<td>{{ $x }}</td>
														<td class='hidden-1024'>
															{{ Form::hidden('idpertanyaan['.$i.']', $pertanyaan->idpertanyaan) }}
															{{ $pertanyaan->pertanyaan }}<br>
															<strong>Penjelasan : </strong><input type="text" name="uraian[{{$i}}]" id="uraian[{{$i}}]" placeholder="Penjelasan" class="input-block-level" required>
														</td>
														<td>
															@if(($pertanyaan->idpertanyaan == 6) OR ($pertanyaan->idpertanyaan == 7))
															@else
															<label class='radio'>
																<input type="radio" name="jawab[{{$i}}]" value=1 required> Ya
															</label>
															<label class='radio'>
																<input type="radio" name="jawab[{{$i}}]" value=2> Tidak
															</label>
															@endif
														</td>
													</tr>
												<?php $i++ ?>
												<?php $x++ ?>
												@endforeach
										</tbody>
									</table>
									<div style="float:right">
										<button type="submit" class="btn btn-brown btn-large">Jawab Pertanyaan</button>
										<button type="button" class="btn btn-large">Cancel</button>
									</div>	
									{{Form::close()}}
									@endif
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
@extends('master')

@section('content')

<body>
	@include('menu')
	</div>
	<div class="container-fluid" id="content"> <!-- <div class="container-fluid nav-hidden" id="content"> -->
		@include('karyawan.left')
		<div id="main">
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>Pelatihan</h1>
					</div>
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="{{Url::asset('/')}}">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="{{Url::asset('karyawan/pelatihan')}}">Pelatihan</a>
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
								
							</div>
							<div class="box-content nopadding">
								
								<div class="search-results">
									<ul>
										<?php $i=1; ?>
										@if( count($data['pelatihan']) > 0 ) 
											@foreach($data['pelatihan'] as $pelatihan)
												<?php 
													$peserta = new DetailPelatihan();
													$jmlpeserta[$i] = $peserta->cekJum($pelatihan->idpelatihan);
												?>
												@if($pelatihan->tanggalmulai > date('Y-m-d'))
												<li>
													<div class="thumbnail">
														<img src="{{Url::asset('assets/images/menu/pelatihan.png')}}" alt="">
													</div>
													<div class="search-info">
														@if(($pelatihan->kuota)-count($jmlpeserta[$i]) > 0)
															<a href="{{ Url::asset('karyawan/pelatihan/'.$pelatihan->idpelatihan.'') }}">{{ $pelatihan->judul }}</a>
														@else
															<a href="#modal-1" role="button"data-toggle="modal">{{ $pelatihan->judul }}</a>
														@endif
														<p class="url">{{ date("d M Y", strtotime($pelatihan->tanggalmulai)) }} - {{ date("d M Y", strtotime($pelatihan->tanggalmulai)) }} di {{ $datass = $pelatihan->tempat == '' ? '-' : $pelatihan->tempat}}. <strong>Sisa Kuota: {{ $sisa = ($pelatihan->kuota)-count($jmlpeserta[$i]) }}</strong></p>
														<?php $isi = str_replace(array('<h1>','</h1>','<h2>','</h2>','</br>','<ol>','</ol>','<li>','</li>','<p>','</p>'), ' ', $pelatihan->uraian); ?>
														<p>
															@if(strlen($isi) > 300)
																{{ substr($isi, 0,300) }}
															@else
																{{ $isi }}
															@endif
														</p>
													</div>
												</li>
												@endif
												<?php $i++; ?>
											@endforeach
										@else
										<li>Belum Ada Pelatihan</li>
										@endif
									</ul>
								</div>
								<div class="highlight-toolbar bottom">
									<div class="pull-left">
										<div class="btn-toolbar">
											<div class="btn-group">
												<div class="pagination pagination-custom">
													{{ $data['pelatihan']->links() }}
												</div>
											</div>	
										</div>
									</div>
									<div class="pull-right">
										<div class="btn-group">
											<span>Showing results <strong>1-25</strong> of <strong>348</strong></span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


<div id="modal-1" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel1">Oppss...</h3>
    </div>
    <div class="modal-body">
        <p>Maaf, Kuota Pelatihan Sudah Penuh.</p>
    </div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
	</div>
</div>


@stop
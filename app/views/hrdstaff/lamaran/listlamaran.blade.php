@extends('master')

@section('content')
<script type="text/javascript">
	 $(document).ready(function() { 
        $("#okHapus").click(function() {  
            var i = $("#id").val();
            var url = "agama/delete/"+i;    
            $(location).attr('href',url);
        });  
        $('.edit').click(function(){
            var url = $(this).attr('href');
            $('#dialogEdit').modal('show');
            $('#dialogEdit').load(url);
            return false;
        });
    });

    function detailAction(data){
        alert(data);    
    } 
	function hapusAction(data){
        $("#id").val(data);
        $('#dialogHapus').modal('show');
    } 
</script>
<body>
	@include('menu')
	</div>
	<div class="container-fluid" id="content"> <!-- <div class="container-fluid nav-hidden" id="content"> -->
		@include('hrdstaff.left')
		<div id="main">
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>Daftar Pelamar</h1>
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
							<a href="#">Daftar Pelamar</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="#">{{$data['jobvacancy']->judul}}</a>
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
								<table class="table table-hover table-nomargin dataTable table-bordered">
									<thead>
										<tr>
											<th width="5%">No</th>
											<th width="30%">Nama Lengkap</th>
											<th width="20%">Mulai Kerja</th>
											<th width="15%">Gaji</th>
											<th width="15%">Status</th>
											<th class='hidden-480 width="20%'>Operasi</th>
										</tr>
									</thead>
									<tbody>
										<?php $i=1; ?>
										@foreach($data['jobvacancy']->lamaran as $lamaran)
											<tr>
												<td><center>{{ $i }}</center></td>
												<td>{{ $lamaran->user->nama_lengkap }}</td>
												<td>{{  date('d M Y', strtotime($lamaran->mulaikerja)) }}</td>
												<td>{{ $lamaran->gaji }}</td>
												<td>
													<center>
													@if($lamaran->status > 0)
														<span class="btn btn-mini btn-blue">Diterima</span>
													@else
														<span class="btn btn-mini btn-red">Belum Diterima</span>
													@endif
													</center>
												</td>
												<td class='hidden-480'>
													<center>
														@if($lamaran->status > 0)
															
														@else
															<a href="{{ Url::asset('hrdstaff/lamaran/'.$lamaran->idlamaran.'/edit') }}" class="btn btn-green edit" rel="tooltip" title="Terima Lamaran"><i class="icon-ok-sign"></i></a>
														@endif
														<a href="{{ Url::asset('hrdstaff/detail-lamaran/'.$lamaran->idlamaran) }}" class="btn btn-blue" rel="tooltip" title="Detail Resume"><i class="icon-tasks"></i></a>
													</center>
												</td>
											</tr>
											<?php $i++; ?>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<div id="dialogEdit" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">

</div> 


@stop
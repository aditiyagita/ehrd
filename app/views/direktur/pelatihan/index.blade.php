@extends('master')

@section('content')

<script type="text/javascript">
	 $(document).ready(function() { 
        $("#okHapus").click(function() {  
            var i = $("#id").val();
            var url = "pelatihan/delete/"+i;    
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
		@include('direktur.left')
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
							<a href="{{Url::asset('hrdstaff/')}}">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="{{Url::asset('hrdstaff/pelatihan')}}">Pelatihan</a>
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
											<th width="10%">Tanggal Mulai</th>
											<th width="10%">Tanggal Selesai</th>
											<th width="40%">Judul</th>
											<th width="10%">Kuota</th>
											<th width="10%" class='hidden-480 width="20%'>Operasi</th>
										</tr>
									</thead>
									<tbody>
										<?php $i=1; ?>
										@foreach($data['pelatihan'] as $pelatihan)
										@if($pelatihan->status == 3)
											<tr>
												<td><center>{{ $i }}</center></td>
												<td>{{ date("d M Y", strtotime($pelatihan->tanggalmulai)) }}</td>
												<td>{{ date("d M Y", strtotime($pelatihan->tanggalselesai)) }}</td>
												<td>{{ $pelatihan->judul }}</td>
												<td>{{ $pelatihan->kuota }}</td>
												<td class='hidden-480'>
													<center>
														<a href="{{ Url::asset('direktur/cetak-pelatihan/'.$pelatihan->idpelatihan.'') }}" class="btn btn-blue" rel="tooltip" title="Detail"><i class="icon-print"></i></a>
													</center>
												</td>
											</tr>
											<?php $i++; ?>
										@endif
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

@stop
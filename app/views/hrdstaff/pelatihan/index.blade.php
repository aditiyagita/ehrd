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
		@include('hrdstaff.left')
		<div id="main">
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>Pelatihan</h1>
					</div>
					<div class="pull-right"  style="padding-top:15px">
						<a href="{{ Url::asset('hrdstaff/pelatihan/create') }}" role="button" class="btn btn-brown btn-large"><i class="icon-plus"></i>Tambah Pelatihan</a>
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
											<th width="10%">Status</th>
											<th width="10%" class='hidden-480 width="20%'>Operasi</th>
										</tr>
									</thead>
									<tbody>
										<?php $i=1; ?>
										@foreach($data['pelatihan'] as $pelatihan)
											<tr>
												<td><center>{{ $i }}</center></td>
												<td>{{ date("d M Y", strtotime($pelatihan->tanggalmulai)) }}</td>
												<td>{{ date("d M Y", strtotime($pelatihan->tanggalselesai)) }}</td>
												<td>{{ $pelatihan->judul }}</td>
												<td>{{ $pelatihan->kuota }}</td>
												<td>
													@if($pelatihan->status == 3)
														<span class="label label-satgreen">Sudah Dibayar</span>
													@elseif($pelatihan->status == 2)	
														<span class="label">Sudah Disetujui</span>
													@elseif($pelatihan->status == 4)	
														<span class="label label-lightred">Tidak Disetujui</span>
													@else
														<span class="label label-lightblue">Belum Disetujui</span>
													@endif
												</td>
												<td class='hidden-480'>
													<center>
														<a href="{{ Url::asset('hrdstaff/pelatihan/'.$pelatihan->idpelatihan.'') }}" class="btn" rel="tooltip" title="Detail"><i class="icon-search"></i></a>
														<a href="{{ Url::asset('hrdstaff/pelatihan/'.$pelatihan->idpelatihan.'/edit') }}" class="btn btn-blue" rel="tooltip" title="Edit"><i class="icon-edit"></i></a>
														<a href="javascript:hapusAction({{ $pelatihan->idpelatihan }})" class="btn btn-red" rel="tooltip" title="Delete"><i class="icon-remove"></i></a>
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

<div id="dialogHapus" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
	<div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
	    <h3 id="myModalLabel1">Konfirmasi</h3>
	</div>
	<div class="modal-body">
	    Apakah yakin untuk menghapus?
	    <input type="hidden" id="id" />
	</div>
	<div class="modal-footer">
	    <button class="btn btn-green" data-dismiss="modal" aria-hidden="true">Tidak</button>
	    <button class="btn btn-red" id="okHapus">Ya</button>
	</div>
</div>

@stop
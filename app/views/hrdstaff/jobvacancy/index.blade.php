@extends('master')

@section('content')

<script type="text/javascript">
	 $(document).ready(function() { 
        $("#okHapus").click(function() {  
            var i = $("#id").val();
            var url = "job-vacancy/delete/"+i;    
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
						<h1>Lowongan</h1>
					</div>
					<div class="pull-right" style="padding-top:15px">
						<a href="{{ Url::asset('hrdstaff/job-vacancy/create') }}" role="button" class="btn btn-brown btn-large"><i class="icon-plus"></i>Tambah Job Vacancy</a>
					</div>
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="{{Url::asset('hrdstaff/')}}">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="{{Url::asset('hrdstaff/job-vacancy')}}">Lowongan</a>
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
					<div class="span12">
						<div class="box">
							<div class="box-title">
							</div>
							<div class="box-content nopadding">
								<table class="table table-hover table-nomargin dataTable table-bordered">
									<thead>
										<tr>
											<th width="5%">No</th>
											<th width="20%">Batas Akhir</th>
											<th width="40%">Judul</th>
											<th width="15%">Department</th>
											<th class='hidden-480 width="20%'>Operasi</th>
										</tr>
									</thead>
									<tbody>
										<?php $i=1; ?>
										@foreach($data['jobvacancy'] as $jobvacancy)
											<tr>
												<td><center>{{ $i }}</center></td>
												<td>{{ date("d M Y", strtotime($jobvacancy->tanggalakhir)) }}</td>
												<td>{{ $jobvacancy->judul }}</td>
												<td>{{ $jobvacancy->department->department }}</td>
												<td class='hidden-480'>
													<center>
														<a href="{{ Url::asset('hrdstaff/job-vacancy/'.$jobvacancy->idlowongan) }}" class="btn" rel="tooltip" title="Detail"><i class="icon-search"></i></a>
														<a href="{{ Url::asset('hrdstaff/job-vacancy/'.$jobvacancy->idlowongan.'/edit') }}" class="btn btn-green" rel="tooltip" title="Edit"><i class="icon-edit"></i></a>
														<a href="javascript:hapusAction({{ $jobvacancy->idlowongan }})" class="btn btn-red" rel="tooltip" title="Delete"><i class="icon-remove"></i></a>
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

<div id="modal-1" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h3 id="myModalLabel1">Input Agama</h3>
    </div>
    {{ Form::open(array('route' => 'hrdstaff.job-vacancy.store', 'class' => 'form-horizontal')) }}
    <div class="modal-body">
        <div class="control-group">
            <label class="control-label">Agama</label>
            <div class="controls">
                <input class="input-block-level" type="text" name="agama" required>
            </div>
        </div>
    </div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		<button class="btn btn-primary">Save changes</button>
	</div>
    {{ Form::close() }}
</div>

<div id="dialogEdit" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">

</div> 

@stop
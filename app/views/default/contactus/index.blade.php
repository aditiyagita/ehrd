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
						<h1>Fixed layout</h1>
					</div>
					<div class="pull-right">
						<ul class="minitiles">
							<li class='grey'>
								<a href="#"><i class="icon-cogs"></i></a>
							</li>
							<li class='lightgrey'>
								<a href="#"><i class="icon-globe"></i></a>
							</li>
						</ul>
						<ul class="stats">
							<li class='satgreen'>
								<i class="icon-money"></i>
								<div class="details">
									<span class="big">$324,12</span>
									<span>Balance</span>
								</div>
							</li>
							<li class='lightred'>
								<i class="icon-calendar"></i>
								<div class="details">
									<span class="big">February 22, 2013</span>
									<span>Wednesday, 13:56</span>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="more-login.html">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="layouts-sidebar-hidden.html">Layouts</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="layouts-fixed.html">Fixed layout</a>
						</li>
					</ul>
					<div class="close-bread">
						<a href="#"><i class="icon-remove"></i></a>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12" style="padding-top:20px">
						<a href="{{ Url::asset('hrdstaff/job-vacancy/create') }}" role="button" class="btn btn-brown btn-large"><i class="icon-plus"></i>Tambah Job Vacancy</a>
						<div class="box box-color box-bordered lightgrey">
							<div class="box-title">
								<h3>
									<i class="icon-table"></i>
									Job Vacancy
								</h3>
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
												<td>{{ date("d M Y", strtotime($jobvacancy->tanggal_akhir)) }}</td>
												<td>{{ $jobvacancy->judul }}</td>
												<td>{{ $jobvacancy->department->department }}</td>
												<td class='hidden-480'>
													<center>
														<a href="#" class="btn" rel="tooltip" title="Detail"><i class="icon-search"></i></a>
														<a href="{{ Url::asset('hrdstaff/job-vacancy/'.$jobvacancy->idjobvacancy.'/edit') }}" class="btn btn-green" rel="tooltip" title="Edit"><i class="icon-edit"></i></a>
														<a href="javascript:hapusAction({{ $jobvacancy->idjobvacancy }})" class="btn btn-red" rel="tooltip" title="Delete"><i class="icon-remove"></i></a>
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
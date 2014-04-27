@extends('master')

@section('content')

<script type="text/javascript">
	 $(document).ready(function() { 
        $("#okHapus").click(function() {  
            var i = $("#id").val();
            var url = "cuti/delete/"+i;    
            $(location).attr('href',url);
        });
    });
	function hapusAction(data){
        $("#id").val(data);
        $('#dialogHapus').modal('show');
    } 
</script>

<body>
	@include('menu')
	</div>
	<div class="container-fluid" id="content"> <!-- <div class="container-fluid nav-hidden" id="content"> -->
		@include('hrdmanager.left')
		<div id="main">
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>Pengunduran Diri</h1>
					</div>
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="{{Url::asset('/')}}">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="{{Url::asset('hrdmanager/pengunduran-diri')}}">Pengunduran Diri</a>
						</li>
					</ul>
					<div class="close-bread">
						<a href="#"><i class="icon-remove"></i></a>
					</div>
				</div>
				@if($cek = Session::get('success'))
					<div class="alert alert-success" style="margin-top:15px">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Berhasil!</strong>
                        {{ Session::get('success') }}
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
											<th width="15%">Tanggal</th>
											<th width="10%">No. Karyawan</th>
											<th width="20%">Nama Lengkap</th>
											<th width="25%">Department</th>
											<th width="15%">Status</th>
											<th width="25%">Operasi</th>
										</tr>
									</thead>
									<tbody>
										<?php $i=1; ?>
										@foreach($data['pengunduran'] as $pengunduran)
											<tr>
												<td><center>{{ $i }}</center></td>
												<td>{{ date("d M Y", strtotime($pengunduran->tanggalsurat)) }}</td>
												<td>{{ $pengunduran->karyawan->nokaryawan }}</td>
												<td>{{ $pengunduran->karyawan->user->nama_lengkap }}</td>
												<td>{{ $pengunduran->karyawan->department->department }}</td>
												<td>
													@if($pengunduran->status == 2)
														<span class="label label-lightred">Sudah Disetujui</span>
													@elseif($pengunduran->status == 1)
														<span class="label label-satgreen">Tidak Disetujui</span>
													@else
														<span class="label">Belum Disetujui</span>
													@endif
												</td>
												<td class='hidden-480'>
													<center>
														@if(($pengunduran->status == 2) OR ($pengunduran->status == 1))
														
														@else
															<a href="{{ URL::asset('hrdmanager/pengunduran-diri/'.$pengunduran->idpengundurandiri.'/approve') }}" class="btn btn-red" rel="tooltip" title="Approve Pengunduran Diri"><i class="icon-ok-sign"></i></a>
															<a href="{{ URL::asset('hrdmanager/pengunduran-diri/'.$pengunduran->idpengundurandiri.'/unapprove') }}" class="btn btn-blue" rel="tooltip" title="Unapprove Pengunduran Diri"><i class="icon-ban-circle"></i></a>
														@endif
														<a href="{{ URL::asset('hrdmanager/pengunduran-diri/'.$pengunduran->idpengundurandiri ) }}" class="btn" rel="tooltip" title="Detail Pengunduran Diri"><i class="icon-search"></i></a>
														
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
	    Apakah yakin untuk membatalkan cuti?
	    <input type="hidden" id="id" />
	</div>
	<div class="modal-footer">
	    <button class="btn btn-green" data-dismiss="modal" aria-hidden="true">Tidak</button>
	    <button class="btn btn-red" id="okHapus">Ya</button>
	</div>
</div>

@stop
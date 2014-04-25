@extends('master')

@section('content')
<!-- Datepicker -->
{{ HTML::style('assets/css/plugins/datepicker/datepicker.css') }}
<!-- Datepicker -->
{{ HTML::script('assets/js/plugins/datepicker/bootstrap-datepicker.js') }}
<script type="text/javascript">
      var i = 0;       
 
      function tambah(){
      	i++;
        var addNama = "<input type='text' name='namaanak[]' id='nama' placeholder='Nama Anak' class='input-block-level' data-rule-required='true' required>";
        var addUmur = "<input type='text' name='umuranak[]' id='umur' placeholder='Umur' class='input-block-level' data-rule-required='true' required>";
        var labelNama = '<label for="nama" class="control-label">Nama Anak</label>';
        var labelUmur = '<label for="umur" class="control-label">Umur</label>';
        $("#anak").append("<div id='"+i+"'><div class='control-group "+i+"'>"+labelNama+"<div class='controls'>"+addNama+"</div></div><div class='control-group "+i+"'>"+labelUmur+"<div class='controls'>"+addUmur+"</div></div></div>");
       
      };
 
      function kurang() {
        if(i>0){
          $("#"+i).remove();
          i--;
        } else {
          i = 1;
        }
      };
    </script>
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
								<a href="{{Url::asset('keluarga')}}">Keterangan Keluarga</a>
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
									<h4>Keterangan Keluarga</h4>
 									{{ Form::model($data["keluarga"], array('method' => 'PATCH', 'class' => 'form-horizontal', 'route' => array('keluarga.update', $data["keluarga"]->idkeluarga))) }}
            						{{ Form::hidden('idkeluarga', $data['keluarga']->idkeluarga) }}
										<div class="control-group">
											<label for="suamiistri" class="control-label">Nama Suami / Istri</label>
											<div class="controls">
												<input type="text" value="{{$data['keluarga']->suamiistri}}" name="suamiistri" id="suamiistri" placeholder="Nama Suami / Istri" class="input-block-level" data-rule-required="true">
											</div>
										</div>
										<div class="control-group">
											<label for="umur" class="control-label">Umur</label>
											<div class="controls">
												<input type="text" value="{{$data['keluarga']->umur}}" name="umur" id="umur" placeholder="Umur" class="input-block-level" data-rule-number="true" data-rule-required="true">
											</div>
										</div>
										<div class="control-group">
											<label for="pekerjaan" class="control-label">Pekerjaan</label>
											<div class="controls">
												<input type="text" value="{{$data['keluarga']->pekerjaan}}" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan" class="input-block-level" data-rule-required="true">
											</div>
										</div>
										<div id="anak">

										</div>
										<div class="control-group" style="float:right">
											<button type="submit" class="btn btn-primary">Save changes</button>
											<a id="tambah" class="btn btn-primary" onclick="tambah();">Add Anak</a>
            								<a id="kurang" class="btn btn-primary" onclick="kurang();">Batal Add Anak</a>
										</div>
									{{Form::close()}}			
									<br>
									<table id="detailRetur" class="table table-hover table-nomargin">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama</th>
												<th class='hidden-350'>Umur</th>
												<th class='hidden-480' width=5%></th>
											</tr>
										</thead>
										<tbody>
											<?php $i=1; ?>
											@if((count($data['keluarga']->anak)) > 0)
												@foreach($data['keluarga']->anak as $anak)
													<tr>
														<td>{{ $i }}</td>
														<td class='hidden-1024'>{{ $anak->nama }}</td>
														<td>{{ $anak->umur }}</td>
														<td class='hidden-480'>
															<a class="btn" href="{{ URL::asset('anak/delete/'.$anak->idanak) }}" data-original-title="Delete">
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
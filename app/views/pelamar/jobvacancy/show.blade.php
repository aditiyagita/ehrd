@extends('master')

@section('content')
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
								<a href="{{Url::asset('job-vacancy')}}">Lowongan Kerja</a>
								<i class="icon-angle-right"></i>
							</li>
							<li>
								<a href="#">{{ ucfirst($data['jobvacancy']->judul) }}</a>
							</li>
						</ul>
						<div class="close-bread">
							<a href="#"><i class="icon-remove"></i></a>
						</div>
					</div>
					@if($errors->any())
					<div class="alert alert-error" style="margin-top:15px">
						<button type="button" class="close" data-dismiss="alert">×</button>
						<strong>Error!</strong> {{$errors->first()}}
					</div>
					@endif
					<div class="row-fluid">
						<div class="span9">
							<div class="box">
								<div class="box-title">
									<h3><i class="icon-list"></i> {{ ucfirst($data['jobvacancy']->judul) }}</h3>
								</div>
							</div>
							<div class="row-fluid">
								<div class="blog-list-post">
									<div class="preview-img">
										<a href="more-blog-post.html"><img src="{{ Url::asset('assets/images/jobvacancy/'.$data['jobvacancy']->foto) }}" width="100%" alt=""></a>
									</div>
									<div class="post-content">
										<h4 class="post-title">
											<a href="#"></a>
										</h4>
										<div class="post-meta">
											<span class="date">
												<i class="icon-calendar"></i> {{ date("d M Y", strtotime($data['jobvacancy']->tanggal_akhir)) }}
											</span>
											@if(Auth::check())
											<span class="comments">
												<i class="icon-user"></i> <a href="#">
												{{ count($data['jobvacancy']->lamaran) }} Pelamar
											</a>
											</span>
											@endif
											<span class="tags">
												<i class="icon-tag"></i>
												<a href="#">{{ $data['jobvacancy']->department->department }}</a>
											</span>
										</div>
										<div class="post-text">
											{{ $data['jobvacancy']->uraian }}
										</div>
									</div>
									<div class="post-comments">

									</div>
								</div>
								@if(Session::has('user'))
									@if($data['ceklamaran'] > 0)
									<div style="float:right; margin:5px">
										<h3>Anda Sudah Melamar Lowongan Ini</h3><!-- 
										<a href="#" role="button" class="btn btn-blue btn-large" data-toggle="modal">
											<i class="icon-envelope"></i> Cek Status Lamaran
										</a> -->
									</div>
									@else
									<div style="float:right; margin:5px">
										<a href="#modal-1" role="button" class="btn btn-blue btn-large" data-toggle="modal">
											<i class="icon-envelope"></i> Lamar Sekarang
										</a>
									</div>
									@endif
								@endif
							</div>

						</div>
						<div class="span3">
							@include('pelamar.widget')
						</div>
					</div>
				</div>
			</div>
		</div>
			
		</body>

<div id="modal-1" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h3 id="myModalLabel1">Lamar Pekerjaan</h3>
    </div>
{{ Form::open(array('route' => 'job-vacancy.store', 'class' => 'form-horizontal')) }}
    <div class="modal-body">
        <div class="control-group">
            <label class="control-label">Gaji Yang Diharapkan</label>
            <div class="controls">
                <input class="input-block-level" type="text" name="gaji" data-rule-number="true" data-rule-required="true">
                <input name="id" type="hidden" value="{{$data['id']}}">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Mulai Bekerja</label>
            <div class="controls">
            	<select name="tanggal" class="span1">
            		<option value="" SELECTED>Hari</option>
            		@for($i=1; $i<32; $i++)
	            		@if(date('d')-1 < $i)
	            			<option value="{{$i}}">{{$i}}</option>
	            		@endif
            		@endfor
            	</select>
            	<select name="bulan" class="span2">
            		<option value="" SELECTED>Bulan</option>
            		<?php $i=0; ?>
            		@foreach($data['bulan'] as $bulan)
	            		@if(date('m')-2 < $i)
	            			<option value="{{$i}}">{{$bulan}}</option>
	            		@endif
            			<?php $i++; ?>
            		@endforeach
            	</select>
            	<select name="tahun" class="span1">
            		<option value="" SELECTED>Tahun</option>
            		@for($i=(date('Y')); $i<(date('Y')+2); $i++)
            			<option value="{{$i}}">{{$i}}</option>
            		@endfor
            	</select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Alasan</label>
            <div class="controls">
                <textarea class="input-block-level" name="alasan"></textarea>
            </div>
        </div>
    </div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		<button class="btn btn-primary">Apply Lowongan</button>
	</div>
{{ Form::close() }}
</div>

@stop
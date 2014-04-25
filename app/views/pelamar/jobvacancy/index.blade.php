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
									<h3><i class="icon-list"></i> Lowongan Kerja</h3>
								</div>
							</div>
							@foreach($data['jobvacancy'] as $jobvacancy)
							<div class="row-fluid">
								<div class="blog-list-post small">
									<div class="preview-img span3">
										<a href="{{URL::asset('job-vacancy/'.$jobvacancy->idlowongan)}}"><img src="{{ Url::asset('assets/images/jobvacancy/'.$jobvacancy->foto) }}" alt=""></a>
									</div>
									<div class="post-content span9">
										<h4 class="post-title">
											<a href="{{URL::asset('job-vacancy/'.$jobvacancy->idlowongan)}}">{{ ucfirst($jobvacancy->judul) }}</a>
										</h4>
										<div class="post-meta">
											<span class="date">
												<i class="icon-calendar"></i> {{ date("d M Y", strtotime($jobvacancy->tanggalakhir)) }}
											</span>
											<span class="comments">
												<i class="icon-comments"></i> <a href="#">{{ count($jobvacancy->lamaran) }} Pelamar</a>
											</span>
											<span class="tags">
												<i class="icon-tag"></i>
												<a href="#">{{ $jobvacancy->department->department }}</a>
											</span>
										</div>
										<div class="post-text">
											<p>{{ str_replace(array('<h1>','</h1>','<h2>','</h2>','</br>','<ol>','</ol>','<li>','</li>'), ' ', $jobvacancy->uraian) }}</p>
										</div>
									</div>
								</div>
							</div>
							@endforeach

						</div>
						<div class="span3">
							@include('pelamar.widget')
						</div>
					</div>
				</div>
			</div>
		</div>
			
		</body>

@stop
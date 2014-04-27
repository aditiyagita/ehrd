@extends('master')

@section('content')
<body>
	@include('menu')
	</div>
	<div class="container-fluid" id="content"> <!-- <div class="container-fluid nav-hidden" id="content"> -->
		@include('direktur.left')
		<div id="main">
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>Selamat Datang</h1>
					</div>
					<div class="pull-right">
						<ul class="stats">
							<li class='lightred'>
								<i class="icon-calendar"></i>
								<div class="details">
									<span class="big">{{ date('d F Y') }}</span>
									<span>{{ date('l') }}</span>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="#">Home</a>
						</li>
						
					</ul>
					<div class="close-bread">
						<a href="#"><i class="icon-remove"></i></a>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						
					</div>
				</div>
			</div>
		</div>
	</div>
@stop
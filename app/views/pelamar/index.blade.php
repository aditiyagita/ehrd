@extends('master')

@section('content')
		<script type="text/javascript">
			$(document).ready(function(){
				$('.carousel').carousel({
				  interval: 3000
				})
			});
		</script>
		<body data-layout="fixed">
		@include('menu')
		<div class="container-fluid nav-hidden" id="content">
			<div id="main">
				<div class="container-fluid">
					<div class="page-header">
						@include('pelamar.pageheader')
					</div>
					<div class="row-fluid">
				      <div class="span12">
				        <div id="myCarousel" class="carousel slide">
				            <!-- Carousel items -->
				            <div class="carousel-inner">
				                <div class="active item">
				                    <img src="{{Url::asset('assets/img/satu.jpg')}}" width=100%>
				                </div>
				                <div class="item">
				                    <img src="{{Url::asset('assets/img/dua.jpg')}}" width=100%>
				                </div>
				                <div class="item">
				                    <img src="{{Url::asset('assets/img/tiga.jpg')}}" width=100%>
				                </div>
				            </div>
				            <!-- Carousel nav -->
				            <a class="carousel-control left" href="#myCarousel" data-slide="prev">‹</a>
				            <a class="carousel-control right" href="#myCarousel" data-slide="next">›</a>
				        </div>
				    </div>
				    <div class="row-fluid">
				    	<div class="span12">

				    	</div>
				    </div>
				</div>
			</div>
		</div>
			
		</body>

@stop
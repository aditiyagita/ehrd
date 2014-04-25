@extends('master')

@section('content')
		<script type="text/javascript">
			$('.carousel').carousel({
			  interval: 3000
			})
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
								<a href="more-login.html">Home</a>
								<i class="icon-angle-right"></i>
							</li>
							<li>
								<a href="more-files.html">Pages</a>
								<i class="icon-angle-right"></i>
							</li>
							<li>
								<a href="more-blank.html">Blank page</a>
							</li>
						</ul>
						<div class="close-bread">
							<a href="#"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="row-fluid">
						<div class="span9">
							<div class="row-fluid">
								<div class="blog-list-post">
									<div class="preview-img">
										<a href="more-blog-post.html"><img src="{{ Url::asset('assets/img/demo/big/blog-1.jpg') }}" alt=""></a>
									</div>
									<div class="post-content">
										<h4 class="post-title">
											<a href="#">{{ $data['contactus']->judul }}</a>
										</h4>
										<div class="post-meta">
											<span class="date">
												<i class="icon-calendar"></i> July 5, 2013
											</span>
											<span class="comments">
												<i class="icon-comments"></i> <a href="#">5 comments</a>
											</span>
											<span class="tags">
												<i class="icon-tag"></i>
												<a href="#">ui</a>
												<a href="#">flat</a>
												<a href="#">clean</a>
											</span>
											<span class="author">
												<i class="icon-user"></i> <a href="#">eakroko</a>
											</span>
										</div>
										<div class="post-text">
											<p>{{ $data['contactus']->uraian }}</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="span3">
							<div class="blog-widget">
								<h4 class='blog-widget-title'>Related posts</h4>
								<ul class="blog-widget-recent-posts">
									<li>
										<a href="more-blog-post.html">
											Lorem ipsum Ex proident
											<span class="details">
												<span class="date"><i class="icon-calendar"></i>July 5, 2013</span>
												<span class="tags"><i class="icon-tag"></i>lorem,ipsum</span>
											</span>
										</a>
									</li>
									<li>
										<a href="more-blog-post.html">
											Incididunt nisi nostrud
											<span class="details">
												<span class="date"><i class="icon-calendar"></i>July 4, 2013</span>
												<span class="tags"><i class="icon-tag"></i>ui,css</span>
											</span>
										</a>
									</li>
									<li>
										<a href="more-blog-post.html">
											Ex dolore ut laborum
											<span class="details">
												<span class="date"><i class="icon-calendar"></i>July 3, 2013</span>
												<span class="tags"><i class="icon-tag"></i>html5,flat</span>
											</span>
										</a>
									</li>
									<li>
										<a href="more-blog-post.html">
											Do sunt nisi dolore velit
											<span class="details">
												<span class="date"><i class="icon-calendar"></i>July 1, 2013</span>
												<span class="tags"><i class="icon-tag"></i>metro,clean</span>
											</span>
										</a>
									</li>
								</ul>
							</div>
							<div class="blog-widget">
								<h4 class='blog-widget-title'>Latest photos</h4>
								<ul class="blog-widget-latest-photos">
									<li>
										<a href="#"><img src="img/demo/1.jpg" alt=""></a>
									</li>
									<li>
										<a href="#"><img src="img/demo/2.jpg" alt=""></a>
									</li>
									<li>
										<a href="#"><img src="img/demo/3.jpg" alt=""></a>
									</li>
									<li>
										<a href="#"><img src="img/demo/4.jpg" alt=""></a>
									</li>
									<li>
										<a href="#"><img src="img/demo/5.jpg" alt=""></a>
									</li>
									<li>
										<a href="#"><img src="img/demo/6.jpg" alt=""></a>
									</li>

								</ul>
							</div>
							<div class="blog-widget">
								<h4 class='blog-widget-title'>Categories</h4>
								<ul class="blog-widget-categories">
									<li><a href="#">Business</a></li>
									<li><a href="#">Health</a></li>
									<li><a href="#">Development</a></li>
									<li><a href="#">Sports</a></li>
								</ul>
							</div>
							<div class="blog-widget">
								<h4 class='blog-widget-title'>Tags</h4>
								<ul class="blog-widget-tags">
									<li><a href="#">flat</a></li>
									<li><a href="#">ui</a></li>
									<li><a href="#">metro</a></li>
									<li><a href="#">windows 8</a></li>
									<li><a href="#">clean</a></li>
									<li><a href="#">easy</a></li>
									<li><a href="#">customizable</a></li>
								</ul>
							</div>
						</div>
					</div>
			</div>
		</div>
			
		</body>

@stop
@extends('master')

@section('content')
		<body data-layout="fixed">
		@include('menu')
		<div class="container-fluid nav-hidden" id="content">
			<div id="left">
				<form action="search-results.html" method="GET" class='search-form'>
					<div class="search-pane">
						<input type="text" name="search" placeholder="Search here...">
						<button type="submit"><i class="icon-search"></i></button>
					</div>
				</form>
				<div class="subnav">
					<div class="subnav-title">
						<a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>Content</span></a>
					</div>
					<ul class="subnav-menu">
						<li class='dropdown'>
							<a href="#" data-toggle="dropdown">Articles</a>
							<ul class="dropdown-menu">
								<li>
									<a href="#">Action #1</a>
								</li>
								<li>
									<a href="#">Antoher Link</a>
								</li>
								<li class='dropdown-submenu'>
									<a href="#" data-toggle="dropdown" class='dropdown-toggle'>Go to level 3</a>
									<ul class="dropdown-menu">
										<li>
											<a href="#">This is level 3</a>
										</li>
										<li>
											<a href="#">Unlimited levels</a>
										</li>
										<li>
											<a href="#">Easy to use</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">News</a>
						</li>
						<li>
							<a href="#">Pages</a>
						</li>
						<li>
							<a href="#">Comments</a>
						</li>
					</ul>
				</div>
				<div class="subnav">
					<div class="subnav-title">
						<a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>Plugins</span></a>
					</div>
					<ul class="subnav-menu">
						<li>
							<a href="#">Cache manager</a>
						</li>
						<li class='dropdown'>
							<a href="#" data-toggle="dropdown">Import manager</a>
							<ul class="dropdown-menu">
								<li>
									<a href="#">Action #1</a>
								</li>
								<li>
									<a href="#">Antoher Link</a>
								</li>
								<li class='dropdown-submenu'>
									<a href="#" data-toggle="dropdown" class='dropdown-toggle'>Go to level 3</a>
									<ul class="dropdown-menu">
										<li>
											<a href="#">This is level 3</a>
										</li>
										<li>
											<a href="#">Unlimited levels</a>
										</li>
										<li>
											<a href="#">Easy to use</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">Contact form generator</a>
						</li>
						<li>
							<a href="#">SEO optimization</a>
						</li>
					</ul>
				</div>
				<div class="subnav">
					<div class="subnav-title">
						<a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>Settings</span></a>
					</div>
					<ul class="subnav-menu">
						<li>
							<a href="#">Theme settings</a>
						</li>
						<li class='dropdown'>
							<a href="#" data-toggle="dropdown">Page settings</a>
							<ul class="dropdown-menu">
								<li>
									<a href="#">Action #1</a>
								</li>
								<li>
									<a href="#">Antoher Link</a>
								</li>
								<li class='dropdown-submenu'>
									<a href="#" data-toggle="dropdown" class='dropdown-toggle'>Go to level 3</a>
									<ul class="dropdown-menu">
										<li>
											<a href="#">This is level 3</a>
										</li>
										<li>
											<a href="#">Unlimited levels</a>
										</li>
										<li>
											<a href="#">Easy to use</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">Security settings</a>
						</li>
					</ul>
				</div>
				<div class="subnav subnav-hidden">
					<div class="subnav-title">
						<a href="#" class='toggle-subnav'><i class="icon-angle-right"></i><span>Default hidden</span></a>
					</div>
					<ul class="subnav-menu">
						<li>
							<a href="#">Menu</a>
						</li>
						<li class='dropdown'>
							<a href="#" data-toggle="dropdown">With submenu</a>
							<ul class="dropdown-menu">
								<li>
									<a href="#">Action #1</a>
								</li>
								<li>
									<a href="#">Antoher Link</a>
								</li>
								<li class='dropdown-submenu'>
									<a href="#" data-toggle="dropdown" class='dropdown-toggle'>More stuff</a>
									<ul class="dropdown-menu">
										<li>
											<a href="#">This is level 3</a>
										</li>
										<li>
											<a href="#">Easy to use</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">Security settings</a>
						</li>
					</ul>
				</div>
			</div>
			<div id="main">
				<div class="container-fluid">
					<div class="page-header">
						<div class="pull-left">
							<h1>Blog list big image</h1>
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
								<div class="blog-list-post small">
									<div class="preview-img span3">
										<a href="more-blog-post.html"><img src="img/demo/big/2.jpg" alt=""></a>
									</div>
									<div class="post-content span9">
										<h4 class="post-title">
											Home
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
											<p>Lorem ipsum Do commodo Excepteur mollit officia veniam occaecat fugiat ullamco officia labore Ut cupidatat. Lorem ipsum Veniam non ut tempor occaecat exercitation culpa ullamco id. Lorem ipsum Dolore incididunt Duis ullamco sed commodo sit id. Lorem ipsum Commodo nisi Excepteur Ut dolore sit occaecat aute reprehenderit ullamco elit. Lorem ipsum In velit deserunt ex dolore deserunt dolor cupidatat ea.</p>
											<p>Lorem ipsum Laborum non enim et laboris esse ut sunt non in ex in est.</p>
										</div>
									</div>
								</div>
							</div>
							<div class="row-fluid">
								<div class="blog-list-post small">
									<div class="preview-img span3">
										<a href="more-blog-post.html"><img src="img/demo/big/3.jpg" alt=""></a>
									</div>
									<div class="post-content span9">
										<h4 class="post-title">
											<a href="#">Lorem ipsum Pariatur labore magna!</a>
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
											<p>Lorem ipsum Do commodo Excepteur mollit officia veniam occaecat fugiat ullamco officia labore Ut cupidatat. Lorem ipsum Veniam non ut tempor occaecat exercitation culpa ullamco id. Lorem ipsum Dolore incididunt Duis ullamco sed commodo sit id. Lorem ipsum Commodo nisi Excepteur Ut dolore sit occaecat aute reprehenderit ullamco elit. Lorem ipsum In velit deserunt ex dolore deserunt dolor cupidatat ea.</p>
											<p>Lorem ipsum Laborum non enim et laboris esse ut sunt non in ex in est.</p>
										</div>
									</div>
								</div>
							</div>
							<div class="row-fluid">
								<div class="blog-list-post small">
									<div class="preview-img span3">
										<a href="more-blog-post.html"><img src="backend/img/demo/big/4.jpg" alt=""></a>
									</div>
									<div class="post-content span9">
										<h4 class="post-title">
											<a href="#">Lorem ipsum Pariatur labore magna!</a>
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
											<p>Lorem ipsum Do commodo Excepteur mollit officia veniam occaecat fugiat ullamco officia labore Ut cupidatat. Lorem ipsum Veniam non ut tempor occaecat exercitation culpa ullamco id. Lorem ipsum Dolore incididunt Duis ullamco sed commodo sit id. Lorem ipsum Commodo nisi Excepteur Ut dolore sit occaecat aute reprehenderit ullamco elit. Lorem ipsum In velit deserunt ex dolore deserunt dolor cupidatat ea.</p>
											<p>Lorem ipsum Laborum non enim et laboris esse ut sunt non in ex in est.</p>
										</div>
									</div>
								</div>
							</div>
							<div class="row-fluid">
								<div class="blog-list-post small">
									<div class="preview-img span3">
										<a href="more-blog-post.html"><img src="backend/backend/img/demo/big/5.jpg" alt=""></a>
									</div>
									<div class="post-content span9">
										<h4 class="post-title">
											<a href="#">Lorem ipsum Pariatur labore magna!</a>
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
											<p>Lorem ipsum Do commodo Excepteur mollit officia veniam occaecat fugiat ullamco officia labore Ut cupidatat. Lorem ipsum Veniam non ut tempor occaecat exercitation culpa ullamco id. Lorem ipsum Dolore incididunt Duis ullamco sed commodo sit id. Lorem ipsum Commodo nisi Excepteur Ut dolore sit occaecat aute reprehenderit ullamco elit. Lorem ipsum In velit deserunt ex dolore deserunt dolor cupidatat ea.</p>
											<p>Lorem ipsum Laborum non enim et laboris esse ut sunt non in ex in est.</p>
										</div>
									</div>
								</div>
							</div>

						</div>
						<div class="span3">
							<div class="blog-widget">
								<h4 class='blog-widget-title'>Recent posts</h4>
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
										<a href="#"><img src="backend/img/demo/1.jpg" alt=""></a>
									</li>
									<li>
										<a href="#"><img src="backend/img/demo/2.jpg" alt=""></a>
									</li>
									<li>
										<a href="#"><img src="backend/img/demo/3.jpg" alt=""></a>
									</li>
									<li>
										<a href="#"><img src="backend/img/demo/4.jpg" alt=""></a>
									</li>
									<li>
										<a href="#"><img src="backend/img/demo/5.jpg" alt=""></a>
									</li>
									<li>
										<a href="#"><img src="backend/img/demo/6.jpg" alt=""></a>
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
			</div></div>
			
		</body>

@stop
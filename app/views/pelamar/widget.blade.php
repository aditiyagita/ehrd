<div class="blog-widget">
								<h4 class='blog-widget-title'>Lowongan Terbaru</h4>
								<ul class="blog-widget-recent-posts">
									@foreach($data['jobwidget'] as $jobwidget)
									<li>
										<a href="{{URL::asset('job-vacancy/'.$jobwidget->idlowongan)}}">
											{{ucfirst($jobwidget->judul)}}
											<span class="details">
												<span class="date"><i class="icon-calendar"></i>{{ date("d M Y", strtotime($jobwidget->tanggalakhir)) }}</span>
												<span class="tags"><i class="icon-tag"></i>{{ $jobwidget->department->department }}</span>
											</span>
										</a>
									</li>
									@endforeach
								</ul>
							</div>
							
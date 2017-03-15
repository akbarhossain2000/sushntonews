<?php
	get_header();
?>	

	<!--==================================
	=            START SLIDER            =
	===================================-->
	<section class="newedge-slider default img-overlay">
		<div class="newedge-slider-content">
		    <div id="main-slider" class="carousel slide" data-ride="carousel">
			<?php 
				$slider_args = array(
					'post_type'	=> 'slider_post',
					'posts_per_page'=> 5,
				);
				
				$slider_data	= new WP_Query($slider_args);
				
				if($slider_data->have_posts()):
			?>
		        <div class="carousel-inner" role="listbox">
				<?php
					while($slider_data->have_posts()): $slider_data->the_post();
					
					$s_img_id	= get_post_thumbnail_id();
					$s_img_url	= wp_get_attachment_image_src($s_img_id, 'slider-image', true);
				?>
		            <div class="item <?php if($slider_data->current_post == 0){ ?> active <?php } ?>" style="background-image: url(<?php echo $s_img_url[0]; ?>);">
						<!--<img src="<?php //echo $s_img_url[0]; ?>" alt="" />-->
					</div>
				<?php
					endwhile;
				?>
		        </div> <!-- //carousel-inner -->
			<?php
				endif;
				wp_reset_postdata();
			?>
		        <div class="container">
		        	<div class="customNavigation carousel-controls">
		        		<a class="left" data-target="#main-slider" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
		        		<a class="right" data-target="#main-slider" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
		        	</div>
		        </div>
		    </div>
		</div> <!-- //newedge-slider-content -->
	</section>
	<!--====  End of SLIDER  ====-->

	

	<!--==================================
	=            START MAIN WRAPPER      =
	===================================-->
	<section class="main-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-sm-9">
				<!-- Latest Videos -->
				<?php
					$v_args = array(
						'post_type'		=> 'video_post',
						'posts_per_page'=> 4,
					);
					
					$v_data	= new WP_Query($v_args);
					
					if($v_data->have_posts()):
				?>
					<div class="default newedge-latest-videos mtb10">
						<div class="section-title">
							<h3 class="pull-left"> 
								<span class="cat-icon"><i class="fa fa-play"></i></span>Video Post
							</h3>
							<div class="pull-right see-all">
								<a href="#">See all</a>
							</div>
						</div>

					    <div class="row">
						<?php
							$i = 1;
							while($v_data->have_posts()): $v_data->the_post();
							
							$pid	= get_the_ID();
							$pcat 	= get_the_terms($pid, 'video_category');
							$pcatn = $pcat[0]->name;
							
							$vurlcode 	= get_post_meta( get_the_ID(), '_url_code_meta_key', true);
							
							if($i == 1) {
						?>
						
							<div class="col-sm-7">
								<div class="latest-video leading-item">
									<div class="latest-video-inner">
										<div class="overlay"></div>
										<div class="img-wrapper">
											<img src="https://img.youtube.com/vi/<?php echo $vurlcode; ?>/hqdefault.jpg" alt="img">
											<a href="<?php the_permalink(); ?>"><i class="play-icon fa fa-play-circle-o"></i></a>
										</div>
										<div class="video-post-info">
											<p class="vp-cat"><?php echo $pcatn; ?></p>
											<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
										</div>
									</div>
								</div> 
							</div> <!-- //leading-item -->
						
						<?php
							}else {
						?>
	
								<div class="col-sm-5">
									<div class="latest-video sub-leading-item media">
										<div class="latest-video-inner">
											<div class="img-wrapper media-left">
												<img src="https://img.youtube.com/vi/<?php echo $vurlcode; ?>/default.jpg" alt="img">
												<a href="<?php the_permalink(); ?>"><i class="play-icon fa fa-play-circle-o"></i></a>
											</div>
											<div class="video-post-info media-body">
												<p class="vp-cat"><?php echo $pcatn; ?></p>
												<h4 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
											</div>
										</div>
									</div>  
								</div> <!-- //sub-leading-item -->
						<?php 
							}
							$i++;
							endwhile;
						?>
							</div> <!-- //row -->
					</div>
				<?php
					endif;
					wp_reset_postdata();
				?>
				<!-- //Latest Videos -->
				
				<!-- Latest News -->
				<?php
					$bpc_args	= array(
						'post_type'		=> 'post',
						'posts_per_page'=> 8, 
					);
					
					$bpc_data	= new WP_Query($bpc_args);
					
					
					if($bpc_data->have_posts()):
				?>
					<div class="newedge-latest-news default">
						<div class="section-title">
							<h3> <span class="cat-icon"><i class="fa fa-bell-o"></i></span>Category Post</h3>
						</div> <!-- //section-title -->

						<div class="row">
								<div class="col-md-8">
									<!-- article-slider -->
									<div id="article-slider" class="owl-carousel">
								<?php
									$i=1;
									while($bpc_data->have_posts()): $bpc_data->the_post();
									
									$cpid = get_the_ID();
									$categories = get_the_category($cpid);
									$catname	= $categories[0]->cat_name;
									$catlink	= get_category_link($categories[0]->cat_ID);
									$gfletter	= str_split($catname);
									
								?>
									<article class="item leading-item gradient-major">
										<div class="article-inner">
											<div class="overlay"></div>
											<div class="img-wrapper">
											<?php
												if(has_post_thumbnail()){
												
												$bpcimg_id = get_post_thumbnail_id();
												$bpcimg_url= wp_get_attachment_image_src($bpcimg_id, 'hcat-big-image', true);
											?>
												<img class="img-100p latest-post-image" src="<?php echo $bpcimg_url[0]; ?>" alt="img">
											<?php
												}
											?>
											</div>
											<!--<div class="post-share-social">
												<a href="#" class="fa fa-facebook"></a>
												<a href="#" class="fa fa-twitter"></a>
												<a href="#" class="fa fa-google-plus"></a>
												<a href="#" class="fa fa-pinterest"></a>
												<a href="#" class="fa fa-linkedin"></a>
												<div class="share-icon"><i class="fa fa-share-alt"></i></div>
											</div>--> <!-- //post-share-social -->
											<div class="article-info">
												<p class="slide-cat">
												<a href="<?php echo $catlink; ?>"> <span class="cat-icon cat-icon-color01"> <?php echo $gfletter[0]; ?></span><?php echo $catname; ?>
													</a>
												</p>
												<h4 class="entry-title">
												 <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
												</h4>
											</div>
										</div>
									</article>
								<?php
									if($i == 3) break;
									$i++;
									endwhile;
								?>
									</div> <!-- //article-slider -->
								</div> <!-- //col-md-8 -->
							<?php
								$j=1;
								while($bpc_data->have_posts()): $bpc_data->the_post();
									
								$cpid = get_the_ID();
								$categories = get_the_category($cpid);
								$catname	= $categories[0]->cat_name;
								$catlink	= get_category_link($categories[0]->cat_ID);
								$gfletter	= str_split($catname);
							?>
								<div class="col-md-4 col-sm-6">
									<article class="gradient-color02">
										<div class="article-inner">
											<div class="overlay"></div>
											<div class="img-wrapper">
											<?php
												if(has_post_thumbnail()){
												
												$bpcimg_id = get_post_thumbnail_id();
												$bpcimg_url= wp_get_attachment_image_src($bpcimg_id, 'hcat-small-image', true);
											?>
												<img class="img-100p latest-post-image" src="<?php echo $bpcimg_url[0]; ?>" alt="img">
											<?php
												}
											?>
											</div>
											<div class="article-info">
												<p class="slide-cat">
												<a href="<?php echo $catlink; ?>"> <span class="cat-icon cat-icon-color09"> <?php echo $gfletter[0];?></span><?php echo $catname; ?>
												</a>
												</p>
												<h4 class="entry-title">
												 <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
												</h4>
											</div>
										</div>
									</article>
								</div> <!-- //col-md-4 col-sm-6 -->
							<?php
								if($j == 2) break;
								$j++;
								endwhile;
							?>
	
							</div> <!-- //row -->

						<div class="row">
						<?php
							$k=1;
							while($bpc_data->have_posts()): $bpc_data->the_post();
							
							$cpid = get_the_ID();
							$categories = get_the_category($cpid);
							$catname	= $categories[0]->cat_name;
							$catlink	= get_category_link($categories[0]->cat_ID);
							$gfletter	= str_split($catname);
						?>
							<div class="col-md-4 col-sm-6">
								<article class="gradient-color02">
									<div class="article-inner">
										<div class="overlay"></div>
										<div class="img-wrapper">
										<?php
											if(has_post_thumbnail()){
											
											$bpcimg_id = get_post_thumbnail_id();
											$bpcimg_url= wp_get_attachment_image_src($bpcimg_id, 'hcat-small-image', true);
										?>
											<img class="img-100p latest-post-image" src="<?php echo $bpcimg_url[0]; ?>" alt="img">
										<?php
											}
										?>
										</div>
										<div class="article-info">
											<p class="slide-cat">
											 <a href="<?php echo $catlink; ?>"> <span class="cat-icon cat-icon-color09"> <?php echo $gfletter[0]; ?></span><?php echo $catname; ?>
											 </a>
											</p>
											<h4 class="entry-title">
												<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
											</h4>
										</div>
									</div>
								</article>
							</div> <!-- //col-md-4 col-sm-6 -->
						<?php
							$k++;
							endwhile;
						?>
						</div><!-- //row -->
					</div>
				<?php
					endif;
					wp_reset_postdata();
				?>
					<!-- //Latest News -->

					
				<!-- Thumb Gallery -->
				<?php 
					$pg_args	= array(
						'post_type'		=> 'gallery_post',
						'posts_per_page'=> 8,
					);
					
					$pg_data	= new WP_Query($pg_args);
					
					if($pg_data->have_posts()):
				?>
			 		<div class="thumb-gallery default">
						<div class="row">
						 	<div class="col-sm-12">
					 			<div class="section-title">
					 				<h3> <span class="cat-icon"><i class="fa fa-image"></i></span>Photo Gallery</h3>
					 			</div>
					 			<div id="img_thumb" class="flexslider tg-slider">
					 				<ul class="slides">
									<?php
										while($pg_data->have_posts()):
										
										$pg_data->the_post();
										
										if(has_post_thumbnail()){
										
										$pgimg_id = get_post_thumbnail_id();
										
										$pgimg_url = wp_get_attachment_image_src($pgimg_id, 'pgallery-slider', true);
									?>
					 					<li><img src="<?php echo $pgimg_url[0]; ?>" alt="img"></li>
									<?php
										}
										endwhile;
									?>
					 				</ul>
					 			</div>
					 			<div id="img_galley" class="flexslider">
					 				<ul class="slides">
					 				<?php
										while($pg_data->have_posts()):
										
										$pg_data->the_post();
										
										if(has_post_thumbnail()){
										
										$pgimg_id = get_post_thumbnail_id();
										
										$pgimg_url = wp_get_attachment_image_src($pgimg_id, 'pgallery-thumb', true);
									?>
					 					<li><img src="<?php echo $pgimg_url[0]; ?>" alt="img"></li>
									<?php
										}
										endwhile;
									?>
					 				</ul>
					 			</div>
					 		</div>
					 	</div> <!-- //row -->
					 </div> 
				<?php
					endif;
					wp_reset_postdata();
				?>
				<!-- //Thumb Gallery -->
				</div> <!-- //col-sm-9 -->	



				<div class="col-sm-3">
					<!-- popular-news -->
					<div class="popular-news">
						<div class="section-title">
							<h3> <span class="cat-icon"><i class="fa fa-pencil"></i></span>Popular News</h3>
						</div> <!-- //section-title -->
						
						<ul class="popular-news-list">
							<li><a href="single-article.html">The polls that prove caste politics still matter in India</a></li>
							<li><a href="single-article.html">Sed ac neque ut neque dictum accumsan</a></li>
							<li><a href="single-article.html">5 Effective Email Unsubscribe Pages condimentum Donec</a></li>
							<li><a href="single-article.html">In aliquet facilisis condimentum Donec at orci orci</a></li>
							<li><a href="single-article.html">Integer elementum massa at nulla condimentum Donec</a></li>
						</ul>
					</div> <!-- //popular-news -->
					
					<!-- Advertisement sidebar 01 -->
					<div class="advertisement mtb30 mtt30">
						<div class="row">
							<div class="col-sm-12">
								<img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/right-ad1.jpg" class="img-100p" alt="advertisement">
							</div>
						</div>
					</div> <!-- //Advertisement sidebar 01-->
					
					<!-- Social counter -->
				 	<div class="social-counter clearfix">
				 		<div class="section-title">
							<h3> <span class="cat-icon"><i class="fa fa-share-alt"></i></span>Stay Connected</h3>
						</div> <!-- //section-title -->

						<div class="clearfix">
							<div class="col-sm-6 col-xs-6 social-common-bar">
								<div class="social-icon"><a href="#" target="_blank"><i class="twitter-icon fa fa-twitter"></i></a></div>
								<div class="social-total-count">
									<p class="follow-button">4570<span class="social-text">Followers</span></p>
								</div>
							</div>
							<div class="col-sm-6 col-xs-6 social-common-bar">
								<div class="social-icon"><a href="#" target="_blank"><i class="facebook-icon fa fa-facebook"></i></a></div>
								<div class="social-total-count">
									<p class="follow-button">5423<span class="social-text">Likes</span></p>
								</div>
							</div>
							<div class="col-sm-6 col-xs-6 social-common-bar">
								<div class="social-icon"><a href="#" target="_blank"><i class="dribbble-icon fa fa-dribbble"></i></a></div>
								<div class="social-total-count">
									<p class="follow-button">7902<span class="social-text">Followers</span></p>
								</div>
							</div>
							<div class="col-sm-6 col-xs-6 social-common-bar">
								<div class="social-icon"><a href="#" target="_blank"><i class="rss-icon fa fa-rss"></i></a></div>
								<div class="social-total-count">
									<p class="follow-button">1261<span class="social-text">RSS</span></p>
								</div>
							</div> 
						</div><!-- //row -->
					</div> <!-- //social counter -->

					<!-- newedge-twitter -->
					<div class="newedge-twitter mtt30">
						<h4 class="title">New Edge @newedge</h4>
						<div class="content">
							<div class="tweet-item tweet-odd tweet-first">
								<div class="date">Thu Jan 14 09:12:46 +0000 2016</div>
								<br> A detailed guide to the Helix3 Layout Manager → <a target="_blank" class="tweet_url" href="https://t.co/piwV4JSdlI">https://t.co/piwV4JSdlI</a> #Joomla #Web @Joomla <a target="_blank" class="tweet_url" href="https://t.co/l5DIODtOZc">https://t.co/l5DIODtOZc</a>
							</div>
							<div class="tweet-item tweet-even">
								<div class="date">Thu Jan 14 05:36:59 +0000 2016</div>
								<br> Moview, brand new Joomla template for movie database and review: <a target="_blank" class="tweet_url" href="https://t.co/qkSWsFIeO6">https://t.co/qkSWsFIeO6</a> #Joomla #Template @Joomla <a target="_blank" class="tweet_url" href="https://t.co/uYxMuYxiW0">https://t.co/uYxMuYxiW0</a>
							</div>
						</div>
					</div> <!-- //newedge-twitter -->
					
				</div> <!-- //col-sm-3 -->
			</div> <!-- //row -->
		</div> <!-- //container -->
	</section>
	<!--====  End of MAIN WRAPPER  ====-->

<?php
	get_footer();
?>
<?php
/**
*	Template Name: Photo Gallery Pages
**/
	get_header();

?>   
    
    <!--==================================
    =            START PAGE TITLE        =
    ===================================-->
    <section id="page-title">
      <div class="row">
        <div class="col-sm-12">
          <div class="page-title-wrapper">
            <div class="container">
              <h2 class="pull-left title"> <span class="cat-icon">PG </span> Photo Gallery</h2>
              <!-- breadcrumb -->
              <ol class="breadcrumb pull-right">
                <li><a href="index.html">Home</a></li>
                <li class="active">Photo Gallery</li>
              </ol> <!-- //breadcrumb -->
            </div> <!-- //container -->
          </div> <!-- //page-title-wrapper -->
        </div>
      </div> <!-- //row -->
    </section>
    <!--====  End of PAGE TITLE  ====-->
    
    
    
    <!--==================================
    =            START MAIN WRAPPER      =
    ===================================-->
    <section class="main-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-sm-9">
            <div class="section-title">
              <h3> <span class="cat-icon">PG</span><?php WP_title('', true); ?></h3>
            </div> <!-- //section-title -->
            <?php
			
			$paged = (get_query_var('paged'))? absint(get_query_var('paged')): 1;
			if($paged == 1) {
				
			?>
            <div class="row">
			<div class="col-md-12 col-sm-12">
                <!-- article-slider-->
                <div id="article-slider" class="owl-carousel mtb30 article-categories-slider">
			<?php
				$vs_args	= array(
					'post_type'		=> 'gallery_post',
					'posts_per_page'=> 3,
				);
				
				$vs_data = new WP_Query($vs_args);
				$count = $vs_data->post_count;
				$i = 1;
				while($vs_data->have_posts()): $vs_data->the_post();
				
				$gimg_id		= get_post_thumbnail_id();
				$gimg_url 	= wp_get_attachment_image_src($gimg_id, 'pgallery-slider', true);
				
			?>
			
				<article class="item leading-item gradient-major">
                    <div class="article-inner">
                      <div class="overlay"></div>
                      <div class="img-wrapper"><img class="img-100p latest-post-image" src="<?php echo $gimg_url[0]; ?>" alt="img"></div>
                      <div class="post-share-social">
                        <a href="#" class="fa fa-facebook"></a>
                        <a href="#" class="fa fa-twitter"></a>
                        <a href="#" class="fa fa-google-plus"></a>
                        <a href="#" class="fa fa-pinterest"></a>
                        <a href="#" class="fa fa-linkedin"></a>
                        <div class="share-icon"><i class="fa fa-share-alt"></i></div>
                      </div> <!-- //post-share-social -->
                      <div class="article-info">
                        <h2 class="entry-title">
                          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                      </div>
                    </div>
                  </article>
			
			<?php
				$i++;
				endwhile;
				
			?>
				</div>
			</div>
			</div>
			<?php
				}
			?>
			
			<div class="row">
			<div class="simple-article-overlay">
			<?php
				$v_args	= array(
					'post_type'		=> 'gallery_post',
					'posts_per_page'=> 18,
					'paged'			=> $paged,
				);
				
				$v_data = new WP_Query($v_args);
				$count = $v_data->post_count;
				$i = 0;
				$j = 1;
				while($v_data->have_posts()): $v_data->the_post();
				
				$i++;
				if($paged == 1){
					if($i <= 3) continue;
				}
				
				$gimg_id		= get_post_thumbnail_id();
				$gimg_url 	= wp_get_attachment_image_src($gimg_id, 'hcat-small-image', true);
			?>	
					<div class="col-md-4 col-sm-6">
					   <article class="gradient-color04">
						 <div class="article-inner">
						   <div class="overlay"></div>
						   <div class="img-wrapper"><img class="img-100p latest-post-image" src="<?php echo $gimg_url[0]; ?>" alt="img"></div>
						   <div class="post-share-social">
							 <a href="#" class="fa fa-facebook"></a>
							 <a href="#" class="fa fa-twitter"></a>
							 <a href="#" class="fa fa-google-plus"></a>
							 <a href="#" class="fa fa-pinterest"></a>
							 <a href="#" class="fa fa-linkedin"></a>
							 <div class="share-icon"><i class="fa fa-share-alt"></i></div>
						   </div> <!-- //post-share-social -->
						   <div class="article-info">
							 <h4 class="entry-title">
							   <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							 </h4>
						   </div>
						 </div>
					   </article>
					 </div> <!-- //col-md-4 col-sm-6 -->
					 	 
			<?php
					if($i % 6 == 0 && $i < $count){
					echo '<div class="col-sm-12 advertisement mtb30">
					  <img src="" alt="" />
					  <img src="'.esc_url(get_template_directory_uri()).'/img/largead1.jpg" class="img-100p" alt="advertisement" />
					</div>';
					}
					
				$j++;
				endwhile;
			?>
            
           
            <!-- Advertisement two 
            <div class="advertisement">
              <div class="row">
                <div class="col-sm-12">
                  <img src="<?php //echo esc_url(get_template_directory_uri()); ?>/img/largead2.jpg" class="img-100p" alt="advertisement">
                </div>
              </div>
            </div> //Advertisement two -->
			
               <div class="col-sm-12">
				<?php
					require_once('paginate.php');
					if (function_exists(custom_pagination)) {
						custom_pagination($v_data->max_num_pages,"",$paged);
					}
				?>
               </div>
             </div>
           </div>
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
								<img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/rightad1.jpg" class="img-100p" alt="advertisement">
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
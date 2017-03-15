<?php
/**
*	Template Name: Gallery Category
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
              <h2 class="pull-left title"> <span class="cat-icon">GC </span> Gallery Category</h2>
              <!-- breadcrumb -->
			  
              <ol class="breadcrumb pull-right">
                <li><a href="index.html">Home</a></li>
                <li class="active"><?php WP_title('', true); ?></li>
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
			  <?php
				$catname = single_cat_title('', false);
				$cseparate = str_split($catname);
			  ?>
              <h3> <span class="cat-icon"><?php echo $cseparate[0]; ?></span><?php echo single_cat_title('', false); ?></h3>
            </div> <!-- //section-title -->
            <?php
			$paged = (get_query_var('paged'))? absint(get_query_var('paged')): 1;
				
			?>
			<div class="row">
			<div class="simple-article-overlay">
			<?php
			
				global $wp_query;

				$term = $wp_query->queried_object;

				$args=array(
					'post_type' => 'gallery_post',
					'posts_per_page' => 18,
					'suppress_filters' => true,
					'tax_query' => array(
							array(
								'taxonomy'  => $term->taxonomy,
								'field'     => 'slug',
								'terms'     => $term->slug,
								)
							),
					'paged'		=> $paged,
					);

				$new_query = new WP_Query($args);
				$count = $new_query->post_count;
				$i = 0;
				$j = 1;
				while($new_query->have_posts()): $new_query->the_post();
				
				$i++;
				
				
				get_template_part('include/content', 'category');
			?>	
					
					 	 
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
				
					the_posts_pagination(array(
						'mid_size'	=> 2,
						'prev_text'	=> __('Prev', 'ss_text'),
						'next_text'	=> __('Next', 'ss_text'),
						'type'		=> 'list',
						'screen_reader_text' => ' ', 
					));
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
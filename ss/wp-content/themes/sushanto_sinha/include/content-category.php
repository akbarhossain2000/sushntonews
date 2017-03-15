
	<div class="col-md-4 col-sm-6">
	   <article class="gradient-color04">
		 <div class="article-inner">
		   <div class="overlay"></div>
		   <div class="img-wrapper">
		   <?php
				$term = $wp_query->queried_object;
				
				$txcheck = $term->taxonomy;
				if($txcheck == "video_category"){
					
					$vurlcode = get_post_meta(get_the_ID(), '_url_code_meta_key', true);
					
					echo '<img class="img-100p latest-post-image" src="https://img.youtube.com/vi/'.$vurlcode.'/hqdefault.jpg" alt="img">';
					
				}else{
					
					if(has_post_thumbnail()){
						
					$catimg_id	= get_post_thumbnail_id();
					$catimg_url	= wp_get_attachment_image_src($catimg_id, 'hcat-small-image', true);
		   ?>
					<img class="img-100p latest-post-image" src="<?php echo $catimg_url[0]; ?>" alt="img">
		   <?php
					}
				}
		   ?>
		   </div>
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
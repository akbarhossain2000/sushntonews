<?php
	
	global $wp_query;
	
	$mpid = get_the_ID();
	$term	= $wp_query->queried_object;
	
	$rptype_check	= $term->post_type;
	
	if($rptype_check == "video_post") {
		
		$vterms = get_the_terms(get_the_ID(), "video_category");
		
		$vr_args	= array(
			'post_type'		=> 'video_post',
			'posts_per_page'=> 9,
			'suppress_filters' => true,
			'tax_query'		=> array(
				array(
					'taxonomy' => $vterms[0]->taxonomy,
					'field'	   => 'term_id',
					'terms'	   => $vterms[0]->term_id,
				)
			),
			'order'			=> 'DESC',
		);
		
		$vr_data		= new WP_Query($vr_args);
		
		if($vr_data->have_posts()):
?>
		<div class="col-sm-12">
			<div class="section-title">
			<h3> <span class="cat-icon"><i class="fa fa-book"></i></span>More Related Stories</h3>
			</div>
		</div> <!-- //section-title -->

		<div class="simple-article-overlay mtt30">
		<?php
			while($vr_data->have_posts()): $vr_data->the_post();
			
			if($post->ID != $mpid){	
			
			$vurlcode = get_post_meta(get_the_ID(), '_url_code_meta_key', true);
					
		?>
			<div class="col-sm-4">
			 <article class="gradient-color04">
			   <div class="article-inner">
				 <div class="overlay"></div>
				 <div class="img-wrapper">
					<img class="img-100p latest-post-image" src="https://img.youtube.com/vi/<?php echo$vurlcode; ?>/hqdefault.jpg" alt="img">
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
			</div> <!-- //col-sm-4 -->
		<?php
			}
			endwhile;
		?>
		</div>	
<?php
		endif;
		wp_reset_postdata();
		
	}elseif($rptype_check == "gallery_post") {
		
		$gterms = get_the_terms(get_the_ID(), "gallery_category");
		
		$gr_args	= array(
			'post_type'		=> 'gallery_post',
			'posts_per_page'=> 9,
			'suppress_filters' => true,
			'tax_query'		=> array(
				array(
					'taxonomy' => $gterms[0]->taxonomy,
					'field'	   => 'term_id',
					'terms'	   => $gterms[0]->term_id,
				)
			),
			'order'			=> 'DESC',
		);
		
		$gr_data		= new WP_Query($gr_args);
		
		if($gr_data->have_posts()):
?>
		<div class="col-sm-12">
			<div class="section-title">
			<h3> <span class="cat-icon"><i class="fa fa-book"></i></span>More Related Stories</h3>
			</div>
		</div> <!-- //section-title -->

		<div class="simple-article-overlay mtt30">
		<?php
			while($gr_data->have_posts()): $gr_data->the_post();
			
			if($post->ID != $mpid){		
		?>
			<div class="col-sm-4">
			 <article class="gradient-color04">
			   <div class="article-inner">
				 <div class="overlay"></div>
				 <div class="img-wrapper">
				 <?php
					if(has_post_thumbnail()){
						
					$grimg_id	= get_post_thumbnail_id();
					$grimg_url	= wp_get_attachment_image_src($grimg_id, 'hcat-small-image', true);
				 ?>
					<img class="img-100p latest-post-image" src="<?php echo $grimg_url[0]; ?>" alt="img">
				<?php
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
			</div> <!-- //col-sm-4 -->
		<?php
			}
			endwhile;
		?>
		</div>	
<?php
		endif;
		wp_reset_postdata();
		
	}else {
		
		$aprcat = get_the_category(get_the_ID());
		
		$apr_args	= array(
			'post_type'		=> 'post',
			'cat'			=> $aprcat[0]->cat_ID,
			'posts_per_page'=> 9,
			'order'			=> 'DESC',
		);
		
		$apr_data		= new WP_Query($apr_args);
		//print_r($apr_data);
		if($apr_data->have_posts()):
?>
		<div class="col-sm-12">
			<div class="section-title">
			<h3> <span class="cat-icon"><i class="fa fa-book"></i></span>More Related Stories</h3>
			</div>
		</div> <!-- //section-title -->

		<div class="simple-article-overlay mtt30">
		<?php
			
			while($apr_data->have_posts()): $apr_data->the_post();
			
			if( $post->ID != $mpid) {
		?>
			<div class="col-sm-4">
			 <article class="gradient-color04">
			   <div class="article-inner">
				 <div class="overlay"></div>
				 <div class="img-wrapper">
				 <?php
					if(has_post_thumbnail()){
						
					$aprimg_id	= get_post_thumbnail_id();
					$aprimg_url	= wp_get_attachment_image_src($aprimg_id, 'hcat-small-image', true);
				 ?>
					<img class="img-100p latest-post-image" src="<?php echo $aprimg_url[0]; ?>" alt="img">
				<?php
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
			</div> <!-- //col-sm-4 -->
		<?php
			}
			endwhile;
		?>
		</div>
<?php
		endif;
		wp_reset_postdata();
	}

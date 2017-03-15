<?php
global $wp_query;
$term = $wp_query->queried_object;
$ptypecheck	= $term->post_type;
?>

<article id="post-<?php the_ID(); ?>" class="<?php post_class(); ?>">
	<div class="col-sm-12">
	<?php
		if($post_type == "video_post"){
			
			$vurlcode	= get_post_meta(get_the_ID(), '_url_code_meta_key', true);
	?>
		<div class="article-video">
			<iframe src="https://www.youtube.com/embed/<?php echo $vurlcode; ?>" frameborder="0" allowfullscreen></iframe>
		</div>
	<?php
		}else {
			
			if(has_post_thumbnail()){
				
				$pimg_id	= get_post_thumbnail_id();
				$pimg_url	= wp_get_attachment_image_src($pimg_id, 'pgallery-slider', true);
	?>
			<img src="<?php echo $pimg_url[0]; ?>" class="img-100p" alt="img">
	
	<?php
			}
		}
	?>
		<h2 class="main-entry-title"><?php the_title(); ?></h2>
		<div class="entry-blog-meta">
			<div class="entry-blog-meta-list">
				<div class="author-avatar">
				<?php
					$aimg = get_avatar($post->post_autor, 32);
					echo $aimg;
				?>
				</div>
				<div class="author-avatar-text">
					<p class="author"> <a href="#" title="Posts by NewEdge" rel="author"><?php the_author(); ?></a></p>
					<span class="entry-date"><time><?php the_time('M, j Y'); ?></time></span>,
					<span class="cats">
					<?php
						$pid 	= get_the_ID();
						if($ptypecheck == "video_post"){
							$pvcat 	= get_the_terms($pid, 'video_category');
							$pvcatn = $pvcat[0]->name;
							
							echo '<a href="#" rel="category tag">'.$pvcatn.'</a>';
							
						}elseif($ptypecheck == "gallery_post"){
							$pgcat 	= get_the_terms($pid, 'gallery_category');
							$pgcatn = $pgcat[0]->name;
							
							echo '<a href="#" rel="category tag">'.$pgcatn.'</a>';
							
						}else{
							$pcat 	= get_the_category($pid);
							$pcatn = $pcat[0]->name;
							
							echo '<a href="#" rel="category tag">'.$pcatn.'</a>';
							
						}
					  ?>
					</span>
				</div>
			</div> <!-- //entry-blog-meta-list -->

			<div class="entry-blog-meta-list">
				<div class="share-count">
					<span class="number">2.86k</span><span>Views</span>
				</div>
				
				<div class="newedge-social-share">
				  <ul>
					<li>
					  <a href="#" class="icon-facebook"><i class="fa fa-facebook"></i> Share on Facebook</a>
					</li>
					<li>
					  <a href="#" class="icon-twitter"><i class="fa fa-twitter"></i> Tweet on Twitter</a>
					</li>
					<li>
					  <a href="#" class="icon-google"><i class="fa fa-google-plus"></i></a>
					</li>
					<li>
					  <a href="#" class="icon-linkedin"><i class="fa fa-linkedin"></i></a>
					</li>
					<li>
					  <a href="#" class="icon-google"><i class="fa fa-pinterest"></i></a>
					</li>
				  </ul>
				</div>
			</div> <!-- //entry-blog-meta-list -->
		</div> <!-- //entry-blog-meta -->

		<div class="entry-summary">
		  <p><?php the_content(); ?></p>
		</div>

		<div class="post-meta-info">
		  <div class="post-meta-info-list tags">
			<i class="fa fa-tags"></i>
			<div class="post-meta-info-list-in tags-in">
			  <p>Tags</p>
			  
			  <?php
				$post_tag = get_the_tags($pid);
				if($post_tag) {
					$count = count($post_tag);
					$i = 1;
					foreach($post_tag as $stag){
						if($i < $count){
							echo '<a href="#">'.$stag->name .', </a>';
						}else{
							echo '<a href="#">'.$stag->name .'</a>';
						}
						
					$i++;
					}
				}else{
					echo '<a href="#">No Tags</a>';
				}
				
			  ?>
			  
			</div>
		  </div>
		  <div class="post-meta-info-list comments">
			<i class="fa fa-comments-o"></i>
			<div class="post-meta-info-list-in comments-in">
			  <p>Comments</p>
			  <?php
				$total_comment 	= wp_count_comments($post->ID);
				$show_cmnt		= $total_comment->approved ;
				if($show_cmnt !== 0){
					echo '<a href="#"><span class="leave-reply">'.$show_cmnt.' comment</span></a>';
				}else{
					echo '<a href="#"><span class="leave-reply">No comment</span></a>';
				}
			  ?>
			  
			</div>
		  </div>
		  <div class="post-meta-info-list category">
			<i class="fa fa-folder-open-o"></i>
			<div class="post-meta-info-list-in category-in">
			  <p>Category</p>
			  
			  <?php
			  
				if($ptypecheck == "video_post"){
					$pvcat 	= get_the_terms($pid, 'video_category');
					$pvcatn = $pvcat[0]->name;
					
					echo '<a href="#" rel="category tag">'.$pvcatn.'</a>';
					
				}elseif($ptypecheck == "gallery_post"){
					$pgcat 	= get_the_terms($pid, 'gallery_category');
					$pgcatn = $pgcat[0]->name;
					
					echo '<a href="#" rel="category tag">'.$pgcatn.'</a>';
					
				}else{
					$pcat 	= get_the_category($pid);
					$pcatn = $pcat[0]->name;
					
					echo '<a href="#" rel="category tag">'.$pcatn.'</a>';
					
				}
				
			  ?>
			 
			</div>
		  </div>
		  <div class="post-meta-info-list date">
			<i class="fa fa-calendar-o"></i>
			<div class="post-meta-info-list-in date-in">
			  <p>Date</p>
			  <time class="entry-date"><?php the_time('F, j Y'); ?></time>
			</div>
		  </div>
		</div> <!-- //post-meta-info -->
	</div> <!-- //col-sm-12 -->
</article>

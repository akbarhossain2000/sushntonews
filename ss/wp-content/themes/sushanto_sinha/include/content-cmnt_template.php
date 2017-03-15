<?php

?>

 <!-- previous comments -->
 <div class="col-sm-12">
  <div class="comments-content mtt60">
	<div class="section-title">
	 <h3> <span class="cat-icon"><i class="fa fa-comments"></i></span>Comments</h3>
   </div>
 <?php
 
	wp_list_comments(array('callback' => 'mytheme_comment'), get_comments(array('post_id' => get_the_ID())));
	
 ?>
  </div>
 </div>

<div class="comments-form col-sm-12">
<div class="contact-form leave-message">
<?php
  $comment_args = array( 
	'title_reply'=> '<div class="section-title">
   <h3> <span class="cat-icon"><i class="fa fa-commenting"></i></span>Leave a comment</h3>
 </div>',

	'fields' => apply_filters( 'comment_form_default_fields', array(

	'author' => '<div class="form-group">
	   <input type="text" name="name" class="form-control" placeholder="Name" required="required">
	 </div>',   

	'email'  => '<div class="form-group">
	   <input type="email" name="email" class="form-control" placeholder="Email" required="required">
	 </div>',

	'url'    => '' ) ),

	'comment_field' => '<div class="form-group input-textarea">
	   <textarea name="comment" rows="5" class="form-control" placeholder="Message" required="required"></textarea>
	 </div>',

	'comment_notes_before' => '',
	'label_submit'	=> 'Send Message',

	);
  comment_form($comment_args);
?>
  </div>
 </div>
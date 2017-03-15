<?php

function custom_pagination($numpages = '', $pagerange = '', $paged='') {

  if (empty($pagerange)) {
    $pagerange = 2;
  }

  /**
   * This first part of our function is a fallback
   * for custom pagination inside a regular loop that
   * uses the global $paged and global $wp_query variables.
   * 
   * It's good because we can now override default pagination
   * in our theme, and use this function in default quries
   * and custom queries.
   */
   
  $pagination_args = array(
	  'base'            => get_pagenum_link(1) . '%_%',
	  //'format'          => 'page/%#%',
	  'format' 			=> $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '&paged=%#%',
	  'total'           => $numpages,
	  'current'         => $paged,
	  'show_all'        => False,
	  'end_size'        => 1,
	  'mid_size'        => $pagerange,
	  'prev_next'       => True,
	  'prev_text'       => __('Prev'),
	  'next_text'       => __('Next'),
	  'type'            => 'list',
	  'add_args'        => false,
	  'add_fragment'    => ''
	);
	
	$paginate_links = paginate_links($pagination_args);

	if ($paginate_links) {
	  echo "<div class='pagination'>";
		echo $paginate_links;
	  echo "</div>";
	}
   
  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }

}
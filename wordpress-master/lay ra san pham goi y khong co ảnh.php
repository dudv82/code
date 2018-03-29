<?php 
$trichdan = new WP_Query(array(
'post_type'=>'post',
'post_status'=>'publish',
'cat' => 58,
'orderby' => 'ID',
'order' => 'DESC',
'posts_per_page'=> 2));
?>

<?php while ($trichdan->have_posts()) : $trichdan->the_post();
	echo '<a id="tile_belowbar" class="title" href="'. $post->guid .'" >'. wp_trim_words( get_the_title(), 6 ) .'</a>';

 endwhile ; wp_reset_query() ;
 ?>
 <!-- end -->

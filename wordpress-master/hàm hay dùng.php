g?i fanpage modules;                      <?php get_template_part('modules/fanpage');?>         vertical-align
g?i sidebar :                             <?php dynamic_sidebar('thong-ke');?>
g?i tùy ch?nh tree option:               <?php echo ot_get_option('fanpage');?>

bootrap :  
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"></div>

                   <div class="container"> 
					  <div class="row">
					   <div class="col-xs-12 col-sm-12 col-md-8 col-md-push-4 col-lg-push-3 col-lg-9 col-main">
					    <main class="site-main"> 
					    
					    </main>

					   </div>

					   <div class="col-xs-12 col-sm-12 col-md-4 col-md-pull-8 col-lg-pull-9 col-lg-3 col-sidebar">
					    <?php get_sidebar('right');?>
					   </div>
					  </div>
					</div>


gioi han ky tu		<?php echo wp_trim_words( get_the_content(), 10 ); ?> // post content
					<?php echo wp_trim_words( get_the_excerpt(), 10 ); ?> // post excerpt
					<?php echo wp_trim_words( get_the_title(), 10 ); ?> // post title

					<a href="<?php echo get_bloginfo('url') ?>/cua-hang"><?php the_title();?></a>
										

hient thi hinh anh tu thu muc images :  <img src="<?php echo THEME_URL,'/images/light-min.png';?>" alt="tkw">
         				            
					'post_type'   =>'san-pham',
   							 'meta_key' => 'status',
  						  'meta_value' => 'Hot',
       					         'showposts'   =>10
   				             'post_type'   =>'du-an',
   				 'meta_key' => 'status',
  				  'meta_value' => 'Hot',
       				         'showposts'   =>10


g?i phân trang			 <?php wp_pagenavi();?>
				<?php echo get_page_link(130); ?>




<div class="gia-sp">
			<?php $giakm = get_field('gia-km');?>
				<?php if ($giakm !=''): ?>
				<div class="gia-sp-1">
					<div class="gia-sp-1km">
						<span class="value-gia"><?php echo  number_format( ( get_field('gia-km')?get_field('gia-km'):0 ),0,',','.').' ₫';?></span>
					</div>
					<div class="gia-sp-1goc">
						<strike class=""><?php echo  number_format( ( get_field('gia-goc')?get_field('gia-goc'):0 ),0,',','.').' ₫';?></strike>
					</div>
				</div>
				<?php endif ?>
					<?php if ($giakm==''): ?>
						<span class="value-gia"><?php echo  number_format( ( get_field('gia-goc')?get_field('gia-goc'):0 ),0,',','.').' ₫';?></span><br>
			<?php endif ?>
		</div>
		<a href="<?php the_permalink();?>">Mua Ngay<i class="fa fa-shopping-cart" aria-hidden="true"></i></a>


chỉ hiện ở trang chủ
			<?php if(is_home()):?>
			<div id="main-slider">
				<div class="container-fluid">
				<?php echo do_shortcode('[metaslider id=80]');?>
				</div>
			</div>
			<?php endif;?>

mo ta category
				<?php echo category_description( get_category_by_slug( 'danh-gia-cua-khach-hang' )->term_id ); ?>

hàm gọi danh muc san pham
				<?php
					$taxonomy = 'danh-muc-san-pham';
					$tax_terms = get_terms($taxonomy);
					?>
					<?php
					foreach ($tax_terms as $tax_term) { ?>		 
						<li>
							<a href="<?php echo get_term_link($tax_term, $taxonomy); ?>">
							<?php echo $tax_term->name; ?> - <?php echo $tax_term->count; ?> SP</a>
						</li>
					<?php } ?>

lượt xem
					<?php if (have_posts()): the_post() ; ?>
						<?php 
							$luot_xem = get_post_meta ( $post->ID, 'luot-xem' ,true ) ;
							if ( $luot_xem  )   { 
								$luot_xem += 1;
								update_post_meta (  $post->ID, 'luot-xem' , $luot_xem ) ;
								}
							else {
								add_post_meta( $post->ID, 'luot-xem', 1 ) ; 					
							}
						?>
 <span class="luot-xem">Lượt xem : <?php 
									echo get_post_meta ( $post->ID, 'luot-xem' ,true ) ? get_post_meta ( $post->ID, 'luot-xem' ,true ) : '0' ; ?></span>
							</div>				
gọi danh muc con
<?php
									$term_id = 9;
									$taxonomy_name = 'danh-muc-san-pham';
									$termchildren = get_term_children( $term_id, $taxonomy_name );

									echo '<ul class="list-link">';
									foreach ( $termchildren as $child ) {
										$term = get_term_by( 'id', $child, $taxonomy_name );
										echo '<li><a href="' . get_term_link( $child, $taxonomy_name ) . '">' . $term->name . '</a></li>';
									}
									echo '</ul>';
								?> 
<script type="text/javascript">
      $(document).ready(function() {
        $("#san-pham-bc").owlCarousel({
       items : 4,
       lazyLoad : true,
       navigation : true
        }); 
      });
     </script>
     
<script type="text/javascript">
 $(document).ready(function() {
  
   $("#owl-news").owlCarousel({
  
    autoPlay: 3000, //Set AutoPlay to 3 seconds
  
    items : 4,
    itemsDesktop : [1199,3],
    itemsDesktopSmall : [979,3]
  
   });
  
 });
</script>

<script type="text/javascript">
 $(document).ready(function() {
   $("#san-pham").owlCarousel({
  items : 4,
  lazyLoad : true,
  navigation : true
   }); 
 });
</script>

<script type="text/javascript">
 $(document).ready(function() {
   $("#owl-news-event").owlCarousel({
  items : 1,
  autoPlay: 90000, //Set AutoPlay to 3 seconds
  slideSpeed : 600,
  lazyLoad : true,
  navigation : true
   }); 
 });
</script>


				<ul class="list-news-dm clearfix">
					<?php
					$taxonomy = 'danh-muc-san-pham';
					$tax_terms = get_terms($taxonomy);
					?>
					<?php
					foreach ($tax_terms as $tax_term) { ?>		 
						<li>
							<a href="<?php echo get_term_link($tax_term, $taxonomy); ?>">
							<?php echo $tax_term->name; ?> - <?php echo $tax_term->count; ?> SP</a>
						</li>
					<?php } ?>
				</ul>		


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/animation/aos.css">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/animation/wow.css">

<script src="<?php echo get_template_directory_uri();?>/animation/wow.js"></script>
<script src="<?php echo get_template_directory_uri();?>/animation/aos.js"></script>
<script>
	AOS.init({
	  disable: 'mobile'
	});
	new WOW().init();
</script>


<div class="grid">
		<div id="back-top">
		<span >TOP</span>
	</div>
	<script >
		$("#back-top").click(function() {
		  $("html, body").animate({ scrollTop: 0 }, "slow");
		  return false;
		});
	</script>

<marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
Go on... hover over me!
</marquee>

.box-logo img{
	width: 100%;
    -webkit-transition:all 1.5s ease-out;
    -moz-transition:all 1.5s ease-out;
    -ms-transition:all 1.5s ease-out;
    -o-transition:all 1.5s ease-out;
    transition:all 1.5s ease-out;
}
.box-logo :hover img{
    -webkit-transform:rotateY(360deg);
    -moz-transform:rotateY(360deg);
    -ms-transform:rotateY(360deg);
    -o-transform:rotateY(360deg);
    transform:rotateY(360deg);
    }


   					<?php $ab = ot_get_option('aa');
				      ?>
				      <ul class="cate_name_ft">
				       <?php
				       foreach( $ab as $lang ) { ?>
				        <li>
				         <a href="<?php echo get_category_link($lang); ?>">
				          <?php echo get_cat_name($lang);?>
				         </a>
				        </li>
				       <?php
				       }?>
				       
				      </ul>
		
&&&&&& tùy chỉnh background
      		<?php $bg_body = ot_get_option( 'demo_background', array() ); ?> 
			<div class="name-class" style="background-color: <?php if($bg_body['background-color']){echo $bg_body['background-color'] ; }else{ echo 'inherit';} ?>;
				background-repeat:<?php if($bg_body['background-repeat']){echo $bg_body['background-repeat'] ; }else{ echo 'no-repeat';} ?>;
				background-attachment:<?php if($bg_body['background-attachment']){echo $bg_body['background-attachment'] ; }else{ echo 'fixed';} ?>;
				background-position:<?php if($bg_body['background-position']){echo $bg_body['background-position'] ; }else{ echo 'center';} ?>;
				background-image:url(<?php if($bg_body['background-image']){echo $bg_body['background-image'] ; }else{ echo get_template_directory_uri().'/images/bgfooter.png';} ?>);">
			</div>


ảnh danh mục woocm...
	<?php $idcat = 16;
       $thumbnail_id = get_woocommerce_term_meta( $idcat, 'thumbnail_id', true );
       $image = wp_get_attachment_url( $thumbnail_id );
       echo '<img src="'.$image.'" alt="" width="762" height="365" />'; 
      ?>


danh sách hoặc lưới 
						<div class="option-tab">
							<strong>Hiển thị: </strong>
							<span id="list" >Danh sách </span> / 
							<span id="grid" class="intro"> Lưới</span>
						</div>
						<div id="tab-1"><!-- noi dung --> </div>
						<div id="tab-2"><!-- noi dung --></div>
						<script type="text/javascript">
							$("#list").click(function(){
								$("#tab-2").show();
								$("#tab-1").hide();
								$(this).addClass("intro");
								$('#grid').removeClass("intro");
							});

							$("#grid").click(function(){
								$("#tab-1").show();
								$("#tab-2").hide();
								$(this).addClass("intro");
								$('#list').removeClass("intro");
							});
						</script>	
Fomr và nooijd dng cmt
					<?php echo "Comment authors age: ".get_comment_meta( $comment->comment_ID, 'age', true ); ?>
						<?php comments_template( '', true ); ?>	
						
						
						
<div class="col-md-3 col-sm-3 col-xs-12">
					<?php get_sidebar(); ?>
	</div>
	
	
<?php echo do_shortcode('[contact-form-7 id="270" title="yurf"]'); ?>

ham goi menu footer			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<?php wp_nav_menu( array( 'theme_location'  => 'extra-menu', 'menu_class' => 'header-footer clearfix') ); ?>
			</div>
			
			
			
			
hieu ung befor apter

.images {
    position: relative;
}

.images:hover::before {
    right: 50%;
    left: 50%;
    width: 0;
    background: rgba(255,255,255,0.3);
}
.images::before {
    position: absolute;
    content: '';
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    z-index: 1;
    background: rgba(67,69,113,0.07);
    -webkit-transition: all 0.5s ease-in-out;
    transition: all 0.5s ease-in-out;
    -moz-transition: all 0.5s ease-in-out;
    -ms-transition: all 0.5s ease-in-out;
    -o-transition: all 0.5s ease-in-out;
}

.images:hover::after {
    height: 0;
    top: 50%;
    bottom: 50%;
    background: rgba(255,255,255,0.3);
}
.images::after {
    position: absolute;
    content: '';
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    background: rgba(67,69,113,0.07);
    -webkit-transition: all 0.5s ease-in-out;
    transition: all 0.5s ease-in-out;
    -moz-transition: all 0.5s ease-in-out;
    -ms-transition: all 0.5s ease-in-out;
    -o-transition: all 0.5s ease-in-out;
}


 <!-- lay ra bai viet goi y  -->
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
															 
https://huykira.net/webmaster/wordpress/code-hay-trong-lap-trinh-theme-woocommecre.html#
	
	
<div class="col-lg-3 col-md-2 hidden-sm hidden-xs"> // goi thanh search
	<?php get_search_form(); ?>	
</div>

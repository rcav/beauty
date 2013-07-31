<?php
$post_id = $post->ID;
$prefix = 'tk_';
$gallery_columns = get_option('sub_gallery_columns-'.$post->ID);
$gallery_cat = get_option('sub_gallery_category-'.$post->ID);
$gallery_num = get_option('sub_gallery_number-'.$post->ID);


$gallery_title = get_option('sub_gallery_title-'.$post_id);
$gallery_id = get_option('id_gallery_page');
?>

<div class="home-gallery-top-images left"></div>

<div class="bg-home-gallery left">
    <div class="wrapper-content">
    
<?php
if($gallery_columns == 'three') { ?>
    
  
<div class="gallery3-single-content left">

                <?php if(!empty($gallery_title)){ ?>
                    <div class="home-gallery-title left">
                        <span><?php echo $gallery_title; ?></span>
                        <a href="<?php echo get_permalink($gallery_id); ?>"><?php _e('View All', tk_theme_name); ?></a>
                    </div><!--/home-gallery-title-->
                <?php } ?>
                                
                <div class="home-gallery-content left">
                    <ul id="da-thumbs" class="da-thumbs">

                    <?php
                        $i = 1;
                        if($gallery_cat == 0) {
                            $args=array('post_type' => 'gallery', 'post_status' => 'publish', 'posts_per_page' => $gallery_num);
                        } else {
                            $args=array('post_type' => 'gallery', 'post_status' => 'publish', 'posts_per_page' => $gallery_num, 'tax_query' => array(array('taxonomy' => 'ct_gallery', 'field' => 'term_id', 'terms' => $gallery_cat)));
                        }

                        //The Query
                        query_posts($args);

                        //The Loop
                        if ( have_posts() ) : while ( have_posts() ) : the_post();
                        $post_category = wp_get_post_terms( $post->ID, 'ct_gallery' );
                        $format = get_post_format();

                        $image_full = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full');
                        ?>

                        <li class="home-gallery-one left <?php foreach($post_category as $post_cat){echo 'class-'.$post_cat->term_id.' ';}?>  ">

                            <?php if (has_post_thumbnail() && $format == false) { ?>

                                <a href="<?php echo $image_full[0]; ?>" class="fancybox">                                            
                                    <?php the_post_thumbnail('gallery3collumns'); ?>  
                                    <div>
                                        <span><?php the_title(); ?></span>
                                        <p></p>
                                    </div>
                                </a>

                            <?php }elseif($format=='video') { 
                                $video_link = get_post_meta($post->ID, $prefix . 'video_link', true);
                            ?>

                                <a href="<?php echo $video_link; ?>" class=" <?php if(strpos($video_link, 'youtube')){echo 'youtube';}elseif(strpos($video_link, 'vimeo')){echo 'vimeo';}?>">                                            
                                    <?php echo get_video_image($video_link, $post->ID); ?>
                                    <div>
                                        <span><?php the_title(); ?></span>
                                        <p></p>
                                    </div>
                                </a>

                           <?php } elseif ($format == 'gallery'){ 
                               $slide_images = get_post_meta($post->ID, $prefix . 'repeatable', true);                                           
                            ?>

                                <script type="text/javascript">
                                    jQuery(document).ready(function($){
                                        jQuery("a.gallery_box<?php echo $i; ?>").attr('rel', 'gallery').fancybox();
                                    });
                                </script>

                                <a href="<?php echo $slide_images[0]; ?>" rel="gallery" class="gallery_box<?php echo $i; ?>">                                            
                                    <img src="<?php tk_get_thumb(397, 397, $slide_images[0]); ?>" alt="<?php the_title(); ?>" />
                                    <div>
                                        <span><?php the_title(); ?></span>
                                        <p></p>
                                    </div>
                                </a>
                                <span style="display:none !important;">
                                    <?php
                                    foreach(array_slice($slide_images, 1) as $the_image) { ?>
                                        <a href="<?php echo $the_image; ?>" rel="gallery" class="gallery_box<?php echo $i; ?>" title="<?php echo the_title() ?>"><img src="<?php tk_get_thumb(397, 397, $slide_images[0]); ?>" /></a>
                                    <?php } ?>
                                </span>


                           <?php } ?>
                        </li><!--/home-gallery-one-->

                        <?php $i++; endwhile; endif; ?>

                    </ul>
                </div><!--/home-gallery-content-->
</div><!-- gallery-3 -->
    
    
    
<?php } else {?>

    <div class="gallery4-single-content left">

                            <?php if(!empty($gallery_title)){ ?>
                                <div class="home-gallery-title left">
                                    <span><?php echo $gallery_title; ?></span>
                                    <a href="<?php echo get_permalink($gallery_id); ?>"><?php _e('View All', tk_theme_name); ?></a>
                                </div><!--/home-gallery-title-->
                            <?php } ?>
                                
                                
                                <div class="home-gallery-content left">
                                    <ul id="da-thumbs" class="da-thumbs">

                                        
                                        
                                    <?php                  
                                    $i = 1;
                                    if($gallery_cat == 0) {
                                        $args=array('post_type' => 'gallery', 'post_status' => 'publish', 'posts_per_page' => $gallery_num);
                                    } else {
                                        $args=array('post_type' => 'gallery', 'post_status' => 'publish', 'posts_per_page' => $gallery_num, 'tax_query' => array(array('taxonomy' => 'ct_gallery', 'field' => 'term_id', 'terms' => $gallery_cat)));
                                    }
                                    
                                    
                                    //The Query
                                    query_posts($args);

                                    //The Loop
                                    if ( have_posts() ) : while ( have_posts() ) : the_post();
                                    $post_category = wp_get_post_terms( $post->ID, 'ct_gallery' );
                                    $format = get_post_format();
                                    
                                    $image_full = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full');
                                    ?>
                                    

                        <li class="home-gallery-one left <?php foreach($post_category as $post_cat){echo 'class-'.$post_cat->term_id.' ';}?>  ">

                            <?php if (has_post_thumbnail() && $format == false) { ?>

                                <a href="<?php echo $image_full[0]; ?>" class="fancybox">                                            
                                    <?php the_post_thumbnail('gallery3collumns'); ?>  
                                    <div>
                                        <span><?php the_title(); ?></span>
                                        <p></p>
                                    </div>
                                </a>

                            <?php }elseif($format=='video') { 
                                $video_link = get_post_meta($post->ID, $prefix . 'video_link', true);
                            ?>

                                <a href="<?php echo $video_link; ?>" class=" <?php if(strpos($video_link, 'youtube')){echo 'youtube';}elseif(strpos($video_link, 'vimeo')){echo 'vimeo';}?>">                                            
                                    <?php echo get_video_image($video_link, $post->ID); ?>
                                    <div>
                                        <span><?php the_title(); ?></span>
                                        <p></p>
                                    </div>
                                </a>

                           <?php } elseif ($format == 'gallery'){ 
                               $slide_images = get_post_meta($post->ID, $prefix . 'repeatable', true);                                           
                            ?>

                                <script type="text/javascript">
                                    jQuery(document).ready(function($){
                                        jQuery("a.gallery_box<?php echo $i; ?>").attr('rel', 'gallery').fancybox();
                                    });
                                </script>

                                <a href="<?php echo $slide_images[0]; ?>" rel="gallery" class="gallery_box<?php echo $i; ?>">                                            
                                    <img src="<?php tk_get_thumb(397, 397, $slide_images[0]); ?>" alt="<?php the_title(); ?>" />
                                    <div>
                                        <span><?php the_title(); ?></span>
                                        <p></p>
                                    </div>
                                </a>
                                <span style="display:none !important;">
                                    <?php
                                    foreach(array_slice($slide_images, 1) as $the_image) { ?>
                                        <a href="<?php echo $the_image; ?>" rel="gallery" class="gallery_box<?php echo $i; ?>" title="<?php echo the_title() ?>"><img src="<?php tk_get_thumb(397, 397, $slide_images[0]); ?>" /></a>
                                    <?php } ?>
                                </span>


                           <?php } ?>
                        </li><!--/home-gallery-one-->

                                        <?php $i++; endwhile; endif; ?>
                                        
                                        
                                        
                                        
                                    </ul>
                                </div><!--/home-gallery-content-->

    </div><!-- gallery4-single-content -->
    
<?php } ?>

    </div><!-- wrapper-content -->
</div><!-- bg-home-gallery -->

<div class="home-gallery-down-images home-gallery-margin left"></div>
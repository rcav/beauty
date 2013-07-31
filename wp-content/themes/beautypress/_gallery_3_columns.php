<?php 
/*

Template Name: Gallery 3 Columns

*/
get_header(); 
$prefix = 'tk_';
$subheading = get_post_meta($post->ID, $prefix.'subheading', true);
$enable_single = get_theme_option(tk_theme_name.'_gallery_gallery_single');
$page_headline = get_post_meta($post -> ID, $prefix . 'headline', true);
?>


    <!-- CONTENT -->
    <div class="content left">
        <div class="wrapper">
            <div class="content-shadow left">

                <div class="content-top-image left"></div><!--/content-top-image-->

                <div class="bg-content left">
                    <div class="wrapper-content">


                        <div class="title-on-page left">
                            <span><?php the_title(); ?></span>
                            <?php if(!empty($page_headline)){ ?><p><?php echo $page_headline; ?></p><?php } ?>
                        </div><!--/title-on-page-->



                        <?php if(!empty($post->post_content)){ ?>
                            <div class="shortcodes left">
                                <?php
                                    wp_reset_query();
                                    if (have_posts()) : while (have_posts()) : the_post();
                                            the_content();
                                        endwhile;
                                    else:
                                    endif;
                                    wp_reset_query();
                                ?>
                            </div>
                        <?php } ?>



                        <div class="gallery-filter left">
                            <span><?php _e('Filter:', tk_theme_name); ?></span>
                            <div class="gallery-filter-link left">
                                <div class="gallery-filter-link-content left">
                                        <a  href="#" data-filter="*" class="active-project active"><?php _e('All', tk_theme_name) ?></a>
                                        <?php
                                        global $wpdb;
                                        $gallery_orderby = get_theme_option(tk_theme_name . '_gallery_gallery_orderby');
                                        $gallery_order = get_theme_option(tk_theme_name . '_gallery_gallery_order');
                                        $post_type_ids = $wpdb->get_col("SELECT ID FROM $wpdb->posts WHERE post_type = 'gallery' AND post_status = 'publish'");
                                        if (!empty($post_type_ids)) {
                                            $post_type_cats = wp_get_object_terms($post_type_ids, 'ct_gallery', array('orderby' => $gallery_orderby, 'order' => $gallery_order, 'fields' => 'ids'));
                                            if ($post_type_cats) {
                                                $post_type_cats = array_unique($post_type_cats);
                                            }
                                        }
                                        $include_category = null;
                                        if (!empty($post_type_ids)) {
                                            foreach ($post_type_cats as $category_list) {
                                                $cat = $category_list . ",";
                                                $include_category = $include_category . $cat;
                                                $cat_name = get_term($category_list, 'ct_gallery');
                                                ?>
                                                <a href="#" data-filter="<?php echo '.class-' . $category_list ?>"><?php echo $cat_name->name ?></a>
                                            <?php }
                                        } ?>
                                </div>
                            </div>
                        </div><!--/gallery-filter-->



                        <div class="gallery3-single-content left">

                            <div class="home-gallery-content left">
                                <ul id="da-thumbs" class="da-thumbs">

                                <?php
                                    $i = 1;
                                    $args=array('post_type' => 'gallery', 'post_status' => 'publish', 'posts_per_page' => -1);

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
                                        <?php if($enable_single == 'yes'){ ?>
                                            <a href="<?php the_permalink(); ?>">
                                        <?php } else { ?>
                                            <a href="<?php echo $image_full[0]; ?>" class="fancybox">
                                        <?php } ?>                                                                                        
                                                <?php the_post_thumbnail('gallery'); ?>  
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
                                                <img src="<?php tk_get_thumb(412, 276, $slide_images[0]); ?>" alt="<?php the_title(); ?>" />
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


                        </div><!--/gallery-single-content-->



                    </div><!--/wrapper-content-->
                </div><!--/bg-content-->


            </div>
        </div><!--/wrapper-->
    </div><!--/content-->


    <script type="text/javascript">
        
    jQuery(document).ready(function(){
            "use strict";
            //LOAD ISOTOPE
            var container = jQuery('.da-thumbs');
            jQuery(container).imagesLoaded(function(){
                jQuery(container).isotope({
                    layoutMode:'fitRows',
                    itemSelector:'.home-gallery-one',
                    isAnimated:true,
                    animationEngine:'jquery',
                    animationOptions:{
                        duration:800,
                        easing:'easeOutCubic',
                        queue:false
                    }
                });
            });

            jQuery('.gallery-filter a').click(function(){
                var selector = jQuery(this).attr('data-filter');
                jQuery(container).isotope({ filter: selector });
                return false;
            });
            
            jQuery('.gallery-filter a').each(function(){
                jQuery(this).click(function(){
                   jQuery('.gallery-filter a').each(function(){
                     jQuery(this).removeClass('active');
               });
                    jQuery(this).addClass('active');
                });
            });
        
        jQuery(function() {
            "use strict";
            jQuery("<select />").appendTo(".gallery-filter");
                jQuery("<option />", {
                 "selected": "selected",
                 "value"   : "",
                 "text"    : "Go to..."
                }).appendTo(".gallery-filter select");
            jQuery(".gallery-filter a").each(function() {
                var el = jQuery(this);
                jQuery("<option />", {
                   "value"   : el.attr("href"),
                   "data-filter"   : el.attr("data-filter"),
                   "text"    : el.text()
                }).appendTo(".gallery-filter select");
            });
            jQuery(".gallery-filter select").change(function() {
                var container = jQuery('.gallery-single-content');
                var selector = jQuery(this).find("option:selected").attr('data-filter');
                jQuery(container).isotope({ filter: selector });
                return false;
            });
        });
    });
    </script>



    
<?php get_footer(); ?>
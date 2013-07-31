<?php
global $prefix;
$post_id = $post->ID;
$get_post_type = get_option('col_1-'.$post->ID);
$get_service = get_option('sub_services-'.$post->ID); 
$news_title = get_option('sub_news_title-'.$post->ID); 
$services_title = get_option('sub_services_title-'.$post->ID);
$team_title = get_option('sub_team_title-'.$post->ID);
$testimonials_title = get_option('sub_testimonial_title-'.$post->ID);

$get_team_id = get_option('id_team_page');
?>

<div class="wrapper-content one-column-builder left">
    <?php
    //page builder type services
    if($get_post_type == 'services') { 

            $args=array('post_type' => 'services', 'post_status' => 'publish', 'posts_per_page' => 1, 'p'=>$get_service);

            //The Query
            query_posts($args);

            //The Loop
            if ( have_posts() ) : while ( have_posts() ) : the_post();
            $image_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'home-news');
            $tk_background_color = get_post_meta($post->ID, $prefix.'background_color', true);
            $tk_headline_color = get_post_meta($post->ID, $prefix.'headline_color', true);
            $tk_text_color = get_post_meta($post->ID, $prefix.'text_color', true);
            $tk_hover_color = get_post_meta($post->ID, $prefix.'hover_color', true);  

            $subheading = get_post_meta($post->ID, $prefix.'subheading_text', true);
        ?>
               <?php if(!empty($services_title)){ ?>
                    <div class="home-title-nav left">
                        <span><?php echo $services_title; ?></span>
                    </div>
               <?php } ?>
    
                <div class="home-services-one home-services-one<?php echo $post->ID; ?>  left">
                    <div class="home-services-one-content ca-menu left">

                        <div class="home-services-one-image-title left ca-content">
                                <?php if(has_post_thumbnail()) {?>
                                    <img class="ca-main" src="<?php echo $image_thumb[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                                <?php } ?>
                            <span class="ca-sub <?php if(!has_post_thumbnail()) {?>post-fullwidth<?php } ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
                            <?php if(!empty($subheading)){ ?><p class="ca-sub <?php if(!has_post_thumbnail()) {?>post-fullwidth<?php } ?>"><?php echo $subheading; ?></p><?php } ?>
                        </div><!--/home-services-one-image-title--> 
                        <div class="home-services-one-image-text left ca-icon">

                            <?php if($post->post_excerpt){
                                the_excerpt();
                            }  else { ?>
                                 <p> <?php the_excerpt_length(265); ?></p>
                           <?php }  ?>                       

                        </div><!--/home-services-one-image-text--> 

                    </div><!--/home-services-one-content-->           
                    
                    <div class="home-services-one-image-link right ca-icon">
                        <a href="<?php the_permalink(); ?>"><?php _e('More', tk_theme_name ); ?></a>
                    </div><!--/home-services-one-image-link--> 
                    
                </div><!--/home-services-one-->
            <?php endwhile; endif; ?>


            <?php } elseif ($get_post_type == 'news') { ?>
                
                <script type="text/javascript"> 
                    
                        jQuery(window).load(function() {
                          jQuery('.flexslider-news<?php echo $post_id; ?>').flexslider({
                            animation: "slide",
                            animationLoop: false,
                            controlNav: false,
                            slideshow: false,
                            prevText: "Prev",
                            nextText: "Next",  
                            controlsContainer: ".home-navigation<?php echo $post_id; ?>"
                          });                          
                        });                        
                </script>

                
        <div class="flexslider-news-wrap flex-news-slide fullwidth-flex">
            <div class="home-title-nav left">                
                <?php if(!empty($news_title)) {?><span><?php echo $news_title; ?></span><?php } ?>                
                <div class="home-navigation home-navigation<?php echo $post_id; ?> left">
                </div><!--/home-navigation-->
            </div>

            <div class="flexslider-part-news flexslider-part-news<?php echo $post_id; ?>">
                <div class="flexslider flexslider-news flexslider-news<?php echo $post_id; ?>">

                    <ul class="slides">  

                    <?php
                        $news_post_num = get_option('sub_news_number-'.$post->ID);
                        $news_post_cat = get_option('sub_news_category-'.$post->ID);

                        $args = array('post_status' => 'publish', 'post_type' => 'post',  'posts_per_page' => $news_post_num, 'cat' => $news_post_cat );
                        // The Query
                        query_posts ($args);
                        // The Loop
                        if (have_posts()): while (have_posts()) : the_post();                        
                        $format = get_post_format();
                    ?>
                        <li>
                            <div class="home-latest-news-one fullwidth left">                            
                                    <?php if(has_post_thumbnail() || $format =='video' || $format == 'gallery'){ ?>
                                        <div class="home-latest-news-one-image left">
                                            <a href="<?php the_permalink();?>">                                                
                                                
                                                <?php if (has_post_thumbnail() && $format == '') { ?>
                                                    <?php the_post_thumbnail('servicesthumb'); ?>
                                                <?php } elseif($format=='video') {
                                                    $video_link = get_post_meta($post->ID, $prefix . 'video_link', true);
                                                        echo get_video_image($video_link, $post->ID); 
                                                    } elseif ($format == 'gallery'){
                                                    $slide_images = get_post_meta($post->ID, $prefix . 'repeatable', true);   ?>
                                                        <img src="<?php tk_get_thumb(71, 71, $slide_images[0]); ?>" alt="<?php the_title(); ?>" />
                                                    <?php } ?>
                                                    
                                                <div class="border-red-opacity"></div>
                                                <div class="horisontal-images-hover"><p></p></div>
                                            </a>
                                        </div><!--/home-latest-news-one-image-->
                                    <?php } ?>
                                <div class="home-latest-news-one-titile <?php if(!has_post_thumbnail() && $format !== 'video' && $format !== 'gallery' ) { ?>post-fullwidth<?php } ?> left">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    <p><?php _e('Posted:', tk_theme_name); ?> <?php echo get_the_date()?></p>
                                </div><!--/home-latest-news-one-titile-->
                                <div class="home-latest-news-one-text-content <?php if(!has_post_thumbnail() && $format !== 'video' && $format !== 'gallery' ) { ?>post-fullwidth<?php } ?> left">
                                    <div class="home-latest-news-one-text left">
                                        <p><?php the_excerpt_length(280); ?></p>
                                    </div><!--/home-latest-news-one-text-->
                                    <div class="home-latest-news-one-link left">
                                        <a href="<?php the_permalink(); ?>"><?php _e('Read More', tk_theme_name); ?></a>
                                    </div><!--/home-latest-news-one-link-->
                                </div><!--/home-latest-news-one-text-content-->
                            </div><!--/home-latest-news-one-->
                        </li>
                <?php endwhile; endif; ?>
                    </ul>
                </div>
            </div>
    </div><!-- flex-news-wrap -->
    
    <?php } elseif ($get_post_type == 'testimonials'){ 

        
                if(!empty($testimonials_title)){ ?>
                    <div class="home-title-nav left">
                        <span><?php echo $testimonials_title; ?></span>
                    </div>
               <?php }
               
                $testimonial_post = get_option('sub_testimonial-'.$post->ID);
                $random_post = get_option('sub_check_testimonials-'. $post->ID);

               if($random_post[0] == 'yes'){
                $args = array('post_status' => 'publish', 'post_type' => 'testimonials', 'posts_per_page' =>1, 'orderby' => 'rand');
               } else {
                $args = array('post_status' => 'publish', 'post_type' => 'testimonials', 'posts_per_page' =>1, 'p' => $testimonial_post);
               }

                // The Query
                query_posts ($args);
                // The Loop
                if (have_posts()): while (have_posts()) : the_post();
                $tk_email = get_post_meta($post->ID, $prefix.'email', true);
                $tk_job_position = get_post_meta($post->ID, $prefix.'job_position', true);
            ?>
                <div class="home-testimonials-one full-width left">
                    <div class="home-testimonials-one-content left">  

                        <?php if(!empty($tk_email)){ ?>
                            <div class="home-testimonials-one-image left">
                                <?php echo get_avatar($tk_email,$size='72' ); ?>
                            </div><!--/home-testimonials-one-image-->
                        <?php } ?>
                        <div class="home-testimonials-one-titile <?php if(empty($tk_email)) { echo "post-fullwidth"; } ?> left">
                            <span><?php the_title(); ?></span>
                            <?php if(!empty($tk_job_position)){ ?><p><?php echo $tk_job_position; ?></p><?php } ?>
                        </div><!--/home-testimonials-one-titile-->
                        <div class="home-testimonials-one-text left">
                            <p><?php the_excerpt(); ?></p>
                        </div><!--/home-testimonials-one-text-->

                    </div><!--/home-testimonials-one-content-->                            
                </div><!--/home-testimonials-one-->
                <?php endwhile; endif; ?>
                
                <?php
                } elseif($get_post_type == 'team') {
                    $team_number = get_option('sub_team_number-'.$post->ID);
                    if(!empty($team_title)){ ?>
                        <div class="home-title-nav left">
                            <span><?php echo $team_title; ?></span>
                        </div>
                   <?php } ?>


                <script type="text/javascript"> 
                    
                        jQuery(window).load(function() {      
                            
                        var sliderWidth = jQuery('.flexslider<?php echo $post_id ?>').width();
                            
                        if(sliderWidth < 418) {
                            var itemWidthCalc = (sliderWidth);
                        } else if(sliderWidth < 550) {
                            var itemWidthCalc = (sliderWidth - 20) / 2;
                        } else if (sliderWidth < 750){
                            var itemWidthCalc = (sliderWidth - 40) / 3;
                        } else {
                            var itemWidthCalc = (sliderWidth - 60) / 4;
                        }                            
                                          
                          jQuery('.flexslider<?php echo $post_id; ?>').flexslider({
                            animation: "slide",
                            animationLoop: false,
                            itemWidth: itemWidthCalc,
                            itemMargin: 20,
                            controlNav: false,
                            slideshow: false, 
                            controlsContainer: ".flexslider-part<?php echo $post_id; ?>"
                          });                          
                        });
                        
                    // check grid size on resize event
                     jQuery(window).resize(function() {
                        var getFlexslider = jQuery('.flexslider<?php echo $post_id ?>').html();
                        
                        jQuery('.flexslider<?php echo $post_id ?>').remove();
                        jQuery('.flexslider-part<?php echo $post_id ?> .flex-direction-nav').remove();
                        jQuery('.flexslider-part<?php echo $post_id ?>').append('<div class="flexslider flexslider<?php echo $post_id; ?>">'+getFlexslider+'</div>');

                        var sliderWidth = jQuery('.flexslider<?php echo $post_id ?>').width();
                    
                        if(sliderWidth < 418) {
                            var itemWidthCalc = (sliderWidth);
                        } else if(sliderWidth < 550) {
                            var itemWidthCalc = (sliderWidth - 20) / 2;
                        } else if (sliderWidth < 750){
                            var itemWidthCalc = (sliderWidth - 40) / 3;
                        } else {
                            var itemWidthCalc = (sliderWidth - 60) / 4;
                        }
                        
                        jQuery('.flexslider<?php echo $post_id; ?>').flexslider({
                            animation: "slide",
                            animationLoop: false,
                            itemWidth: itemWidthCalc,
                            itemMargin: 20,
                            slideshow: false, 
                            controlNav: false,
                            controlsContainer: ".flexslider-part<?php echo $post_id; ?>"
                          });             
                          
                          
                    });
                        
                </script>

                
                    <div class="flexslider-part flexslider-part<?php echo $post->ID; ?>">
                        <div class="flexslider flexslider<?php echo $post->ID; ?>">
                          <ul class="slides">

                                <?php
                                    $args = array('post_status' => 'publish', 'post_type' => 'team-members', 'posts_per_page' =>$team_number, 'meta_key'=>'_thumbnail_id');
                                    // The Query
                                    query_posts ($args);
                                    // The Loop
                                    if (have_posts()): while (have_posts()) : the_post();
                                    $tk_member_title = get_post_meta($post->ID, $prefix.'title_info', true);
                                    $post_link = get_permalink($get_team_id).'#'.$post->post_title;    
                                    ?>
                                <li>
                                    <div class="horisontal-images left">
                                        <a href="<?php echo $post_link; ?>">
                                            <?php the_post_thumbnail('teammembers-slide'); ?>
                                            <div class="border-red-opacity"></div>
                                            <div class="horisontal-images-hover"><p></p></div>
                                        </a>
                                    </div>
                                    <div class="horisontal-text left">

                                        <div class="table">
                                            <div class="table-cell">
                                                <a href="<?php echo $post_link; ?>"><?php the_title(); ?></a>
                                                <?php if(!empty($tk_member_title)){ ?><p><?php echo $tk_member_title; ?></p><?php } ?>
                                            </div><!-- table-cell -->
                                        </div><!-- table -->

                                    </div>
                                </li>
                                <?php endwhile; endif; ?>

                            </ul>
                        </div>
                    </div><!-- flexslider-part -->

              <?php  } elseif($get_post_type == 'adbanner'){ 
                    $ad_post = get_option('sub_bulder_banner-' . $post->ID);               
                    $custom_banner = get_post_meta($ad_post, $prefix.'custom_banner_code', true);
                    $image_src = wp_get_attachment_image_src( get_post_thumbnail_id($ad_post), 'full' ); 

                    tk_add_banner_view($ad_post);
                    ?>
                    <div class="home-content-ad left">

                        <?php if(!empty($custom_banner)) { 
                            echo $custom_banner;        
                        } else { ?>        
                            <a href="<?php site_url(); ?>?banner_id=<?php echo $ad_post; ?>">
                                <img src="<?php echo $image_src[0]; ?>" title="<?php the_title($ad_post)?>" alt="<?php the_title($ad_post)?>"/>
                            </a>
                        <?php } ?>

                    </div>
            <?php } elseif($get_post_type=='content') {

                $page_content = get_option('sub_page_content-'.$post->ID);
                ?>
                <div class="home-page-content home-fullwidth left">
                    <div class="shortcodes" style="margin:0">
                        <?php wp_reset_query();
                        query_posts('page_id='.$page_content);
                        if (have_posts()) : while (have_posts()) : the_post();
                                the_content();
                            endwhile;
                        else:
                        endif;
                        wp_reset_query(); ?>
                    </div><!--/wrapper-->
                </div><!--/wrapper-->

            
      <?php } ?>
</div><!-- wrapper-content -->



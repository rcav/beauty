<?php
global $prefix;

$get_post_type = get_option('col_1-'.$post->ID);

$post_id = $post->ID;

$get_post_type_col_center = get_option('col_2-'.$post->ID);
$get_post_type_col_right = get_option('col_3-'.$post->ID);

$services_title_left = get_option('sub_services_title_left-'.$post->ID);
$services_title_center = get_option('sub_services_title-'.$post->ID);
$services_title_right = get_option('sub_services_title_right-'.$post->ID);

$latest_news_title_left = get_option('sub_news_title_left-'.$post->ID);
$latest_news_title_center = get_option('sub_news_title_center-'.$post->ID);
$latest_news_title_right = get_option('sub_news_title_right-'.$post->ID);

$sub_testimonials_left = get_option('sub_testimonial_title_left-'.$post->ID);
$sub_testimonials_center = get_option('sub_testimonial_title_center-'.$post->ID);
$sub_testimonials_right = get_option('sub_testimonial_title_right-'.$post->ID);

$sub_team_left = get_option('sub_team_title_left-'.$post->ID);
$sub_team_center = get_option('sub_team_title_center-'.$post->ID);
$sub_team_right = get_option('sub_team_title_right-'.$post->ID);
?>


<div class="wrapper-content left">
<?php
if($get_post_type == 'services') {
    $get_service = get_option('sub_services_left-'.$post->ID);

    ?>
    
    <div class="third-width left">
        
            <?php if(!empty($services_title_left)){ ?>
                <div class="home-title-nav left">
                    <span><?php echo $services_title_left; ?></span>
                </div>
           <?php } ?>
        
            <?php
                $args=array('post_type' => 'services', 'post_status' => 'publish', 'posts_per_page' => 1, 'p'=>$get_service);

                //The Query
                query_posts($args);

                //The Loop
                if ( have_posts() ) : while ( have_posts() ) : the_post();
                $image_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'servicesthumb');
                $tk_background_color = get_post_meta($post->ID, $prefix.'background_color', true);
                $tk_headline_color = get_post_meta($post->ID, $prefix.'headline_color', true);
                $tk_text_color = get_post_meta($post->ID, $prefix.'text_color', true);
                $tk_hover_color = get_post_meta($post->ID, $prefix.'hover_color', true);     
                $subheading = get_post_meta($post->ID, $prefix.'subheading_text', true);
            ?>

            <div class="home-services-one home-services-one<?php echo $post->ID; ?>  bg-services-red left">
                <div class="home-services-one-content ca-menu left">

                    <div class="home-services-one-image-title left ca-content">
                            <?php if(has_post_thumbnail()) {?>
                                <img class="ca-main" src="<?php echo $image_thumb[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                            <?php } ?>
                        <span class="ca-sub <?php if(!has_post_thumbnail()) { echo 'post-fullwidth';} ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
                        <?php if(!empty($subheading)){ ?><p class="ca-sub <?php if(!has_post_thumbnail()) {?>post-fullwidth<?php } ?>"><?php echo $subheading; ?></p><?php } ?>
                    </div><!--/home-services-one-image-title--> 
                    <div class="home-services-one-image-text left ca-icon">
                        <p><?php the_excerpt(); ?></p>
                    </div><!--/home-services-one-image-text--> 
                </div><!--/home-services-one-content-->                       
                
                <div class="home-services-one-image-link right ca-icon">
                    <a href="<?php the_permalink(); ?>"><?php _e('More', tk_theme_name ); ?></a>
                </div><!--/home-services-one-image-link--> 
                
            </div><!--/home-services-one-->
            <?php endwhile; endif; ?>
    </div><!-- third-width-->

<?php } elseif ($get_post_type == 'news') {
   ?>
            

            <script type="text/javascript">                    
                jQuery(window).load(function() {
                  jQuery('.flexslider-news-left<?php echo $post_id; ?>').flexslider({
                    animation: "fade",
                    animationLoop: false,
                    controlNav: false,
                    slideshow: false, 
                    smoothHeight:true,
                    prevText: "Prev",
                    nextText: "Next",  
                    controlsContainer: ".home-navigation-left<?php echo $post_id; ?>"
                  });                          
                });              
        </script>
            
                            
        <div class="third-width left">
            
        <div class="flexslider-part-news-left flex-news-slide flexslider-part-news-left<?php echo $post_id; ?>">
            <div class="home-title-nav left">
                <?php if(!empty($latest_news_title_left)){ ?>
                    <span><?php echo $latest_news_title_left; ?></span>
                <?php } ?>
                <div class="home-navigation home-navigation-left<?php echo $post_id; ?> left">
                </div><!--/home-navigation-->
            </div>
            <div class="flexslider flexslider-news-left flexslider-news-left<?php echo $post_id; ?>">
            
            <ul class="slides">
            <?php
                    $news_post_num = get_option('sub_news_number_left-'.$post->ID);
                    $news_post_cat = get_option('sub_news_category_left-'.$post->ID);

                    $args = array('post_status' => 'publish', 'post_type' => 'post',  'posts_per_page' => $news_post_num, 'cat' => $news_post_cat );
                    // The Query
                    query_posts ($args);
                    // The Loop
                    if (have_posts()): while (have_posts()) : the_post();
                    $format = get_post_format();
                ?>
                <li>
                    <div class="home-latest-news-one left">                            
                            <?php if(has_post_thumbnail() || $format =='video' || $format == 'gallery'){ ?>
                                <div class="home-latest-news-one-image left">
                                    <a href="<?php the_permalink();?>">                                                

                                        <?php if (has_post_thumbnail() && $format == '') { ?>
                                            <?php the_post_thumbnail('home-news'); ?>
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
                                <p><?php the_excerpt_length(120); ?></p>
                            </div><!--/home-latest-news-one-text-->
                            <div class="home-latest-news-one-link left">
                                <a href="<?php the_permalink(); ?>"><?php _e('Read More', tk_theme_name); ?></a>
                            </div><!--/home-latest-news-one-link-->
                        </div><!--/home-latest-news-one-text-content-->
                    </div><!--/home-latest-news-one-->
                </li>
                <?php endwhile; endif; wp_reset_query();?>
                
                </ul>
            </div>
        </div>

</div><!-- half-width -->
                            
<?php } elseif ($get_post_type == 'testimonials'){ ?>
    
    <div class="third-width left">
    
        <?php if(!empty($sub_testimonials_left)){ ?>
            <div class="home-title-nav left">
                <span><?php echo $sub_testimonials_left; ?></span>
            </div>
       <?php } ?>
        
    <?php
            $testimonial_post = get_option('sub_testimonial_left-'.$post->ID);
            $random_post = get_option('sub_check_testimonials_left-'. $post->ID);

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
            <div class="home-testimonials-one left">
                <div class="home-testimonials-one-content left">  

                    <?php if(!empty($tk_email)){ ?>
                        <div class="home-testimonials-one-image left">
                            <?php echo get_avatar($tk_email,$size='72' ); ?>
                        </div><!--/home-testimonials-one-image-->
                    <?php } ?>
                    <div class="home-testimonials-one-titile testimonials-title-third <?php if(empty($tk_email)) {echo 'post-fullwidth';} ?> left">
                        <span><?php the_title(); ?></span>
                        <?php if(!empty($tk_job_position)){ ?><p><?php echo $tk_job_position; ?></p><?php } ?>
                    </div><!--/home-testimonials-one-titile-->
                    <div class="home-testimonials-one-text left">
                        <p><?php the_excerpt(); ?></p>
                    </div><!--/home-testimonials-one-text-->

                </div><!--/home-testimonials-one-content-->                            
            </div><!--/home-testimonials-one-->
            <?php endwhile; endif; ?>
        </div><!-- third-width -->
            
            <?php } elseif($get_post_type == 'team') { 
                $team_number = get_option('sub_team_number_left-'.$post->ID);
                ?>
            
            <div class="horizontal-slider third-width third-width-horizontal left">

               <div class="home-title-nav slider-width-auto left">
                    <?php if(!empty($sub_team_left)){ ?><span><?php echo $sub_team_left; ?></span><?php } ?>
                </div>

                <script type="text/javascript"> 
                    
                        jQuery(window).load(function() {
                            
                        var sliderWidth = jQuery('.flexslider-left<?php echo $post_id ?>').width();
                        var windowWidth = jQuery(window).width();
                    
                        if(windowWidth < 630){
                           
                         if(sliderWidth < 320) {
                                var itemWidthCalc = (sliderWidth);
                                var marginWidth = 0;
                            } else  if(sliderWidth < 420) { 
                                var itemWidthCalc = (sliderWidth - 10) / 2;
                                var marginWidth = 10;
                            } else { 
                                var itemWidthCalc = (sliderWidth - 10) / 3;
                                var marginWidth = 10;
                            }
                        
                        } else {
                            if(sliderWidth < 500) { 
                                var itemWidthCalc = (sliderWidth);
                                var marginWidth = 0;
                            } else  { 
                                var itemWidthCalc = (sliderWidth - 10) / 3;
                                var marginWidth = 10;
                            }
                        }
                                
                          jQuery('.flexslider-left<?php echo $post_id; ?>').flexslider({
                            animation: "slide",
                            animationLoop: false,
                            itemWidth: itemWidthCalc,
                            itemMargin: marginWidth,
                            controlNav: false,
                            slideshow: false, 
                            controlsContainer: ".flexslider-part-left<?php echo $post_id; ?>"
                          });
                        });
                        
                    // check grid size on resize event
                     jQuery(window).resize(function() {
                        var getFlexslider = jQuery('.flexslider-left<?php echo $post_id ?>').html();
                        jQuery('.flexslider-part-left<?php echo $post_id ?> .flex-direction-nav').remove();
                        jQuery('.flexslider-left<?php echo $post_id ?>').remove();
                        jQuery('.flexslider-part-left<?php echo $post_id ?>').append('<div class="flexslider flexslider-left<?php echo $post_id; ?>">'+getFlexslider+'</div>');
                    
                        var sliderWidth = jQuery('.flexslider-left<?php echo $post_id ?>').width();
                        var windowWidth = jQuery(window).width();
                        
                        if(windowWidth < 630){
                           
                         if(sliderWidth < 320) {
                                var itemWidthCalc = (sliderWidth);
                                var marginWidth = 0;
                            } else  if(sliderWidth < 420) { 
                                var itemWidthCalc = (sliderWidth - 10) / 2;
                                var marginWidth = 10;
                            } else { 
                                var itemWidthCalc = (sliderWidth - 10) / 3;
                                var marginWidth = 10;
                            }
                        
                        } else {
                            if(sliderWidth < 500) { 
                                var itemWidthCalc = (sliderWidth);
                                var marginWidth = 0;
                            } else  { 
                                var itemWidthCalc = (sliderWidth - 10) / 3;
                                var marginWidth = 10;
                            }
                        }
                                
                        
                        jQuery('.flexslider-left<?php echo $post_id; ?>').flexslider({
                            animation: "slide",
                            animationLoop: false,
                            itemWidth: itemWidthCalc,
                            itemMargin: marginWidth,
                            controlNav: false,
                            slideshow: false,
                            controlsContainer: ".flexslider-part-left<?php echo $post_id; ?>"
                          });                  
                    });
                        
                </script>
               
            
                <div class="flexslider-part flexslider-part-left<?php echo $post_id; ?>">
                    <div class="flexslider flexslider-left<?php echo $post_id; ?>">
                      <ul class="slides">                                    
                        <?php
                            $args = array('post_status' => 'publish', 'post_type' => 'team-members', 'posts_per_page' =>$team_number, 'meta_key'=>'_thumbnail_id');
                            // The Query
                            query_posts ($args);
                            // The Loop
                            if (have_posts()): while (have_posts()) : the_post();
                            $tk_member_title = get_post_meta($post->ID, $prefix.'title_info', true);
                            ?>
                        <li>
                            <div class="horisontal-images left">
                                <a href="<?php the_permalink() ?>">
                                    <?php the_post_thumbnail('teammembers-slide'); ?>
                                    <div class="border-red-opacity"></div>
                                    <div class="horisontal-images-hover"><p></p></div>
                                </a>
                            </div>
                            <div class="horisontal-text left">
                                    <div class="table">
                                        <div class="table-cell">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            <?php if(!empty($tk_member_title)){ ?><p><?php echo $tk_member_title; ?></p><?php } ?>
                                        </div><!-- table-cell -->
                                    </div><!-- table -->
                            </div>
                        </li>
                        <?php endwhile; endif; ?>


                    </ul>
                </div>
            </div>
            </div>
            
          <?php  } elseif($get_post_type == 'adbanner'){ 
                $ad_post = get_option('sub_bulder_banner_left-' . $post->ID);                
                $custom_banner = get_post_meta($ad_post, $prefix.'custom_banner_code', true);
                $image_src = wp_get_attachment_image_src( get_post_thumbnail_id($ad_post), 'full' ); 
                //tk_add_banner_view($ad_post);
                ?>
                <div class="home-content-ad third-width left">

                    <?php if(!empty($custom_banner)) { 
                        echo $custom_banner;        
                    } else { ?>        
                        <a href="<?php site_url(); ?>?banner_id=<?php echo $ad_post; ?>">
                            <img src="<?php echo $image_src[0]; ?>" title="<?php the_title($ad_post)?>" alt="<?php the_title($ad_post)?>"/>
                        </a>
                    <?php } ?>

                </div>
        <?php } elseif($get_post_type=='content') {
            $page_content = get_option('sub_page_content_left-'.$post->ID);
            ?>
            <div class="home-page-content third-width left">
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
            
            
      <?php }           
            
            
            
      
      //CENTER COLUMN
      
      
if($get_post_type_col_center == 'services') {
    $get_service = get_option('sub_services-'.$post_id);
    ?>
            
        <div class="third-width left">
        
            <?php if(!empty($services_title_center)){ ?>
                <div class="home-title-nav left">
                    <span><?php echo $services_title_center; ?></span>
                </div>
           <?php } ?>
                
                
                <?php
                    $args=array('post_type' => 'services', 'post_status' => 'publish', 'posts_per_page' => 1, 'p'=>$get_service);

                    //The Query
                    query_posts($args);

                    //The Loop
                    if ( have_posts() ) : while ( have_posts() ) : the_post();
                    $image_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'servicesthumb');
                    $tk_background_color = get_post_meta($post->ID, $prefix.'background_color', true);
                    $tk_headline_color = get_post_meta($post->ID, $prefix.'headline_color', true);
                    $tk_text_color = get_post_meta($post->ID, $prefix.'text_color', true);
                    $tk_hover_color = get_post_meta($post->ID, $prefix.'hover_color', true);       

                    $subheading = get_post_meta($post->ID, $prefix.'subheading_text', true);
                ?>

                <div class="home-services-one home-services-one<?php echo $post->ID; ?>  bg-services-red left">
                    <div class="home-services-one-content ca-menu left">

                        <div class="home-services-one-image-title left ca-content">
                                <?php if(has_post_thumbnail()) {?>
                                    <img class="ca-main" src="<?php echo $image_thumb[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                                <?php } ?>
                            <span class="ca-sub <?php if(!has_post_thumbnail()) {?>post-fullwidth<?php } ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
                            <?php if(!empty($subheading)){ ?><p class="ca-sub <?php if(!has_post_thumbnail()) {?>post-fullwidth<?php } ?>"><?php echo $subheading; ?></p><?php } ?>
                        </div><!--/home-services-one-image-title--> 
                        <div class="home-services-one-image-text left ca-icon">
                            <p><?php the_excerpt(); ?></p>
                        </div><!--/home-services-one-image-text--> 
                    </div><!--/home-services-one-content-->         

                    <div class="home-services-one-image-link right ca-icon">
                        <a href="<?php the_permalink(); ?>"><?php _e('More', tk_theme_name ); ?></a>
                    </div><!--/home-services-one-image-link--> 
                    
                </div><!--/home-services-one-->
                <?php endwhile; endif; ?>
            </div><!-- third-width-->


                <?php } elseif ($get_post_type_col_center == 'news') {  ?>


                <script type="text/javascript">                    
                    jQuery(window).load(function() {
                      jQuery('.flexslider-news-center<?php echo $post_id; ?>').flexslider({
                        animation: "fade",
                        animationLoop: false,
                        controlNav: false,
                        slideshow: false, 
                        prevText: "Prev",
                        nextText: "Next",  
                        controlsContainer: ".home-navigation-center<?php echo $post_id; ?>"
                      });                          
                    });              
            </script>
                
                
        <div class="third-width left">
                
        <div class="flexslider-part-news-center flex-news-slide flexslider-part-news-center<?php echo $post_id; ?>">
            <div class="home-title-nav left">
                    <?php if(!empty($latest_news_title_center)){ ?>
                        <span><?php echo $latest_news_title_center; ?></span>
                    <?php } ?>
                <div class="home-navigation home-navigation-center<?php echo $post_id; ?> left">
                </div><!--/home-navigation-->
            </div>
            <div class="flexslider flexslider-news-center flexslider-news-center<?php echo $post_id; ?>">
            
            <ul class="slides">
                    
                    <?php
                        $news_post_num = get_option('sub_news_number-'.$post_id);
                        $news_post_cat = get_option('sub_news_category-'.$post_id);

                        $args = array('post_status' => 'publish', 'post_type' => 'post',  'posts_per_page' => $news_post_num, 'cat' => $news_post_cat );
                        // The Query
                        query_posts ($args);
                        // The Loop
                        if (have_posts()): while (have_posts()) : the_post();
                        $format = get_post_format();
                    ?>
                          <li>
                            <div class="home-latest-news-one left">                            
                                    <?php if(has_post_thumbnail() || $format =='video' || $format == 'gallery'){ ?>
                                        <div class="home-latest-news-one-image left">
                                            <a href="<?php the_permalink();?>">                                                
                                                
                                                <?php if (has_post_thumbnail() && $format == '') { ?>
                                                    <?php the_post_thumbnail('home-news'); ?>
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
                                        <p><?php the_excerpt_length(120); ?></p>
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
            </div>
                            
<?php } elseif ($get_post_type_col_center == 'testimonials'){ ?>
    
        <div class="third-width left">    
            <?php if(!empty($sub_testimonials_center)){ ?>
                <div class="home-title-nav left">
                    <span><?php echo $sub_testimonials_center; ?></span>
                </div>
           <?php }
    
            $testimonial_post = get_option('sub_testimonial_center-'.$post_id);
            $random_post = get_option('sub_check_testimonials_center-'.$post_id);

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
            <div class="home-testimonials-one left">
                <div class="home-testimonials-one-content left">  

                    <?php if(!empty($tk_email)){ ?>
                        <div class="home-testimonials-one-image left">
                            <?php echo get_avatar($tk_email,$size='72' ); ?>
                        </div><!--/home-testimonials-one-image-->
                    <?php } ?>
                    <div class="home-testimonials-one-titile testimonials-title-third <?php if(empty($tk_email)) {echo 'post-fullwidth';} ?> left">
                        <span><?php the_title(); ?></span>
                        <?php if(!empty($tk_job_position)){ ?><p><?php echo $tk_job_position; ?></p><?php } ?>
                    </div><!--/home-testimonials-one-titile-->
                    <div class="home-testimonials-one-text left">
                        <p><?php the_excerpt(); ?></p>
                    </div><!--/home-testimonials-one-text-->

                </div><!--/home-testimonials-one-content-->                            
            </div><!--/home-testimonials-one-->
            <?php endwhile; endif; ?>
        </div><!-- third-width -->
           <?php }  elseif($get_post_type_col_center == 'team') { 
                $team_number = get_option('sub_team_number_center-'.$post_id);
                ?>
            
         <div class="horizontal-slider third-width third-width-horizontal left">
            
               <div class="home-title-nav slider-width-auto left">
                    <?php if(!empty($sub_team_center)){ ?><span><?php echo $sub_team_center; ?></span><?php } ?>
                </div>
                
                <script type="text/javascript"> 
                    
                        jQuery(window).load(function() {    
                            
                        var sliderWidth = jQuery('.flexslider-center<?php echo $post_id ?>').width();
                        var windowWidth = jQuery(window).width();
                        if(windowWidth < 630){
                           
                         if(sliderWidth < 320) {
                                var itemWidthCalc = (sliderWidth);
                                var marginWidth = 0;
                            } else  if(sliderWidth < 420) { 
                                var itemWidthCalc = (sliderWidth - 10) / 2;
                                var marginWidth = 10;
                            } else { 
                                var itemWidthCalc = (sliderWidth - 10) / 3;
                                var marginWidth = 10;
                            }
                        
                        } else {
                            if(sliderWidth < 500) { 
                                var itemWidthCalc = (sliderWidth);
                                var marginWidth = 0;
                            } else  { 
                                var itemWidthCalc = (sliderWidth - 10) / 3;
                                var marginWidth = 10;
                            }
                        }
                                            
                          jQuery('.flexslider-center<?php echo $post_id; ?>').flexslider({
                            animation: "slide",
                            animationLoop: false,
                            itemWidth: itemWidthCalc,
                            itemMargin: 0,
                            controlNav: false,
                            slideshow: false, 
                            controlsContainer: ".flexslider-part-center<?php echo $post_id; ?>"
                          });                          
                        });
                        
                    // check grid size on resize event
                     jQuery(window).resize(function() {
                        var getFlexslider = jQuery('.flexslider-center<?php echo $post_id ?>').html();
                        jQuery('.flexslider-part-center<?php echo $post_id ?> .flex-direction-nav').remove();
                        jQuery('.flexslider-center<?php echo $post_id ?>').remove();                        
                        jQuery('.flexslider-part-center<?php echo $post_id ?>').append('<div class="flexslider flexslider-center<?php echo $post_id; ?>">'+getFlexslider+'</div>');
                    
                        var sliderWidth = jQuery('.flexslider-center<?php echo $post_id ?>').width();
                        var windowWidth = jQuery(window).width();
                        
                        if(windowWidth < 630){
                           
                         if(sliderWidth < 320) {
                                var itemWidthCalc = (sliderWidth);
                                var marginWidth = 0;
                            } else  if(sliderWidth < 420) { 
                                var itemWidthCalc = (sliderWidth - 10) / 2;
                                var marginWidth = 10;
                            } else { 
                                var itemWidthCalc = (sliderWidth - 10) / 3;
                                var marginWidth = 10;
                            }
                        
                        } else {
                            if(sliderWidth < 500) { 
                                var itemWidthCalc = (sliderWidth);
                                var marginWidth = 0;
                            } else  { 
                                var itemWidthCalc = (sliderWidth - 10) / 3;
                                var marginWidth = 10;
                            }
                        }
                        
                        jQuery('.flexslider-center<?php echo $post_id; ?>').flexslider({
                            animation: "slide",
                            animationLoop: false,
                            itemWidth: itemWidthCalc,
                            itemMargin: 0,
                            controlNav: false,
                            slideshow: false, 
                            controlsContainer: ".flexslider-part-center<?php echo $post_id; ?>"
                          });                  
                    });
                        
                </script>
               
               
                
                <div class="flexslider-part flexslider-part-center<?php echo $post_id; ?>">
                    <div class="flexslider flexslider-center<?php echo $post_id; ?>">
                      <ul class="slides">                                 
                        <?php
                            $args = array('post_status' => 'publish', 'post_type' => 'team-members', 'posts_per_page' =>$team_number, 'meta_key'=>'_thumbnail_id');
                            // The Query
                            query_posts ($args);
                            // The Loop
                            if (have_posts()): while (have_posts()) : the_post();
                            $tk_member_title = get_post_meta($post->ID, $prefix.'title_info', true);
                            ?>
                        <li>
                            <div class="horisontal-images left">
                                <a href="<?php the_permalink() ?>">
                                    <?php the_post_thumbnail('teammembers-slide'); ?>
                                    <div class="border-red-opacity"></div>
                                    <div class="horisontal-images-hover"><p></p></div>
                                </a>
                            </div>
                            <div class="horisontal-text left">
                                    <div class="table">
                                        <div class="table-cell">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            <?php if(!empty($tk_member_title)){ ?><p><?php echo $tk_member_title; ?></p><?php } ?>
                                        </div><!-- table-cell -->
                                    </div><!-- table -->
                            </div>
                        </li>
                        <?php endwhile; endif; ?>

 
                    </ul>
                </div>
            </div>
            </div>
            
          <?php  } elseif($get_post_type_col_center == 'adbanner'){ 
                $ad_post = get_option('sub_bulder_banner_center-' . $post_id);                
                $custom_banner = get_post_meta($ad_post, $prefix.'custom_banner_code', true);
                $image_src = wp_get_attachment_image_src( get_post_thumbnail_id($ad_post), 'full' ); 
                //tk_add_banner_view($ad_post);
                ?>
                <div class="home-content-ad third-width left">

                    <?php if(!empty($custom_banner)) { 
                        echo $custom_banner;        
                    } else { ?>        
                        <a href="<?php site_url(); ?>?banner_id=<?php echo $ad_post; ?>">
                            <img src="<?php echo $image_src[0]; ?>" title="<?php the_title($ad_post)?>" alt="<?php the_title($ad_post)?>"/>
                        </a>
                    <?php } ?>

                </div>
        <?php } elseif($get_post_type_col_center =='content') {

            $page_content = get_option('sub_page_content_center-'.$post_id);
            ?>
            <div class="home-page-content third-width left">
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
            
            
      <?php }           
            
      
      
      
      //RIGHT COLUMN
      
if($get_post_type_col_right == 'services') {
    $get_service = get_option('sub_services_right-'.$post_id);
    ?>
            
                <div class="third-width  last-width left">

                    <?php if(!empty($services_title_right)){ ?>
                        <div class="home-title-nav left">
                            <span><?php echo $services_title_right; ?></span>
                        </div>
                   <?php } ?>
            
                            <?php
                                $args=array('post_type' => 'services', 'post_status' => 'publish', 'posts_per_page' => 1, 'p'=>$get_service);

                                //The Query
                                query_posts($args);

                                //The Loop
                                if ( have_posts() ) : while ( have_posts() ) : the_post();
                                $image_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'servicesthumb');
                                $tk_background_color = get_post_meta($post->ID, $prefix.'background_color', true);
                                $tk_headline_color = get_post_meta($post->ID, $prefix.'headline_color', true);
                                $tk_text_color = get_post_meta($post->ID, $prefix.'text_color', true);
                                $tk_hover_color = get_post_meta($post->ID, $prefix.'hover_color', true);     
                                
                                $subheading = get_post_meta($post->ID, $prefix.'subheading_text', true);
                            ?>

                            <div class="home-services-one  home-services-one<?php echo $post->ID; ?>  bg-services-red left">
                                <div class="home-services-one-content ca-menu left">

                                    <div class="home-services-one-image-title left ca-content">
                                            <?php if(has_post_thumbnail()) {?>
                                                <img class="ca-main" src="<?php echo $image_thumb[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                                            <?php } ?>
                                        <span class="ca-sub <?php if(!has_post_thumbnail()) {?>post-fullwidth<?php } ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
                                        <?php if(!empty($subheading)){ ?><p class="ca-sub <?php if(!has_post_thumbnail()) {?>post-fullwidth<?php } ?>"><?php echo $subheading; ?></p><?php } ?>
                                    </div><!--/home-services-one-image-title--> 
                                    <div class="home-services-one-image-text left ca-icon">
                                        <p><?php the_excerpt(); ?></p>
                                    </div><!--/home-services-one-image-text--> 
                                </div><!--/home-services-one-content-->            
                                
                                <div class="home-services-one-image-link right ca-icon">
                                    <a href="<?php the_permalink(); ?>"><?php _e('More', tk_theme_name ); ?></a>
                                </div><!--/home-services-one-image-link--> 
                                
                            </div><!--/home-services-one-->
                            <?php endwhile; endif; ?>
                </div><!-- third-width -->

<?php } elseif ($get_post_type_col_right == 'news') { ?>
   
                <script type="text/javascript">                    
                    jQuery(window).load(function() {
                      jQuery('.flexslider-news-right<?php echo $post_id; ?>').flexslider({
                        animation: "fade",
                        animationLoop: false,
                        controlNav: false,
                        slideshow: false, 
                        prevText: "Prev",
                        nextText: "Next",  
                        controlsContainer: ".home-navigation-right<?php echo $post_id; ?>"
                      });                          
                    });              
            </script>
                
                
        <div class="third-width last-width left">
                
        <div class="flexslider-part-news-right flex-news-slide flexslider-part-news-right<?php echo $post_id; ?>">
            <div class="home-title-nav left">
                <?php if(!empty($latest_news_title_right)){ ?>
                    <span><?php echo $latest_news_title_right; ?></span>
                <?php } ?>
                <div class="home-navigation home-navigation-right<?php echo $post_id; ?> left">
                </div><!--/home-navigation-->
            </div>
            <div class="flexslider flexslider-news-right flexslider-news-right<?php echo $post_id; ?>">
            
            <ul class="slides">
            <?php
                $news_post_num = get_option('sub_news_number_right-'.$post_id);
                $news_post_cat = get_option('sub_news_category_right-'.$post_id);

                $args = array('post_status' => 'publish', 'post_type' => 'post',  'posts_per_page' => $news_post_num, 'cat' => $news_post_cat );
                // The Query
                query_posts ($args);
                // The Loop
                if (have_posts()): while (have_posts()) : the_post();
                $format = get_post_format();
            ?>
                <li>
                <div class="home-latest-news-one last-width  left">                            
                    <?php if(has_post_thumbnail() || $format =='video' || $format == 'gallery'){ ?>
                        <div class="home-latest-news-one-image left">
                            <a href="<?php the_permalink();?>">                                                

                                <?php if (has_post_thumbnail() && $format == '') { ?>
                                    <?php the_post_thumbnail('home-news'); ?>
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
                            <p><?php the_excerpt_length(120); ?></p>
                        </div><!--/home-latest-news-one-text-->
                        <div class="home-latest-news-one-link left">
                            <a href="<?php the_permalink(); ?>"><?php _e('Read More', tk_theme_name); ?></a>
                        </div><!--/home-latest-news-one-link-->
                    </div><!--/home-latest-news-one-text-content-->
                </div><!--/home-latest-news-one-->
            </li>
            <?php endwhile; endif; ?>
            </ul>
    </div><!-- third-width -->
        </div>
        </div>
                            
<?php } elseif ($get_post_type_col_right == 'testimonials'){ ?>
    
    
            <div class="third-width last-width left">
    
            <?php if(!empty($sub_testimonials_right)){ ?>
                <div class="home-title-nav left">
                    <span><?php echo $sub_testimonials_right; ?></span>
                </div>
           <?php }
    
            $testimonial_post = get_option('sub_testimonial_right-'.$post_id);
            $random_post = get_option('sub_check_testimonials_right-'.$post_id);

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
            <div class="home-testimonials-one  left">
                <div class="home-testimonials-one-content left">  

                    <?php if(!empty($tk_email)){ ?>
                        <div class="home-testimonials-one-image left">
                            <?php echo get_avatar($tk_email,$size='72' ); ?>
                        </div><!--/home-testimonials-one-image-->
                    <?php } ?>
                    <div class="home-testimonials-one-titile testimonials-title-third <?php if(empty($tk_email)) {echo 'post-fullwidth';} ?> left">
                        <span><?php the_title(); ?></span>
                        <?php if(!empty($tk_job_position)){ ?><p><?php echo $tk_job_position; ?></p><?php } ?>
                    </div><!--/home-testimonials-one-titile-->
                    <div class="home-testimonials-one-text left">
                        <p><?php the_excerpt(); ?></p>
                    </div><!--/home-testimonials-one-text-->

                </div><!--/home-testimonials-one-content-->                            
            </div><!--/home-testimonials-one-->
            <?php endwhile; endif; ?>
            </div>
            <?php }  elseif($get_post_type_col_right == 'team') { 
                $team_number = get_option('sub_team_number_right-'.$post_id);
                ?>
            
            <div class="horizontal-slider third-width third-width-horizontal last-width left">
                
            <?php $team_title = get_option('title_team_page'); ?>               
               <div class="home-title-nav slider-width-auto left">
                    <?php if(!empty($sub_team_right)) {?><span><?php echo $sub_team_right; ?></span><?php } ?>
                </div>               
            


                <script type="text/javascript"> 
                    
                        jQuery(window).load(function() {    
                            
                        var sliderWidth = jQuery('.flexslider-right<?php echo $post_id ?>').width();
                        var windowWidth = jQuery(window).width();
                        
                        if(windowWidth < 630){
                           
                         if(sliderWidth < 320) {
                                var itemWidthCalc = (sliderWidth);
                                var marginWidth = 0;
                            } else  if(sliderWidth < 420) { 
                                var itemWidthCalc = (sliderWidth - 10) / 2;
                                var marginWidth = 10;
                            } else { 
                                var itemWidthCalc = (sliderWidth - 10) / 3;
                                var marginWidth = 10;
                            }
                        
                        } else {
                            if(sliderWidth < 500) { 
                                var itemWidthCalc = (sliderWidth);
                                var marginWidth = 0;
                            } else  { 
                                var itemWidthCalc = (sliderWidth - 10) / 3;
                                var marginWidth = 10;
                            }
                        }
                                            
                          jQuery('.flexslider-right<?php echo $post_id; ?>').flexslider({
                            animation: "slide",
                            animationLoop: false,
                            itemWidth: itemWidthCalc,
                            itemMargin: 0,
                            controlNav: false,
                            slideshow: false, 
                            controlsContainer: ".flexslider-part-right<?php echo $post_id; ?>"
                          });                          
                        });
                        
                    // check grid size on resize event
                     jQuery(window).resize(function() {
                        var getFlexslider = jQuery('.flexslider-right<?php echo $post_id ?>').html();
                        jQuery('.flexslider-part-right<?php echo $post_id ?> .flex-direction-nav').remove();
                        jQuery('.flexslider-right<?php echo $post_id ?>').remove();                        
                        jQuery('.flexslider-part-right<?php echo $post_id ?>').append('<div class="flexslider flexslider-right<?php echo $post_id; ?>">'+getFlexslider+'</div>');
                    
                        var sliderWidth = jQuery('.flexslider-right<?php echo $post_id ?>').width();
                        var windowWidth = jQuery(window).width();
                        if(windowWidth < 630){
                           
                         if(sliderWidth < 320) {
                                var itemWidthCalc = (sliderWidth);
                                var marginWidth = 0;
                            } else  if(sliderWidth < 420) { 
                                var itemWidthCalc = (sliderWidth - 10) / 2;
                                var marginWidth = 10;
                            } else {
                                var itemWidthCalc = (sliderWidth - 10) / 3;
                                var marginWidth = 10;
                            }
                        
                        } else {
                            if(sliderWidth < 500) { 
                                var itemWidthCalc = (sliderWidth);
                                var marginWidth = 0;
                            } else  { 
                                var itemWidthCalc = (sliderWidth - 10) / 3;
                                var marginWidth = 10;
                            }
                        }
                        
                        jQuery('.flexslider-right<?php echo $post_id; ?>').flexslider({
                            animation: "slide",
                            animationLoop: false,
                            itemWidth: itemWidthCalc,
                            itemMargin: 0,
                            controlNav: false,
                            slideshow: false, 
                            controlsContainer: ".flexslider-part-right<?php echo $post_id; ?>"
                          });                  
                    });
                        
                </script>
               
                
                <div class="flexslider-part flexslider-part-right<?php echo $post_id; ?>">
                    <div class="flexslider flexslider-right<?php echo $post_id; ?>">
                      <ul class="slides">                                    
                        <?php
                            $args = array('post_status' => 'publish', 'post_type' => 'team-members', 'posts_per_page' =>$team_number, 'meta_key'=>'_thumbnail_id');
                            // The Query
                            query_posts ($args);
                            // The Loop
                            if (have_posts()): while (have_posts()) : the_post();
                            $tk_member_title = get_post_meta($post->ID, $prefix.'title_info', true);
                            ?>
                        <li>
                            <div class="horisontal-images left">
                                <a href="<?php the_permalink() ?>">
                                    <?php the_post_thumbnail('teammembers-slide'); ?>
                                    <div class="border-red-opacity"></div>
                                    <div class="horisontal-images-hover"><p></p></div>
                                </a>
                            </div>
                            <div class="horisontal-text left">
                                    <div class="table">
                                        <div class="table-cell">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            <?php if(!empty($tk_member_title)){ ?><p><?php echo $tk_member_title; ?></p><?php } ?>
                                        </div><!-- table-cell -->
                                    </div><!-- table -->
                            </div>
                        </li>
                        <?php endwhile; endif; ?>

                    </ul>
                </div>
            </div>
            </div>
            
          <?php  } elseif($get_post_type_col_right == 'adbanner'){ 
                $ad_post = get_option('sub_bulder_banner_right-' . $post_id);                
                $custom_banner = get_post_meta($ad_post, $prefix.'custom_banner_code', true);
                $image_src = wp_get_attachment_image_src( get_post_thumbnail_id($ad_post), 'full' ); 
                //tk_add_banner_view($ad_post);
                ?>
                <div class="home-content-ad third-width last-width left">

                    <?php if(!empty($custom_banner)) { 
                        echo $custom_banner;        
                    } else { ?>        
                        <a href="<?php site_url(); ?>?banner_id=<?php echo $ad_post; ?>">
                            <img src="<?php echo $image_src[0]; ?>" title="<?php the_title($ad_post)?>" alt="<?php the_title($ad_post)?>"/>
                        </a>
                    <?php } ?>

                </div>
        <?php } elseif($get_post_type_col_right =='content') {

            $page_content = get_option('sub_page_content_right-'.$post_id);
            ?>
            <div class="home-page-content third-width last-width left">
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
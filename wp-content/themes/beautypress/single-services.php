<?php
get_header();
$prefix = 'tk_';
$tk_blog_id = get_option('id_blog_page');
$sidebar_position = get_post_meta($post -> ID, $prefix.'sidebar_position', true);
if($sidebar_position == ''){$sidebar_position = get_post_meta($tk_blog_id, $prefix.'sidebar_position', true);} 
$title_bg_image = wp_get_attachment_image_src( get_post_thumbnail_id( $tk_blog_id ), 'header');

$subheading = get_post_meta($post->ID, $prefix.'subheading_text', true);
$get_services_title = get_option('id_services_page');
$page_headline = get_post_meta($get_services_title, $prefix . 'headline', true);

$post_format = get_post_format();
$sidebar_select = get_post_meta($post->ID, $prefix . 'sidebar', true);

if ($sidebar_select == 'none') {
    $sidebar_select = get_post_meta($tk_blog_id, $prefix.'sidebar', true);
}

$sidebar_postition = get_post_meta($post -> ID, $prefix.'sidebar_position', true);
if($sidebar_postition == ''){$sidebar_postition = get_post_meta($tk_blog_id, $prefix.'sidebar_position', true);} 

$tk_services_id = get_option('id_services_page');

if (have_posts()) : while (have_posts()) : the_post();
?>




    <!-- CONTENT -->
    <div class="content left">
        <div class="wrapper">
            <div class="content-shadow left">

                <div class="content-top-image left"></div><!--/content-top-image-->

                <div class="bg-content left">
                    <div class="wrapper-content">


                        <div class="title-on-page left">
                            <?php if(!empty($get_services_title)){ ?><span><?php echo get_the_title($get_services_title); ?></span><?php } ?>
                            <?php if(!empty($page_headline)){ ?><p><?php echo $page_headline; ?></p><?php } ?>
                        </div><!--/title-on-page-->



                        <div class="bg-services-single bg-services-single<?php echo $post->ID ?> left">

                            <div class="bg-services-single-text left">
                                <ul>
                                    <li><span><?php the_title(); ?></span></li>
                                    <?php if(!empty($subheading)){ ?><li><p><?php echo $subheading; ?></p></li><?php } ?>
                                </ul>
                            </div><!--/bg-services-single-text-->

                            <?php
                                $prev_post = get_previous_post();
                                $next_post = get_next_post();                            
                            ?>
                            
                            <div class="services-single-nav right">
                                <?php if(!empty($prev_post->ID)){ ?><a href="<?php echo get_permalink($prev_post->ID); ?>"><?php _e('Prev', tk_theme_name); ?></a><?php } ?>
                                <?php if(!empty($next_post->ID)){ ?><a href="<?php echo get_permalink($next_post->ID); ?>"><?php _e('Next', tk_theme_name ); ?></a><?php } ?>
                            </div><!--/services-single-nav-->

                        </div><!--/bg-services-single-->



                        <div class="content-left <?php if($sidebar_position == 'left') { echo 'right';} elseif($sidebar_position == 'right') { echo 'left'; } elseif($sidebar_position =='fullwidth') {echo 'no-sidebar';} ?>">


                            <div class="blog-one services-single-content left">     
                                <div id="work-slider" class="work-slider left"></div>
                                <div class="blog-gallery left">
                                    
                                    
                                    <?php if($post_format == '') {
                                        if(has_post_thumbnail()) {
                                            if($sidebar_position == 'fullwidth') {
                                                the_post_thumbnail('gallery-big');
                                            } else {
                                                the_post_thumbnail('servicest-big');
                                            }
                                            
                                        }
                                    } elseif($post_format == 'gallery'){ 
                                        $slide_images = get_post_meta($post->ID, $prefix . 'repeatable', true); 
                                        ?>
                                    
                                    <div class="flexslider">
                                        <ul class="slides">
                                            
                                            <?php foreach($slide_images as $slide){ ?>
                                                <li>
                                                    <img src="<?php echo $slide; ?>" alt="<?php the_title(); ?>"/>
                                                </li>
                                            <?php } ?>
                                            
                                        </ul>
                                    </div><!--/flexslider-->
                                    <?php } elseif($post_format == 'video'){
                                        $video_link = get_post_meta($post->ID, $prefix.'video_link', true);                                        
                                        if(!empty($video_link)){
                                            tk_video_player($video_link);
                                        }
                                    } ?>
                                    
                                    
                                    
                                </div><!--/blog-gallery-->
                                
                                
                                <div class="home-latest-news-title left">
                                    <?php the_title(); ?>
                                </div><!--/home-latest-news-title-->

                                <div class="shortcodes left">
                                    <?php the_content(); ?>
                                </div><!--/home-latest-news-text--> 


                            </div><!--/blog-one-->

                    <?php //Enable Social Share
                    $social_share_blog = get_theme_option(tk_theme_name . '_social_social_share_blog');
                    if ($social_share_blog != 'yes') { ?>

                        <?php
                            $facebook_share = get_theme_option(tk_theme_name . '_general_use_facebook');
                            $twitter_share = get_theme_option(tk_theme_name . '_general_use_twitter');
                            $google_share = get_theme_option(tk_theme_name . '_general_use_google');
                            $linkedin_share = get_theme_option(tk_theme_name . '_general_use_linkedin');
                            $pinterest_share = get_theme_option(tk_theme_name . '_general_use_pinterest');
                            $stumbleupon_share = get_theme_option(tk_theme_name . '_general_use_stumbleupon');
                            if ($facebook_share != 'yes' || $twitter_share != 'yes' || $google_share != 'yes' || $linkedin_share != 'yes' || $pinterest_share != 'yes' || $stumbleupon_share != 'yes') {
                        ?>
                                
                                    <?php
                                    if (substr(get_permalink(), -1) == '/') {
                                        $thepermalink = substr(get_permalink(), 0, -1);
                                    } else {
                                        $thepermalink = get_permalink();
                                    }
                                    $total_score = 0;
                                    if ($facebook_share != 'yes') {
                                        $total_score = $total_score + get_likes($thepermalink);
                                    }
                                    if ($twitter_share != 'yes') {
                                        $total_score = $total_score + get_tweets($thepermalink);
                                    }
                                    if ($google_share != 'yes') {
                                        $total_score = $total_score + get_plusones($thepermalink);
                                    }
                                    if ($linkedin_share != 'yes') {
                                        $total_score = $total_score + get_linkedin($thepermalink);
                                    }
                                    if ($pinterest_share != 'yes') {
                                        $total_score = $total_score + get_pinit($thepermalink);
                                    }
                                    if ($stumbleupon_share != 'yes') {
                                        $total_score = $total_score + get_stumbleupon($thepermalink);
                                    }
                                    ?>

                            
                            
                            
                            <div class="about-border left"></div><!--/about-border-->

                            <div class="single-soc-share left">
                                <div class="single-soc-share-link left">
                                        <?php if ($facebook_share != 'yes') { ?>
                                            <div class="single-soc-share-link-fb left">
                                                <a target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo $thepermalink; ?>&t=<?php the_title(); ?>">
                                                    <span>
                                                        <?php echo get_likes($thepermalink); ?>
                                                    </span>
                                                    <p><?php _e('Facebook', tk_theme_name) ?></p>
                                                </a>
                                            </div><!--/single-soc-share-link-fb-->
                                        <?php } ?>       

                                        <?php if ($twitter_share != 'yes') { ?> 
                                            <div class="single-soc-share-link-twitter left">
                                                <a target="_blank" href="https://twitter.com/share?url=<?php echo $thepermalink; ?>&text=<?php the_title(); ?>" class="twitter-share-button">
                                                    <span>
                                                        <?php echo get_tweets(get_permalink()); ?>
                                                    </span>
                                                    <p><?php _e('Twitter', tk_theme_name) ?></p>
                                                </a>       
                                            </div><!--/single-soc-share-link-twitter-->
                                        <?php } ?>

                                        <?php if ($google_share != 'yes') { ?> 
                                            <div class="single-soc-share-link-google left">
                                                <a target="_blank" href="https://plus.google.com/share?url=<?php echo $thepermalink; ?>&t=<?php the_title(); ?>">
                                                    <span>
                                                        <?php echo get_plusones($thepermalink); ?>
                                                    </span>
                                                    <p><?php _e('Google+', tk_theme_name) ?></p>
                                                </a>
                                            </div><!--/single-soc-share-link-google-->
                                        <?php } ?>

                                        <?php if ($linkedin_share != 'yes') { ?> 
                                            <div class="single-soc-share-link-linkedin left">
                                                <a target="_blank" href="http://www.linkedin.com/shareArticle?url=<?php echo $thepermalink; ?>&title=<?php the_title(); ?>">
                                                    <span>
                                                        <?php echo get_linkedin($thepermalink); ?>
                                                    </span>
                                                    <p><?php _e('LinkedIn', tk_theme_name) ?></p>
                                                </a>
                                            </div><!--/single-soc-share-link-linkedin-->
                                        <?php } ?> 

                                        <?php if ($pinterest_share != 'yes') { ?> 
                                            <div class="single-soc-share-link-pinterest left">
                                                <?php $pin_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>
                                                <a target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php echo $thepermalink; ?>&media=<?php echo $pin_image[0]; ?>&description=<?php the_title(); ?>">
                                                    <span>
                                                        <?php echo get_pinit($thepermalink); ?>
                                                    </span>
                                                    <p><?php _e('Pinterest', tk_theme_name) ?></p>
                                                </a>
                                            </div><!--/single-soc-share-link-pinterest-->
                                        <?php } ?>    

                                        <?php if ($stumbleupon_share != 'yes') { ?> 
                                            <div class="single-soc-share-link-stumbleupon left">
                                                <a target="_blank" href="http://www.stumbleupon.com/submit?url=<?php echo $thepermalink; ?>&title=<?php the_title(); ?>">
                                                    <span>
                                                        <?php echo get_stumbleupon($thepermalink); ?>
                                                    </span>
                                                    <p><?php _e('Stumbleupon', tk_theme_name) ?></p>
                                                </a>
                                            </div><!--/single-soc-share-link-stumbleupon-->
                                        <?php } ?>    

                                </div><!--/single-soc-share-link-->
                            </div><!--/single-soc-share-->

                        <?php } ?>
                    <?php } //Enable Social Share?>

                        </div><!--/content-left-->


                        <?php
                            if($sidebar_position == 'right'){
                                tk_get_sidebar('Right', $sidebar_select);
                            }elseif($sidebar_position == 'left'){
                                tk_get_sidebar('Left', $sidebar_select);
                            }
                        ?>

                        
                    <!-- Sidebar -->
                    <?php 
                    $sidebar_select = get_post_meta($post->ID, $prefix . 'sidebar', true);
                    if ($sidebar_select == 'none') {
                        $sidebar_select = get_post_meta($tk_services_id, $prefix.'sidebar', true);
                    }
                    if($sidebar_postition == 'right'){
                        tk_get_sidebar('Right', $sidebar_select);
                    }elseif($sidebar_postition == 'left'){
                        tk_get_sidebar('Left', $sidebar_select);
                    }
                    ?>


                    </div><!--/wrapper-content-->
                </div><!--/bg-content-->


            </div>
        </div><!--/wrapper-->
    </div><!--/content-->










<?php endwhile; endif; get_footer(); ?>
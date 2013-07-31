<?php
get_header();
$prefix = 'tk_';
$tk_blog_id = get_option('id_blog_page');
$sidebar_postition = get_post_meta($post -> ID, $prefix.'sidebar_position', true);
if($sidebar_postition == ''){$sidebar_postition = get_post_meta($tk_blog_id, $prefix.'sidebar_position', true);};

$sidebar_select = get_post_meta($post->ID, $prefix . 'sidebar', true);

if ($sidebar_select == 'none') {
    $sidebar_select = get_post_meta($tk_blog_id, $prefix.'sidebar', true);
}
?>


<!-- CONTENT -->
    <div class="content left">
        <div class="wrapper">
            <div class="content-shadow left">

                <div class="content-top-image left"></div><!--/content-top-image-->

                <div class="bg-content left">
                    <div class="wrapper-content">


                        <div class="title-on-page left">
                            <span><?php echo get_the_title($tk_blog_id)?></span>
                            <?php
                            $page_headline = get_post_meta($tk_blog_id, $prefix . 'headline', true);
                            if ($page_headline !== "") { ?>
                            <p><?php echo $page_headline ?></p>
                            <?php } /*-- /page headline --*/?>
                        </div><!--/title-on-page-->



                        <div class="content-left <?php if($sidebar_postition == 'right'){echo 'left';}elseif($sidebar_postition == 'left'){echo 'right';}elseif($sidebar_postition == 'fullwidth'){echo 'no-sidebar';}?>">


                            <?php
                            //The Loop
                            if (have_posts()) : while (have_posts()) : the_post();
                                    $categories = wp_get_post_categories($post -> ID);
                                    $count = count($categories);
                                    $i = 1;
                                    $format = get_post_format();
                                    $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                                    $video_link = get_post_meta($post->ID, $prefix.'video_link', true);
                                    ?>  


                            <!--Post Standard-->
                            <div class="blog-one <?php if($sidebar_postition == 'fullwidth'){echo 'fullwidth-wrap';} ?>">         
                                <!--Post Standard-->
                                <?php if ($format == 'image' || $format == '') {?>                                
                                    <?php if (has_post_thumbnail()) { ?>
                                    <div id="work-slider" class="work-slider"></div>
                                        <?php if($sidebar_postition == 'fullwidth'){?>
                                            <div class="blog-images left"><?php the_post_thumbnail('blog-full'); ?></div>
                                            <div class="horisontal-images-hover"><p></p></div>
                                        <?php }else{ ?>
                                            <div class="blog-images left"><?php the_post_thumbnail('blog-page'); ?></div>
                                            <div class="horisontal-images-hover"><p></p></div>
                                    <?php } ?>
                                <?php } ?>
                                                
                            <!-- Post Video -->
                            <?php } elseif ($format == 'video') { ?>
                                <div class="blog-video left"><?php tk_video_player($video_link); ?></div>
                                
                            <!-- Post Gallery -->
                            <?php } elseif ($format == 'gallery') { 
                                $slide_images = get_post_meta($post->ID, $prefix.'repeatable', true);
                                if(!empty($slide_images)) {
                                ?>
                                <div id="work-slider" class="work-slider"></div>
                                <script type="text/javascript">
                                    jQuery(document).ready(function($){
                                        jQuery('.flexslider').flexslider({
                                            pauseOnHover:true,
                                            slideshow: true,
                                            useCSS: false
                                        });
                                    });
                                </script>

                                <div class="blog-gallery left">
                                    <div class="flexslider">
                                        <ul class="slides">
                                            <?php

                                            foreach($slide_images as $the_image) { ?>
                                                    <li>
                                                            <?php if($sidebar_postition == 'fullwidth'){?>
                                                                <img src="<?php tk_get_thumb(963, 537, $the_image); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                                                            <?php } else { ?>
                                                                <img src="<?php tk_get_thumb(606, 338, $the_image); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                                                            <?php } ?>
                                                        <?php }?>
                                                    </li>
                                            <?php } ?>
                                        </ul>
                                    </div><!--/flexslider-->
                                </div><!--/blog-gallery-->     
                                
                            <!-- Post Audio -->
                            <?php } elseif ($format == 'audio') { 
                                        $audio_text = get_post_meta($post->ID, $prefix.'audio_text', true); ?>
                                    <div class="blog-text-content">
                                        <div class="blog-player-content left">   
                                            <div class="blog-player left">
                                                <div class="home-latest-news-border-img left"></div>
                                                    <?php tk_jplayer($post->ID); ?>
                                                <div id="jquery_jplayer_<?php echo $post->ID ?>" class="jp-jplayer"></div>
                                                <div id="jp_container_<?php echo $post->ID ?>" class="jp-audio">
                                                    <div class="jp-type-single">
                                                        <div class="jp-gui jp-interface" id="jp_interface_<?php echo $post->ID; ?>">
                                                            <ul class="jp-controls">
                                                                <li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
                                                                <li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
                                                                <li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
                                                                <li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
                                                            </ul>
                                                            <div class="jp-progress <?php if($sidebar_postition == 'fullwidth'){echo 'fullwidth-progress';} ?>">
                                                                <div class="jp-seek-bar">
                                                                    <div class="jp-play-bar"></div>
                                                                </div>
                                                            </div>
                                                            <div class="jp-volume-bar">
                                                                <div class="jp-volume-bar-value"></div>
                                                            </div>
                                                        </div><!--/jp-gui jp-interface-->
                                                    </div><!--/jp-type-single-->
                                                </div><!--/jp-audio-->
                                            </div><!--/blog-player--> 
                                            <?php if($audio_text != ''){?><div class="blog-audio-info left"><p><?php echo $audio_text?></p></div><?php }?> 
                                        </div>
                                    </div><!--/blog-text-content-->  
                                    
                            <!-- Post Link -->
                            <?php } elseif ($format == 'link') {
                                $link_text = get_post_meta($post->ID, $prefix . 'link_text', true);
                                $link_url = get_post_meta($post->ID, $prefix . 'link_url', true);   
                                ?>
                                <div class="blog-link left">
                                    <div class="post-link-top left"><a href="<?php echo $link_url; ?>"><?php echo $link_text; ?></div><!--/post-link-top-->
                                    <div class="post-link-down left"><a href="<?php echo $link_url; ?>"><?php echo $link_url; ?></a></div><!--/post-link-down-->
                                </div><!--/blog-link--> 
                        
                            <!-- Post Quote -->
                            <?php } elseif ($format == 'quote') { 
                                    $quote_text = get_post_meta($post->ID, $prefix.'quote', true);
                                    $quote_author = get_post_meta($post->ID, $prefix.'quote_author', true); ?>

                                    <div class="post-quote left">
                                        <?php if($quote_text) { ?><span><?php echo $quote_text; ?></span><?php } ?>
                                        <?php if($quote_author){ ?><p><?php echo $quote_author; ?></p><?php } ?>
                                    </div><!--/post-quote-->  
                                <?php } ?>
                                    
                                
                            <!-- Post Meta -->    
                            <div class="home-latest-news-category left">
                            <?php //Meta Date
                            $post_day = get_the_date('d');
                            $post_month = get_the_date('M');
                            $post_year = get_the_date('Y');
                            ?>
                                
                                <!-- Sticky Post -->
                                <?php  if(is_sticky()) { ?>
                                    <div class="sticky"><?php _e('Feautred Post', tk_theme_name) ?></div>
                                <?php } ?>
                                    
                                <div class="blog-time left">
                                    <span><?php echo $post_day; ?></span>
                                    <div class="blog-time-day left">
                                        <ul>
                                            <li><p><?php echo $post_month; ?></p></li>
                                            <li><p><?php echo $post_year; ?></p></li>
                                        </ul>
                                    </div>
                                </div>
                                    
                                    <div class="post-info-wrap">
                                        <span class="post-info <?php  if(is_sticky()) { echo 'post-info-sticky';}?>">
                                            <img src="<?php echo get_template_directory_uri(); ?>/style/img/category-1.png" alt="images" title="images"  />
                                            <?php the_author_posts_link(); ?>
                                        </span>
                                        <span class="post-info <?php  if(is_sticky()) { echo 'post-info-sticky';}?>">
                                            <img src="<?php echo get_template_directory_uri(); ?>/style/img/category-2.png" alt="images" title="images"  />
                                            <?php
                                                foreach ($categories as $cat_id) {
                                                $cat_name = get_cat_name($cat_id);
                                                $cat_link = get_category_link($cat_id);

                                                if ($count == $i) {
                                                    $comma ="";
                                                } else {
                                                    $comma = ",";
                                                }
                                            ?>

                                            <a href="<?php echo $cat_link;?>"><?php echo $cat_name.$comma;?></a>
                                            <?php $i++;} ?>   
                                        </span>
                                        <span class="post-info <?php  if(is_sticky()) { echo 'post-info-sticky';}?>">
                                            <img src="<?php echo get_template_directory_uri(); ?>/style/img/category-3.png" alt="images" title="images"  />
                                            <a href="<?php the_permalink()?>"><?php comments_number( '0', '1', '%' ); ?> <?php _e('Comments', tk_theme_name) ?></a>
                                        </span>
                                    </div><!-- post-info-wrap -->
                                    
                                    
                            </div><!--/home-latest-news-category-->

                            <!-- Post Title -->
                            <div class="home-latest-news-title left"><?php the_title(); ?></div><!--/home-latest-news-title-->

                            <!-- Post Content -->
                            <div class="shortcodes <?php if($sidebar_postition !== 'fullwidth') { echo 'sidebar_on'; } ?>">
                                <?php the_content(); ?>
                            </div><!--/home-latest-news-text--> 

                            <!-- Tags -->
                            <div class="blog-single-tag left">
                                <?php the_tags('<span class="tags">Tags: </span>', ', ', ' '); ?>
                            </div><!--/blog-single-tag-->  

                    </div><!--/blog-one-->
                    <?php endwhile; endif; //loop end?>

                    <?php //Enable Social Share
                    $social_share_blog = get_theme_option(tk_theme_name . '_social_social_share_blog');
                    if ($social_share_blog != 'yes') { ?>
                    
                          <!-- Social Share Buttons -->
                             <?php
                            $facebook_share = get_theme_option(tk_theme_name . '_social_use_facebook');
                            $twitter_share = get_theme_option(tk_theme_name . '_social_use_twitter');
                            $google_share = get_theme_option(tk_theme_name . '_social_use_google');
                            $linkedin_share = get_theme_option(tk_theme_name . '_social_use_linkedin');
                            $pinterest_share = get_theme_option(tk_theme_name . '_social_use_pinterest');
                            $stumbleupon_share = get_theme_option(tk_theme_name . '_social_use_stumbleupon');
                            $thepermalink = get_permalink();
                            if ($facebook_share != 'yes' || $twitter_share != 'yes' || $google_share != 'yes' || $linkedin_share != 'yes' || $pinterest_share != 'yes' || $stumbleupon_share != 'yes') {
                                ?>
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
                    
                            <!--COMMENTS-->
                            <div class="comment-start left">
                                <?php if (comments_open()) : ?>
                                    <?php comments_template(); // Get wp-comments.php template  ?>
                                <?php endif; ?>
                            </div><!--/comment-start-->

                        </div><!--/content-left-->



                    <!-- Sidebar -->
                    <?php 
                    $sidebar_select = get_post_meta($post->ID, $prefix . 'sidebar', true);
                    if ($sidebar_select == 'none') {
                        $sidebar_select = get_post_meta($tk_blog_id, $prefix.'sidebar', true);
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


<?php get_footer(); ?>
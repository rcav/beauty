<?php 
$prefix = 'tk_';
global $paged, $args, $format, $categories, $count, $i, $tk_blog_id, $sidebar_postition;
?>

<div class="blog-one <?php  if(is_sticky()) { ?>sticky-wrap<?php } ?> <?php if($sidebar_postition == 'fullwidth'){echo 'fullwidth-wrap';}; if ($post -> post_type == 'page') { echo 'hide-meta-if-page'; } ?> left">        

<?php if ($format == 'audio' || $format == 'quote' || $format == 'link') { ?>    
<!-- Post Meta -->    
    <div class="home-latest-news-category  left">
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
           
        <ul class="meta-ul meta-ul-cats">
            <li>
                <img src="<?php echo get_template_directory_uri(); ?>/style/img/category-1.png" alt="images" title="images"  />
                <?php the_author_posts_link(); ?>
            </li>
            <li>
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
            </li>
            <li>
                <img src="<?php echo get_template_directory_uri(); ?>/style/img/category-3.png" alt="images" title="images"  />
                <a href="#"><?php comments_number( '0', '1', '%' ); ?> <?php _e('Comments', tk_theme_name) ?></a>
            </li>
        </ul>   
        
    </div><!--/home-latest-news-category-->
<?php } ?>
    
    
    
<!--Post Standard-->
    <?php if ($format == 'image' || $format == '') {?>
        <?php if (has_post_thumbnail()) { ?>
            <?php if($sidebar_postition == 'fullwidth'){?>
                <div class="blog-images left"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('blog-full'); ?><div class="horisontal-images-hover"><p></p></div></a>
                </div><!--/blog-images-->
            <?php }else{ ?>
                <div class="blog-images left"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('blog-page'); ?><div class="horisontal-images-hover"><p></p></div></a>
                </div><!--/blog-images-->
        <?php } ?>
    <?php } ?>

<!-- Post Video -->
    <?php } elseif ($format == 'video') { 
        $video_link = get_post_meta($post->ID, $prefix.'video_link', true); ?>
            <div class="blog-video left"><?php tk_video_player($video_link); ?></div><!--/blog-video-->


<!-- Post Gallery -->
    <?php } elseif ($format == 'gallery') {
            $slide_images = get_post_meta($post->ID, $prefix.'repeatable', true);
            if(!empty($slide_images)) { ?>

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

                    foreach($slide_images as $the_image) {    ?>
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
        <div class="blog-player-content left">   
                <div class="blog-player left" <?php if($sidebar_postition == 'fullwidth'){echo 'style="width:94.5%"';} ?>>
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
                <?php if($audio_text != ''){?><div class="blog-audio-info left"><p><?php echo $audio_text?></p><div class="blog-read-more-link right <?php if($sidebar_postition == 'fullwidth'){echo 'fullwidth-readmore';} ?>"><a href="<?php the_permalink();?>"><?php _e('Read More', tk_theme_name) ?></a></div></div><?php }?> 
            </div>                         

<!-- Post Link-->    
    <?php } elseif ($format == 'link') {
        $link_text = get_post_meta($post->ID, $prefix.'link_text', true);
        $link_url = get_post_meta($post->ID, $prefix.'link_url', true); ?>

        <div class="blog-link left">
            <div class="post-link-top left"><a href="<?php echo $link_url; ?>"><?php echo $link_text; ?></div><!--/post-link-top-->
            <div class="post-link-down left"><a href="<?php echo $link_url; ?>"><?php echo $link_url; ?></a>            
                <div class="blog-read-more-link right"><a href="<?php the_permalink();?>"><?php _e('Read More', tk_theme_name) ?></a></div>
            </div><!--/post-link-down-->
        </div><!--/blog-link--> 

<!-- Post Quote -->
    <?php } elseif ($format == 'quote') {
        $quote_text = get_post_meta($post->ID, $prefix.'quote', true);
        $quote_author = get_post_meta($post->ID, $prefix.'quote_author', true); ?>

        <div class="post-quote left">
            <?php if($quote_text) { ?><span><?php echo $quote_text; ?></span><?php } ?>
            <p><?php if($quote_author){ echo $quote_author; } ?><a <?php if($sidebar_postition == 'fullwidth'){echo 'class="fullwidth-readmore"';} ?> href="<?php the_permalink();?>"><?php _e('Read More', tk_theme_name) ?></a></p>
        </div><!--/post-quote-->  
        
    <?php } ?>

        
<?php if ($format == 'video' || $format == '' || $format == 'gallery' || $format == 'aside') { ?>        
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
                <ul class="meta-ul">
                    <li><p><?php echo $post_month; ?></p></li>
                    <li><p><?php echo $post_year; ?></p></li>
                </ul>
            </div>
        </div>
        <ul class="meta-ul meta-ul-cats">
            <li>
                <img src="<?php echo get_template_directory_uri(); ?>/style/img/category-1.png" alt="images" title="images"  />
                <?php the_author_posts_link(); ?>
            </li>
            <li>
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
            </li>
            <li>
                <img src="<?php echo get_template_directory_uri(); ?>/style/img/category-3.png" alt="images" title="images"  />
                <a href="<?php the_permalink()?>"><?php comments_number( '0', '1', '%' ); ?> <?php _e('Comments', tk_theme_name) ?></a>
            </li>
        </ul>   
        
    </div><!--/home-latest-news-category-->
    
    <div class="home-latest-news-title left"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></div><!--/home-latest-news-title-->


<!-- Content -->
    <div class="home-latest-news-text left">
        <p><?php the_excerpt_length(265);?></p>
    </div><!--/home-latest-news-text-->    

    <div class="blog-read-more left"><a href="<?php the_permalink();?>"><?php _e('Read More', tk_theme_name) ?></a></div><!--/blog-read-more-->    
<?php } ?>

</div><!--/blog-one-->

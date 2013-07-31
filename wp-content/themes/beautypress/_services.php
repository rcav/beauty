<?php
/*

Template Name: Services

*/
get_header();
$prefix = 'tk_';
$sidebar_postition = get_post_meta($post->ID, $prefix.'sidebar_position', true);
if($sidebar_postition == ''){$sidebar_postition = 'right';}
$sidebar_select = get_post_meta($post->ID, $prefix.'sidebar', true);
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
                            <?php $page_headline = get_post_meta($post -> ID, $prefix . 'headline', true); 
                            if(!empty($page_headline)){?>
                                <p><?php echo $page_headline; ?></p>
                            <?php } ?>
                            
                        </div><!--/title-on-page-->



                        <div class="content-left services-template <?php if($sidebar_postition == 'right'){echo 'left';}elseif($sidebar_postition == 'left'){echo 'right';}elseif($sidebar_postition == 'fullwidth'){echo 'no-sidebar';}?>">


                            <div class="page-services left">

                                <?php
                                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 0;
                                    $args = array('post_status' => 'publish', 'post_type' => 'services', 'paged' => $paged, 'posts_per_page' => get_option('posts_per_page'));
                                    // The Query
                                    query_posts ($args);
                                    // The Loop
                                    if (have_posts()): while (have_posts()) : the_post();
                                    $format = get_post_format();
                                    $categories = wp_get_post_categories($post -> ID);
                                    $count = count($categories);
                                    $i = 1;
                                                                          
                                    $tk_background_color = get_post_meta($post->ID, $prefix.'background_color', true);
                                    $tk_headline_color = get_post_meta($post->ID, $prefix.'headline_color', true);
                                    $tk_text_color = get_post_meta($post->ID, $prefix.'text_color', true);
                                    $tk_hover_color = get_post_meta($post->ID, $prefix.'hover_color', true);    
                                    
                                    $video_link = get_post_meta($post->ID, $prefix.'video_link', true);
                                    $slide_images = get_post_meta($post->ID, $prefix . 'repeatable', true);
                                    $span_class = 'post-fullwidth';

                                    $subheading = get_post_meta($post->ID, $prefix.'subheading_text', true);

                                    $post_format = get_post_format();
                                    ?>


                                    <div class="home-services-one home-services-one<?php echo $post->ID; ?> bg-services-red left">
                                        <div class="home-services-one-content left">

                                            <div class="home-services-one-image-title left">
                                                
                                            <?php if($post_format == ''){ ?>
                                                <?php if(has_post_thumbnail()){
                                                        the_post_thumbnail('servicesthumb');
                                                        $span_class = '';
                                                    } // if has thumbnail
                                                } elseif($post_format == 'video') {
                                                    if($video_link != ''){
                                                        echo get_video_image($video_link, $post->ID);
                                                        $span_class = '';
                                                    } // if video link is empty
                                                } elseif($post_format == 'gallery') {
                                                    if(is_array($slide_images) && $slide_images[0] != ''){
                                                        $span_class = '';
                                                ?>
                                                        <img src="<?php echo tk_get_thumb(71, 71, $slide_images[0]); ?>" alt="<?php the_title(); ?>" />
                                                <?php
                                                    }else{$slide_images = '';} // if gallery have some images

                                                } // end if checking post format?>

                                                <span class="<?php echo $span_class?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
                                                <?php if(!empty($subheading)){ ?><p <?php if(!has_post_thumbnail() && $post_format !== 'video'){ ?>class="post-fullwidth"<?php } ?>><?php echo $subheading; ?></p><?php } ?>
                                            </div><!--/home-services-one-image-title--> 
                                            
                                            <div class="home-services-one-image-text left">
                                                <p><?php the_excerpt(); ?></p>
                                            </div><!--/home-services-one-image-text--> 
                                            
                                        </div><!--/home-services-one-content-->       
                                        
                                        <div class="home-services-one-image-link right">
                                            <a href="<?php the_permalink(); ?>"><?php _e('More', tk_theme_name); ?></a>
                                        </div><!--/home-services-one-image-link--> 
                                        
                                    </div><!--/home-services-one-->
                                <?php endwhile; endif; ?>

                                

                                

                            </div><!--/page-services-->


                            <!--PAGINATION-->

                                <div class="pagination left">
                                <?php
                                    global $wp_query;

                                    $big = 999999999; // need an unlikely integer

                                    $pageing =  paginate_links( array(
                                            'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                                            'format' => '?paged=%#%',
                                            'current' => max( 1, get_query_var('paged') ),
                                            'total' => $wp_query->max_num_pages
                                    ) );
                                    echo $pageing;
                                ?>
                            </div><!--/pagination-->
                            
                            
                        </div><!--/content-left-->



                    <?php                     
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
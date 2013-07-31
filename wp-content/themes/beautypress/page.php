<?php
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

                        <?php
                        /*--Page Headline--*/
                        $page_headline = get_post_meta($post->ID, $prefix . 'headline', true);
                        ?>
                        <div class="title-on-page left">
                            <span><?php the_title()?></span>
                            <p><?php echo $page_headline ?></p>
                        </div><!--/title-on-page-->

                        <div class="content-left <?php if($sidebar_postition == 'right'){echo 'left';}elseif($sidebar_postition == 'left'){echo 'right';}elseif($sidebar_postition == 'fullwidth'){echo 'no-sidebar';}?>">
                            <div class="shortcodes left <?php if($sidebar_postition !== 'fullwidth') { echo 'sidebar_on'; } ?>"> 
                                <?php
                                    wp_reset_query();
                                    if (have_posts()) : while (have_posts()) : the_post();
                                            the_content();
                                        endwhile;
                                    else:
                                    endif;
                                    wp_reset_query();
                                    ?>
                            </div><!-- /shortcodes --> 
                        </div>

                    <!-- Sidebar -->
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
<?php
get_header();
$prefix = 'tk_';
$image_full = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full');
?>

    <!-- CONTENT -->
    <div class="content left">
        <div class="wrapper">
            <div class="content-shadow left">

                <div class="content-top-image left"></div><!--/content-top-image-->

                <div class="bg-content left">
                    <div class="wrapper-content">

                        <div class="title-on-page left">
                            <span><?php the_title()?></span>
                        </div><!--/title-on-page-->

                        <div class="blog-images left" style="margin-top: 30px"><a href="<?php echo $image_full[0]?>" class="fancybox" title="<?php the_title()?>" alt="<?php the_title()?>"><img src="<?php echo $image_full[0]?>" title="<?php the_title()?>" alt="<?php the_title()?>"/></a></div><!--/blog-images-->

                    </div><!--/wrapper-content-->
                </div><!--/bg-content-->

            </div>
        </div><!--/wrapper-->
    </div><!--/content-->



<?php get_footer(); ?>
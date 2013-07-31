<?php
get_header();
$prefix = 'tk_';
?>


        <?php
            /*******SLIDER******/
            $show_slider= get_theme_option(tk_theme_name.'_general_enable_slider');
            $slider_alias = get_theme_option(tk_theme_name.'_general_slider_id');
            if($show_slider == 'yes'){
        ?>

        <?php if (function_exists('putRevSlider')) { ?>
            <div class="home-slider left">
                <?php  putRevSlider($slider_alias);?>
            </div><!--/home-slider-->
        <?php } ?>
            
            
        <?php } ?>

    <!-- CONTENT -->
    <div class="content left">
        
        <div class="wrapper">
            
            <div class="content-top-image left"></div><!--/content-top-image-->
            <div class="content-shadow left">
                
                
            

                <div class="bg-content left">

                    

                            
            <?php
                $args = array(
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    'post_type' => 'page_builder',
                    'order' => 'ASC',
                    'meta_key' => 'tk_box_order',
                    'orderby' => 'meta_value_num',
                );
                //The Query
                $the_query = new WP_Query($args);

                //The Loop
                if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();
                
                        $block_type = get_the_title($post->ID);
                        
                        if ($block_type == 'one_column') {
                            // call part
                            get_template_part('_part_onecolumn');
                        } elseif ($block_type == 'two_columns') {
                            // call part
                             get_template_part('_part_twocolumns');
                        } elseif ($block_type == 'three_columns') {
                            // call part
                            get_template_part('_part_threecolumns');
                        } elseif ($block_type == 'gallery') {
                            // call part
                            get_template_part('_part_gallery');
                        }
                        ?>

                        <?php
                        wp_reset_query();
                    endwhile;
                endif;
                ?>


            </div>
        </div><!--/wrapper-->
    </div><!--/content-->


<?php get_footer(); ?>
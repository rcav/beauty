<?php 
/*

Template Name: Team Members

*/
get_header(); 
$prefix = 'tk_';
$reservations_id = get_option('id_reservations_page');
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
                            <?php
                            $page_headline = get_post_meta($post -> ID, $prefix . 'headline', true);
                            if ($page_headline !== '') {
                            ?>
                            <p><?php echo $page_headline?></p>
                            <?php } ?>
                        </div><!--/title-on-page-->



                        <div class="our-team-page left">

                    <?php                           
                            $args=array('post_type' => 'team-members', 'post_status' => 'publish', 'ignore_sticky_posts'=> 1, 'posts_per_page' => -1);
                            
                            //The Query
                            query_posts($args);

                            //The Loop
                            if ( have_posts() ) : while ( have_posts() ) : the_post();
                            $post_category = wp_get_post_terms( $post->ID, 'ct_members' );
                            $format = get_post_format();
                            $image_full = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full');
                            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'team');
                            $tk_member_title = get_post_meta($post->ID, $prefix.'member_title', true);
                            $tk_member_flickr = get_post_meta($post->ID, $prefix.'flickr', true);
                            $tk_member_instagram = get_post_meta($post->ID, $prefix.'instagram', true);
                            $tk_member_twitter = get_post_meta($post->ID, $prefix.'twitter', true);
                            $tk_member_facebook = get_post_meta($post->ID, $prefix.'facebook', true);
                            $tk_member_linkedIn = get_post_meta($post->ID, $prefix.'linkedIn', true);                            
                            $show_reservations = get_post_meta($post->ID, $prefix.'show_reservations', true);
                            $featured_right = get_post_meta($post->ID, $prefix.'featured_right', true);    
                        ?>
                            <div class="our-team-page-one <?php if(!empty($featured_right)) {echo 'featured-right';} ?> left">
                                <a id="<?php echo $post->post_title; ?>"></a>
                                <div class="our-team-page-one-image left">
                                    <?php the_post_thumbnail('teammembers'); ?>
                                </div><!--/our-team-page-one-image-->

                                <div class="our-team-page-one-text-content right">
   
                                    <div class="our-team-page-one-title left">
                                        <span><?php the_title(); ?> </span>
                                        <?php if(!empty($tk_member_title)){ ?><p><?php echo $tk_member_title; ?></p><?php } ?>
                                    </div><!--/our-team-page-one-ttitle-->

                                    
                                    <?php if(!empty($tk_member_flickr) || !empty($tk_member_instagram) || !empty($tk_member_twitter) || !empty($tk_member_facebook) || !empty($tk_member_linkedIn) || !empty($show_reservations)) { ?>
                                    <?php if(empty($tk_member_flickr) && empty($tk_member_instagram) && empty($tk_member_twitter) && empty($tk_member_facebook) && empty($tk_member_linkedIn)) {
                                        $member_width = 'member-width';
                                    } else {
                                        $member_width = '';
                                    } ?>
                                    
                                        <div class="our-team-page-one-soc <?php echo $member_width; ?>  left">
                                            <?php if(!empty($tk_member_flickr) || !empty($tk_member_instagram) || !empty($tk_member_twitter) || !empty($tk_member_facebook) || !empty($tk_member_linkedIn)){ ?>
                                                <div class="soc-ikons left">
                                                    <ul>
                                                        <?php if(!empty($tk_member_flickr)){ ?><li><div class="soc-ikons-1 left"><a href="<?php echo $tk_member_flickr; ?>"></a></div></li><?php } ?>
                                                        <?php if(!empty($tk_member_instagram)){ ?><li><div class="soc-ikons-2 left"><a href="<?php echo $tk_member_instagram; ?>"></a></div></li><?php } ?>
                                                        <?php if(!empty($tk_member_twitter)){ ?><li><div class="soc-ikons-3 left"><a href="<?php echo $tk_member_twitter; ?>"></a></div></li><?php } ?>
                                                        <?php if(!empty($tk_member_facebook)){ ?><li><div class="soc-ikons-4 left"><a href="<?php echo $tk_member_facebook; ?>"></a></div></li><?php } ?>
                                                        <?php if(!empty($tk_member_linkedIn)){ ?><li><div class="soc-ikons-6 left"><a href="<?php echo $tk_member_linkedIn; ?>"></a></div></li><?php } ?>
                                                    </ul>
                                                </div>
                                            <?php } ?>
                                            <?php if(!empty($show_reservations)){ ?>
                                                <div class="our-team-page-one-soc-button right">
                                                    <a href="<?php echo get_permalink($reservations_id); ?>?id=<?php echo $post->ID; ?>"><?php _e('Make a Reservation', tk_theme_name); ?></a>
                                                </div>
                                            <?php } ?>

                                        </div><!--/our-team-page-one-soc-->
                                    <?php } ?>
                                    
                                    
                                    <div class="our-team-page-one-text shortcodes left">
                                        <?php the_content(); ?>
                                    </div>

                                </div><!--/our-team-page-one-text-content-->
                            </div><!--/our-team-page-one-->

                        <?php endwhile; endif; ?>




                        </div><!--/our-team-page-->
                    </div><!--/wrapper-content-->
                </div><!--/bg-content-->


            </div>
        </div><!--/wrapper-->
    </div><!--/content-->

    
<?php get_footer(); ?>
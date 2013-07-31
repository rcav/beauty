    <!-- FOOTER -->
    <div class="footer left">
        <div class="scroll-top"><p id="back-top"><a href="#top"><span></span></a></p></div><!--/scroll-top-->

        <div class="footer-widgets left">
            <div class="wrapper">
                <div class="footer-top-shadow left">
                    <div class="wrapper-content left">


                        <!-- Footer Widget 1 -->
                        <div class="footer_box third-width">
                            <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Widget 1')) : ?>
                            <?php endif; ?>  
                        </div><!--footer_box-->

                        <!-- Footer Widget 2 -->
                        <div class="footer_box third-width">
                            <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Widget 2')) : ?>
                            <?php endif; ?> 
                        </div><!--footer_box-->        

                        <!-- Footer Widget 3 -->
                        <div class="footer_box third-width last-width">
                            <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Widget 3')) : ?>
                            <?php endif; ?>
                        </div><!--footer_box-->


                    </div><!--/wrapper-content-->
                </div>
            </div><!--/wrapper-->
        </div><!--/footer-widgets-->          

        <div class="wrapper">
            <div class="footer-down-shadow left">
                <div class="footer-copyright left">  
                    <div class="wrapper-content left">


                        <?php
                        /* * *****COPYRIGHT****** */
                        $copyright = get_theme_option(tk_theme_name . '_general_footer_copy');
                        if (empty($copyright)) {
                            $copyright = "Copyright Information Goes Here &copy; 2013. All Rights Reserved.";
                        }
                        ?>
                        
                        <div class="footer-copyright-text left"><p><?php echo $copyright?></p></div><!--/footer-copyright-text-->

                        <div class="soc-ikons right">
                            <ul>
                                <?php /*---SOCIAL ICONS---*/
                                    $twitter_acc = get_theme_option(tk_theme_name.'_social_twitter');
                                    $facebook_acc = get_theme_option(tk_theme_name.'_social_facebook');
                                    $rss_acc = get_theme_option(tk_theme_name.'_social_rss_url');
                                    $google_acc = get_theme_option(tk_theme_name.'_social_google_plus');
                                    $linkedin_acc = get_theme_option(tk_theme_name.'_social_linkedin');
                                    $instagram_acc = get_theme_option(tk_theme_name . '_social_instagram');
                                    $flickr_acc = get_theme_option(tk_theme_name . '_social_flickr');

                                    if ($twitter_acc != '' || $facebook_acc != '' || $rss_acc != '' || $google_acc != '' || $linkedin_acc != '' || $instagram_acc != '' || $flickr_acc != '') {
                                        ?>

                                    <?php if (!empty($flickr_acc)) { ?>
                                        <li><div class="soc-ikons-1 left"><a href="http://flickr.com/<?php echo $flickr_acc; ?>" ></a></div></li>
                                    <?php } ?>

                                    <?php if (!empty($instagram_acc)) { ?>
                                        <li><div class="soc-ikons-2 left"><a href="http://instagram.com/<?php echo $instagram_acc; ?>" ></a></div></li>
                                    <?php } ?>

                                    <?php if (!empty($twitter_acc)) { ?>
                                        <li><div class="soc-ikons-3 leftt"><a href="http://twitter.com/<?php echo $twitter_acc; ?>" ></a></div></li>
                                    <?php } ?>

                                    <?php if (!empty($facebook_acc)) { ?>
                                        <li><div class="soc-ikons-4 left"><a href="http://facebook.com/<?php echo $facebook_acc; ?>" ></a></div></li>
                                    <?php } ?>

                                    <?php if (($rss_acc != '')) { ?>
                                    <li><div class="soc-ikons-5 left"><a href="<?php echo $rss_acc; ?>"></a></div></li>
                                    <?php } ?>

                                    <?php if (!empty($linkedin_acc)) { ?>
                                        <li><div class="soc-ikons-6 left"><a href="<?php echo $linkedin_acc; ?>"></a></div></li>
                                    <?php } ?>
                                        
                                    <?php if (!empty($google_acc)) { ?>
                                        <li><div class="soc-ikons-7 left"><a href="http://plus.google.com/<?php echo $google_acc; ?>"></a></div></li>
                                    <?php } ?>

                                <?php } // if check one by one?>
                            </ul>
                        </div>


                    </div><!--/wrapper-content-->
                </div><!--/footer-copyright-->
            </div>
        </div><!--/wrapper-->
        
    </div><!--/footer-->



</div><!--/container-->

<?php wp_footer();?>
</body>
</html>
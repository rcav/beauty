<?php
require( '../../../../wp-load.php' );
$theme_name = 'beautypress_';
    /*     * ********************************************************** */
    /*     * **********PASTE ARRAY HERE***************************** */
    /*     * ********************************************************** */
$tabs = array(
    /*     * ********************************************************** */
    /*     * **********STYLE SETTINGS******************************** */
    /*     * ********************************************************** */

 array(
        'id' => 'site_colors',
        'title' => 'Site Colors',
        'priority' => 35,
        'fields' => array(

            
            array(
                'id' => $theme_name.'body_color',
                'selector' => 'body',
                'type' => 'option',
                'value' => '#edebe0',
                'label' => 'Choose Body Color',
                'desc' => '',
                'options' => 'background',
                'priority' => 1,
            ),
            
            array(
                'id' => $theme_name.'header_color',
                'selector' => '.header-down, .home-slider',
                'type' => 'option',
                'value' => '#e27b67',
                'label' => 'Choose Header Color',
                'desc' => '',
                'options' => 'background',
                'priority' => 2,
            ),
            
            array(
                'id' => $theme_name.'footer_widgets_color',
                'selector' => '.footer-widgets',
                'type' => 'option',
                'value' => '#e27b67',
                'label' => 'Footer Widget Section Background Color',
                'desc' => '',
                'options' => 'background-color',
                'priority' => 3,
            ),
            
            array(
                'id' => $theme_name.'footer_title_color',
                'selector' => '.footer_box h2, .rsswidget, .footer-menu ul li a, .footer_widget_holder a.rsswidget',
                'type' => 'option',
                'value' => '#fafbfd',
                'label' => 'Footer Widget Title Color',
                'desc' => '',
                'options' => 'color',
                'priority' => 4,
            ),
            
            array(
                'id' => $theme_name.'footer_paragraph_color',
                'selector' => '.footer_widget_holder a.rsswidget, .footer_box .newsletter span, .footer_box ul li a,  .footer_box .post-date,  .footer_box #recentcomments .recentcomments a, .footer_box ul li, .footer_box .textwidget, .footer_box .textwidget p, .footer_box .box-twitter-center span, .footer_box .box-twitter-center a, .footer_box .twittime',
                'type' => 'option',
                'value' => '#e7e7e7',
                'label' => 'Footer Widget Text Color',
                'desc' => '',
                'options' => 'color',
                'priority' => 5,
            ),
            
            array(
                'id' => $theme_name.'footer_link_hover_color',
                'selector' => '.footer_box ul li a:hover, .footer_widget_holder a.rsswidget:hover, #recentcomments .recentcomments a:hover, .footer_box .box-twitter-center a:hover, .footer_box .textwidget a',
                'type' => 'option',
                'value' => '#995345',
                'label' => 'Footer Link Hover Color',
                'desc' => '',
                'options' => 'color',
                'priority' => 6,
            ),
            
            array(
                'id' => $theme_name.'theme_colors',
                'selector' => '.blog-single-tag a:hover, .blog-single-tag span, .sidebar_widget_holder ul li .post-date, .sidebar_widget_holder .textwidget a, .sidebar_widget_holder a:hover, .sidebar_widget_holder tfoot a, .sidebar_widget_holder tbody tr td a, .sidebar_widget_holder thead, .sidebar_widget_holder #wp-calendar caption, .single-soc-share-link-stumbleupon a:hover span, .single-soc-share-link-pinterest a:hover span, .single-soc-share-link-linkedin a:hover span, .single-soc-share-link-google a:hover span, .single-soc-share-link-twitter a:hover span, .single-soc-share-link-fb a:hover span, .shortcodes a, .post-link-top a:hover, .home-latest-news-title a:hover, .home-latest-news-one-titile a, .home-latest-news-one-link a, .blog-time span, .home-latest-news-category .blog-time-day ul li p, .home-latest-news-category ul li a, .blog-audio-info p, .post-quote p, .post-link-down a, .home-testimonials-one-titile span',
                'type' => 'option',
                'value' => '#e87a65',
                'label' => 'Theme Color',
                'desc' => '',
                'options' => 'color',
                'priority' => 7,
            ),
            
            array(
                'id' => $theme_name.'theme_color_hover',
                'selector' => '.home-latest-news-one-link a:hover, .home-latest-news-one-titile a:hover, .home-latest-news-title a, .home-latest-news-category ul li a:hover, .post-link-down a:hover',
                'type' => 'option',
                'value' => '#5a5a5a',
                'label' => 'Secondary Theme Colors / Hover',
                'desc' => '',
                'options' => 'color',
                'priority' => 8,
            ),


            array(
                'id' => $theme_name.'button_colors',
                'selector' => '.sidebar_widget_holder ul li .post-date, .footer_widget_holder ul li .post-date, .make-reservation-page-form .search-submit-button input, .our-team-page-one-soc-button a, .gallery-filter a, .home-navigation a, .home-gallery-title a, .nav-arrows-slider a, .footer_box .twitter_ul span.twitter-links, .header-top-make-reservation a, .sidebar_widget_holder .twitter_ul span.twitter-links, .post-quote p a, .blog-read-more a, .blog-read-more-link a',
                'type' => 'select',
                'value' => 'green',
                'label' => 'Button Colors',
                'desc' => '',
                'options' => 'button-color',
                'choices'    => array(
                    'none' => 'None',
                    'green' => 'Green',
                    'red' => 'Red',
                    'blue' => 'Blue',
                    'purple' => 'Purple',
                    'grey' => 'Grey',
                    'orange' => 'Orange',
                    'brown' => 'Brown',
                    'pink' => 'Pink',
                    'violet' => 'Violet',
                    'gold' => 'Gold',
                ),
                'priority' => 9,
            ),    
            
        ),
    ),
    
);

    /*     * ********************************************************** */
    /*     * **********PASTE ARRAY HERE***************************** */
    /*     * ********************************************************** */
?>
( function( $ ) {

        wp.customize( '<?php echo $theme_name.'link_hover_color'?>', function( value ) {
            value.bind( function( newval ) {
                $('.home-call-action-button a').css('background-color', newval );
                jQuery('.menu-content ul li a').hover(
                        function () {$(this).attr('style', 'color:'+newval+'!important');},
                        function () {$(this).attr('style', 'color:#5d4f4f!important');});
                jQuery('.footer-menu ul li a').hover(
                        function () {$(this).attr('style', 'color:'+newval+'!important');},
                        function () {$(this).attr('style', 'color:#5d4f4f!important');});
            } );
        } );


<?php foreach ($tabs as $one_tab) {
            foreach ($one_tab['fields'] as $one_setting){
    ?>

    <?php if($one_setting['type'] == 'option'){?>
        wp.customize( '<?php echo $one_setting['id']?>', function( value ) {
            value.bind( function( newval ) {
                $('<?php echo $one_setting['selector']?>').css('<?php echo $one_setting['options']?>', newval );
            } );
        } );
    <?php } // check if type is option?>

    <?php if($one_setting['type'] == 'select'){?>
        wp.customize( '<?php echo $one_setting['id']?>', function( value ) {
            value.bind( function( newval ) {
                $('<?php echo $one_setting['selector']?>').attr('style', 'background:url('+newval+')');
            } );
        } );
    <?php } // check if type is select?>

    <?php if($one_setting['type'] == 'radio'){?>
        wp.customize( '<?php echo $one_setting['id']?>', function( value ) {
            value.bind( function( newval ) {
                if(newval == 'boxed'){
                    $('<?php echo $one_setting['selector']?>').removeClass('container-fullwhite');
                }
                if(newval == 'full_width'){
                    $('<?php echo $one_setting['selector']?>').addClass('container-fullwhite');
                }
            } );
        } );
    <?php } // check if type is radio?>

    <?php if($one_setting['type'] == 'test'){?>
        wp.customize( '<?php echo $one_setting['id']?>', function( value ) {
            value.bind( function( newval ) {
                $('<?php echo $one_setting['selector']?>').css('<?php echo $one_setting['options']?>', newval );
            } );
        } );
    <?php } // check if type is option?>


<?php } // foreach fields
} // foreach tabs?>

} )( jQuery );
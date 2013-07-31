<?php
$theme_name = 'beautypress_';
        /*************************************************************/
        /************COLOR SCHEME**********************************/
        /*************************************************************/

    $default_bg  = get_option($theme_name.'body_image');
    $header_backgorund = get_option($theme_name.'header_color');
    $footer_link_hover = get_option($theme_name.'footer_link_hover_color');
    $theme_color = get_option($theme_name.'theme_colors');
    $footer_title_color  = get_option($theme_name.'footer_title_color', '');
    $body_background  = get_option($theme_name.'body_color', '');
    $footer_widgets_color  = get_option($theme_name.'footer_widgets_color', '');
    $footer_paragraph_color  = get_option($theme_name.'footer_paragraph_color', '');
    $theme_color_hover = get_theme_option($theme_name.'theme_color_hover');
    $button_colors = get_theme_option($theme_name.'button_colors');
    if(empty($body_background)) {
        $body_background = '#edebe0';
    }
    
    if(empty($header_backgorund)) {
        $header_backgorund = '#e27b67';
    }
    
    ?>

<style type="text/css">

    body {
        background:url(<?php echo $default_bg; ?>);
        background-color:<?php echo $body_background; ?>!important;
    }
  
    .header-down {
        background: <?php echo $header_backgorund; ?>;
    }
    .home-slider {
        border-bottom: 3px solid <?php echo $header_backgorund; ?>;
    }

    .footer-widgets {
        background-color:<?php echo $footer_widgets_color; ?>;
    }

    .footer_box h2, .footer-menu ul li a, .footer_widget_holder h2 a.rsswidget {
        color:<?php echo $footer_title_color; ?>;
    }

    .footer_box .twitter_ul span.twitter-links, .footer_widget_holder a.rsswidget, .footer_box .newsletter span, .footer_box ul li a,  .footer_box .post-date,  .footer_box #recentcomments .recentcomments a, .footer_box ul li, .footer_box .textwidget, .footer_box .textwidget p, .footer_box .box-twitter-center span, .footer_box .textwidget a:hover, .footer_box .box-twitter-center a, .footer_box .twittime, .footer_box tbody a:hover {
        color:<?php echo $footer_paragraph_color; ?>;
    }
    
    .footer_box ul li a:hover, .footer_widget_holder a.rsswidget:hover, #recentcomments .recentcomments a:hover, .footer_box .box-twitter-center a:hover, .footer_box .textwidget a {
        color: <?php echo $footer_link_hover; ?>;
    }
    
   .post-link-down a, ul.sub-menu li a:active, .nav ul.sub-menu li a:hover, .blog-single-tag a:hover, .blog-single-tag span, .sidebar_widget_holder .textwidget a, .sidebar_widget_holder a:hover, .sidebar_widget_holder tfoot a, .sidebar_widget_holder tbody tr td a, .sidebar_widget_holder thead, .sidebar_widget_holder #wp-calendar caption, .single-soc-share-link-stumbleupon a:hover span, .single-soc-share-link-pinterest a:hover span, .single-soc-share-link-linkedin a:hover span, .single-soc-share-link-google a:hover span, .single-soc-share-link-twitter a:hover span, .single-soc-share-link-fb a:hover span, .shortcodes a, .post-link-top a:hover, .home-latest-news-title a:hover, .home-latest-news-one-titile a, .home-latest-news-one-link a, .blog-time span, .home-latest-news-category .blog-time-day ul li p, .home-latest-news-category ul li a, .blog-audio-info p, .post-quote p, .home-testimonials-one-titile span  {
        color: <?php echo $theme_color; ?>;
    }
    
    .single-soc-share-link-stumbleupon a:hover span, .single-soc-share-link-pinterest a:hover span, .single-soc-share-link-linkedin a:hover span, .single-soc-share-link-google a:hover span, .single-soc-share-link-twitter a:hover span, .single-soc-share-link-fb a:hover span, .bg-input input:hover, .bg-select:hover, .form-textarea textarea:hover {
        border: 1px solid <?php echo $theme_color; ?>;
    }
    
    .home-latest-news-one-link a:hover, .home-latest-news-one-titile a:hover, .home-latest-news-title a, .home-latest-news-category ul li a:hover, .post-link-down a:hover {
        color: <?php echo $theme_color_hover; ?>;
    }
    
    .post-link-down .blog-read-more-link a {color: #fff}
    
</style>

<!-- ////Button Color Styles ///// -->
<?php if ($button_colors == 'green') { ?>
    <style>
        .sidebar_widget_holder ul li .post-date, .footer_widget_holder ul li .post-date, .make-reservation-page-form .search-submit-button input, .our-team-page-one-soc-button a, .gallery-filter a, .home-navigation a, .home-gallery-title a, .nav-arrows-slider a, .footer_box .twitter_ul span.twitter-links, .header-top-make-reservation a, .sidebar_widget_holder .twitter_ul span.twitter-links, .post-quote p a, .blog-read-more a, .blog-read-more-link a {
            background: #7bcfbb;
            border-bottom: 2px solid #69B09F;
        }
        .gallery-filter .active, .post-quote p a:hover, .make-reservation-page-form .search-submit-button input:hover, .our-team-page-one-soc-button a:hover, .gallery-filter a:hover, .home-navigation a:hover, .home-gallery-title a:hover, .nav-arrows-slider a:hover, .header-top-make-reservation a:hover, .post-quote p a a:hover, .blog-read-more a:hover, .blog-read-more-link a:hover {background: #69b09f}
    </style>
<?php } elseif ($button_colors == 'red') { ?>
    <style>
        .sidebar_widget_holder ul li .post-date, .footer_widget_holder ul li .post-date, .make-reservation-page-form .search-submit-button input, .our-team-page-one-soc-button a, .gallery-filter a, .home-navigation a, .home-gallery-title a, .nav-arrows-slider a, .footer_box .twitter_ul span.twitter-links, .header-top-make-reservation a, .sidebar_widget_holder .twitter_ul span.twitter-links, .post-quote p a, .blog-read-more a, .blog-read-more-link a {
            background: #f2846f;
            border-bottom: 2px solid #e06b54;
        }
        .gallery-filter .active, .post-quote p a:hover, .make-reservation-page-form .search-submit-button input:hover, .our-team-page-one-soc-button a:hover, .gallery-filter a:hover, .home-navigation a:hover, .home-gallery-title a:hover, .nav-arrows-slider a:hover, .header-top-make-reservation a:hover, .post-quote p a a:hover, .blog-read-more a:hover, .blog-read-more-link a:hover {background: #e06b54}
    </style>
<?php } elseif ($button_colors == 'blue') { ?>
    <style>
        .sidebar_widget_holder ul li .post-date, .footer_widget_holder ul li .post-date, .make-reservation-page-form .search-submit-button input, .our-team-page-one-soc-button a, .gallery-filter a, .home-navigation a, .home-gallery-title a, .nav-arrows-slider a, .footer_box .twitter_ul span.twitter-links, .header-top-make-reservation a, .sidebar_widget_holder .twitter_ul span.twitter-links, .post-quote p a, .blog-read-more a, .blog-read-more-link a {
            background: #6fc5f2;
            border-bottom: 2px solid #66b4dd;
        }
        .gallery-filter .active, .post-quote p a:hover, .make-reservation-page-form .search-submit-button input:hover, .our-team-page-one-soc-button a:hover, .gallery-filter a:hover, .home-navigation a:hover, .home-gallery-title a:hover, .nav-arrows-slider a:hover, .header-top-make-reservation a:hover, .post-quote p a a:hover, .blog-read-more a:hover, .blog-read-more-link a:hover {background: #66b4dd}
    </style>
<?php } elseif ($button_colors == 'purple') { ?>
    <style>
        .sidebar_widget_holder ul li .post-date, .footer_widget_holder ul li .post-date, .make-reservation-page-form .search-submit-button input, .our-team-page-one-soc-button a, .gallery-filter a, .home-navigation a, .home-gallery-title a, .nav-arrows-slider a, .footer_box .twitter_ul span.twitter-links, .header-top-make-reservation a, .sidebar_widget_holder .twitter_ul span.twitter-links, .post-quote p a, .blog-read-more a, .blog-read-more-link a {
            background: #9babda;
            border-bottom: 2px solid #8a99c3;
        }
        .gallery-filter .active, .post-quote p a:hover, .make-reservation-page-form .search-submit-button input:hover, .our-team-page-one-soc-button a:hover, .gallery-filter a:hover, .home-navigation a:hover, .home-gallery-title a:hover, .nav-arrows-slider a:hover, .header-top-make-reservation a:hover, .post-quote p a a:hover, .blog-read-more a:hover, .blog-read-more-link a:hover {background: #8a99c3}
    </style>
<?php } elseif ($button_colors == 'grey') { ?>
    <style>
        .sidebar_widget_holder ul li .post-date, .footer_widget_holder ul li .post-date, .make-reservation-page-form .search-submit-button input, .our-team-page-one-soc-button a, .gallery-filter a, .home-navigation a, .home-gallery-title a, .nav-arrows-slider a, .footer_box .twitter_ul span.twitter-links, .header-top-make-reservation a, .sidebar_widget_holder .twitter_ul span.twitter-links, .post-quote p a, .blog-read-more a, .blog-read-more-link a {
            background: #bfbfbf;
            border-bottom: 2px solid #a7a7a7;
        }
        .gallery-filter .active, .post-quote p a:hover, .make-reservation-page-form .search-submit-button input:hover, .our-team-page-one-soc-button a:hover, .gallery-filter a:hover, .home-navigation a:hover, .home-gallery-title a:hover, .nav-arrows-slider a:hover, .header-top-make-reservation a:hover, .post-quote p a a:hover, .blog-read-more a:hover, .blog-read-more-link a:hover {background: #a7a7a7}
    </style>
<?php } elseif ($button_colors == 'orange') { ?>
    <style>
        .sidebar_widget_holder ul li .post-date, .footer_widget_holder ul li .post-date, .make-reservation-page-form .search-submit-button input, .our-team-page-one-soc-button a, .gallery-filter a, .home-navigation a, .home-gallery-title a, .nav-arrows-slider a, .footer_box .twitter_ul span.twitter-links, .header-top-make-reservation a, .sidebar_widget_holder .twitter_ul span.twitter-links, .post-quote p a, .blog-read-more a, .blog-read-more-link a {
            background: #ffa800;
            border-bottom: 2px solid #e09403;
        }
        .gallery-filter .active, .post-quote p a:hover, .make-reservation-page-form .search-submit-button input:hover, .our-team-page-one-soc-button a:hover, .gallery-filter a:hover, .home-navigation a:hover, .home-gallery-title a:hover, .nav-arrows-slider a:hover, .header-top-make-reservation a:hover, .post-quote p a a:hover, .blog-read-more a:hover, .blog-read-more-link a:hover {background: #e09403}
    </style>    
<?php } elseif ($button_colors == 'brown') { ?>
        <style>
        .sidebar_widget_holder ul li .post-date, .footer_widget_holder ul li .post-date, .make-reservation-page-form .search-submit-button input, .our-team-page-one-soc-button a, .gallery-filter a, .home-navigation a, .home-gallery-title a, .nav-arrows-slider a, .footer_box .twitter_ul span.twitter-links, .header-top-make-reservation a, .sidebar_widget_holder .twitter_ul span.twitter-links, .post-quote p a, .blog-read-more a, .blog-read-more-link a {
            background: #6b6353;
            border-bottom: 2px solid #5b5343;
        }
        .gallery-filter .active, .post-quote p a:hover, .make-reservation-page-form .search-submit-button input:hover, .our-team-page-one-soc-button a:hover, .gallery-filter a:hover, .home-navigation a:hover, .home-gallery-title a:hover, .nav-arrows-slider a:hover, .header-top-make-reservation a:hover, .post-quote p a a:hover, .blog-read-more a:hover, .blog-read-more-link a:hover {background: #5b5343}
    </style>    
<?php } elseif ($button_colors == 'pink') { ?>
        <style>
        .sidebar_widget_holder ul li .post-date, .footer_widget_holder ul li .post-date, .make-reservation-page-form .search-submit-button input, .our-team-page-one-soc-button a, .gallery-filter a, .home-navigation a, .home-gallery-title a, .nav-arrows-slider a, .footer_box .twitter_ul span.twitter-links, .header-top-make-reservation a, .sidebar_widget_holder .twitter_ul span.twitter-links, .post-quote p a, .blog-read-more a, .blog-read-more-link a {
            background: #f578bc;
            border-bottom: 2px solid #cd639d;
        }
        .gallery-filter .active, .post-quote p a:hover, .make-reservation-page-form .search-submit-button input:hover, .our-team-page-one-soc-button a:hover, .gallery-filter a:hover, .home-navigation a:hover, .home-gallery-title a:hover, .nav-arrows-slider a:hover, .footer_box .twitter_ul span.twitter-links, .header-top-make-reservation a:hover, .post-quote p a a:hover, .blog-read-more a:hover, .blog-read-more-link a:hover {background: #cd639d}
    </style>    
<?php } elseif ($button_colors == 'violet') { ?>
        <style>
        .sidebar_widget_holder ul li .post-date, .footer_widget_holder ul li .post-date, .make-reservation-page-form .search-submit-button input, .our-team-page-one-soc-button a, .gallery-filter a, .home-navigation a, .home-gallery-title a, .nav-arrows-slider a, .footer_box .twitter_ul span.twitter-links, .header-top-make-reservation a, .sidebar_widget_holder .twitter_ul span.twitter-links, .post-quote p a, .blog-read-more a, .blog-read-more-link a {
            background: #8d2889;
            border-bottom: 2px solid #72226f;
        }
        .gallery-filter .active, .post-quote p a:hover, .make-reservation-page-form .search-submit-button input:hover, .our-team-page-one-soc-button a:hover, .gallery-filter a:hover, .home-navigation a:hover, .home-gallery-title a:hover, .nav-arrows-slider a:hover, .header-top-make-reservation a:hover, .post-quote p a a:hover, .blog-read-more a:hover, .blog-read-more-link a:hover {background: #72226f}
    </style>    
<?php } elseif ($button_colors == 'gold') { ?>
        <style>
        .sidebar_widget_holder ul li .post-date, .footer_widget_holder ul li .post-date, .make-reservation-page-form .search-submit-button input, .our-team-page-one-soc-button a, .gallery-filter a, .home-navigation a, .home-gallery-title a, .nav-arrows-slider a, .footer_box .twitter_ul span.twitter-links, .header-top-make-reservation a, .sidebar_widget_holder .twitter_ul span.twitter-links, .post-quote p a, .blog-read-more a, .blog-read-more-link a {
            background: #f1cb02;
            border-bottom: 2px solid #d2b205;
        }
        .gallery-filter .active, .post-quote p a:hover, .make-reservation-page-form .search-submit-button input:hover, .our-team-page-one-soc-button a:hover, .gallery-filter a:hover, .home-navigation a:hover, .home-gallery-title a:hover, .nav-arrows-slider a:hover, .header-top-make-reservation a:hover, .post-quote p a a:hover, .blog-read-more a:hover, .blog-read-more-link a:hover {background: #d2b205}
    </style>    
<?php } ?>


<?php
     /*************************************************************/
     /************GOOGLE FONTS**********************************/
     /*************************************************************/
        $titles_font = get_option($theme_name.'typography_titles_font', '');
        $subtitles_font = get_option($theme_name.'typography_subtitles_font', '');
        $buttons_font = get_option($theme_name.'typography_buttons_font', '');
        $body_font = get_option($theme_name.'typography_body_font', '');
        $navigation_font = get_option($theme_name.'typography_navigation_font', '');

        $titles_font_style = get_option($theme_name.'typography_titles_font_style', '');
        $subtitles_font_style = get_option($theme_name.'typography_subtitles_font_style', '');
        $buttons_font_style = get_option($theme_name.'typography_buttons_font_style', '');
        $body_font_style = get_option($theme_name.'typography_body_font_style', '');
        $navigation_font_style = get_option($theme_name.'typography_navigation_font_style', '');
 ?>

     <style type="text/css">

         <?php if($titles_font != 'tk_font_Select' || $titles_font != '' || $titles_font_style != '' ){?>
         .home-services-one-image-title span,
         .home-gallery-title span,
         .home-title-nav span,
         .home-latest-news-one-titile a,
         .home-testimonials-one-titile span,
         .horisontal-text a,
         .footer_box h2,
         .footer_box .footer-treatments span,
         .da-thumbs li a div span,
         .footer_box thead,
         .footer_box #wp-calendar caption,
         .header-top-opening-hours p,
         .quote-content span,
         .toggle-holder span,
         .tabs .ui-state-default a, .tabs .ui-state-default a:link, .tabs .ui-state-default a:visited,
         .pricing-table-one-top span,
         .home-latest-news-title a,
         .header-top-make-reservation p,
         .shortcodes h1,
         .shortcodes h2,
         .shortcodes h3,
         .shortcodes h4,
         .shortcodes h5,
         .shortcodes h6,
         .home-services-one-image-title span a,
         .sidebar_widget_holder h3,
         .post-quote span,
         .comment-start h2,
         .form h2,
         .comment-start-title span,
         .gallery-filter span,
         .our-team-page-one-title span,
         .make-reservation-page-title span,
         .text-404 p,
         .post-link-top a
         {
             <?php
             if($titles_font != 'tk_font_Select' && $titles_font != ''){
                echo ("font-family:".tk_get_font_name($titles_font).";");
             }
             if($titles_font_style != '' && $titles_font_style == 'regular'){
                echo ("font-weight:normal;font-style:normal");
             }elseif($titles_font_style != '' && $titles_font_style == 'bold'){
                echo ("font-weight:bold;font-style:normal");
             }elseif($titles_font_style != '' && $titles_font_style == 'italic'){
                echo ("font-weight:normal;font-style:italic");
             }elseif($titles_font_style != '' && $titles_font_style == 'bolditalic'){
                echo ("font-weight:bold;font-style:italic");
             }
             ?>
         }
         <?php } // end if fonts are selected?>

         <?php if($subtitles_font != 'tk_font_Select' || $subtitles_font != '' || $subtitles_font_style != '' ){?>
         .home-services-one-image-title p,
         .home-latest-news-one-titile p,
         .home-testimonials-one-titile p,
         .horisontal-text p,
         .footer-copyright-text p,
         .title-on-page span,
         .title-on-page p,
         .pricing-table-one-top p,
         .home-latest-news-category ul li a,
         .blog-time span,
         .home-latest-news-category .blog-time-day ul li p,
         .blog-audio-info a,
         .post-link-down a,
         .post-quote p,
         .blog-single-tag ul li span,
         .blog-single-tag ul li a,
         .comment-start-title a,
         .bg-services-single-text p,
         .blog-audio-info p,
         .blog-single-tag span,
         .blog-single-tag a,
         .comment-start-title p,
         .our-team-page-one-title p,
         .sticky
         {
             <?php
             if($subtitles_font != 'tk_font_Select' && $subtitles_font != ''){
                echo ("font-family:".tk_get_font_name($subtitles_font).";");
             }
             if($subtitles_font_style != '' && $subtitles_font_style == 'regular'){
                echo ("font-weight:normal;font-style:normal");
             }elseif($subtitles_font_style != '' && $subtitles_font_style == 'bold'){
                echo ("font-weight:bold;font-style:normal");
             }elseif($subtitles_font_style != '' && $subtitles_font_style == 'italic'){
                echo ("font-weight:normal;font-style:italic");
             }elseif($subtitles_font_style != '' && $subtitles_font_style == 'bolditalic'){
                echo ("font-weight:bold;font-style:italic");
             }
             ?>
         }
         <?php } // end if fonts are selected?>

         <?php if($buttons_font != 'tk_font_Select' || $buttons_font != '' || $buttons_font_style != '' ){?>
         .home-services-one-image-link a,
         .home-gallery-title a,
         .home-navigation a,
         .nav-arrows-slider a,
         .footer_box .twitter_ul span.twitter-links,
         .footer_box .footer-treatments a,
         .footer_box .tagcloud a,
         .footer_box tfoot a,
         .home-latest-news-one-link a,
         .header-top-make-reservation a,
         .blog-read-more a,
         .blog-read-more-link a,
         .pagination a,
         .sidebar_widget_holder .tagcloud a,
         .sidebar_widget_holder tfoot a,
         .search-submit-button input,
         .services-single-nav a,
         .gallery-filter a,
         .make-reservation-page-form .search-submit-button input,
         .footer_widget_holder ul li .post-date,
         .sidebar_widget_holder ul li .post-date,
         .pagination span,
         .post-quote p a
         {
             <?php
             if($buttons_font != 'tk_font_Select' && $buttons_font != ''){
                echo ("font-family:".tk_get_font_name($buttons_font).";");
             }
             if($buttons_font_style != '' && $buttons_font_style == 'regular'){
                echo ("font-weight:normal;font-style:normal");
             }elseif($buttons_font_style != '' && $buttons_font_style == 'bold'){
                echo ("font-weight:bold;font-style:normal");
             }elseif($buttons_font_style != '' && $buttons_font_style == 'italic'){
                echo ("font-weight:normal;font-style:italic");
             }elseif($buttons_font_style != '' && $buttons_font_style == 'bolditalic'){
                echo ("font-weight:bold;font-style:italic");
             }
             ?>
         }
         <?php } // end if fonts are selected?>

         <?php if($body_font != 'tk_font_Select' || $body_font != '' || $body_font_style != '' ){?>
         .home-services-one-image-text p,
         .home-latest-news-one-text p,
         .home-testimonials-one-text p,
         .footer_box .box-twitter-center span,
         .footer_box .box-twitter-center a, .footer_box .twittime,
         .footer_box .footer-categories li a,
         .footer_box .newsletter span,
         .footer_box #recentpost a,
         .footer_box .recentcomments a,
         .footer_box .footer-treatments p,
         .footer_box .textwidget p,
         .footer_box tbody,
         .cell_text,
         .shortcodes ul li,
         .shortcodes ol li,
         .toggle-holder p,
         .tabs .tabs-1, .tabs .tabs-2, .tabs .tabs-3,
         .pricing-table-one-center span,
         .pricing-table-one-center p,
         .pricing-table-one-center h5,
         .pricing-table-one-button a,
         .color-buttons a,
         .home-latest-news-text p,
         .sidebar_widget_holder .textwidget p,
         .widget-categories ul li a,
         .sidebar_widget_holder .box-twitter-center span,
         .sidebar_widget_holder .box-twitter-center a,.sidebar_widget_holder .twittime,
         .sidebar_widget_holder .newsletter span,
         .sidebar_widget_holder tbody,
         .sidebar_widget_holder #recentpost a,
         .sidebar_widget_holder #recentcomments a,
         .comment-start-text p,
         .bg-input input,
         .page-404 span,
         .bg-input input,
         .form-textarea textarea,
         .bg-select select,
         .form-textarea textarea,
         .shortcodes p,
         .shortcodes .one-half,
         .shortcodes .one-third,
         .shortcodes .one-fourth,
         .shortcodes .tabs .tab div,
         .shortcodes .home-call-action-text p,
         .shortcodes .pricing-table-one-center h5,
         .sidebar_widget_holder a,
         .sidebar_widget_holder ul li,
         .form-input .datepicker,
         .our-team-page-one-soc-button a,
         .refresh-text,
         .shortcodes .pricing-table-one-center p
         {
             <?php
             if($body_font != 'tk_font_Select' && $body_font != ''){
                echo ("font-family:".tk_get_font_name($body_font).";");
             }
             if($body_font_style != '' && $body_font_style == 'regular'){
                echo ("font-weight:normal;font-style:normal");
             }elseif($body_font_style != '' && $body_font_style == 'bold'){
                echo ("font-weight:bold;font-style:normal");
             }elseif($body_font_style != '' && $body_font_style == 'italic'){
                echo ("font-weight:normal;font-style:italic");
             }elseif($body_font_style != '' && $body_font_style == 'bolditalic'){
                echo ("font-weight:bold;font-style:italic");
             }
             ?>
         }
         <?php } // end if fonts are selected?>

         <?php if($navigation_font != 'tk_font_Select' || $navigation_font != '' || $navigation_font_style != '' ){?>
         .nav ul li a:link, .nav ul li a:visited
         {
             <?php
             if($navigation_font != 'tk_font_Select' && $navigation_font != ''){
                echo ("font-family:".tk_get_font_name($navigation_font).";");
             }
             if($navigation_font_style != '' && $navigation_font_style == 'regular'){
                echo ("font-weight:normal;font-style:normal");
             }elseif($navigation_font_style != '' && $navigation_font_style == 'bold'){
                echo ("font-weight:bold;font-style:normal");
             }elseif($navigation_font_style != '' && $navigation_font_style == 'italic'){
                echo ("font-weight:normal;font-style:italic");
             }elseif($navigation_font_style != '' && $navigation_font_style == 'bolditalic'){
                echo ("font-weight:bold;font-style:italic");
             }
             ?>
         }
         <?php } // end if fonts are selected?>

     </style>

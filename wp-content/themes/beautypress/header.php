<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html <?php language_attributes(); ?> xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
    
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats please -->
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
                
    <title>
        <?php
        global $page, $paged;

        wp_title('|', true, 'right');

        bloginfo('name');

        $site_description = get_bloginfo('description', 'display');
        if ($site_description && ( is_home() || is_front_page() ))
            echo " | $site_description";

        if ($paged >= 2 || $page >= 2)
            echo ' | ' . sprintf(__('Page %s', tk_theme_name), max($paged, $page));
        ?>
    </title>

    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
    <link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />


<!--[if IE 8]>
<link href="<?php echo get_template_directory_uri(); ?>/style/ie8-media.css" media="screen and (min-width: 250px;)" rel="stylesheet"/>
<![endif]-->
<!--[if IE 9]>
<link rel="stylesheet" href="css/ie9.css" media="screen, projection" type="text/css" >
<![endif]-->


<!--[if lt IE 9]>
   <script>
      document.createElement('header');
      document.createElement('nav');
      document.createElement('section');
      document.createElement('article');
      document.createElement('aside');
      document.createElement('footer');
   </script>
<![endif]-->


        <?php $favicon = get_theme_option(tk_theme_name.'_general_favicon'); if(empty($favicon)) { $favicon = get_template_directory_uri()."/style/img/favicon.ico"; }?>
        <link rel="shortcut icon" href="<?php echo $favicon;?>" />

        
    <?php
        $g_analitics = get_theme_option(tk_theme_name.'_general_google_analytics');
        if( isset ($g_analitics) && $g_analitics != ''){
            echo $g_analitics;
        }
    ?>


<?php wp_head();?>
</head>

<body <?php body_class(); ?>>
<?php if ( ! isset( $content_width ) ) $content_width = 980; ?>
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=113020565471594";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

    <?php
    $disable_header = get_theme_option(tk_theme_name . '_general_disable_header');
    $header_left_text = get_theme_option(tk_theme_name . '_general_header_left_text');
    $header_button_text = get_theme_option(tk_theme_name . '_general_header_button_text');
    $header_button_url = get_theme_option(tk_theme_name . '_general_header_button_url');
    $header_right_text = get_theme_option(tk_theme_name . '_general_header_right_text');
    $show_slider = get_theme_option(tk_theme_name.'_general_enable_slider');
    ?>

<div id="container" <?php if ($disable_header == 'yes') {echo 'style="margin-top:0"';}?>>

    <?php
    if ($disable_header == 'yes') {} else {?>
        
    <div id="real-reservation" class="wrapper">
            <div class="header-top-shadow left">
                <div class="header-top left">
                    <div class="wrapper-content">

                        <div class="header-top-make-reservation left">
                            <?php if($header_left_text != ''){?>
                                <p><?php echo $header_left_text;?></p>
                            <?php } // if header left text?>
                            <?php if($header_button_text != '' && $header_button_url){?>
                                <a href="<?php echo $header_button_url;?>"><?php echo $header_button_text;?></a>
                            <?php } // if header button text?>
                        </div><!--/header-top-make-reservation-->

                        <div class="header-top-opening-hours right">
                            <p><?php echo $header_right_text;?></p>
                        </div><!--/header-top-opening-hours-->

                    </div><!--/wrapper-content-->
                </div><!--/header-top-->
                <div class="clear"></div>
            </div>
        </div><!--/wrapper-->
    <?php } // if header reservation ?>

    <!-- HEADER -->
    <div class="header left">
        

        
        
        
        <div class="header-down left">        
            <div class="wrapper">
                <div class="header-down-shadow left <?php if (is_front_page() && $show_slider == 'yes') { echo 'home-header'; } ?>">
                    <div class="wrapper-content">


                        
                        
                <!--LOGO-->
                <?php
                    $left_margin_top = get_option(tk_theme_name . '_general_left_margin_top');
                    $left_margin_left = get_option(tk_theme_name . '_general_left_margin_left');
                    $right_margin_right = get_option(tk_theme_name . '_general_right_margin_right');
                    $logo_margin_top = get_option(tk_theme_name . '_general_header_margin_top');
                    $logo_margin_bottom = get_option(tk_theme_name . '_general_header_margin_bottom');
                    $logo_margin_left = get_option(tk_theme_name . '_general_header_margin_left');               
                
                    $logo = get_option(tk_theme_name . '_general_header_logo');
                    if (empty($logo)) {
                    $logo = get_template_directory_uri() . "/style/img/logo.png";
                    }
                    ?>
                <div class="logo left" style="margin-top:<?php echo $logo_margin_top ?>px;margin-bottom:<?php echo $logo_margin_bottom ?>px;margin-left:<?php echo $logo_margin_left ?>px;">
                    <a href="<?php echo home_url(); ?>"><img src="<?php echo $logo; ?>" alt='<?php bloginfo('name') ?>' title="<?php bloginfo('name') ?>"/></a>
                </div><!--/logo-->


                        <!--MENU-->
                        <div class="nav right">
                            <nav id="dl-menu">

                                <?php
                                    if (function_exists('has_nav_menu') && has_nav_menu('primary')) {
                                        $nav_menu = array('title_li' => '', 'theme_location' => 'primary', 'menu_class' => 'sf-menu');
                                        wp_nav_menu($nav_menu);
                                    } else {
                                        ?>
                                        <ul class="sf-menu">
                                            <?php
                                            $pageargs = array(
                                                'depth' => 3,
                                                'title_li' => '',
                                                'echo' => 1,
                                                'authors' => '',
                                                'link_before' => '',
                                                'link_after' => '',
                                                'walker' => '');
                                            wp_list_pages($pageargs);
                                            ?>
                                        </ul>
                        <?php }  // if function exists?>
                            </nav>
                        </div><!--/nav-->



                    </div><!--/wrapper-content-->
                </div>
            </div><!--/wrapper-->
        </div><!--/header-down-->
    </div><!--/header-->
    

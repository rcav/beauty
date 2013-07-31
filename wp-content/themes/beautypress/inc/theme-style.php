<?php
global $tabs2;
$theme_name = 'beautypress_';
$tabs2 = array(
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

/* * ********************************************************** */
/* * ***************THEME CUSTOMIZER*********************** */
/* * ********************************************************** */


add_action('admin_menu', 'add_customizer');
function add_customizer() {
    add_theme_page('Customize', 'Customize', 'edit_theme_options', 'customize.php');
}

add_action('customize_register', 'theme_customize');
function theme_customize($wp_customize) {
    global $tabs2;
    
    foreach ($tabs2 as $one_tab) {
        
        // PANEL TITLE
        /*
                array(
                   'id' => 'site_colors',
                   'title' => 'Site Colors',
                   'priority' => 35,
                   'fields' => array(
                       array(
                        'id' => 
                        'selector' => 
                        'type' => 
                        'value' => 
                        'label' => 
                        'desc' => 
                        'options' => 
                       ),
                   ),
               ),
         */
            $wp_customize->add_section($one_tab['id'], array(
                'title' => $one_tab['title'],
                'priority' => $one_tab['priority'],
            ));
            
            foreach ($one_tab['fields'] as $one_setting){
                
                
                // ADDING SETTING TO PANNEL
                $wp_customize->add_setting( $one_setting['id'], array(
                        'default'        => $one_setting['value'],
                        'type'  => 'option'
                ));
        
                // ASSIGN CONTROL TO SETTING
                // THIS CAN BE RADIO, CHECKBOX, OPTION, ETC.
                
                if($one_setting['type'] == 'option'){
                    
                    /*
                     *             array(
                                        'id' => 'footer_color',
                                        'selector' => '.footer-widgets',
                                        'type' => 'option',
                                        'value' => 'fff',
                                        'label' => 'Chose Footer Color',
                                        'desc' => '',
                                        'options' => 'background-color'
                                    ),
                     */
                    
                    $wp_customize->add_control(
                            new WP_Customize_Color_Control(
                                    $wp_customize,
                                    $one_setting['id'],
                                    array(
                                        'label' => $one_setting['label'],
                                        'section' => $one_tab['id'],
                                        'settings' => $one_setting['id'],
                                        'priority' => $one_setting['priority'],
                            ))
                    );
                }
                
                /*
                 *             array(
                                    'id' => 'body_color',
                                    'selector' => 'body',
                                    'type' => 'select',
                                    'value' => 'fff',
                                    'label' => 'Chose Body Color',
                                    'desc' => '',
                                    'choices'    => array(
                                        get_template_directory_uri().'/style/img/pat1.png' => 'Pattern 1',
                                        get_template_directory_uri().'/style/img/pat2.png'  => 'Pattern 2',
                                        get_template_directory_uri().'/style/img/pat3.png'  => 'Pattern 3',
                                    )
                                ),
                 */
                
                if($one_setting['type'] == 'select'){
                    $wp_customize->add_control( $one_setting['id'], array(
                        'label'   => $one_setting['label'],
                        'section' => $one_tab['id'],
                        'type'    => 'select',
                        'choices'    => $one_setting['choices'],
                        'priority' => $one_setting['priority'],
                    ) );
                }
                
                /*
                 *             array(
                                    'id' => $theme_name.'site_appearance',
                                    'selector' => '#container',
                                    'type' => 'radio',
                                    'value' => '',
                                    'label' => 'Boxed or Full Width Sections',
                                    'desc' => 'You can chose your site either to be boxed (in this case site is also responsive) or full width sections.',
                                    'options' => '',
                                    'choices'    => array(
                                        'boxed' => 'Boxed Content',
                                        'full_width' => 'Full Width Sections',
                                    ),
                                ),   
                 */
                
                if($one_setting['type'] == 'radio'){
                    $wp_customize->add_control( $one_setting['id'], array(
                        'label'   => $one_setting['label'],
                        'section' => $one_tab['id'],
                        'type'    => 'select',
                        'choices'    => $one_setting['choices'],
                        'priority' => $one_setting['priority'],
                    ) );
                }
                
                
                

                
                // SEETING POSTMESSAGE TO EVERY PANNEL SETTING
                // THIS ALLOWES TO LIVE UPDATE LOOK OF THEME
                $wp_customize->get_setting($one_setting['id'])->transport = 'postMessage';

                
            }
            
    }


    $wp_customize->remove_section('title_tagline');
    $wp_customize->remove_section('colors');
    $wp_customize->remove_section('static_front_page');
    $wp_customize->remove_section('nav');
}


add_action('customize_preview_init', 'live_preview');

function live_preview() {
    global $tabs2;
    wp_enqueue_script('mytheme-themecustomizer', get_template_directory_uri() . '/inc/live-style.php', array('jquery', 'customize-preview'), '', true);
    wp_localize_script('mytheme-themecustomizer', 'mytheme-pho-themecustomizer', $tabs2);
}
?>
<?php
/*

Template Name: Contact

*/
get_header();
$prefix = 'tk_';
$show_map = get_theme_option(tk_theme_name.'_contact_show_map');
$sidebar_postition = get_post_meta($post->ID, $prefix.'sidebar_position', true);
if($sidebar_postition == ''){$sidebar_postition = 'right';}
$sidebar_select = get_post_meta($post->ID, $prefix.'sidebar', true);
?>

<?php
    $x_coord = get_option(tk_theme_name.'_contact_googlemap_x');
    $y_coord = get_option(tk_theme_name.'_contact_googlemap_y');
    $zoom_factor = get_option(tk_theme_name.'_contact_googlemap_zoom');
    $map_type = get_option(tk_theme_name.'_contact_google_map_type');
    $marker_title = get_option(tk_theme_name.'_contact_marker_title');
    $map_color = get_theme_option(tk_theme_name.'_contact_map_color');
    $default_color = get_theme_option(tk_theme_name.'_contact_default_map');



    if($default_color) {
         if(empty($map_color)) {
            $map_color ='';
        }
    } else {
        $map_color='';
    }

    if(empty($x_coord)) {$x_coord = 45.256024;}
    if(empty($y_coord)) {$y_coord = 19.853861;}
    if(empty($zoom_factor)) {$zoom_factor = 15;}
    if(empty($map_type)) {$map_type = 'ROADMAP';}
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
                            <?php
                                $page_headline = get_post_meta($post->ID, $prefix . 'headline', true);
                                if ($page_headline !== "") { ?>    
                            <p><?php echo $page_headline ?></p>
                            <?php } ?>
                        </div><!--/title-on-page-->



                        <div class="content-left <?php if($sidebar_postition == 'right'){echo 'left';}elseif($sidebar_postition == 'left'){echo 'right';}elseif($sidebar_postition == 'fullwidth'){echo 'no-sidebar';}?>">

            <?php if(empty($show_map)) { ?>
                
                <div class="map-contact left" id="map_fancy">
                    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
                    <div id="map_canvas" style="width: 100%; height: 100%; min-height: 0px;" class="contact-img"></div>

                    <?php if($map_color){ ?>
                    
                                 <script type="text/javascript">

                                      var styles = [
                                                            {
                                                              "stylers": [
                                                                { "hue": "<?php echo '#'.$map_color; ?>" }
                                                              ]
                                                            }
                                                          ];
                                                          
                                    var styledMap = new google.maps.StyledMapType(styles,
                                    {name: "Styled Map"});

                                    var latlng = new google.maps.LatLng(<?php echo $x_coord?>, <?php echo $y_coord?>);

                                    var myOptions = {
                                        zoom: <?php echo $zoom_factor ?>,
                                        center: latlng,
                                        mapTypeControl: false,
                                        streetViewControl: false,
                                        overviewMapControl: false,                                                                        
                                        mapTypeId: google.maps.MapTypeId.<?php echo $map_type?>,
                                        scrollwheel: false
                                    };

                                  var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);                             
                                  map.mapTypes.set('map_style', styledMap);                                
                                  map.setMapTypeId('map_style');

                                    <?php if(!empty($marker_title)) { ?>
                                      var marker = new google.maps.Marker({
                                          position: latlng,
                                          map: map,
                                          title:"<?php echo $marker_title?>"
                                      });
                                  <?php }?>

                                </script>
                                
                    <?php } else { ?> 
                                
                                <script type="text/javascript">
                                    var latlng = new google.maps.LatLng(<?php echo $x_coord?>, <?php echo $y_coord?>);
                                    var myOptions = {
                                        zoom: <?php echo $zoom_factor ?>,
                                        center: latlng,
                                        mapTypeControl: false,
                                        streetViewControl: false,
                                        overviewMapControl: false,                                                                        
                                        mapTypeId: google.maps.MapTypeId.<?php echo $map_type?>,
                                        scrollwheel: false
                                    };

                                    var mapa = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

                                    <?php if(!empty($marker_title)) { ?>
                                      var marker = new google.maps.Marker({
                                          position: latlng,
                                          map: mapa,
                                          title:"<?php echo $marker_title?>"
                                      });
                                  <?php }?>
                                </script>
                                
                    <?php } ?>                         
                </div><!--/map-contact-->
                <?php } ?>
                
                <?php if (!empty ($post -> post_content)) { ?>
                <div class="contact-text left">
                        <div class="shortcodes left"> 
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
                </div><!--/contact-text-->
                <?php } ?>

                
                
                        <?php
                            $mail_success_msg = get_option(tk_theme_name.'_contact_message_successful');
                            $mail_error_msg = get_option(tk_theme_name.'_contact_message_unsuccessful');
                        ?>

                
                <?php $captcha_option = get_theme_option(tk_theme_name.'_contact_disable_captcha'); ?>
                        
                <div class="form left">
                    <h2><?php _e('Say Hello', tk_theme_name); ?></h2>
                    <form method="GET" id="contactform" onsubmit="return checkForm(this)" action="<?php echo get_template_directory_uri().'/sendcontact.php'?>" >
                        <div class="form-input left">
                           <div class="bg-input left"><input type="text" onfocus="if(value==defaultValue)value=''" onblur="if(value=='')value=defaultValue" value="<?php if(isset($_GET['captcha']) && $_GET['captcha'] == 'error'){echo $_SESSION['contactname'];}else{_e('Name (required)' ,tk_theme_name);} ?>"name="contactname" id="contactname" tabindex="1" /></div>
                           <div class="bg-input left"><input type="text" onfocus="if(value==defaultValue)value=''" onblur="if(value=='')value=defaultValue" value="<?php if(isset($_GET['captcha']) && $_GET['captcha'] == 'error'){echo $_SESSION['contactemail'];}else{_e('Email (required)', tk_theme_name);} ?>" name="email" id="contactemail" tabindex="2" /></div>
                        </div><!--/form-input-->
                       <div class="form-textarea">
                           <textarea onfocus="if(value==defaultValue)value=''" onblur="if(value=='')value=defaultValue" name="message" id="contactmessage" tabindex="3"><?php if(isset($_GET['captcha']) && $_GET['captcha'] == 'error'){echo $_SESSION['contactmessage'];}else{_e('Message', tk_theme_name);} ?></textarea>
                       </div><!--/form-textarea-->
                        
                    <?php if ($captcha_option !==  'yes') { //Disable captcha ?>
                       <div class="contact-captcha">
                           <img src="<?php echo get_template_directory_uri()?>/script/captcha/captcha.php" id="captcha" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>
                           <div class="bg-input captcha-holder">
                               <input type="text" name="captcha" id="captcha-form" autocomplete="off" />
                           <div class="refresh-text"><?php _e('Cant read? Refresh Image: ', tk_theme_name); ?></div>
                           <a onclick="
                               document.getElementById('captcha').src='<?php echo get_template_directory_uri()?>/script/captcha/captcha.php?'+Math.random();
                               document.getElementById('captcha-form').focus();"
                               id="change-image" class="captcha-refresh"></a>   
                            </div>
                        </div>
                       <?php } //Disable captcha?>
                       
                       <div style="width: 100%; display: inline-block"></div>
                        <div class="search-submit-button left"><input type="submit" name="submit" value="<?php _e('Send Message', tk_theme_name); ?>" /></div>
                        <input type="hidden" name="returnurl" value="<?php echo get_permalink();  ?>">
                    </form>        
                    
                            <div id="contact-success">
                                <?php if(isset($_GET['sent'])) {
                                    $what = $_GET['sent'];
                                    if($what == 'success') {
                                        echo $mail_success_msg;
                                        }
                                    }
                                ?>
                            </div><!-- contact-success -->

                            <div id="contact-error">
                                <?php 
                                    if(isset($_GET['captcha']) && $_GET['captcha'] == 'error'){
                                        _e('Invalid Captcha!', tk_theme_name);
                                    };
                                ?>
                                <?php if(isset($_GET['sent'])) {
                                    $what = $_GET['sent'];
                                    if($what == 'error') {
                                        echo $mail_error_msg;
                                    }
                                }
                                ?>
                            </div><!-- contact-error -->

                            
                            
                </div><!--/form-->

                        </div><!--/content-left-->

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
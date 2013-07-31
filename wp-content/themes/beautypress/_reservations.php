<?php
/*

  Template Name: Reservations

 */
get_header();
$prefix = 'tk_';
$subheading = get_post_meta($post->ID, $prefix . 'subheading', true);

$mail_success_msg = get_option(tk_theme_name . '_contact_message_successful');
$mail_error_msg = get_option(tk_theme_name . '_contact_message_unsuccessful');


if (!empty($_GET['id'])) {
    $get_post_id = $_GET['id'];
} else {
    $get_post_id = '';
}

if (isset($_POST['fullname'])) {

    $to = get_option('admin_email');
    $full_name = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $exploded_date = explode('/', $date);
    $formated_date = $exploded_date[2] . '-' . $exploded_date[0] . '-' . $exploded_date[1];
        
    $select_services = $_POST['select-service'];
    $select_team_member = $_POST['select-team-member'];
    $subject = $select_services . ' - ' . $date;
    $additional_info = $_POST['additional-information'];

    $body = "You have received an appointment from <strong>" . $full_name . "</strong><br /><br /><strong>Date:</strong> " . $formated_date . "<br /><br /><strong>Phone:</strong> " . $phone . "<br /><br /><strong>E-Mail:</strong> " . $email . "<br /><br /><strong> For Team Member: </strong>" . $select_team_member . "<br /><br /><strong>Service:</strong>" . $select_services . "<br /><br /><strong>Additional Information: </strong>" . $additional_info;

    $wpdb->query($wpdb->prepare("INSERT INTO " . $wpdb->prefix . tk_theme_name . "_reservations (fullname, email, phone, date, service, appointment_for, message) VALUES(%s, %s, %s, %s, %s, %s, %s );", $full_name, $email, $phone, $formated_date, $select_services, $select_team_member, $additional_info));


    add_filter('wp_mail_content_type', 'set_content_type');

    function set_content_type($content_type) {
        return 'text/html';
    }

    add_filter('wp_mail_from', 'my_mail_from_function');

    function my_mail_from_function($email) {
        global $to;
        return $to;
    }

    add_filter('wp_mail_from_name', 'my_mail_from_name_function');

    function my_mail_from_name_function($email) {
        global $full_name;
        return $full_name;
    }

    add_filter('wp_mail_charset', 'set_charset');

    function set_charset($charset) {
        return 'UTF-8'; //default is blog charset
    }

    $send = wp_mail($to, $subject, $body);
}
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
                        <?php if (!empty($subheading)) { ?><p><?php echo $subheading; ?></p><?php } ?>
                    </div><!--/title-on-page-->


                    <div class="reservation-page left">

                        <?php if (!empty($post->post_content)) { ?>
                            <div class="gallery-text shortcodes left">
                                <?php
                                wp_reset_query();
                                if (have_posts()) : while (have_posts()) : the_post();
                                        the_content();
                                    endwhile;
                                else:
                                endif;
                                wp_reset_query();
                                ?>
                            </div>
                        <?php } ?>

                        <div class="make-reservation-page left">

                            <div class="make-reservation-page-title left">
                                <span><?php echo get_option(tk_theme_name().'_reservation_form_title');?></span>
                            </div><!--/make-reservation-page-title-->


                            <div class="make-reservation-page-form left">
                                <form method="POST" id="contactform" onsubmit="return check_reservation_form(this)" action="" >
                                    <div class="form-input left">
                                        <div class="bg-input left"><input type="text" onfocus="if(value==defaultValue)value=''" onblur="if(value=='')value=defaultValue" value="<?php echo get_option(tk_theme_name().'_reservation_fullname_field');?>"  id="fullname" tabindex="1" name="fullname" /></div>
                                        <div class="bg-input left"><input type="text" onfocus="if(value==defaultValue)value=''" onblur="if(value=='')value=defaultValue" value="<?php echo get_option(tk_theme_name().'_reservation_email_field');?>" id="email" name="email" tabindex="2" /></div>
                                        <div class="bg-input left"><input type="text" onfocus="if(value==defaultValue)value=''" onblur="if(value=='')value=defaultValue" value="<?php echo get_option(tk_theme_name().'_reservation_phone_field');?>"  id="phone" name="phone" tabindex="3"  /></div>
                                    </div><!--/form-input-->


                                    <div class="form-input left">

                                        <div class="bg-select left">
                                            <input type="text" class="datepicker" value="<?php echo get_option(tk_theme_name().'_reservation_date_field');?>"  id="date" name="date" tabindex="4" />
                                        </div>

                                        <div class="bg-select left">
                                            <select class="select-services" name="select-service" id="select-service">                                                     
                                                <option rel="0" value="<?php echo get_option(tk_theme_name().'_reservation_service_field');?>"><?php echo get_option(tk_theme_name().'_reservation_service_field');?></option>
                                                <?php
                                                $args = array('post_status' => 'publish', 'post_type' => 'services', 'posts_per_page' => -1);
                                                // The Query
                                                query_posts($args);
                                                // The Loop
                                                if (have_posts()): while (have_posts()) : the_post();
                                                        ?>
                                                        <option rel="<?php echo $post->ID; ?>" value="<?php the_title(); ?>"><?php the_title(); ?></option>
                                                        <?php
                                                    endwhile;
                                                endif;
                                                ?>
                                            </select>
                                        </div>

                                        <div class="bg-select left">
                                            <select class="select-team-member" name="select-team-member" id="select-team-member">
                                                <option rel="0" value="<?php echo get_option(tk_theme_name().'_reservation_appointment_field');?>"><?php echo get_option(tk_theme_name().'_reservation_appointment_field');?></option>
                                                <?php
                                                $args = array('post_status' => 'publish', 'post_type' => 'team-members', 'posts_per_page' => -1);
                                                // The Query
                                                query_posts($args);
                                                // The Loop
                                                if (have_posts()): while (have_posts()) : the_post();
                                                        $get_services_id = get_post_meta($post->ID, $prefix.'title_info', true);
                                                        
                                                        $show_reservations = get_post_meta($post->ID, $prefix . 'show_reservations', true);
                                                        if (!empty($show_reservations)) {
                                                            ?>
                                                            <option <?php if(!empty($get_services_id)) {?> rel="<?php if(is_array($get_services_id)){ foreach($get_services_id as $servicesID) { echo $servicesID.' ';} } else { echo $get_services_id; } ?>" <?php } ?> value="<?php the_title(); ?>" <?php if ($get_post_id == $post->ID) { ?> selected='selected'<?php } ?> ><?php the_title(); ?></option>
                                                            <?php
                                                        }
                                                    endwhile;
                                                    endif;
                                                ?>
                                            </select>
                                        </div>

                                    </div><!--/form-input-->


                                    <div class="form-textarea">
                                        <textarea onfocus="if(value==defaultValue)value=''" onblur="if(value=='')value=defaultValue" id="additional-information" name="additional-information"><?php echo get_option(tk_theme_name().'_reservation_message_field'); ?></textarea>
                                    </div><!--/form-textarea-->

                                    <div class="search-submit-button left"><input type="submit" name="submit" value="<?php _e('Submit', tk_theme_name); ?>" /></div>


                                    <?php if (!empty($send)) { ?>
                                        <div id="contact-success" class="appointment-box">
                                            <?php echo $mail_success_msg; ?>
                                        </div><!-- contact-success -->
                                    <?php } ?>


                                    <div id="contact-error" class="appointment-box">
                                        <?php
                                        if (isset($_GET['sent'])) {
                                            $what = $_GET['sent'];
                                            if ($what == 'error') {
                                                echo $mail_error_msg;
                                            }
                                        }
                                        ?>
                                    </div><!-- contact-error -->



                                </form>
                            </div><!--/make-reservation-page-form-->


                        </div><!--/make-reservation-page-->


                    </div><!--/reservation-page-->



                </div><!--/wrapper-content-->
            </div><!--/bg-content-->


        </div>
    </div><!--/wrapper-->
</div><!--/content-->

<?php get_footer(); ?>
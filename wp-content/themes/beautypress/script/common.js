jQuery(function() {
    "use strict";
    var opts = {
        lines: 7, // The number of lines to draw
        length: 9, // The length of each line
        width: 2, // The line thickness
        radius: 0, // The radius of the inner circle
        corners: 1.0, // Corner roundness (0..1)
        rotate: 0, // The rotation offset
        color: '#797979', // #rgb or #rrggbb
        speed: 1, // Rounds per second
        trail: 67, // Afterglow percentage
        shadow: false, // Whether to render a shadow
        hwaccel: false, // Whether to use hardware acceleration
        className: 'spinner', // The CSS class to assign to the spinner
        zIndex: 2e9, // The z-index (defaults to 2000000000)
        top: 'auto', // Top position relative to parent in px
        left: 'auto' // Left position relative to parent in px
    };

    var target1 = document.getElementById('work-slider');
    var spinner1 = new Spinner(opts).spin(target1);
});

jQuery(window).load(function($){
    jQuery('.blog-images .blog-gallery').imagesLoaded(function(){
        jQuery('.work-slider').attr('style', 'display:none');
        jQuery('.blog-gallery, .blog-images').attr('style', 'opacity:1');
    });
})



jQuery(document).ready(function($) {
    
    
    jQuery("body").niceScroll({
        cursorwidth: 9,
        zindex:99999999,
        scrollspeed:60,
        mousescrollstep:35,
        cursorborder:0,
        cursorcolor:"#5d5d5d",
        cursorborderradius:2,
        autohidemode:false,
        iframeautoresize: false,
        background: "#cccccc",
        railpadding:{top:2,right:3,left:0,bottom:0}        
    });
    
    
    getWidth = jQuery(window).width();
    if(getWidth > 568) {
         jQuery("body").css('padding-right', '15px');
    }
   
    jQuery('.select-services').change(function(){
     var getID =  jQuery(".select-services").find('option:selected').attr('rel');
     
        if(getID == 0){
           jQuery(".select-team-member option").removeAttr("disabled");
        } else {
            jQuery(".select-team-member option").removeAttr("disabled");
            jQuery(".select-team-member option:not([rel~="+getID+"])").attr({ disabled: 'disabled' });
        }
    
     
    });

    jQuery('.datepicker').datepicker();


    //MENU
    jQuery('ul.sf-menu').superfish({
        delay:       100,
        disableHI:   true, // this option fixes drop down problem with hoverIntent
        animation:   {
            opacity:'show',
            height:'show'
        }
    });

    jQuery('.our-team-page-one:last').attr('style', 'background:none;');
    jQuery('.bg-select:last').attr('style', 'float:right;');
    jQuery('.bg-select:first').attr('style', 'float:left; margin-left:0;');


    /*
    // FLEXSLIDER
    jQuery(window).load(function() {
            jQuery('.flexslider').flexslider();
    });
*/
    // Gallery Video
    jQuery(".youtube").click(function() {
        $.fancybox({
            'padding' : 0,
            'autoScale' : false,
            'transitionIn': 'elastic',
            'transitionOut' : 'elastic',
            'title' : this.title,
            'width' : 680,
            'height' : 495,
            'href': this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
            'type': 'swf',
            'swf': {
                'wmode': 'transparent',
                'allowfullscreen': 'true'
            }
        });
        return false;
    });

    jQuery(".vimeo").click(function() {
        jQuery.fancybox({
            'padding': 0,
            'autoScale': false,
            'transitionIn': 'elastic',
            'transitionOut'	: 'elastic',
            'title':  this.title,
            'width': 520,
            'height': 300,
            'href': this.href.replace(new RegExp("([0-9])","i"),'moogaloop.swf?clip_id=$1'),
            'type': 'swf'
        });
        return false;
    });

    // FANCYBOX
    jQuery('.fancybox').fancybox();
	
    //AUDIO
    jQuery("#jquery_jplayer_1").jPlayer({
        ready: function (event) {
            $(this).jPlayer("setMedia", {
                m4a:"http://www.jplayer.org/audio/m4a/TSP-01-Cro_magnon_man.m4a",
                oga:"http://www.jplayer.org/audio/ogg/TSP-01-Cro_magnon_man.ogg"
            });
        },
        swfPath: "js",
        supplied: "m4a, oga",
        wmode: "window"
    });

    // TABS
    jQuery( ".tabs").each(function(){
        jQuery(this).tabs();
    });

    jQuery(window).resize(function(){
        resize1();
    });
    
    setTimeout(resize1, 5);
    
    function resize1(){
        var widthWindow = $(window).width();

        if(widthWindow<850){
            jQuery('.nav nav').addClass('dl-menuwrapper');
            jQuery('.sub-menu').addClass('dl-submenu');            
        } else {
            jQuery('.nav nav').removeClass('dl-menuwrapper');
            jQuery('.sub-menu').removeClass('dl-submenu');        
        }
    }





    // toggle box
    jQuery(".toggle-holder").each(function(){
        if($('h6', this).hasClass('active-togle-img')){
            $(this).addClass('toggle-height-min');
            $("p",this).attr('style', 'display: none;');
        }
    })
    // 'toggle box
    jQuery(".toggle-holder").click(function(){
        if ($("h6",this).hasClass('active-togle-img')){
            $("h6",this).removeClass('active-togle-img');
            $(this).toggleClass( "toggle-height-min" );
        } else {
            $("h6",this).addClass('active-togle-img');
            $(this).toggleClass( "toggle-height-min" );
        }
        $("p",this).slideToggle();
    })


    jQuery( "#tabs-sidebar" ).tabs();

    //hover gallery
    jQuery(' #da-thumbs > li ').each( function() {
        $(this).hoverdir();
    } );


     
    jQuery(window).resize(function(){
        resize1();
    });
    
    setTimeout(resize1, 5);
    
    function resize1(){
        var widthWindow = $(window).width();

        if(widthWindow<850){
            jQuery('.nav nav').addClass('dl-menuwrapper');
            jQuery('.sub-menu').addClass('dl-submenu');            
        } else {
            jQuery('.nav nav').removeClass('dl-menuwrapper');
            jQuery('.sub-menu').removeClass('dl-submenu');        
        }
    }
    
    //animating the reservation bar
    var admin_bar_show = contact_variables.admin_bar_showing;
    jQuery(function(){
        if (admin_bar_show == 1) { 
            var getHeight = '28';
        } else {
            var getHeight= '';
        }

        var $myDiv = jQuery('#real-reservation');
        if ( $myDiv.length){
            var stickyReservation = jQuery('#real-reservation').offset().top;
            var reservationWidth = 3;

            jQuery(window).scroll(function(){
                if( jQuery(window).scrollTop() > stickyReservation ) {
                    jQuery('#real-reservation').css({
                        position: 'fixed', 
                        top: getHeight+'px',
                        paddingRight:15

                    });
                    jQuery('#real-reservation').addClass('reservation-bar-wrap');           
                } else {
                    jQuery('#real-reservation').css({
                        position: 'static', 
                        top: getHeight+'px',
                        paddingRight: 0
                    });
                    jQuery('#real-reservation').removeClass('reservation-bar-wrap');
                }            
            });
        }
    });          
              
              

              
              
});

jQuery(function($) {

    jQuery("<select />").appendTo(".nav nav");

    jQuery("<option />", {
        "selected": "selected",
        "value"   : "",
        "text"    : "Go to..."
    }).appendTo(".nav nav select");

    jQuery(".nav nav a").each(function() {
        var el = jQuery(this);
        jQuery("<option />", {
            "value"   : el.attr("href"),
            "text"    : el.text()
        }).appendTo(".nav nav select");
    });

    jQuery(".nav nav select").change(function() {
        window.location = jQuery(this).find("option:selected").val();
    });

});



/*Contact Form*/
    
                
function validate_email(field,alerttxt)
{
    with (field)
    {
        apos=value.indexOf("@");
        dotpos=value.lastIndexOf(".");
        if (apos<1||dotpos-apos<2)
        {
            jQuery('#contact-error').empty().append(alerttxt);
            return false;
        }
        else {
            return true;
        }
        }
}


function check_reservation_form(thisform)
{ 
    //alert(contact_variables.reservation_fullname_field+' = '+jQuery('#fullname').val()+' = '+document.getElementById('fullname').value);
    with (thisform)
    {
                                      
        var error = 0;
                               
        var tk_message = document.getElementById('additional-information');
        if(check_reservation_field(tk_message, contact_variables.all_fields_are_required, contact_variables.reservation_message_field)==false){
            error = 1;
        }
                               
        var tk_teammember = document.getElementById('select-team-member');
        if(check_reservation_field(tk_teammember, contact_variables.all_fields_are_required, contact_variables.reservation_appointment_field)==false){
            error = 1;
        }
                                
        var tk_services = document.getElementById('select-service');
        if(check_reservation_field(tk_services, contact_variables.all_fields_are_required, contact_variables.reservation_service_field)==false){
            error = 1;
        }
        var datereq = document.getElementById('date');
        if(check_reservation_field(datereq, contact_variables.all_fields_are_required, contact_variables.reservation_date_field)==false){
            error = 1;
        }
                                    
        var phone = document.getElementById('phone');
        if(check_reservation_field(phone, contact_variables.all_fields_are_required, contact_variables.reservation_phone_field)==false){
            error = 1;
        }
                                    
        var appoint_email = document.getElementById('email');
        if (validate_email(appoint_email, contact_variables.email_error_msg)==false)
        {
            email.focus();
            error = 1;
        }
                                    
        var fullname = document.getElementById('fullname');
        if(check_reservation_field(fullname, contact_variables.name_error_msg, contact_variables.reservation_fullname_field)==false){
            
            error = 1;
        }
                                        
        if(error == 0){
            var tk_message = document.getElementById('additional-information').value;
            var tk_teammember = document.getElementById('select-team-member').value;
            var tk_services = document.getElementById('select-service').value;
            var datereq = document.getElementById('date').value;
            var phone = document.getElementById('phone').value;
            var fullname = document.getElementById('fullname').value;
            var appoint_email = document.getElementById('email').value;

            return true;
        }
        return false;
        }
}
                                
function check_reservation_field(field,alerttxt,checktext){
    with (field)
    {
        var is_element_input = jQuery(field).is("input");
                                    
        var checkfalse = 0;
        if(field.value == ""){

            jQuery('#contact-error').empty().append(alerttxt);
            field.focus();
            checkfalse=1;
        }

        if(field.value==checktext)
        {
  
            jQuery('#contact-error').empty().append(alerttxt);
            field.focus();
            checkfalse=1;
        }

        if(checkfalse==1){
            if(is_element_input == true) { 
                jQuery(field).attr('style', 'border:1px solid #e27b67;');
            } else {
                jQuery(field).parent().attr('style', 'border:1px solid #e27b67;');
            }                                        
            return false;
        }else{ 
            if(is_element_input == true) { 
                jQuery(field).attr('style', 'border:1px solid #dfdfdf;');
            } else {
                jQuery(field).parent().attr('style', 'border:1px solid #dfdfdf;');
            }
            return true;    
        }
    
                                     
        }
                                    
}
                                

function check_field(field,alerttxt,checktext){
    with (field)
    {
        var checkfalse = 0;
        if(field.value == ""){
            jQuery('#contact-error').empty().append(alerttxt);
            field.focus();
            checkfalse=1;
        }

        if(field.value==checktext)
        {
            jQuery('#contact-error').empty().append(alerttxt);
            field.focus();
            checkfalse=1;
        }

        if(checkfalse==1){
            return false;
        }else{
            return true;
        }
        }
}

function checkForm(thisform)
{
    with (thisform)
    {
        var error = 0;

        var contactmessage = document.getElementById('contactmessage');
        if(check_field(contactmessage, contact_variables.message_error_message,"Message")==false){
            error = 1;
        }

        var email = document.getElementById('contactemail');
        if (validate_email(email,contact_variables.email_error_message)==false)
        {
            email.focus();
            error = 1;
        }

        var contactname = document.getElementById('contactname');
        if(check_field(contactname,contact_variables.name_error_message,"Name (required)")==false){
            error = 1;
        }

        if(error == 0){
            var contactname = document.getElementById('contactname').value;
            var email = document.getElementById('contactemail').value;
            var contactmessage = document.getElementById('contactmessage').value;

            return true;
        }
        return false;
        }
}
jQuery(document).ready(function(){
    jQuery('select.gf').change(function() {
        var val = jQuery(this).val();
        val.replace('tk_font_', '');
        //alert(val);
        //alert(val.substring(-1, val.indexOf(":")));
    });
    
    var quote_meta = jQuery('#post_meta4');
    var quote_radio = jQuery('#post-format-quote');
    quote_meta.css('display', 'none');

                
    var image_meta = jQuery('#postimagediv');
    var image_radio = jQuery('#post-format-image');
                
    var standard_meta = jQuery('#postimagediv');
    var standard_radio = jQuery('#post-format-0');

    var link_meta = jQuery('#post_meta5');
    var link_radio = jQuery('#post-format-link');
    link_meta.css('display', 'none');

    var audio_meta = jQuery('#post_meta3');
    var audio_radio = jQuery('#post-format-audio');
    audio_meta.css('display', 'none');

    var gallery_meta = jQuery('#post_meta2');
    var gallery_radio = jQuery('#post-format-gallery');
    gallery_meta.css('display', 'none');

    var video_meta = jQuery('#post_meta1');
    var video_radio = jQuery('#post-format-video');
    video_meta.css('display', 'none');

    var group = jQuery('#post-formats-select input');
	
    group.change( function() {
		
        if(jQuery(this).val() == 'quote') {
            quote_meta.css('display', 'block');
            hide_metabox(quote_meta);
			
        } else if(jQuery(this).val() == '0') {
            standard_meta.css('display', 'block');
            hide_metabox(standard_meta);
                        
        } else if(jQuery(this).val() == 'gallery') {
            gallery_meta.css('display', 'block');
            hide_metabox(gallery_meta);
                        
        } else if(jQuery(this).val() == 'link') {
            link_meta.css('display', 'block');
            hide_metabox(link_meta);
			
        } else if(jQuery(this).val() == 'audio') {
            audio_meta.css('display', 'block');
            hide_metabox(audio_meta);
			
        } else if(jQuery(this).val() == 'video') {
            video_meta.css('display', 'block');
            hide_metabox(video_meta);
			
        } else if(jQuery(this).val() == 'image') {
            image_meta.css('display', 'block');
            hide_metabox(image_meta);
			
        } else {
            quote_meta.css('display', 'none');
            video_meta.css('display', 'none');
            link_meta.css('display', 'none');
            audio_meta.css('display', 'none');
            image_meta.css('display', 'none');
        }
		
    });
	
    if(gallery_radio.is(':checked'))
        gallery_meta.css('display', 'block');
	
    if(quote_radio.is(':checked'))
        quote_meta.css('display', 'block');
		
    if(link_radio.is(':checked'))
        link_meta.css('display', 'block');
		
    if(audio_radio.is(':checked'))
        audio_meta.css('display', 'block');
		
    if(video_radio.is(':checked'))
        video_meta.css('display', 'block');
		
    if(image_radio.is(':checked'))
        image_meta.css('display', 'block');
		
    function hide_metabox(current) {
        video_meta.css('display', 'none');
        quote_meta.css('display', 'none');
        link_meta.css('display', 'none');
        audio_meta.css('display', 'none');
        image_meta.css('display', 'none');
        gallery_meta.css('display', 'none');
        current.css('display', 'block');
    }

    var post_type = jQuery('#post_type').val();
    if(post_type == 'gallery' || post_type == 'services'){
        jQuery('#post-format-aside').css('display', 'none');
        jQuery('#post-format-aside').next().css('display', 'none');
        jQuery('#post-format-aside').next().next().css('display', 'none');
        jQuery('#post-format-audio').css('display', 'none');
        jQuery('#post-format-audio').next().css('display', 'none');
        jQuery('#post-format-audio').next().next().css('display', 'none');
        jQuery('#post-format-link').css('display', 'none');
        jQuery('#post-format-link').next().css('display', 'none');
        jQuery('#post-format-link').next().next().css('display', 'none');
        jQuery('#post-format-quote').css('display', 'none');
        jQuery('#post-format-quote').next().css('display', 'none');
        jQuery('#post-format-quote').next().next().css('display', 'none');
        jQuery('#post-format-image').css('display', 'none');
        jQuery('#post-format-image').next().css('display', 'none');
        jQuery('#post-format-image').next().next().css('display', 'none');
    }



});


// document ready function
jQuery(document).ready(function() { 	


    //Lines chart without points
    if ( jQuery('.banner-chart')[0] ) {
        jQuery(function () {

            //define placeholder class
            var placeholder = jQuery(".banner-chart");
            //graph options
            
	
            jQuery.plot(placeholder, [ 

            {
                    label: "Views", 
                    data: views,
                    lines: {
                        fillColor: "#f2f7f9"
                    },
                    points: {
                        fillColor: "#88bbc8"
                    }
                }, 
                {	
                    label: "Clicks", 
                    data: clicks,
                    lines: {
                        fillColor: "#fff8f2"
                    },
                    points: {
                        fillColor: "#ed7a53"
                    }
                } 

                ], options);

            var link = jQuery("#selector_seven_days");
            link.click();
            window.location.href = link.attr("href");

        });

    }//end if

});//End document ready functions
var colors = ['#88bbc8', '#ed7a53'];

var options = {
    grid: {
        show: true,
        aboveData: true,
        color: "#3f3f3f" ,
        labelMargin: 5,
        axisMargin: 0, 
        borderWidth: 0,
        borderColor:null,
        minBorderMargin: 5 ,
        hoverable: true,
        autoHighlight: true,
        mouseActiveRadius: 15
    },
                
                
    series: {
        lines: {
            show: true,
            fill: true,
            lineWidth: 2,
            steps: false
        },
        points: {
            show:true
        }
    },
    legend: {
        position: "se"
    },
                
                
    xaxis: {
        mode: "time",
        //timeformat: "%Y/%m/%d",
        timeformat: "%d.%m.%Y",
        minTickSize: [1, "day"],
        /*timezone: "utc",*/
        show: true
                   
    },

    colors: colors,
    shadowSize:5,
    tooltip: true, //activate tooltip
    tooltipOpts: {
        content: "%s: %y",
        shifts: {
            x: -30,
            y: -50
        }
    }
};

function updateChart(url, banner_stat_id, period) {
   
    jQuery.ajaxSetup ({  
        cache: false  
    });  
   
    jQuery.ajax({  
        type: 'GET',  
        url: url+'/?banner_stat_id='+banner_stat_id+'&period='+period+'&data_type=views',
        success: function(data){
            var views = JSON.parse(data);
    
            jQuery.ajax({  
            
                type: 'GET',  
                url: url+'/?banner_stat_id='+banner_stat_id+'&period='+period+'&data_type=clicks',
                success: function(data2){
                    /**/
                    var clicks = JSON.parse(data2);
                    var placeholder = jQuery(".banner-chart");
                    jQuery.plot(placeholder, [ 

                    {
                            label: "Views", 
                            data: views,
                            lines: {
                                fillColor: "#f2f7f9"
                            },
                            points: {
                                fillColor: "#88bbc8"
                            }
                        }, 
                        {	
                            label: "Clicks", 
                            data: clicks,
                            lines: {
                                fillColor: "#fff8f2"
                            },
                            points: {
                                fillColor: "#ed7a53"
                            }
                        } 

                        ], options);
                /**/
                }
            });
            
            
        }   
    });
//setTimeout('updateChart("'+url+'", '+banner_stat_id+', '+period+')', 5000);
}

jQuery(document).ready(function() { 	
    var current_order = 0;
    if ( jQuery('.post_order')[0] ) {
        jQuery(function () {
            jQuery(".post_order").each(function() {
                jQuery(this).val(current_order);
                current_order++
            });
        });
    }
});

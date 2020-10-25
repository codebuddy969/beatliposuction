/*** Kale - JS ***/

jQuery(document).ready(function($){
		
	kale_responsive_videos();
	kale_jump_to_recipe();
	
	$("#toggle-main_search").on("click", function (event) {
        var x = setTimeout('jQuery(".main_search .form-control").focus()', 700);
    });
	
    kale_fluidBox();
    $(window).load(function(){kale_fluidBox();})
    $(window).resize(function(){kale_fluidBox();});
    $('body').addClass('js');
    
	
	/* $(".owl-carousel").owlCarousel({
        lazyContent:true,
        loop:true,
        nav:true,
        dots:false,
        autoplay:true,
        items:1,
		animateOut: 'fadeOut',
        animateIn: 'fadeIn',
    }); */
	
    
    if($('.sidebar-column .instagram-pics').length>0){
        $(".sidebar-column .instagram-pics").owlCarousel({
            lazyContent:true,
            loop:true,
            nav:false,
            dots:false,
            autoplay:true,
            items:1,
            dots:false,
        });
    }
    
    
    $("select.form-control").selectpicker();
    $(".header-row-1-toggle").click(function(){
        $(this).toggleClass('open');
        $('.header-row-1').toggleClass('open');
        return false;
    });
    $('.checkbox label,.checkbox-inline label,.radio label,.radio-inline label').click(function(){
        kale_setupLabel();
    });
    kale_setupLabel();
    
    
    if ( $( ".sidebar-sticky" ).length ) {
        var offset = $('.sidebar-sticky').offset();
        $(window).scroll(function(e) {
          if(window.scrollY >= offset.top) { 
              $('.sidebar-sticky').addClass('sidebar-sticky-fixed');
          }  else {
              $('.sidebar-sticky').removeClass('sidebar-sticky-fixed');
          }
        });
    }
    
});


jQuery(document).ready(function($){
	
	if($( "#main_menu" ).hasClass( "stick-to-top" )) {
		var nav_off_top = $('.header .header-row-3 .navbar').offset().top;
		var nav_height = $('.header .header-row-3 .navbar').height();
		$(window).resize(function(){
			nav_off_top = $('.header .header-row-3 .navbar').offset().top;
			nav_height = $('.header .header-row-3 .navbar').height();
		});
		$(window).scroll(function(){
			var w_scroll = $(window).scrollTop();
			if(w_scroll>=nav_off_top && !$('.header .header-row-3 .navbar').hasClass('navbar-fixed-top')){
				$('.header .header-row-3 .stick-to-top').addClass('navbar-fixed-top container');
				$('.header .header-row-3').css('height',nav_height);
			}else if(w_scroll<nav_off_top && $('.header .header-row-3 .navbar').hasClass('navbar-fixed-top')){
				$('.header .header-row-3 .stick-to-top').removeClass('navbar-fixed-top container');
				$('.header .header-row-3').css('height','auto');
			}
		});
		$(window).scroll();
	}
});


function kale_setupLabel() {
    if (jQuery('.checkbox,.checkbox-inline').length) {
        jQuery('.checkbox label,.checkbox-inline label').each(function(){ 
            jQuery(this).removeClass('on');
        });
        jQuery('.checkbox input:checked,.checkbox-inline input:checked').each(function(){ 
            jQuery(this).parent('label').addClass('on');
        });                
    };
    if (jQuery('.radio,.radio-inline').length) {
        jQuery('.radio label,.radio-inline label').each(function(){ 
            jQuery(this).removeClass('on');
        });
        jQuery('.radio input:checked,.radio-inline input:checked').each(function(){ 
            jQuery(this).parent('label').addClass('on');
        });                
    };
};

function kale_fluidBox(){
    if(jQuery('[data-fluid]').length>0){
        jQuery('[data-fluid]').each(function(){
            var data = jQuery(this).attr('data-fluid');
            var dataFloat = jQuery(this).attr('data-float');
            var _container = jQuery(this);
            var dataSplit = data.split(',');
            if(_container.hasClass('carousel')){
                _container.find('.item').addClass('show');
            }
            for(i=0;i<dataSplit.length;i++){
                if(dataSplit[i]!=''){
                    if(jQuery(dataSplit[i],_container).length>0){
                        jQuery(dataSplit[i],_container).css('min-height','inherit');
                        if( dataFloat=='true' && jQuery(dataSplit[i],_container).parent().css('float')!='none' ){
                            var newH = 0;
                            if(jQuery(dataSplit[i],_container).length>0){
                                jQuery(dataSplit[i],_container).each(function(){
                                    var thisH = jQuery(this).innerHeight();
                                    if( newH<thisH ) newH = thisH;
                                });
                                jQuery(dataSplit[i],_container).css('min-height',newH);
                            }
                        }else if(dataFloat!='true'){
                            var newH = 0;
                            if(jQuery(dataSplit[i],_container).length>0){
                                jQuery(dataSplit[i],_container).each(function(){
                                    var thisH = jQuery(this).innerHeight();
                                    if( newH<thisH ) newH = thisH;
                                });
                                jQuery(dataSplit[i],_container).css('min-height',newH);
                            }
                        }
                    }
                }
            }
            if(_container.hasClass('carousel')){
                _container.find('.item').removeClass('show');
            }
        });
    }
}


function kale_print_recipe(elementId) {
    var a = '<style> .recipe-info .publish-date, .recipe-print, .recipe-author {display:none;} </style>';
    
    var b = document.getElementById(elementId).innerHTML;
    window.frames["lt-recipe-print-frame"].document.title = document.title;
    //window.frames["lt-recipe-print-frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
    window.frames["lt-recipe-print-frame"].document.body.innerHTML = a + b;
    window.frames["lt-recipe-print-frame"].window.focus();
    window.frames["lt-recipe-print-frame"].window.print();
}

//http://www.skipser.com/p/2/p/auto-resize-youtube-videos-in-responsive-layout.html
function kale_responsive_videos(){
	YOUTUBE_VIDEO_MARGIN = 5;
	jQuery('.single-content iframe, .page-content iframe').each(function(index,item) {
		if(jQuery(item).attr('src').match(/(https?:)?\/\/www\.youtube\.com/)) {
			var w=jQuery(item).attr('width');
			var h=jQuery(item).attr('height');
			var ar = h/w*100;
			ar=ar.toFixed(2);
			//Style iframe		
			jQuery(item).css('position','absolute');
			jQuery(item).css('top','0');
			jQuery(item).css('left','0');		
			jQuery(item).css('width','100%');
			jQuery(item).css('height','100%');
			jQuery(item).css('max-width',w+'px');
			jQuery(item).css('max-height', h+'px');				
			jQuery(item).wrap('<div style="max-width:'+w+'px;margin:0 auto; padding:'+YOUTUBE_VIDEO_MARGIN+'px;" />');
			jQuery(item).wrap('<div style="position: relative;padding-bottom: '+ar+'%; height: 0; overflow: hidden;" />');
		}
	});
}

function kale_jump_to_recipe(){

	jQuery('.jump-to-recipe a').on('click',function (e) {
	    e.preventDefault();

	    var target = this.hash;
	    var $target = jQuery(target);

	    jQuery('html, body').stop().animate({
			'scrollTop': $target.offset().top
			}, 900, 'swing', function () {
				window.location.hash = target;
			});
	});

}
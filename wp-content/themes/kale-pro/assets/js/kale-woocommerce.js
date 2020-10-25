/*** Kale - WooCommerce ***/
jQuery(document).ready(function($){
    	
    /* Start: Woocommerce */
    $(".shop-filter-sortby .dropdown-menu li a").click(function(e){
        e.preventDefault();
        $('select.orderby').val($(this).data('id')).trigger('change');
    });

	$(".woocommerce.single-product .kale-products").slick({
		speed: 1000,
		dots: false,
		arrows: true,
		slidesToShow: 4,
		autoplay: true,
		infinite: true,
		prevArrow: '<button type="button" data-role="none" class="slick-prev" aria-label="Previous" tabindex="0" role="button"><i class="fa fa-long-arrow-left"></i></button>',
		nextArrow: '<button type="button" data-role="none" class="slick-next" aria-label="Next" tabindex="0" role="button"><i class="fa fa-long-arrow-right"></i></button>',
		variableWidth:false,
		responsive:[
			{
				breakpoint: 768,
				settings: {slidesToShow: 3,variableWidth:false}
			},
			{
				breakpoint: 480,
				settings: {slidesToShow: 2,variableWidth:false}
			},
			{
				breakpoint: 320,
				settings: {slidesToShow: 1,variableWidth:false}
			}
		]
	}).on('afterChange',function(){
		kale_fixVerticalArrows();
	}).trigger('afterChange');


    $(window).resize(function(){
        kale_fixVerticalArrows();
    });

    function kale_fixVerticalArrows(){
        var h = ($('.slick-active').find("img").height()/2);
        $('.slick-arrow').css('top',h+'px');
    }
    /* End: Woocommerce */
    
});

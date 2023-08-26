// JavaScript Document

jQuery(function(){	
			
	
	wow = new WOW({
		animateClass: 'animated',
		offset: 120
	});
	wow.init();
});


$(function () {

			$(".inpro_zz").hide();
            $(".in_pro_li").hover(function(){
               $(this).find(".inpro_zz").slideDown();
            }, function () {
                 $(this).find(".inpro_zz").slideUp();
            });
		
			//回到顶部
			$(".gotop").click(function() {
     			$("html,body").animate({scrollTop:0}, 500);
 			}); 

});
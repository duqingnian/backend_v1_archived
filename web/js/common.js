$(function(){

    //导航下拉菜单
    $('#navBox li').hover(function(){
        $(this).find('.y-submenu07-box').slideDown();
    },function(){
        $(this).find('.y-submenu07-box').stop(true,false).slideUp();
    })

    //search
    $('.search .search-btn').on('click',function(){
        $('.search-form').slideDown();
        $('.search-form input').focus();
    })
    $('.search-form input').blur(function(){
        $('.search-form').slideUp();
    })

   //模块标题
    $('.wrap-tit').each(function(){
        var w = ($(this).width()/2)+($(this).find('a').width()/2)+20; //定义宽度变量 w    ，获取标题总宽度的一半 +  获取标题文字宽度的一半 + 文字与线条间隔
        $(this).find('.i1').css('right',w); //赋值左边线条距离右边的宽度
        $(this).find('.i2').css('left',w); //赋值右边线条距离左边的宽度
    })

})
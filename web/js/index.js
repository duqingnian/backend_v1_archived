$(function () {
    //头部菜单首页高亮
    $("#navBox").find("li").eq(0).addClass("cur");
})


$(function() {

    //滚动监测动画
    if (!(/msie [6|7|8|9]/i.test(navigator.userAgent))){
        new WOW().init();
    };


    //banner
    $(".banner").slide({
        titCell:'.hd ul',
        mainCell: '.bd ul',
        effect: 'leftLoop',
        autoPage: true,
        autoPlay: true,
        trigger: 'click',
        interTime:3000
    })

    //jsgh
    $(".jsgh-slide").slide({
        titCell:'.jsgh-menu ul li',
        mainCell: '.swiper-main .bd',
        effect: 'leftLoop',
        prevCell:'.jsgh-prev',
        nextCell:'.jsgh-next',
        autoPlay: true,
        interTime:3000
    })

    $('.product-menu dl.pyssbxl').addClass('cur').find('dd').slideDown();
    $('.product-menu dl.mjssbxl').addClass('cur').find('dd').slideDown();
   $('.product-menu dl').hover(function () {
       var len = $(this).find('dd a').length;
        console.log(len);
        if ( len > 0 ){
            $(this).addClass('cur').find('dd').slideDown().parent().siblings().removeClass('cur').find('dd').slideUp();
        }
        else {
        }
    })

    //indexInfo
    $(".indexInfo-slide").slide({
        titCell:'.indexInfo-menu ul li',
        mainCell: '.indexInfo-main .bd',
        effect: 'leftLoop',
        autoPlay: true,
        interTime:4000
    })

    //indexHonor
    $(".indexHonor-slide").slide({
        titCell:'.indexHonor-menu ul',
        mainCell: '.indexHonor-main .bd',
        effect: 'leftLoop',
        vis:4,
        autoPage: true,
        autoPlay: true,
        interTime:4000
    })

    //gctd
    $(".gctd-slide").slide({
        titCell:'.gctd-menu ul',
        mainCell: '.gctd-main .bd',
        effect: 'leftLoop',
        vis:3,
        autoPage: true,
        autoPlay: true,
        interTime:4000
    })

    //news
    $(".news-slide").slide({
        titCell:'.news-menu ul li',
        mainCell: '.news-main .bd',
        effect: 'leftLoop',
        autoPlay: true,
        interTime:4000
    })
})

//首页留言
function ProSendLeaveword(src) {
    var sContact = $("#txtContact").val();
    var sMobile = $("#txtMobile").val();

    var err = "";
    if (sContact == "" || sContact == "您的姓名") {
        err += "<p>请输入您的姓名</p>";
    }
    if (sMobile == "" || sMobile == "您的电话") {
        err += "<p>请输入您的电话</p>";
    }
    else if (sMobile.length > 0 && !PTN_Tel.test(sMobile)) {
        err += "<p>您的电话格式错误</p>";
    }
    if (err.length > 0) {
        $a(err);
        return;
    }
    showProc(src);
    $.post("/SiteServer/Sdw/Ajax/ajax.ashx?action=ProSendLeaveword&t=" + Math.random(), {
        Title: "产品留言订购",//标题
        Contact: sContact,//姓名
        Mobile: sMobile,//电话
        FormId: "4",//表单编号
        AttributeValues: "&姓名=" + sContact + "&电话=" + sMobile + "&IP地址={0}" //字段中文名称以英文&分割

    }, function (msg) {
        var sta = gav(msg, "state");
        var sMsg = gav(msg, "msg");
        if (sta == "1") {
            $a(sMsg, 1);
            emptyText('QK');
            $j("txtContact").val("");
            $j("txtMobile").val("");

        } else {

            if (sMsg == "") {
                sMsg = "提交失败，请稍后再试，勿频繁提交！";
            }
            else {
                emptyText('QK');
                $j("txtContact").val("");
                $j("txtMobile").val("");
            }
            $a(sMsg);
        }
        showProc(src, false);
    });
}


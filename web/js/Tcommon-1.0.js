/*更新时间：2016-11-17*/
function nav(nav) {
    var li_width = 0;
    var nav_width = 0;
    var li_pa;
    var li_len = $("#" + nav + ">ul>li").length;
    for (i = 0; i < li_len; i++) {
        nav_width += $("#" + nav + ">ul>li").eq(i).outerWidth();
    }
    li_pa = Math.floor(($("#" + nav + "").width() - nav_width) / li_len * 0.5);
    $("#" + nav + ">ul>li>a").css({ "padding-left": li_pa, "padding-right": li_pa });

    nav_width = 0;

    for (i = 0; i < li_len; i++) {
        nav_width += $("#" + nav + ">ul>li").eq(i).outerWidth();
    }
    var last_pa = $("#" + nav + "").width() - nav_width
    $("#" + nav + ">ul>li>a:last").css({ "padding-right": li_pa + last_pa * 0.5, "padding-left": li_pa + last_pa * 0.5 })
    if ($("#" + nav + ">ul").height() > $("#" + nav + ">ul>li").height()) {
        $("#" + nav + ">ul>li>a:last").css({ "padding-right": li_pa + last_pa * 0.5, "padding-left": li_pa + last_pa * 0.5 - 1 })
    }

}/*end nav()*/
function mswMove(boxID, btn_left, btn_right, btnBox, Car, direction, way, moveLengh, speed, Interval, number) {
    var _ID = $("#" + boxID + "");
    var _btn_left = $("#" + btn_left + "");
    var _btn_right = $("#" + btn_right + "");
    var _btnBox = $("#" + btnBox + "");
    var jsq = 0
    var timer;
    var cj;
    var no_way = 0;
    var no_wayGet = 0;
    var fade = 0;
    var new_time = new Date;

    var ID_liLen, ID_liheight, cbtmBtn;
    ID_liLen = _ID.find("li").length;
    ID_liheight = _ID.find("li").innerHeight();

    if (direction == "left" || direction == "right") {
        _ID.find("ul").width(ID_liLen * moveLengh);
    } else if (direction == "top" || direction == "bottom") {
        _ID.find("ul").height(ID_liLen * moveLengh);
        _btnBox.hide()
    } else if (direction == "fade") {
        _ID.find("ul").width(moveLengh).height(ID_liheight);
        _ID.find("li").eq(0).show().siblings().hide();
        _ID.find("li").css({ "position": "absolute", "left": 0, "top": 0 });
    }
    _btnBox.empty();
    for (i = 0; i < ID_liLen; i++) {
        _btnBox.append("<span></span>");
    };
    _btnBox.find("span").eq(0).addClass("cur");

    if (way == false) {
        _btn_left.hide();
        _btn_right.hide();
        _btnBox.hide();
    }


    function Carousel() {
        if (way == false) {
            no_way++;

            if (direction == "left") {
                _ID.find("ul").css({ "left": -no_way });
                no_wayGet = parseInt(_ID.find("ul").css("left"));
                if (no_wayGet == -moveLengh) {
                    no_way = 0
                    _ID.find("li:first").insertAfter(_ID.find("li:last"));
                    _ID.find("ul").css({ "left": 0 });
                }
            }

            if (direction == "right") {

                no_wayGet = parseInt(_ID.find("ul").css("left"));
                if (no_wayGet == 0) {
                    no_way = -moveLengh
                    _ID.find("li:last").insertBefore(_ID.find("li:first"));
                    _ID.find("ul").css({ "left": 0 });
                }
                _ID.find("ul").css({ "left": no_way });
            }

            if (direction == "top") {
                _ID.find("ul").css({ "top": -no_way });
                no_wayGet = parseInt(_ID.find("ul").css("top"));
                if (no_wayGet == -moveLengh) {
                    no_way = 0
                    _ID.find("li:first").insertAfter(_ID.find("li:last"));
                    _ID.find("ul").css({ "top": 0 });
                }
            }

            if (direction == "bottom") {

                no_wayGet = parseInt(_ID.find("ul").css("top"));
                if (no_wayGet == 0) {
                    no_way = -moveLengh
                    _ID.find("li:last").insertBefore(_ID.find("li:first"));
                    _ID.find("ul").css({ "top": 0 });
                }
                _ID.find("ul").css({ "top": no_way });
            }


        } else if (way == true) {

            if (direction == "left") {
                _ID.find("ul").animate({ left: -moveLengh }, speed, function () {
                    _ID.find("li:first").insertAfter(_ID.find("li:last"));
                    _ID.find("ul").css({ "left": 0 });
                });
                if (jsq < ID_liLen - 1) {
                    jsq++;
                    _btnBox.find("span").eq(jsq).addClass("cur").siblings().removeClass("cur");
                } else {
                    jsq = 0;
                    _btnBox.find("span").eq(jsq).addClass("cur").siblings().removeClass("cur");
                }

            }

            if (direction == "right") {
                _ID.find("li:last").insertBefore(_ID.find("li:first"));
                _ID.find("ul").css({ "left": -moveLengh });
                _ID.find("ul").stop().animate({ left: 0 }, speed);
                if (jsq > 0) {
                    jsq--;
                    _btnBox.find("span").eq(jsq).addClass("cur").siblings().removeClass("cur");
                } else {
                    jsq = ID_liLen - 1;
                    _btnBox.find("span").eq(jsq).addClass("cur").siblings().removeClass("cur");
                }

            }

            if (direction == "top") {
                _ID.find("ul").animate({ top: -moveLengh }, speed, function () {
                    _ID.find("li:first").insertAfter(_ID.find("li:last"));
                    _ID.find("ul").css({ "top": 0 });
                });
            }

            if (direction == "bottom") {
                _ID.find("li:last").insertBefore(_ID.find("li:first"));
                _ID.find("ul").css({ "top": -moveLengh });
                _ID.find("ul").stop().animate({ top: 0 }, speed);

            }
            if (direction == "fade") {

                if (fade < ID_liLen - 1) {
                    fade++;
                } else { fade = 0 }
                _ID.find("li").eq(fade).fadeIn(speed).siblings().fadeOut(speed);
                _btnBox.find("span").eq(fade).addClass("cur").siblings().removeClass("cur");

            }

        }
    }


    if (Car == true) {

        if (ID_liLen > number) {
            timer = setInterval(Carousel, Interval);
        } else {
            clearInterval(timer);
            _btn_left.hide();
            _btn_right.hide();
            _btnBox.hide();
        }
    } else {
        clearInterval(timer);
    }
    _ID.find("li").hover(function () {
        clearInterval(timer);
    }, function () {
        if (Car == true) {
            if (ID_liLen > number) {
                timer = setInterval(Carousel, Interval);
            } else {
                clearInterval(timer);
                _btn_left.hide();
                _btn_right.hide();
                _btnBox.hide();
            }
        } else {
            clearInterval(timer);
        }
    });


    _btn_right.hover(function () {
        clearInterval(timer);
    }, function () {
        if (Car == true) {
            if (ID_liLen > number) {
                timer = setInterval(Carousel, Interval);
            } else {
                clearInterval(timer);
                _btn_left.hide();
                _btn_right.hide();
                _btnBox.hide();
            }
        } else {
            clearInterval(timer);
        }

    }).click(function () {
        if (new Date - new_time > 500) {
            new_time = new Date;

            if (direction == "left" || direction == "right") {
                _ID.find("ul").animate({ left: -moveLengh }, speed, function () {
                    _ID.find("li:first").insertAfter(_ID.find("li:last"));
                    _ID.find("ul").css({ "left": 0 });
                });
            }


            if (direction == "top" || direction == "bottom") {
                _ID.find("ul").animate({ top: -moveLengh }, speed, function () {
                    _ID.find("li:first").insertAfter(_ID.find("li:last"));
                    _ID.find("ul").css({ "top": 0 });
                });
            }
            if (direction == "fade") {

                if (fade > 0) {
                    fade--;
                } else { fade = ID_liLen - 1 }
                _ID.find("li").stop(true, true).eq(fade).fadeIn(speed).siblings().fadeOut(speed);

            }
            if (jsq < ID_liLen - 1) {
                jsq++;
                _btnBox.find("span").eq(jsq).addClass("cur").siblings().removeClass("cur");
            } else {
                jsq = 0;
                _btnBox.find("span").eq(jsq).addClass("cur").siblings().removeClass("cur");
            };


        } else { };
    });
    _btn_left.hover(function () {
        clearInterval(timer);
    }, function () {
        if (Car == true) {
            if (ID_liLen > number) {
                timer = setInterval(Carousel, Interval);
            } else {
                clearInterval(timer);
                _btn_left.hide();
                _btn_right.hide();
                _btnBox.hide();
            }
        } else {
            clearInterval(timer);
        }
    }).click(function () {
        if (new Date - new_time > 500) {
            new_time = new Date;

            if (direction == "left" || direction == "right") {
                _ID.find("li:last").insertBefore(_ID.find("li:first"));
                _ID.find("ul").css({ "left": -moveLengh });
                _ID.find("ul").stop().animate({ left: 0 }, speed);
            }

            if (direction == "top" || direction == "bottom") {
                _ID.find("li:last").insertBefore(_ID.find("li:first"));
                _ID.find("ul").css({ "top": -moveLengh });
                _ID.find("ul").stop().animate({ top: 0 }, speed);

            }
            if (direction == "fade") {

                if (fade < ID_liLen - 1) {
                    fade++;
                } else { fade = 0 }
                _ID.find("li").stop(true, true).eq(fade).fadeIn(speed).siblings().fadeOut(speed);

            }
            if (jsq > 0) {
                jsq--;
                _btnBox.find("span").eq(jsq).addClass("cur").siblings().removeClass("cur");
            } else {
                jsq = ID_liLen - 1;
                _btnBox.find("span").eq(jsq).addClass("cur").siblings().removeClass("cur");
            };
        } else { };
    });

    _btnBox.find("span").hover(function () {
        clearInterval(timer);

    }, function () {
        if (Car == true) {
            if (ID_liLen > number) {
                timer = setInterval(Carousel, Interval);
            } else {
                clearInterval(timer);
                _btn_left.hide();
                _btn_right.hide();
                _btnBox.hide();
            }
        } else {
            clearInterval(timer);
        }
    }).click(function () {
        if (new Date - new_time > 500) {
            new_time = new Date;
            cbtmBtn = $(this).index();
            $(this).addClass("cur").siblings().removeClass("cur");
            if (direction == "fade") {
                _ID.find("li").eq(cbtmBtn).fadeIn(speed).siblings().fadeOut(speed);
            } else {
                if (cbtmBtn > jsq) {
                    cj = cbtmBtn - jsq;
                    jsq = cbtmBtn;

                    _ID.find("ul").stop().animate({ left: -moveLengh * cj }, speed, function () {
                        for (i = 0; i < cj; i++) {
                            _ID.find("ul").css({ "left": 0 })
                            _ID.find("li:first").insertAfter(_ID.find("li:last"));
                        };
                    });
                } else {
                    cj = jsq - cbtmBtn;
                    jsq = cbtmBtn;
                    _ID.find("ul").css({ "left": -moveLengh * cj });
                    for (i = 0; i < cj; i++) {
                        _ID.find("ul").stop().animate({ left: 0 }, speed);
                        _ID.find("li:last").insertBefore(_ID.find("li:first"));
                    };
                };
            };
        } else { };
    });
}//end mswMove()
function msw_jzt(ID, btnLeft, btnRight, elment, title, speed, number, pre) {
    var _ID = $('#' + ID + '');
    var _BtnLeft = $("#" + btnLeft + "");
    var _BtnRight = $("#" + btnRight + "");
    var _elment = $("#" + ID + " ." + elment + "");
    var len = $("#" + ID + " ." + elment + "").length;
    var number = number;
    var pfnum = (number - 1) / 2;
    var jsq = 0;
    var active = 0;


    _ID.width('100%').height('100%').css({ 'position': 'relative', 'z-index': 1 });
    _elment.find('img').css({ 'width': '100%', 'display': 'block' });
    _elment.css({ 'width': '30%', 'left': '35%', 'top': '5%', 'z-index': 0, 'position': ' absolute' });
    _elment.eq(pfnum).css({ 'width': '' + pre + '%', 'left': '' + (100 - pre) / 2 + '%', 'top': '0', 'z-index': number }).addClass("active");
    _elment.find("" + title + "").hide();
    _elment.eq(pfnum).find("" + title + "").show();
    for (i = 1, th = pfnum; i < pfnum + 1; i++) {

        _elment.eq(th + i).css({ 'width': '' + (pre - 10 * i) + '%', 'left': '' + (100 - pre) * 0.5 / pfnum * (pfnum - i) + '%', 'top': '' + 7.5 * i + '%', 'z-index': number - i });

        _elment.eq(th - i).css({ 'width': '' + (pre - 10 * i) + '%', 'left': '' + 100 - (pre - 10 * i) - (100 - pre) * 0.5 / pfnum * (pfnum - i) + '%', 'top': '' + 7.5 * i + '%', 'z-index': number - i });

    };

    var time = new Date;

    _BtnLeft.hover(function () {
        clearInterval(t);
    }, function () {
        t = setInterval(car, 4000);
    }).click(function () {
        if (new Date - time > 500) {
            time = new Date;
            $("#" + ID + " ." + elment + ":first").animate({ width: '30%', left: '35%', top: '5%' }).css({ 'z-index': 0 });
            $("#" + ID + " ." + elment + ":first").insertAfter($("#" + ID + " ." + elment + ":last"));
            $("#" + ID + " ." + elment + "").eq(pfnum).addClass("active").animate({ width: '' + pre + '%', left: '' + (100 - pre) / 2 + '%', top: 0 }).css({ 'z-index': number }).find("" + title + "").show();
            $("#" + ID + " ." + elment + "").eq(pfnum).siblings().removeClass("active").find("" + title + "").hide();
            for (i = 1, th = pfnum; i < pfnum + 1; i++) {

                $("#" + ID + " ." + elment + "").eq(th + i).animate({ width: '' + (pre - 10 * i) + '%', left: '' + (100 - pre) * 0.5 / pfnum * (pfnum - i) + '%', top: '' + 7.5 * i + '%' }).css({ 'z-index': number - i });

                $("#" + ID + " ." + elment + "").eq(th - i).animate({ width: '' + (pre - 10 * i) + '%', left: '' + 100 - (pre - 10 * i) - (100 - pre) * 0.5 / pfnum * (pfnum - i) + '%', top: '' + 7.5 * i + '%' }).css({ 'z-index': number - i });
            };
            for (i = number; i < len - 1; i++) {
                $("#" + ID + " ." + elment + "").eq(i).animate({ width: '0%', left: '50%', top: '50%' }).css({ 'z-index': 0 });
            };
        } else { };
    });

    _BtnRight.hover(function () {
        clearInterval(t);
    }, function () {
        t = setInterval(car, 4000);
    }).click(function () {
        if (new Date - time > 500) {
            time = new Date;
            $("#" + ID + " ." + elment + ":last").animate({ width: '' + (pre - 10 * pfnum) + '%', left: '' + 100 - (pre - 10 * pfnum) + '%', top: '' + 7.5 * pfnum + '%' }).css({ 'z-index': number - pfnum });
            $("#" + ID + " ." + elment + ":last").insertBefore($("#" + ID + " ." + elment + ":first"));
            //$("#jzt .list").eq(pfnum).addClass('active');
            $("#" + ID + " ." + elment + "").eq(pfnum).addClass("active").animate({ width: '' + pre + '%', left: '' + (100 - pre) / 2 + '%', top: 0 }).css({ 'z-index': number }).find("" + title + "").show();
            $("#" + ID + " ." + elment + "").eq(pfnum).siblings().removeClass("active").find("" + title + "").hide();
            for (i = 1, th = pfnum; i < pfnum + 1; i++) {

                $("#" + ID + " ." + elment + "").eq(th + i).animate({ width: '' + (pre - 10 * i) + '%', left: '' + (100 - pre) * 0.5 / pfnum * (pfnum - i) + '%', top: '' + 7.5 * i + '%' }).css({ 'z-index': number - i });

                $("#" + ID + " ." + elment + "").eq(th - i).animate({ width: '' + (pre - 10 * i) + '%', left: '' + 100 - (pre - 10 * i) - (100 - pre) * 0.5 / pfnum * (pfnum - i) + '%', top: '' + 7.5 * i + '%' }).css({ 'z-index': number - i });

            };
            for (i = number; i < len - 1; i++) {
                $("#" + ID + " ." + elment + "").eq(i).animate({ width: '0%', left: '50%', top: '5%' }).css({ 'z-index': 0 });
            };
        };
    });

    function car() {
        $("#" + ID + " ." + elment + ":first").animate({ width: '30%', left: '35%', top: '5%' }).css({ 'z-index': 0 });
        $("#" + ID + " ." + elment + ":first").insertAfter($("#" + ID + " ." + elment + ":last"));
        //$("#jzt .list").eq(2).addClass('active');
        $("#" + ID + " ." + elment + "").eq(pfnum).addClass("active").animate({ width: '' + pre + '%', left: '' + (100 - pre) / 2 + '%', top: 0 }).css({ 'z-index': number }).find("" + title + "").show();
        $("#" + ID + " ." + elment + "").eq(pfnum).siblings().removeClass("active").find("" + title + "").hide();
        for (i = 1, th = pfnum; i < pfnum + 1; i++) {

            $("#" + ID + " ." + elment + "").eq(th + i).animate({ width: '' + (pre - 10 * i) + '%', left: '' + (100 - pre) * 0.5 / pfnum * (pfnum - i) + '%', top: '' + 7.5 * i + '%' }).css({ 'z-index': number - i });

            $("#" + ID + " ." + elment + "").eq(th - i).animate({ width: '' + (pre - 10 * i) + '%', left: '' + 100 - (pre - 10 * i) - (100 - pre) * 0.5 / pfnum * (pfnum - i) + '%', top: '' + 7.5 * i + '%' }).css({ 'z-index': number - i });
        };
        for (i = number; i < len - 1; i++) {
            $("#" + ID + " ." + elment + "").eq(i).animate({ width: '0%', left: '50%', top: '50%' }).css({ 'z-index': 0 });
        };
    }
    var t = setInterval(car, speed);







}//jzt end
function tankuang(ID, clickElement, title, showH, tkID) {

    var _tkId = $("#" + tkID + "");
    var _ID = $("#" + ID + "");
    var _cke = $("#" + ID + " " + clickElement + "");
    var _close = $("#" + tkID + "").find(".close");
    var _len = $("#" + ID + " " + clickElement + "").length;
    var _IDimg, _IDtext, w, m, n = 0, a = 0, _width, imgNum = 0;

    var w_width = $(window).width();
    _tkId.find(".imgShow").find("li").width(w_width);

    if (showH == true) {
        _tkId.find("p").show();
        _tkId.find("p").siblings("img").css({ "height": "90%" });
    } else {
        _tkId.find("p").hide();
        _tkId.find("p").siblings("img").css({ "height": "100%" });
    };

    _close.click(function () {
        _tkId.fadeOut(500);
        _tkId.find(".imgShow").find("ul").css({ "left": 0 })
        imgNum = 0; n = 0; w = 0; m = 0;
        _tkId.find(".imgBox").find("ul").empty();
        _tkId.find(".imgShow").find("ul").empty();
    });


    _cke.click(function () {
        imgNum = $("#" + ID + " " + clickElement + "").index(this)
        _tkId.fadeIn(500);
        _tkId.find(".imgBox").find("ul").empty();
        _tkId.find(".imgShow").find("ul").empty();
        for (i = 0; i < _len; i++) {
            _IDimg = _ID.find(clickElement).eq(i).find("img").attr("src");
            _IDtext = _ID.find(clickElement).eq(i).find(title).text();
            _tkId.find(".imgBox").find("ul").append("<li><img src='" + _IDimg + "'><em>" + _IDtext + "</em></li>");
            _tkId.find(".imgShow").find("ul").append("<li><img src='" + _IDimg + "'><p>" + _IDtext + "</p></li>");

        };

        _tkId.find(".imgShow").find("li").width(w_width);
        _tkId.find(".imgShow").find("ul").width(w_width * _len);
        _tkId.find(".imgBox").find("li").eq(0).addClass("cur").siblings().removeClass("cur");
        _width = _tkId.find(".imgBox").find("li").innerWidth() + 1;
        var imgBoxUl = 0;
        for (i = 0; i < _len; i++) {
            imgBoxUl += _tkId.find(".imgBox").find("li").eq(i).innerWidth() + 1;

        }
        _tkId.find(".imgBox").find("ul").width(imgBoxUl);
        _tkId.find(".imgShow").find("ul").css({ "left": -w_width * imgNum })
        _tkId.find(".imgBox").find("li").eq(imgNum).addClass("cur").siblings().removeClass("cur");
        m = Math.floor(w_width / _width) - 1;
        w = Math.floor(_len / m);
        _tkId.find(".imgBox").find("li").click(function () {
            imgNum = $(this).index();
            _tkId.find(".imgShow").find("ul").stop().animate({ left: -w_width * imgNum });
            _tkId.find(".imgBox").find("li").eq(imgNum).addClass("cur").siblings().removeClass("cur");

        });


    });
    _tkId.find(".btn02").click(function () {

        if (imgNum < _len - 1) {

            if (imgNum % m == 1 && imgNum != 1) {
                n++;
                if (n > w) {
                    n = w;
                    _tkId.find(".imgBox").find("ul").animate({ left: -m * (_width * n - 1) });
                } else {
                    _tkId.find(".imgBox").find("ul").animate({ left: -m * (_width * n - 1) });
                };
            };
            imgNum++;
            _tkId.find(".imgShow").find("ul").stop().animate({ left: -w_width * imgNum });
            _tkId.find(".imgBox").find("li").eq(imgNum).addClass("cur").siblings().removeClass("cur");

        } else {
            alert("已经到尽头了");
            imgNum = _len - 1;
        };
    });
    _tkId.find(".btn01").click(function () {
        if (imgNum > 0) {

            if (imgNum % m == 0 && imgNum != 0) {
                n--;
                _tkId.find(".imgBox").find("ul").animate({ left: -m * (_width * n - 1) })
            };
            imgNum--;
            _tkId.find(".imgShow").find("ul").stop().animate({ left: -w_width * imgNum });
            _tkId.find(".imgBox").find("li").eq(imgNum).addClass("cur").siblings().removeClass("cur");
        } else {
            alert("已经到尽头了");
            imgNum = 0;
        };
    });

}
//tankuang() end

SKIN_PATH = "/";
var PTN_Email = /\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/;
var PTN_Tel = /^1(3|4|5|7|8)\d{9}$/;
function $j(elmId) { return $("#" + elmId); }
function $v(elmId, val) {
    if (val == null) {
        var o = $j(elmId).attr("value");
        if (o == null || o == undefined)
            return "";
        return o;
    } else {
        return $j(elmId).attr("value", val);
    }
}
function $tv(elmId) { return $.trim($v(elmId)); }
function $a(sMsg, boxType, autoClose, focusElmId, sTitle, behavior) {
    if (boxType == null) {
        boxType = 2;
    }
    if (autoClose == null) {
        autoClose = -1;
    }
    //标题
    if (sTitle == null) {
        sTitle = "消息提示";
    }

    hideDdl();
    var jMesbook1 = $("#mesbook1");
    if (jMesbook1.length == 0) {

        var sHtml = "<div class='tanchuang1' id='mesbook1'>"
            + "<div class='conBox'>"
            + "<div class='tcClose'><img onclick='hideMsg()' id='mesbook1ImgClose' src='" + SKIN_PATH + "images/TCommon/tanchaung_close.png' alt='关闭' /></div>"
            + "<div class='box b1'>"
            + "<h5 id='mesbook1Title'></h5>"
            + "<p id='mesbook1Msg'></p>"
            + "<dd id='mesbook1Btns'>"
            + "<input type='button' class='b15' value='关 闭' />";
        + "</dd>";
        + "</div>"
            + "</div>"
            + "</div>";

        $(document.body).append(sHtml);
    }
    var jMesbook1 = $("#mesbook1");
    var jMesbook1ImgClose = $("#mesbook1ImgClose");
    var jMesbook1Icon = $("#mesbook1Icon");
    var jMesbook1Msg = $("#mesbook1Msg");
    var jMesbook1AutoClose = $("#mesbook1AutoClose");
    var jMesbook1Delay = $("#mesbook1Delay");
    var jMesbook1Title = $("#mesbook1Title");
    var jMesbook1Btns = $("#mesbook1Btns");

    jMesbook1Title.html(sTitle);
    //消息内容
    jMesbook1Msg.html(sMsg);
    //图标
    var iconPath = SKIN_PATH + "images/TInpage/";
    switch (boxType) {
        case 1: iconPath += "ico_ok.gif"; break;
        case 2: iconPath += "ico_info.gif"; break;
        case 3: iconPath += "ioc_ques.gif"; break;
        case -1: iconPath += "ico_error.gif"; break;
        default: iconPath += "ico_normal.gif"; break;
    }
    jMesbook1Icon.attr("src", iconPath);

    //关闭按钮
    var okBtn = jMesbook1Btns.find("input");
    okBtn.removeAttr("onclick");
    okBtn.click(function () {
        hideMsg();
        if (focusElmId != null) {
            $j(focusElmId).focus();
        }
        if (behavior != null) {
            behavior();
        }
    });
    jMesbook1ImgClose.removeAttr("onclick");
    jMesbook1ImgClose.click(function () {
        hideMsg();
        if (focusElmId != null) {
            $j(focusElmId).focus();
        }
        if (behavior != null) {
            behavior();
        }
    });
    okBtn.focus();

    //显示
    showFullBg();
    //    setCM("mesbook1");
    //relocation("mesbook1");
    jMesbook1.fadeIn(80);
}
/********************
* 显示一个全屏灰度背景
* elmId : 元素ID或元素
********************/
function showFullBg(elmId, isHideDdl, opacity, bgColor, zIndex, speed, behavior) {
    if (elmId == null) {
        elmId = "oran_full_bg";
    }
    var jElm = $j(elmId);
    if (jElm.length == 0) {
        var sHtml = "<div style='position:absolute;top:0;left:0;display:none;' id='" + elmId + "'></div>";
        $(document.body).append(sHtml);
    }
    if (opacity == null) {
        opacity = 0.75;
    }
    if (bgColor == null) {
        bgColor = "#777";
    }
    if (zIndex == null) {
        zIndex = "9";
    }
    if (speed == null) {
        speed = 80;
    }
    if (isHideDdl == null) {
        isHideDdl = true;
    }
    var jElm = $j(elmId);
    var dd = document.documentElement;
    var sWidth = dd.scrollWidth;
    var sHeight = dd.scrollHeight;
    var cH = dd.clientHeight;
    var cW = dd.clientWidth;
    if (sHeight < cH) {
        sHeight = cH;
    }
    if (sWidth < cW) {
        sWidth = cW;
    }
    jElm.css({ "z-index": zIndex, "background": bgColor, "opacity": opacity, "filter": "progid:DXImageTransform.Microsoft.Alpha(opacity=" + opacity * 100 + ")" });
    jElm.css({ "height": sHeight, "width": sWidth });
    if (isHideDdl) {
        hideDdl(null, behavior);
    }
    jElm.fadeIn(speed);
    if (behavior != null) {
        behavior();
    }
}
/********************
* 隐藏下拉框函数
* 重载1 : 如果不传递cntrId，则以body为容器
* cntrId : 容器ID
********************/
function hideDdl(cntrId) {
    var arrTags = ["select", "iframe", "applet", "object"];
    var jCntr;
    if (cntrId != null) {
        jCntr = $j(cntrId);
    } else {
        jCntr = $(document.body);
    }
    for (var i = 0; i < arrTags.length; ++i) {
        jCntr.find(arrTags[i]).css("visibility", "hidden");
    }
    //    if (behavior != null) {
    //        behavior();
    //    }
}
/********************
* 根据key获取 ajax对象节点值getAjaxVal
* xMsg : xml对象
* key : 节点的属性key
********************/
function gav(xMsg, key) {
    var jMsg = $(xMsg);
    var s = $(jMsg.find("node[key=" + key + "]")).text();
    return s;
}
/********************
* 隐藏消息提示层
********************/
function hideMsg() {
    showDdl();
    var jShadow = $("#mesbook1");
    hideFullBg();
    jShadow.fadeOut(80);
}
/********************
* 隐藏下拉框函数
********************/
function showDdl() {
    var arrTags = ["select", "iframe", "applet", "object"];
    for (var i = 0; i < arrTags.length; ++i) {
        $(arrTags[i]).css("visibility", "visible");
    }
}
/********************
* 隐藏全屏灰度背景
* speed : (可选)渐变消退的速度
********************/
function hideFullBg(elmId, speed) {
    if (elmId == null) {
        elmId = "oran_full_bg";
    }
    if (speed == null) {
        speed = 80;
    }
    var jElm = $j(elmId);
    jElm.fadeOut(speed);
    showDdl();
}
/********************
* 显示正在处理的图标
* src : 触发事件的源对象
* show : 显示/隐藏
********************/
function showProc(src, show) {
    var oImg = $j("imgProc");
    if (show == null) {
        show = true;
    }
    if (show) {
        $(src).hide();
        if (oImg.length > 0) {
            oImg.remove();
        }
        $("<img src='" + SKIN_PATH + "images/TInpage/processing.gif' id='imgProc' alt='正在处理' />").insertAfter(src);
    } else {
        $(src).show();
        oImg.remove();
    }
}
/********************
* 清空文本框内容
* cntrId : 容器ID，不传递则以body为容器
********************/
function emptyText(cntrId) {
    var jTxts;
    if (cntrId == null) {
        jTxts = $("body").find("input[type=text]");
    } else {
        jTxts = $j(cntrId).find("input[type=text]");
    }
    var jTxtss;
    if (cntrId == null) {
        jTxtss = $("body").find("input[type=password]");
    } else {
        jTxtss = $j(cntrId).find("input[type=password]");
    }
    jTxts.each(function () {
        $(this).attr("value", "");
    });
    jTxtss.each(function () {
        $(this).attr("value", "");
    });
    if (cntrId == null)
        jTxts = $("body").find("textarea");
    else
        jTxts = $j(cntrId).find("textarea");
    jTxts.each(function () {
        $(this).attr("value", "");
    });
}

/********************* 
* url : URL
* title : 收藏项目的标题
********************/
function addBookmark() {
    var title = document.title;
    var url = document.URL;
    try {
        window.external.addFavorite(url, title);
    }
    catch (e) {
        try {
            window.sidebar.addPanel(title, url, "");
        }
        catch (e) {
            alert("抱歉，您所使用的浏览器无法完成此操作。\n\n加入收藏失败，请使用Ctrl+D进行添加");
        }
    }
}
/**
 * 判断访问类型是电脑还是手机
 * 
 * @author longjh
 * 
 * 2018年10月20日
 */

//$(function () {
   // var mobile_flag = isMobile(); // true为PC端，false为手机端
    //if (mobile_flag) {
    //    $.post("/SiteServer/Sdw/Ajax/ajax.ashx?action=getComunmContentUrl&t=" + Math.random(), {
       //     channelIndex: channelIndex,//栏目索引
       //     channelId: channelId,//栏目编号
       //     contentId: contentId,//内容编号
       //     linkType: linkType//链接类型
      //  }, 
      //      function (msg) {
      //          var URL = gav(msg, "msg");
     //           if (URL != "") {
    //                window.location.href = domain+URL;
     //           }
    //    });
   // }
//});
//是否手机端访问
function isMobile() {
    var userAgentInfo = navigator.userAgent;
    var mobileAgents = ["Android", "iPhone", "SymbianOS", "Windows Phone", "iPad", "iPod"];
    var mobile_flag = false;
    //根据userAgent判断是否是手机
    for (var v = 0; v < mobileAgents.length; v++) {
        if (userAgentInfo.indexOf(mobileAgents[v]) > 0) {
            mobile_flag = true;
            break;
        }
    }
    var screen_width = window.screen.width;
    var screen_height = window.screen.height;
    //根据屏幕分辨率判断是否是手机
    if (screen_width < 500 && screen_height < 800) {
        mobile_flag = true;
    }
    return mobile_flag;
}

//头部菜单 longjh 2018年10月20日
function headinit(sid) {
    sid = sid + ",";
    var liIndex = 99;
    var sidLastIndex = 0;
    $("#navBox li").each(function () {
        if (sid.indexOf("," + $(this).attr("MARK") + ",") > sidLastIndex) {
            sidLastIndex = sid.indexOf("," + $(this).attr("MARK") + ",");
            liIndex = $(this).index();
        }
    });
    $("#navBox li").eq(liIndex).addClass("cur").siblings().removeClass('cur');
    //根据字段排序
    var domList = $("#navBox li").get();
    domList.sort(function (a, b) {
        var elOne = parseInt($(a).attr("px"));
        var elTwo = parseInt($(b).attr("px"));
        if (elOne > elTwo) return 1;
        if (elOne < elTwo) return -1;
        return 0;
    });
    $('#navBox').append(domList)
}

/*--------------------------  表单留言 2018-12-06  ----------------------------*/
  
//留言  outerId：html结构中form的id   formId:后台表单的id  formTitle:后台表单的标题
var err = '';
var userName = ''; //用户姓名
var userTel = ''; //座机号码
var userMobile = ''; //用户电话号码
var userEmail = ''; //用户邮箱
var userCompany = ''; //用户公司名称
var userYzm = ''; //验证码
var userMessage = ''; //用户留言信息
var passVal = ''; //传递的值
function sendMsg(outerId,formId,formTitle,src){
  if(outerId == 'form'){
    inputType(outerId);
  }else if(outerId == 'form1'){
    inputType(outerId);
  }else if(outerId == 'form2'){
    inputType(outerId);
  }
  //console.log(err);
  if(err.length > 0){
    $a(err);
    return;
  }
  
  showProc(src);
  $.post("/SiteServer/Sdw/Ajax/ajax.ashx?action=sendLeaveword_Index&t=" + Math.random(), {
    Title: formTitle,//标题
    Comp: userCompany,//公司名称
    Tel: userTel, //座机
    Contact: userName,//姓名
    Mobile: userMobile,//电话
    Email: userEmail, //邮箱
    ShortDesc: userMessage, //留言内容
    FormId: formId,//表单编号
    AttributeValues: passVal //字段中文名称以英文&分割
  }, function (msg) {
    var sta = gav(msg, "state");
    var sMsg = gav(msg, "msg");
    if (sta == "1") {
      $a(sMsg, 1);
      $('#'+outerId)[0].reset(); //清空表单
      
    } else {
      
      if (sMsg == "") {
        sMsg = "提交失败，请稍后再试，勿频繁提交！";
      }
      else {
        $('#'+outerId)[0].reset(); //清空表单
      }
      $a(sMsg);
    }
    showProc(src, false);
  });
}
//栏目是否关联用户
function ReturnPage(siteid, channelId, domain, navigationurl) {
    $.get("/WebHttpGet.ashx?action=isRelationUser&siteId=" + siteid + "&channelId=" + channelId + "", function (result) {
        if (result.code == 0) {
            window.open(domain+"/home/");
        }
        else {
            window.open(domain + navigationurl);
        }
    });
}
function inputType(outerId){
  err = '';
  userName = ''; //用户姓名
  userTel = ''; //座机号码
  userMobile = ''; //用户电话号码
  userEmail = ''; //用户邮箱
  userCompany = ''; //用户公司名称
  userYzm = ''; //验证码
  userMessage = ''; //用户留言信息
  passVal = ''; //传递的值
  $('#'+outerId).find('input').each(function(){
    if($(this).attr('data-type') == 'name'){
      var tips = $(this).attr('data-tips');
      userName = $(this).val();
      if(userName == '' || userName == tips){
        err += "<p>请输入"+ tips +"</p>";
      }else {
        passVal += "&"+ tips +"=" + $(this).val();
      }
    }else if($(this).attr('data-type') == 'tel'){
      var tips = $(this).attr('data-tips');
      userTel = $(this).val();
      if(userTel == '' || userTel == tips){
        err += "<p>请输入"+ tips +"</p>";
      }else{
        passVal += "&"+ tips +"=" + $(this).val();
      }
    }else if($(this).attr('data-type') == 'mobile'){
      var tips = $(this).attr('data-tips');
      userMobile = $(this).val();
      if(userMobile == '' || userMobile == tips){
        err += "<p>请输入"+ tips +"</p>";
      }else if (userMobile.length > 0 && !PTN_Tel.test(userMobile)) {
        err += "<p>您的"+ tips +"格式错误</p>";
      }else{
        passVal += "&"+ tips +"=" + $(this).val();
      }
    }else if($(this).attr('data-type') == 'email'){
      var tips = $(this).attr('data-tips');
      userEmail = $(this).val();
      if (userEmail == "" || userEmail == tips) {
        err += "<p>请输入"+ tips +"</p>";
      }else if (userEmail.length > 0 && !PTN_Email.test(userEmail)) {
        err += "<p>您的"+ tips +"格式错误</p>";
      }else{
        passVal += "&"+ tips +"=" + $(this).val();
      }
    }else if($(this).attr('data-type') == 'company'){
      var tips = $(this).attr('data-tips');
      userCompany = $(this).val();
      if(userCompany == '' || userCompany == tips){
        err += "<p>请输入"+ tips +"</p>";
      }else{
        passVal += "&"+ tips +"=" + $(this).val();
      }
    }else if($(this).attr('data-type') == 'yzm'){
      var tips = $(this).attr('data-tips');
      userYzm = $(this).val();
      if(userYzm == '' || userYzm == tips){
        err += "<p>"+ tips +"</p>";
      }
    }else if($(this).attr('data-type') == 'txts'){
      var tips = $(this).attr('data-tips');
      if($(this).val() == '' || $(this).val() == tips){
        err += "<p>请输入"+ tips +"</p>";
      }else{
        passVal += "&"+ tips +"=" + $(this).val();
      }
    }
  })
    
    if($('#'+outerId).find('textarea').length > 0){
    var tips = $('#'+outerId).find('textarea').attr('data-tips');
  userMessage = $('#'+outerId).find('textarea').val();
  passVal += "&"+ tips +"=" + userMessage;
}

//单选项
if($('#'+outerId).find('input[type="radio"]').length > 0){
  var tips = $('#'+outerId).find('input[type="radio"]').eq(0).attr('data-tips');
  if($('#'+outerId).find('input[type="radio"]:checked').length > 0){
    passVal += "&"+ tips +"=" + $('#'+outerId).find('input[type="radio"]:checked').val();
  }else{
    err += "<p>请您选择一个"+ tips +"</p>";
  }
}

//复选框
if($('#'+outerId).find('input[type="checkbox"]').length > 0){
  var tips = $('#'+outerId).find('input[type="checkbox"]').eq(0).attr('data-tips');
  var checkboxVal = '';
  if($('#'+outerId).find('input[type="checkbox"]:checked').length > 0){
    $('#'+outerId).find('input[type="checkbox"]:checked').each(function(){
      checkboxVal += $(this).val() +",";
    })
      passVal += "&"+ tips +"=" + checkboxVal;
  }else{
    err += tips +"未选择</p>";
  }
}

//下拉框
      if($('#'+outerId).find('select').length > 0){
        var selectBox = $('#'+outerId).find('select');
        var tips = selectBox.attr('data-tips');
        if(selectBox.val() == ''){
          err += tips +"未选择</p>";
        }else{
          passVal += "&"+ tips +"=" + selectBox.val();
        }
      }
}
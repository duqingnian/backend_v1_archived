//手机跳转
if ((navigator.userAgent.match(/(iPhone|iPod|Android|ios)/i))) {
	var pathname = location.pathname;
	var urlArray = pathname.split("/");
	var murl = '';
	
	if ((M_URL.match(urlArray[1]))) {
		for (i=2;i<urlArray.length;i++) {
			murl= murl+"/"+urlArray[i];
		}
		murl = M_URL+murl;
	} else {
		murl = M_URL + pathname.substr(1);
	}
	
	if (typeof(about_cid) != "undefined") {
		if (about_cid == 1) {
			murl = murl.replace("/about/","/about_about/");
		}
	}
	//location.replace(murl);
}
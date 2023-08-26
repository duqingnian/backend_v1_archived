//封装ajax
function ajax(url,data,callbak){
	layer.load(2);
	$.ajax({
		type: "POST",
		url: url,
		data: data,
		dataType: 'json',
		success: callbak,
		error: function (XMLHttpRequest, textStatus, errorThrown) {alert("Ajax error.");layer.closeAll();},
		complete: function(){layer.closeAll('loading');},
	});
}
//layer对话框
function prepare(_title,_url,_width,_height,_close)
{
	return layer.open({
	  type: 2,
	  title: _title,
	  shadeClose: false,
	  shade: 0.4,
	  closeBtn: typeof(_close)=="undefined" ? true : false,
	  area: [typeof(_width)=="undefined" ? '450px' : _width, typeof(_height)=="undefined" ? '80%' : _height],
	  content: _url
	}); 
}
//上传
function upload(id,FUN)
{
    var uploader = new plupload.Uploader({
        runtimes: 'html5,flash',
		browse_button: 'file_'+id,
		flash_swf_url: "/web/js/plupload/Moxie.swf",
		multi_selection: false,
		filters: [{
            title: 'Image files',
            extensions: 'jpg,jpeg,png,gif,ico'
        }],
		url: _upload_url,
		multipart: 'form-data'
    });
	uploader.init();	
	uploader.bind('FilesAdded', function(up, files) {
        layer.load(1);
        uploader.start();
	});
		 
    uploader.bind('UploadProgress', function(up, file) {
        //document.getElementById('progress_'+id).innerHTML = '<span>' + file.percent + "%</span>";
	}); 
	uploader.bind('Error', function(up, err) {
        layer.alert("\nError #" + err.code + ": " + err.message);
	});
	uploader.bind('FileUploaded', function(up, file, res) {
        layer.closeAll('loading');
        var j=JSON.parse(res.response);
		var t = j.src.substr(0,5);
		if(t == 'ERROR'){
			var len = res.response.length;
			var msg = res.response.substr(6,len);
			alert(msg);
		}else{
            if(typeof(FUN) == "function")
            {
                FUN(id,j);
            }else{
                set_photo(id,j.src);
            }
		}
	});
}
function del(model,id)
{
	layer.confirm('确定删除吗？', {
	  btn: ['确定','取消']
	}, function(index){
	  layer.load(1);
	  ajax(_admin_ajax_delete,{model: model, id: id},function(json){
		if(json.code==0){
			$('#tr-'+json.id).remove();
			layer.closeAll('loading');
		}else{
			layer.alert(json.msg);
		}
	  });
	  layer.close(index);
	});
}
function go(url)
{
    window.location.href=url;
}
//上传完毕后的回调
function set_photo(id,data){
    $('#thumb-'+id).html('<div class="thumb-area"><img src="'+'/uploads/'+data.thumb+'" /></div>');
	$('#'+id).val(data.thumb);
}
//ajax的载入中特效
$(document).ready(function(){
	$(document).ajaxStart(function() {layer.load(1);});
	$(document).ajaxSuccess(function() {layer.closeAll('loading');});
});

function cancel_dlg(){top.layer.closeAll();}
function close_dialog(){top.layer.closeAll();}
function reload(){window.location.reload();}








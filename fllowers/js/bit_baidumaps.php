<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<style type="text/css">
		body, html,#allmap {width: 100%;height: 100%;overflow: hidden;margin:0;font-family:"微软雅黑";}
	</style>
	<script type="text/javascript" src="//api.map.baidu.com/api?v=2.0&ak=WiYF3M3CVlhqyoY2TLFzOGwx56HUn6tM"></script>
	<title>百度地图</title>
</head>
<body>
	<div id="allmap"></div>
	<div id="moreaddress" style="display:none;"></div>
</body>
</html>
<script type="text/javascript">
if(top!=self ){		
	try{
		//不同host
		if(top.window.location.host!=window.location.host){
			location.href = "http://www.qifeiye.com";
		}
	}catch(e){
		//跨域啦
		location.href = "http://www.qifeiye.com";
	}
}
var moreaddress = document.getElementById("moreaddress").innerHTML;
function mapmarker(map,marker){
	map.addOverlay(marker);              // 将标注添加到地图中
	map.enableScrollWheelZoom(true);
	var top_left_control = new BMap.ScaleControl({anchor: BMAP_ANCHOR_TOP_LEFT});// 左上角，添加比例尺
	var top_left_navigation = new BMap.NavigationControl();  //左上角，添加默认缩放平移控件

	map.addControl(top_left_control);        
	map.addControl(top_left_navigation);     
	map.addControl(new BMap.MapTypeControl({mapTypes: [BMAP_NORMAL_MAP,BMAP_SATELLITE_MAP]}));   


		var label = new BMap.Label("南之嘉木",{offset:new BMap.Size(20,-10)});
	label.setStyle({
			 color : "#333",
			 fontSize : "12px",
			 height : "20px",
			 lineHeight : "20px",
			 fontFamily:"微软雅黑",
			 borderColor:"#ccc",
			 padding:"2px 5px"
		 });
	marker.setLabel(label);
		if(top.jQuery && top.jQuery("body").attr("id")=="site-body"){
		marker.enableDragging();    
		marker.addEventListener("dragend", function(e){    
				if(top.iframeVCWin.jQuery(".panel:visible [name='g_lat']").length>0 && top.iframeVCWin.jQuery(".panel:visible [name='g_lng']").length>0){
			    		top.iframeVCWin.jQuery(".panel [name='g_lat']").val(e.point.lat);
			    		top.iframeVCWin.jQuery(".panel [name='g_lng']").val(e.point.lng);
				  }
		})
	}
}
	// 百度地图API功能
	var map = new BMap.Map("allmap");
			var geocoder = new BMap.Geocoder(); 
		var longitude = "120.67229386248778";
		var latitude ="31.30622129917934";
		geocoder.getPoint('江苏省苏州市工业园区',  
			function(point){  
            if(point)  
            {  
                longitude = point.lng;  
                latitude = point.lat;  
				var point = new BMap.Point(longitude,latitude);
				map.centerAndZoom(point, 12);
				var marker = new BMap.Marker(point);  
				mapmarker(map,marker);

			  
            }  
        });  
        if(moreaddress!=""){
		var items = moreaddress.split("|^|");
		var  map_num = 0;
		for(var i=0;i<items.length;i++){
			  var v= items[i];
			  var tmp = v.split("||");
			  var g_lat = tmp[1];
			  var g_lng = tmp[2];
		 
			  var point1 = new BMap.Point(g_lng,g_lat);
			  var marker1 = new BMap.Marker(point1);  // 创建标注
			  mapmarker(map,marker1);
			  if(tmp[0]!=""){
				var label1 = new BMap.Label(tmp[0],{offset:new BMap.Size(20,-10)});
				label1.setStyle({
						 color : "#333",
						 fontSize : "12px",
						 height : "20px",
						 lineHeight : "20px",
						 fontFamily:"微软雅黑",
						 borderColor:"#ccc",
						 padding:"2px 5px"
					 });
				marker1.setLabel(label1);
				if(top.jQuery && top.jQuery("body").attr("id")=="site-body"){
					marker1.enableDragging();    
					marker1.addEventListener("dragend", function(e){    
						if(top.iframeVCWin && top.iframeVCWin.jQuery(".panel:visible .mapitem.active:visible").length>0 ){
				    		top.iframeVCWin.jQuery(".panel .mapitem.active:visible [name='m_t2']").val(e.point.lat);
				    		top.iframeVCWin.jQuery(".panel .mapitem.active:visible [name='m_t3']").val(e.point.lng);
					  	}
					})
				}
			  }
		}
	}
    /**/
	

</script>

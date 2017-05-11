var wsUrl;
var output;
var closeSatus = false;

var date1,dateStr1;
var SGDraw = 0;
var now = new Date();
var dateStr = ""+now.getFullYear()+((now.getMonth()+1) >=10?(now.getMonth()+1):"0"+(now.getMonth()+1))+(now.getDate()>=10?now.getDate():"0"+now.getDate());
var date = now.getFullYear()+"-"+((now.getMonth()+1)>=10?(now.getMonth()+1):"0"+(now.getMonth()+1))+"-"+(now.getDate()>=10?now.getDate():"0"+now.getDate());
var Week = ["Sun","Mon","Tues","Wed","Thur","Fri","Sat"];
var dateText;
var websocket;
var isPast = false;
var isDraw = false;
var drawList;
var audio;
var dataArr={};
function  initEvent() {
	audioUtil.init();
	
	/*setTimeout("audioUtil.playNum(8542);",1000);*/
	/*audioUtil.playNum(8542);*/
	var href = document.location.host;
	/*ag.staging.isin4d.net*/
	wsUrl = "ws://"+href+":8010/websocket";
	
	setSG();
	isDraw = true;
	if (!window.WebSocket){//判断浏览器是否支持WebSocket
	    alert("Please use the latest version of the browser");
	    return;
	}
	
	$(".date").text(date+" ("+Week[now.getDay()]+")");
	$("#latest").click(function(){
		dateText = "";
		isPast = false;
		isDraw = false;
		showLates();
		$("table[name='dateList']").removeClass("click");
	});
	
	$("#past").click(function(){
		isPast = true;
		showPast();
		isDraw = false;
		$("table[name='dateList']").removeClass("click");
	});
	
	$("#download").click(function(){
		showDownload();
		$("table[name='dateList']").removeClass("click");
	});
	getLiveAnd4DData();
	
	audio = $("#music")[0];
	$("#musicBtn").on("click",function(){
		audio.play();
	});
	
}

function setSG(date){
	var d = new Date(2014,09,09);
	var today = date ? new Date(parseInt(date.split('-')[0]), parseInt(date.split('-')[1])-1, parseInt(date.split('-')[2])) : now;
	
	if(today >= d && (today.getDay() == 1 || today.getDay() == 4)){
		$('#sg_img').attr('src','/css/images/sg-45.png').attr('width','70').attr('height','36');
		$("#sg_a").click(function(){
			window.open("http://www.sg45toto.com/pc-home.asp");    
		});
		$("#sg_title").text('SG 45 TOTO RESULT');
		$("#sg_td").attr("bgcolor","#00396d");
	} else{
		$('#sg_img').attr('src','/css/images/rslt_mkt_sg.png').attr('width','40').attr('height','50');
		$("#sg_a").click(function(){
			window.open("http://www.singaporepools.com.sg/");    
		});
		$("#sg_title").text('SG TOTO RESULT');
		$("#sg_td").attr("bgcolor","#0084dc");
	}
}


function showLates(){
	SGDraw = 0;
	$("#index").text('Latest Result');
	$("#drawList").hide(1);
	$("#down").hide(1);
	$(".date").text(date+" ("+Week[now.getDay()]+")");
	$("#data").show(1);
	$("#drawIdLive").text( date.replace("L","").replace("L","") );
	getLiveAnd4DData();
	setSG();
}

function showPast(){
	$("#index").text('Past Results');
	$("#down").hide(1);
	$("#drawList").show(1);
	$("#data").show(1);
	getDraw();
	
}

function showDownload(){
	$("#index").text('Download');
	$("#drawList").hide(1);
	$("#data").hide(1);
	$("#down").show(1);
}

function initCalendar() {//初始日期插件
	Calendar.setup({
		inputField : "Date",
		trigger : "btn_Date",
		bottomBar : true,
		weekNumbers : true,
		showTime : false,
		max : parseInt(dateStr1),
		onSelect : function() {
			dateText = $("#Date").text().replace("-","").replace("-","");
			$(".dateGame,.dateLive").text($("#Date").text()+" ("+Week[new Date(dateText.substr(0,4),dateText.substr(4,2)-1,dateText.substr(6,2)).getDay()]+")");
			$("table[name='dateList']").removeClass("click");
			setSG(  $("#Date").text().substr(0,10) );
			initWebSocket();
		}
	});
}

function selectDateList(){//日期选择
	$("table[name='dateList']").click(function(){
		$(this).addClass("click");
		$(this).closest("td").siblings("td").find("table").removeClass("click");
		dateText = $(this).find("span[class='dateList']").text().substr(0,10).replace("-","").replace("-","");
		if(dateText == '' )return;
		getLiveAnd4DData();
		v = $(this).find("span[class='dateList']").text();
		setSG( v.substr(0,10) );
		v == "" ? v = date1+" ("+Week[now1.getDay()]+")" : "";
		$(".date,.dateLive").text(v);
	});
}

function getLiveAnd4DData(){
	$(".load_live,.load_sg").addClass("td_loading").find("span").text("");
	if (websocket != null && websocket.readyState == 1) {//如果连接已经存在且连接成功
		websocket.send('91.{"drawId":"'+(dateText)+'"}');
		console.info('91.{"drawId":"'+(dateText)+'"}');
		websocket.send('41.{"drawId":"'+(dateText)+'"}');
	}else{
		initWebSocket();
	}
}
function initDateList(data) {//初始日期列表
	var j = 0;
	$.each(data.list,function(i,v){
		if(j < 6 && getStrByDate(now).replace("-","").replace("-","") != v){
			var d = new Date(v.substr(0,4),parseInt(v.substr(4,2))-1,v.substr(6,2));
			$(".dateList").eq(j).text(v.substr(0,4)+"-"+v.substr(4,2)+"-"+v.substr(6,2)+" ("+Week[d.getDay()]+")");
			j++;
		}
	});
	
	getLiveAnd4DData();
}


function GetDateStr(AddDayCount) {//返回格式化的某一天日期
	var dd = new Date();
	dd.setDate(dd.getDate() + AddDayCount);// 获取AddDayCount天后的日期
	var y = dd.getFullYear();
	var m = ((dd.getMonth() + 1) >= 10 ? dd.getMonth() + 1 : "0" + (dd.getMonth()+ 1));// 获取当前月份的日期
	var d = (dd.getDate() >= 10 ? dd.getDate() : "0" + dd.getDate());
	var w = Week[dd.getDay()];
	return y + "-" + m + "-" + d + " " + w;
}

function getDraw(){
	if (websocket != null && websocket.readyState == 1) {//如果连接已经存在且连接成功
		websocket.send('90.{}');
	}else{
		initWebSocket();
	}
}

function getSGDraw(){
	if (websocket != null && websocket.readyState == 1) {//如果连接已经存在且连接成功
		websocket.send('40.{}');
		SGDraw = 1;
	}else{
		initWebSocket();
	}
}

function onOpenDraw(evt){
	websocket.send('91.{"drawId":""}');
/*	console.info('live.singleResult.{"drawId":""}');*/
	websocket.send('41.{"drawId":""}');
}

function initWebSocket() {// 初始webSocket
	websocket = new WebSocket(wsUrl);
	websocket.onopen = function(evt) {
		if(isDraw){
			onOpenDraw(evt);
		}else
		onOpen(evt);
	};
	websocket.onclose = function(evt) {
		onClose(evt);
	};
	websocket.onmessage = function(evt) {
		if(evt.data.substr(0,2)=='40' || evt.data.substr(0,2)=='90'){
			onMessageDraw(evt);
		}else
			onMessage(evt);
	};
	websocket.onerror = function(evt) {
		onError(evt);
	};
}

function onOpen(evt) {
	websocket.send('91.{"drawId":'+(dateText)+'}');
	websocket.send('41.{"drawId":'+(dateText)+'}');
	console.info('41.{"drawId":'+(dateText)+'}');
}

function onClose(evt) {
	//console.info("DISCONNECTED");
    if (!isPast && $(".td_loading").length != 0) {
		/*console.info("restart");*/
		initWebSocket();
	}
}

function onMessageDraw(evt){
	var dataArr = getJsonData(evt.data);
	var dataObj = JSON.parse(dataArr[1]);
	if(dataObj.code == 0 ){//判断访问是否成功
		var date = getStrByDate(now).replace("-","").replace("-","") != dataObj.list[0] ? dataObj.list[0] : dataObj.list[1];
		if( (!date || dataObj.list.length < 6) && SGDraw!=1){
				getSGDraw();
				return;
		}
		now1 = getDateByStr(date);
		date1 = getStrByDate(now1);
		dateStr1 = getStrByDateNoLine(now1);
		dateText = dateStr1;
		selectDateList();
		initCalendar();
		$(".date,.dateLive").text(date1+" ("+Week[now1.getDay()]+")");
		/*$(".date1").text(date1);*/
		setSG(date1.substr(0,10));
		initDateList(dataObj);
	}
}

function onMessage(evt) {
	var dataArr = getJsonData(evt.data);
/*	console.info(evt.data);
	console.info(evt);*/
	/*dataArr[0]="push";
	dataArr[1]="liveDrawResulted";
	dataArr[2]='{"result":{"drawId":"20140531","starter":[],"consolation":["1054","9991","8862","8624","8866"]},"drawId":"20140531"}';*/
	var dataObj = JSON.parse(dataArr[1]);
	if((dataArr[0] == '-11' || dataArr[0] == '-21') && isPast){
		return;
	}
	if(dataObj.code == 0 || (dataArr[0] == '-11' || dataArr[0] == '-21')){//判断访问是否成功或者后台推送数据
		if(dataArr[0] == '91' || dataArr[0] == '-21'){//解析返回的数据字符串
			if(dateText){
				setLiveMessage1(dataObj);
			}
			else{
				setLiveMessage(dataObj,dataArr[0],dataArr[1]);
			}
		}else{
			if(dateText){
				setGameMeesage1(dataObj);
			}
			else{
				setGameMeesage(dataObj,dataArr[0],dataArr[1]);
			}
		}
	}
}
function onError(evt) {
   // alert('ERROR:'+ evt.data);
}

var liveIdArr= ['1st','2st','3st'];
var liveIdArr2= ['Special','Consolation'];

var liveNumPushed = "";
function setLiveMessage(data,name,n) {
	var dataResult; 
	if(name=='-21'){
		dataResult=data;
	}else{
		dataResult=data.result;
	}
	if(dataResult){
		if(dataResult.drawId){
			var d = getDateByStr(dataResult.drawId);
			var strDate = getStrByDate(d);
			$(".dateLive").text(strDate+" ("+Week[d.getDay()]+")");
			$("#drawIdLive").text( dataResult.drawId.replace("L","") ).closest("td").removeClass("td_loading");
		}
		if(name=='-21'){
			var rst = data;
			var snd_sequence =rst.prize1 + rst.prize2  + rst.prize3+  rst.starter.join('') + rst.consolation.join('');
			//console.log(snd_sequence);
			if( snd_sequence.length > 4 && liveNumPushed =="" ){
				display( snd_sequence.substr(4, snd_sequence.length - 4),"live" );
			}
			if(snd_sequence.indexOf(liveNumPushed)!=0){
				var tmp = liveNumPushed;
				liveNumPushed = snd_sequence;
				snd_sequence = snd_sequence.replace(tmp,"");	//remove nums already pushed
			}
			else{
				liveNumPushed = snd_sequence;	
			}
			var index  = 23-Math.ceil(liveNumPushed.length/4);
			if(audioUtil)
			audioUtil.playNum(snd_sequence,"live",index);
		}else if(name != '-21'){
			    var v = data.result;
			    
				if(v.prize1)loadDate("1st",v.prize1);
				if(v.prize2)loadDate("2st",v.prize2);
				if(v.prize3)loadDate("3st",v.prize3);
				
				if(v.starter){
					//$.each(v.starter, function(i, v) {
						//v == "" ? "" :$("#Special").find("td:eq(" + i + ")").find("span").text(v).closest("td").removeClass("td_loading");
					//});
					var starterData = v.starter;
					for(var i=starterData.length-1; i>=0;i--){
						starterData[i] == "" ? "" :$("#Special").find("td:eq(" + i + ")").find("span").text(starterData[i]).closest("td").removeClass("td_loading");
					}
				}
					
				if(v.drawId){
					var d = getDateByStr(v.drawId);
					var strDate = getStrByDate(d);
					$(".dateLive").text(strDate+" ("+Week[d.getDay()]+")");
					$("#drawIdLive").text( v.drawId.replace("L","") ).closest("td").removeClass("td_loading");
				}else{
					$(".dateLive").text("----");
				}
				if(v.consolation){
					//$.each(v.consolation,function(i, v) {
						//v == "" ? "" :$("#Consolation").find("td:eq(" + i + ")").find("span").text(v).closest("td").removeClass("td_loading");
		           // });
					var conData = v.consolation;
					for(var i=conData.length-1;i>=0;i--){
						conData[i] == "" ? "" :$("#Consolation").find("td:eq(" + i + ")").find("span").text(conData[i]).closest("td").removeClass("td_loading");
					}
				}
					
					
		}
	}else{
		var now_ = new Date();
		var strDate = getStrByDate(now_);
		$(".dateLive").text(strDate+" ("+Week[now_.getDay()]+")");
		$("#drawIdLive").text( '----' ).closest("td").removeClass("td_loading");
		$.each(liveIdArr,function(i,v){
			$("#"+v).text('----').closest("td").removeClass("td_loading");
		});
		
		$.each(liveIdArr2,function(i,v){
			$("#"+v).find("span").text('----').closest("td").removeClass("td_loading");
		});
	}
}

function setGameMeesage(data,name,n) {
	if(name == '-11'){
		var v = data;
		var d = getDateByStr(v.drawId);
		var strDate = getStrByDate(d);
		$(".dateGame").text(strDate+" ("+Week[d.getDay()]+")");
		$("#drawIdGame").text(v.drawId).closest("td").removeClass("td_loading");
		if(audioUtil)
		audioUtil.playNum(v.result,"sg",0);
	}
	else if(data.result){
		var v = data.result;
		if( v.result )
		v.result == "" ? "" : $("#Result").text(v.result).closest("td").removeClass("td_loading");
		if( v.drawId ){
			var d = getDateByStr(v.drawId);
			var strDate = getStrByDate(d);
			$(".dateGame").text(strDate+" ("+Week[d.getDay()]+")");
			v.drawId == "" ? "" : $("#drawIdGame").text(v.drawId).closest("td").removeClass("td_loading");
		}else{
			var now_ = new Date();
			var strDate = getStrByDate(now_);
			$(".dateGame").text(strDate+" ("+Week[now_.getDay()]+")");
			$("#drawIdGame").text( '----' ).closest("td").removeClass("td_loading");
			$("#Result").text('----').closest("td").removeClass("td_loading");
		}
	}

}

function setLiveMessage1(data) {
	if(!data.result || data.result == ""){
		$("#1st").text("----").closest("td").removeClass("td_loading");
		$("#2st").text("----").closest("td").removeClass("td_loading");
		$("#3st").text("----").closest("td").removeClass("td_loading");
		$("#Special").find("span").text( "----" ).closest("td").removeClass("td_loading");
		$("#drawIdLive").text( "----" ).closest("td").removeClass("td_loading");
		$("#Consolation").find("span").text( "----" ).closest("td").removeClass("td_loading");
	}else{
		data = data.result;
		!data.prize1 || data.prize1 == ""  ? loading("1st") : loadDate("1st",data.prize1);
		!data.prize2 || data.prize2 == "" ? loading("2st")  : loadDate("2st",data.prize2);;
		!data.prize3 || data.prize3 == "" ? loading("3st")  : loadDate("3st",data.prize3);;
		if(data.starter){
			$.each(data.starter, function(i, v) {
				v == "" ? $("#Special td").removeClass("td_loading").eq(i).find("span").text( "----" ) : $("#Special td").eq(i).find("span").text( v ).closest("td").removeClass("td_loading");
			});
		}else{
			for(var i = 0; i<20; i++){
				$("#Special td").removeClass("td_loading").eq(i).find("span").text( "----" );
			}
		}
		
		
		!data.drawId || data.drawId == "" ? $("#drawIdLive").text( "----" ).closest("td").removeClass("td_loading") : $("#drawIdLive").text( data.drawId.replace("L","") ).closest("td").removeClass("td_loading");
		if(data.consolation){
			$.each(data.consolation, function(i, v) {
				v == "" ? $("#Consolation").find("td:eq(" + i + ")").removeClass("td_loading").find("span").text( "----" ) : $("#Consolation").find("td:eq(" + i + ")").find("span").text( v ).closest("td").removeClass("td_loading");
			});
		}else{
			for(var i = 0; i<20; i++){
				$("#Consolation").find("td:eq(" + i + ")").removeClass("td_loading").find("span").text( "----" );
			}
		}
		
	}
}


function setGameMeesage1(data) {
		if(!data.result.result || data.result == "" || data.result.result == "" || data.result.drawId == "" ){
			$("#Result").text("----").closest("td").removeClass("td_loading");
			$("#drawIdGame").text("----").closest("td").removeClass("td_loading");
			if(data.result.drawId){
				var date = getDateByStr(data.result.drawId);
				var dateStr = getStrByDate(date);
				$(".dateGame").text(dateStr+" ("+Week[date.getDay()]+")");
			}
		}else{
			data = data.result;
			var date = getDateByStr(data.drawId);
			var dateStr = getStrByDate(date);
			if( dateText == data.drawId  && dateText != ''){
				$(".dateGame").text(dateStr+" ("+Week[date.getDay()]+")");
				$("#Result").text( data.result ).closest("td").removeClass("td_loading");
				$("#drawIdGame").text( data.drawId ).closest("td").removeClass("td_loading");
			}else{
				$("#Result").text("----").closest("td").removeClass("td_loading");
				$("#drawIdGame").text( '----' ).closest("td").removeClass("td_loading");
				$(".dateGame").text(getStrByDate(getDateByStr(dateText))+" ("+Week[getDateByStr(dateText).getDay()]+")");
				
			}
			
		}
}


function getJsonData(data){
    var array = new Array(3);
    var begin = 0, end = 0;
    var KeyWord = '.';
   /** 
    for (var i = 0; i < 1; i++ ) {
        end = data.indexOf( KeyWord, begin );
        if ( end < 0 ) {
            return null;
        }
        array[i] = data.substring( begin, end );
        begin = end + 1;
    }
    **/
    end = data.indexOf( KeyWord, begin );
    array[0] = data.substring( begin, end );
    begin = end + 1;
    array[1] = data.substring( begin );
   /* var namespace = array[0]; 
    method = array[1],
    data = array[2],*/
    return array;
}



function havaTheDate(str){
	var t = false;
	$.each(drawList.list,function(i,v){
		var arr = v.split("-");
		var s ="";
		for(var i = 0; i< arr.length;i++){
			s+=arr[i];
		}
		if(s==str)t=true;
		
		/*if(v==str)t=true;*/
	});
	return t;
}
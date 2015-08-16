function
add_KW__Genre_Changed
(id) {
	
	/***********************
		Prep: ajax
	 ***********************/
//	alert("Start Ajax");
	
	/***********************
		change color
	 ***********************/
//	alert($('label[for="category"]').text());
	
	$label = $('label[for="category"]');
	
	$label.css("background", "yellow");
	
	var hostname = window.location.hostname;
	
	var url;
	
	if (hostname == "benfranklin.chips.jp") {
		
		url = "/cake_apps/Cake_NR5/keywords/add_KW__Genre_Changed";
		
	} else {
	
		url = "/Cake_NR5/keywords/add_KW__Genre_Changed";
	
	}
	
	$.ajax({
		
	    url: url,
	    type: "GET",
	    //REF http://stackoverflow.com/questions/1916309/pass-multiple-parameters-to-jquery-ajax-call answered Dec 16 '09 at 17:37
	    data: {id: id},
	    
	    timeout: 10000
	    
	}).done(function(data, status, xhr) {
		
	//	alert(conv_Float_to_TimeLabel(data.point));
	//	addPosition_ToList(data.point);
		
//		_delete_position_Ajax__Done(data, status, xhr);
		_add_KW__Genre_Changed__Done(data, status, xhr);
		
	}).fail(function(xhr, status, error) {
		
		alert(xhr.status);
		
	});
	
}//edit_memo_execute()

function
_add_KW__Genre_Changed__Done(data, status, xhr) {
	
//	alert("ajax => done");
//	alert(data);

	//REF http://jszuki.doorblog.jp/archives/31702159.html
	$label = $('label[for="category"]');
	
	//REF http://js.studio-kingdom.com/jquery/css/css
	$label.css("background", "white");
	
//	$("#add_kw_ajax").append(data);	// 
////	$("#category").append(data);	// no change
	$("#category").html(data);	// selector changes
	
}


function
modify_content
(history_id) {
	
	var hostname = window.location.hostname;

	alert(hostname);
	
	var url;
	
	if (hostname == "benfranklin.chips.jp") {
		
		url = "/cake_apps/Cake_NR5/historys/content_multilines?id=" + history_id;
		
	} else {
	
		url = "/Cake_NR5/historys/content_multilines?id=" + history_id;
	
	}
	
	$.ajax({
		
	    url: url,
	    type: "GET",
	    //REF http://stackoverflow.com/questions/1916309/pass-multiple-parameters-to-jquery-ajax-call answered Dec 16 '09 at 17:37
//	    data: {id: id},
	    
	    timeout: 10000
	    
	}).done(function(data, status, xhr) {
		
	//	alert(conv_Float_to_TimeLabel(data.point));
	//	addPosition_ToList(data.point);
		
//		_delete_position_Ajax__Done(data, status, xhr);
		_modify_content__Done(data, status, xhr);
		
	}).fail(function(xhr, status, error) {
		
		alert(xhr.status);
		
	});
	
}//modify_content

function
_modify_content__Done
(data, status, xhr) {

	alert("Ajax => done");
//	alert(data);
	
	$("td#history_content").html(data);
//	$("td#history_content").text(data);
	
//	alert($("td#history_content").text());
	
	
}//_modify_content__Done

function get_kw_mix() {

	/***************************
		change color
	 ***************************/
	$label = $('#message_area');
	
	$label.css("background", "yellow");

	/***************************
		set: url
	 ***************************/
	var hostname = window.location.hostname;
	
	var url;
	
	if (hostname == "benfranklin.chips.jp") {
		
		url = "/cake_apps/Cake_IG/keywords/get_keywords_mix/3";
//		url = "/cake_apps/Cake_NR5/keywords/add_KW__Genre_Changed";
		
	} else {
	
		url = "/Eclipse_Luna/Cake_IG/keywords/get_keywords_mix/3";
//		url = "/Cake_IG/keywords/get_keywords_mix/3";
//		url = "/Cake_NR5/keywords/add_KW__Genre_Changed";
	
	}

//	alert(url);
	
	/***************************
		ajax
	 ***************************/
	$.ajax({
		
	    url: url,
	    type: "GET",
	    //REF http://stackoverflow.com/questions/1916309/pass-multiple-parameters-to-jquery-ajax-call answered Dec 16 '09 at 17:37
//	    data: {id: id},
	    
	    timeout: 10000
	    
	}).done(function(data, status, xhr) {

//		alert(data);
		
		_get_kw_mix__Done(data);
		
	}).fail(function(xhr, status, error) {
		
		alert(xhr.status);
		
	});

	
}

function _get_kw_mix__Done(data) {

	/***************************
			change color
		 ***************************/
	$label = $('#message_area');
	
	$label.css("background", "white");

//	alert(data);

//	/***************************
//		parse JSON
//	 ***************************/
//	var obj = JSON.parse(data);
//
//	var kws = [];
//	
//	var len_obj = Object.keys(obj).length;
//	
//	for (var i = 0; i < len_obj; i ++) {
//		
//		kws[i] = obj[i]['Keyword'];
//		
//	}
//	
//	var msg = "kws[0] => " + kws[0]['word'] + "/"
//			+ "kws[1] => " + kws[1]['word'] + "/"
//			+ "kws[2] => " + kws[2]['word'];
//	
////	alert(msg);
	
	/***************************
		show keywords
	 ***************************/
//	$label.html(msg);
	$label.html(data);
//	$label.text(msg);
	
}//function _get_kw_mix__Done(data)

function show_composition_area() {
	
	var div = $('#area_composition');
	
	div.css("display", "inline");	
	
}//show_composition_area

$(document).ready(function(){

//	alert("ready");

    
})

function show_msg() {
	
	alert("javascript!");
	
//	$("#jqarea").text("done");
	
//	$.ajax({
//		
//	    url: "/VM_Cake/videos/retrieve_CurrentTime",
//	    type: "GET",
//	    timeout: 10000
//	    
//	}).done(function(data, status, xhr) {
//		
//		$("#jqarea").text(data);
//		
//		seek(data);
//		
//	}).fail(function(xhr, status, error) {
//		
//	    $("#jqarea").append("xhr.status = " + xhr.status + "<br>");          // ��: 404
//	    
//	});
	
}
//$(function() {
//    $( "#dialog" ).dialog();
//});


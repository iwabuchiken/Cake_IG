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

function submit_composition() {

	/***************************
		get: data
	 ***************************/
	var w_1 = $('div#kw_word_1');
	var w_2 = $('div#kw_word_2');
	var w_3 = $('div#kw_word_3');
	
	var id_1 = $('div#kw_id_1');
	var id_2 = $('div#kw_id_2');
	var id_3 = $('div#kw_id_3');
	
	var id_str_1 = id_1.text();
	
	var len_1 = id_str_1.length;
	
	var tmp = "";
	
//	tmp = tmp +  id_str_1.substring(0,1);
//	tmp = tmp +  "/";
//	
//	tmp = tmp +  id_str_1.substring(1,2);
//	tmp = tmp +  "/";
//	tmp += id_str_1(0,1);
//	tmp += "/";
//	
//	tmp += id_str_1(1,2);
//	tmp += "/";
	
	for (var i = 0; i < len_1 - 1; i++) {
		
		tmp += "(" + i + ")";
		
		tmp += id_str_1.substring(i, i + 1);
//		tmp += id_str_1(i, i + 1);
		
//		tmp += "/";
		
	}
	
//	alert("id_1 => " + tmp + "[" + len_1 + "]");
//	alert("id_1 => " + $.trim(id_str_1) + "[" + len_1 + "]");
//	alert("id_1 => " + $.trim(tmp) + "[" + len_1 + "]");
//	alert("id_1 => " + id_str_1 + "(" + id_str_1.substring(0,1) + ")");
//	alert("id_1 => " + id_str_1 + "(" + id_str_1.length + ")");
//	alert("id_1 => " + id_1.text() + "(" + id_1.text().length + ")");
	
//	var ids = id_1.text + " "
//				+ id_2.text + " " 
//				+ id_3.text + " "; 
//	var ids = id_1.text() + " "
//	+ id_2.text() + " " 
//	+ id_3.text() + " "; 
//	var ids = id_1.text().substring(4,5) + " "
//	+ id_2.text().substring(4,5) + " " 
//	+ id_3.text().substring(4,5) + " "; 
	
	//REF trim http://stackoverflow.com/questions/4637942/how-can-i-truncate-a-string-in-jquery answered Jan 9 '11 at 6:19
	var ids = $.trim(id_1.text()) + " "
	+ $.trim(id_2.text()) + " " 
	+ $.trim(id_3.text()); 
	
//	alert("ids => " + ids + "[" + ids.length + "]");
	
	var sen = $('textarea#Compose');
	
	/***************************
		change color
	 ***************************/
	sen.css("background", "yellow");
	
	/***************************
		set: url
	 ***************************/
	var hostname = window.location.hostname;
	
	var url;
	
	if (hostname == "benfranklin.chips.jp") {
		
		url = "/cake_apps/Cake_IG/sens/add_by_submission";
		
	} else {
	
		url = "/Eclipse_Luna/Cake_IG/sens/add_by_submission";
	
	}
	
//	alert(url);
	
//	alert("ajax starting... => " + url);
	/***************************
		ajax
	 ***************************/
	$.ajax({
		
	    url: url,
	    type: "POST",
	    //REF http://stackoverflow.com/questions/1916309/pass-multiple-parameters-to-jquery-ajax-call answered Dec 16 '09 at 17:37
	    data: {
	    		"data[Sen][text]": sen.val(),
	    		"data[Sen][kws]":	ids
	    		},
//	    data: {"data[Sen][kws]": sen.val()},
	    
	    timeout: 10000
	    
	}).done(function(data, status, xhr) {
	
//		alert(data);
		_submit_composition__Done(data);
		
//		_get_kw_mix__Done(data);
		
	}).fail(function(xhr, status, error) {
		
		alert(xhr.status);
		
	});
	
	
}//submit_composition

function _submit_composition__Done(data) {
	
	/***************************
		dispatch
	 ***************************/
	var sen = $('textarea#Compose');
	
	if (data == "saved") {
		
//		alert("saved");
		
		sen.css("background", "aquamarine");
		
	} else {

		alert("message is => " + data);
		
		sen.css("background", "burlywood");
		
	}
	
}
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


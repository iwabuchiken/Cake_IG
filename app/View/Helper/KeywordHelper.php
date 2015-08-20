<?php

class KeywordHelper extends AppHelper {
// class MainHelper extends Helper {
	
	public function 
	conv_KWList_2_JSONList($list_KWs) {
		
// 		var text = '{ "employees" : [' +					//=> w
// 		'{ "firstName":"John" , "lastName":"Doe" },' +
// 		'{ "firstName":"Anna" , "lastName":"Smith" },' +
// 		'{ "firstName":"Peter" , "lastName":"Jones" } ],'+
// 		'"employees" : [' +
// 		'{ "firstName":"John" , "lastName":"Doe" },' +
// 		'{ "firstName":"Anna" , "lastName":"Smith" },' +
// 		'{ "firstName":"Peter" , "lastName":"Jones" } ]' +
// 		'}';
		

		$len_list = count($list_KWs);
		
		$kw = $list_KWs[0];
		
		$word = $kw['Keyword']['word'];
		
		$str = "{"
					."\"Keyword\"" . ":" . "{"
						."\"word\"".":"."\"".$word."\""
						
							
					. "}"
				. "}";
		
// 		$str = $kw['Keyword']['word'];
		
// 		$str = "{\"Keyword\":[{\"word\" : \"".$str."\"}]}";
		
// 		return print_r($kw);
		return $str;
// 		return "CONVERTED";
		
	} 

	public function 
	conv_KwID_2_Words($kw_id) {
		
		/*******************************
			get: instance
		*******************************/
// 		App::import("Keyword");
		
// 		$keyword = new Keyword();	//=> "Error: Class 'Keyword' not found"

		$keyword = ClassRegistry::init('Keyword');
// 		$model = ClassRegistry::init('Admin');
		
		$option = array(
				'conditions' => array('Keyword.id' => $kw_id));
		
		$kw = $keyword->find('first', $option);
		
		/*******************************
			return
		*******************************/
		return ($kw == null) ? null : $kw['Keyword']['word'];
		
		
	}//conv_KwID_2_Words($kw_id)
	
}

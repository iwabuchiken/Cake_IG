<?php

//REF http://www.grafikart.fr/forum/topic/4160 on 13/2/12
// App::uses('Sanitize', 'Utility');


class Keyword extends AppModel {

	
	var $name = 'Keyword';

	var $validate = array(
			'word' => array(
					//REF http://www.kayakinglifestyle.jp/cakephp%E3%81%AEisunique%E3%83%A1%E3%82%BD%E3%83%83%E3%83%89%E3%81%A7%E8%A4%87%E6%95%B0%E3%83%95%E3%82%A3%E3%83%BC%E3%83%AB%E3%83%89%E3%81%A7%E3%81%AE%E4%B8%80%E6%84%8F%E6%80%A7/516
					'unique' => array(
							'rule'=>array(
									'checkUnique',
									array('word')), //ユニークチェックしたいフィールド
// 									array('form', 'hin')), //ユニークチェックしたいフィールド
							'message' => 'word => not unique'
					)
			)
			
	);
	
	
	//REF http://www.kayakinglifestyle.jp/cakephp%E3%81%AEisunique%E3%83%A1%E3%82%BD%E3%83%83%E3%83%89%E3%81%A7%E8%A4%87%E6%95%B0%E3%83%95%E3%82%A3%E3%83%BC%E3%83%AB%E3%83%89%E3%81%A7%E3%81%AE%E4%B8%80%E6%84%8F%E6%80%A7/516
	//REF http://stackoverflow.com/questions/2461267/cakephp-isunique-for-2-fields
	function checkUnique($data, $fields) {
		if (!is_array($fields)) {
			$fields = array($fields);
		}
		foreach($fields as $key) {
			$tmp[$key] = $this->data[$this->name][$key];
		}
		return $this->isUnique($tmp, false);
	}
	
// 	var $belongsTo = 'Category';

// 	var $hasMany = array(
	
// // 			'Token' => array(
	
// // 					'className' => 'Token'
// // 			),
			
// 			'SkimmedToken' => array(
	
// 					'className' => 'SkimmedToken'
// 			)
	
// 	);

// 	//REF http://stackoverflow.com/questions/6152416/how-to-limit-the-paginate-in-cakephp answered May 27 '11 at 13:23
// 	public function paginateCount($conditions = null, $recursive = 0, $extra = array())
// 	{
// 		if( isset($extra['totallimit']) ) return $extra['totallimit'];
// 	}
	
}

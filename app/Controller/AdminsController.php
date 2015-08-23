<?php

App::uses('Xml', 'Utility');

class AdminsController extends AppController {

	public $helpers = array('Html', 'Form', 'Main');
	
	public $components = array('Paginator');
	
	public function 
	index() {

		/**********************************
		 * paginate data
		**********************************/
		$page_limit = 10;
		
		$opt_order = array('id' => 'asc');
		
		$this->paginate = array(
				// 					'conditions' => array('Image.file_name LIKE' => "%$filter_TableName%"),
		// 				'conditions' => array('Image.memos LIKE' => "%$filter_TableName%"),
				'limit' => $page_limit,
				'order' => $opt_order,
// 				'conditions'	=> $opt_conditions
				// 				'order' => array(
						// 						'id' => 'asc'
						// 				)
		);
		
		$this->set('admins', $this->paginate('Admin'));
		
	}

	public function view($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Invalid video'));
		}
	
		$keyword = $this->Keyword->findById($id);
		if (!$keyword) {
			throw new NotFoundException(__('Invalid video'));
		}
		
		$this->set('keyword', $keyword);
		
	}
	
	public function add() {
		if ($this->request->is('post')) {
			
			$this->Keyword->create();
			
			$this->request->data['Keyword']['created_at'] =
						Utils::get_CurrentTime2(CONS::$timeLabelTypes["rails"]);
			
			$this->request->data['Keyword']['updated_at'] =
						Utils::get_CurrentTime2(CONS::$timeLabelTypes["rails"]);
			
			if ($this->Keyword->save($this->request->data)) {
				
				$this->Session->setFlash(
						__("Keyword saved => ".$this->request->data['Keyword']['word']));
// 				$this->Session->setFlash(__('Your keyword has been saved.'));
				return $this->redirect(array('action' => 'index'));
				
			}
			$this->Session->setFlash(__('Unable to add your keyword.'));
			
		} else {
			
		}
		
	}//public function add()

	public function delete($id) {
		/******************************
	
		validate
	
		******************************/
		if (!$id) {
			throw new NotFoundException(__('Invalid keyword id'));
			
			return;
			
		}
	
		$keyword = $this->Keyword->findById($id);
	
		if (!$keyword) {
			throw new NotFoundException(__("Can't find the keyword. id = %d", $id));
			
			return;
			
		}
	
		/******************************
	
		delete
	
		******************************/
		if ($this->Keyword->delete($id)) {
			// 		if ($this->Keyword->save($this->request->data)) {
				
			$this->Session->setFlash(__("Keyword deleted => %s", $keyword['Keyword']['word']));
				
			return $this->redirect(
					array(
							'controller' => 'keywords',
							'action' => 'index'
							
					));
				
		} else {
				
			$this->Session->setFlash(
					__("Keyword can't be deleted => %s", $keyword['Keyword']['title']));
				
			// 			$page_num = _get_Page_from_Id($id - 1);
				
			return $this->redirect(
					array(
							'controller' => 'keywords',
							'action' => 'view',
							$id
					));
				
		}
	
	}//public function delete($id)
	
	public function edit($id = null) {
		if (!$id) {
			throw new NotFoundException(__('id => null'));
			
			return;
			
		}
	
		/****************************************
			* Keyword
		****************************************/
		$keyword = $this->Keyword->findById($id);
		
		if (!$keyword) {
			
			throw new NotFoundException(__("Keyword not found: id => ".$id));
			
			return;
			
		}
	
		if (count($this->params->data) != 0) {
				
			$this->Keyword->id = $id;
				
			$this->params->data['Keyword']['updated_at'] =
						Utils::get_CurrentTime2(CONS::$timeLabelTypes["rails"]);
				
			if ($this->Keyword->save($this->request->data)) {
	
				$this->Session->setFlash(__("Keyword has been updated: ".$id));
				
				return $this->redirect(
						array(
								'action' => 'view',
								$id));
	
			}//if ($this->Text->save($this->request->data))
				
			$this->Session->setFlash(__("Unable to update your keyword: ".$id));
				
		} else {
			
			// no param => set keyword variable
			$this->set("keyword", $keyword);
			
		}//if (count($this->params->data) != 0)
	
		if (!$this->request->data) {
			$this->request->data = $keyword;;
		}
	
	}//public function edit($id = null)

	public function get_rubi() {

		/*******************************
			build: keywords
		*******************************/
		$this->loadModel('Keyword');
		
		$option = array('order' => array('Keyword.id' => 'asc'));
		
		$keywords = $this->Keyword->find('all', $option);
		
// 		debug(count($keywords));
		/*******************************
			xml
		*******************************/
		$app_id = "dj0zaiZpPVdCMFl5WHA4NURGaSZzPWNvbnN1bWVyc2VjcmV0Jng9OTY-";

		$sen = $keywords[0]['Keyword']['word'];
		$url = "http://jlp.yahooapis.jp/FuriganaService/V1/furigana?appid=$app_id&grade=1&sentence=$sen";

		//simpleXML
		$xml = Xml::build($url);
		
		debug($xml);
		
		// dom
		$html = file_get_contents($url);
		$xmlDoc = new DOMDocument();
		$xmlDoc->loadXML($html);
		
		$ResultSet = $xmlDoc->documentElement;
// 		$xmlDom = $xmlDoc->documentElement;
		
// 		debug("ResultSet->nodeName => ". $ResultSet->nodeName);
// // 		debug($xmlDom->nodeName);
		
// 		debug($ResultSet->childNodes->length);
		
// 		debug($ResultSet->childNodes[0]->nodeName);
		
// 		debug(get_class($ResultSet->childNodes));
		
		$len = $ResultSet->childNodes->length;
		
// 		for ($i = 0; $i < $len; $i++) {
			
// 			debug("ResultSet->childNodes->item($i)->nodeName => "
// 							.$ResultSet->childNodes->item($i)->nodeName);
			
// 		}
		
// 		debug("ResultSet->childNodes->item(0)->nodeValue => "
// 		.$ResultSet->childNodes->item(0)->nodeValue);
		
// 		debug("ResultSet->childNodes->item(1)->nodeName => "
// 				.$ResultSet->childNodes->item(1)->nodeName);
		
// 		debug("get_class(\$ResultSet->childNodes->item(0)) => " 
// 				. get_class($ResultSet->childNodes->item(0)));	//=> DOMText
		
// 		debug("\$ResultSet->childNodes->item(0)->wholeText => " 
// 				. "\"".$ResultSet->childNodes->item(0)->wholeText."\"");	//=> \R(?)
		
// 		debug("get_class(\$ResultSet->childNodes->item(1)) => " 
// 				. get_class($ResultSet->childNodes->item(1)));	//=> DOMElement
		
// 		debug("\$ResultSet->childNodes->item(1)->nodeName => " 
// 				. $ResultSet->childNodes->item(1)->nodeName);	//=> Result
		
// 		debug("ResultSet->childNodes->item(0)->nodeName => "
// 				.$ResultSet->childNodes->item(0)->nodeName);
		
// 		debug("ResultSet->childNodes->item(1)->nodeName => "
// 				.$ResultSet->childNodes->item(1)->nodeName);
		
		/*******************************
			other method
		*******************************/
		$words = $xmlDoc->documentElement->getElementsByTagName("Word");
// 		$words = $xmlDoc->getElementsByTagName("Word");
		
		$w = $words->item(0);	//=> Word
		debug($w->nodeName);
		
		$furi = $w->getElementsByTagName("Furigana");	//=> NodeList
		
		$furi_elem = $furi->item(0);
		
		debug("furi => ".$furi_elem->nodeName);	//=> Furigana
		debug($furi_elem->nodeValue);	//=> いぬ
		
// 		debug("sur => ".$sur->item(0));
// 		debug("sur => ".$sur->nodeName);
		
		debug("words->length => ".$words->length);
		
		
		$w_children = $w->childNodes;
		
		$len_w_children = $w_children->length;	//=> 7
		
// 		for ($i = 0; $i < $len_w_children; $i++) {	//=> empty object
			
// 			debug($w_children->item($i));
			
// 		}
		
// 		debug("\$w_children->length => ".$len_w_children);
// 		debug("\$w_children->length => ".$w_children->length);
// 		debug($words->item(0)->nodeName);
		
// 		debug($words->item(0)->childNodes->length);
		
		
		$this->set("ResultSet", $ResultSet);
		
		foreach ($keywords as $index => $k) {
// 		foreach ($keywords as $k) {
	// 			object(SimpleXMLElement) {
	// 				Result => object(SimpleXMLElement) {
	// 					WordList => object(SimpleXMLElement) {
	// 						Word => object(SimpleXMLElement) {
	// 							Surface => '犬'
	// 									Furigana => 'いぬ'
	// 											Roman => 'inu'
	// 						}
	// 					}
	// 				}
	// 			}
	
			$sen = $k['Keyword']['word'];
			$url = "http://jlp.yahooapis.jp/FuriganaService/V1/furigana?appid=$app_id&grade=1&sentence=$sen";
			
			$rubi = $k['Keyword']['rubi'];
			
			if ($rubi != null) {
			
				$msg = "sen => $sen"."/"."rubi -> ".$k['Keyword']['rubi'];
		
			} else {
			
				$msg = "sen => $sen"."/"."rubi -> null";
				
			}//if ($rubi != null)
			
			debug($msg);
			
			/*******************************
				dom
			*******************************/
			//REF C:\WORKS\WS\Eclipse_Luna\VM_Cake\app\Controller\VideosController.php
			$html = file_get_contents($url);
			$xmlDoc = new DOMDocument();
			$xmlDoc->loadXML($html);
				
			$words = $xmlDoc->documentElement->getElementsByTagName("Word");
			// 		$words = $xmlDoc->getElementsByTagName("Word");
			
			$w = $words->item(0);	//=> Word

			$furi = $w->getElementsByTagName("Furigana");	//=> NodeList
			$sur = $w->getElementsByTagName("Surface");	//=> NodeList
			
			$furi_elem = $furi->item(0);
			$sur_elem = $sur->item(0);
			
// 			debug("furi => ".$furi_elem->nodeName);	//=> Furigana
// 			debug($furi_elem->nodeValue);	//=> いぬ

			if ($furi_elem != null) {
			
				$msg = $sur_elem->nodeValue."/"
						.$furi_elem->nodeValue
						."/".mb_convert_kana($sur_elem->nodeValue, "c");
				
				$keywords[$index]['Keyword']['rubi'] = $furi_elem->nodeValue;
// 				$k['Keyword']['rubi'] = $furi_elem->nodeValue;
			
			} else {
			
				$msg = mb_convert_kana($sur_elem->nodeValue, "c")."/"."null";
// 				$msg = $sur_elem->nodeValue."/"."null";
				
				$keywords[$index]['Keyword']['rubi'] = 
							mb_convert_kana($sur_elem->nodeValue, "c");
				
			}//if ($furi_elem != null)
			
			
			
			debug($msg);	//=> '窓ガラス/まどがらす/窓がらす'
// 			debug($sur_elem->nodeValue."/".$furi_elem->nodeValue);	//=>
					
// 			debug(mb_convert_kana("カーテン", "c"));
			
		}//foreach ($keywords as $k)
		
		/*******************************
			report
		*******************************/
		foreach ($keywords as $k) {
			
			$rubi = $k['Keyword']['rubi'];
			
			if ($rubi != null) {
					
				$msg = "rubi is now -> ".$k['Keyword']['rubi'];
			
			} else {
					
				$msg = "rubi is now -> null";
			
			}//if ($rubi != null)
				
			debug($msg);
				
		}
		
		
		$sen = "犬用のメニューのある、カフェ";
// 		$sen = "記事";
		$app_id = "dj0zaiZpPVdCMFl5WHA4NURGaSZzPWNvbnN1bWVyc2VjcmV0Jng9OTY-";
		$url = "http://jlp.yahooapis.jp/FuriganaService/V1/furigana?appid=$app_id&grade=1&sentence=$sen";
		
		//REF http://book.cakephp.org/2.0/en/core-utility-libraries/xml.html
		$xml = Xml::build($url);
		
		//REF check if the object exists http://stackoverflow.com/questions/1560827/php-simplexml-check-if-a-child-exists
		
// 		debug($xml);
// 		debug($xml->getName());
		
// 		debug($xml->children());

// 		debug($xml['Result']);
		
// 		debug($xml->Result->children());
// 		debug($xml->Result->WordList->Word->count());
// 		debug($xml->Result->WordList->Word->children());
		
		$children = $xml->Result->WordList->Word->children();
		
// 		$first = $xml->Result->WordList->Word->first();
		$first = $xml->Result->WordList->Word[1];
		
		$words = $xml->Result->WordList->Word;
		
// 		debug($words->count());
		
// 		foreach ($words as $w) {
			
// 			debug($w);
// // 			debug("word => ".$w);
// 		}
		
		
// 		debug($children->count());
// 		debug($children);
		
// 		foreach ($children as $child) {
			
// 			debug($child);
// 		}
		
// 		debug($xml->Result->WordList->Word);
		
		$this->Session->setFlash("get_rubi => done", "flashes/flash_done");
// 		$this->Session->setFlash("get_rubi => done", "flash_done");
// 		$this->Session->setFlash("get_rubi => done");
		
		/*******************************
			view
		*******************************/
// 		return $this->redirect(
// 				array(
// 						'controller' => 'admins',
// 						'action' => 'index'
// 				));
	}
	
}//class ArticlesController extends AppController

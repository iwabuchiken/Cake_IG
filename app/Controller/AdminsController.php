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
			xml
		*******************************/
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
		
		foreach ($words as $w) {
			
			debug($w);
// 			debug("word => ".$w);
		}
		
		
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

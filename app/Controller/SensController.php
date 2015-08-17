<?php

class SensController extends AppController {

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
		
		$this->set('sens', $this->paginate('Sen'));
		
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

		//debug
		$msg = "add() => starts";
		
		Utils::write_Log(
						Utils::get_dPath_Log(),
						$msg,
						__FILE__, __LINE__);

		// add instance
		if ($this->request->is('post')) {
			
			$this->Sen->create();
			
			$this->request->data['Sen']['created_at'] =
						Utils::get_CurrentTime2(CONS::$timeLabelTypes["rails"]);
			
			$this->request->data['Sen']['updated_at'] =
						Utils::get_CurrentTime2(CONS::$timeLabelTypes["rails"]);
			
			if ($this->Sen->save($this->request->data)) {
				
				$this->Session->setFlash(
						__("Sen saved => ".$this->request->data['Sen']['word']));
// 				$this->Session->setFlash(__('Your sen has been saved.'));
				return $this->redirect(array('action' => 'index'));
				
			}
			$this->Session->setFlash(__('Unable to add your sen.'));
			
		} else {
			
		}
		
	}//public function add()

	public function add_by_submission() {

		//debug
		$msg = "add() => starts";
		
		Utils::write_Log(
						Utils::get_dPath_Log(),
						$msg,
						__FILE__, __LINE__);

		// add instance
		if ($this->request->is('post')) {
			
			$this->Sen->create();
			
			$this->request->data['Sen']['created_at'] =
						Utils::get_CurrentTime2(CONS::$timeLabelTypes["rails"]);
			
			$this->request->data['Sen']['updated_at'] =
						Utils::get_CurrentTime2(CONS::$timeLabelTypes["rails"]);
			
			if ($this->Sen->save($this->request->data)) {
				
				$this->Session->setFlash(
						__("Sen saved => ".$this->request->data['Sen']['word']));
// 				$this->Session->setFlash(__('Your sen has been saved.'));
// 				return $this->redirect(array('action' => 'index'));

				// set response string
				$this->set("response", "saved");
				
				//debug
				$msg = "saved => ".$this->request->data['Sen']['text'];
				
				Utils::write_Log(
							Utils::get_dPath_Log(),
							$msg,
							__FILE__, __LINE__);
							
				return;
				
			} else {
				
				// set response string
				$this->set("response", "not saved");
				
				//debug
				$msg = "NOT saved => ".$this->request->data['Sen']['text'];
				
				Utils::write_Log(
						Utils::get_dPath_Log(),
						$msg,
						__FILE__, __LINE__);
				
			}
			
		} else {

			// set response string
			$this->set("response", "no post method");
			
			//debug
			$msg = "no post method";
			
			Utils::write_Log(
						Utils::get_dPath_Log(),
						$msg,
						__FILE__, __LINE__);
			
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
			throw new NotFoundException(__('Invalid text'));
		}
	
		/****************************************
			* Video
		****************************************/
		$video = $this->Video->findById($id);
		if (!$video) {
			throw new NotFoundException(__('Invalid video'));
		}
	
		if (count($this->params->data) != 0) {
				
			$this->Video->id = $id;
				
			$this->params->data['Video']['updated_at'] =
						Utils::get_CurrentTime2(CONS::$timeLabelTypes["rails"]);
				
			if ($this->Video->save($this->request->data)) {
	
				$this->Session->setFlash(__('Your video has been updated.'));
				return $this->redirect(
						array(
								'action' => 'view',
								$id));
	
			}//if ($this->Text->save($this->request->data))
				
			$this->Session->setFlash(__('Unable to update your video.'));
				
		}
	
		if (!$this->request->data) {
			$this->request->data = $video;;
		}
	
	}//public function edit($id = null)
	
	public function get_keywords_mix($num = 3) {
// 	public function get_keywords_mix($num) {
		
		Utils::write_Log(
					Utils::get_dPath_Log(),
					"get_keywords_mix: num = ".$num,
					__FILE__, __LINE__);
		
		/*******************************
			get: all keywords
		*******************************/
		$keywords = $this->Keyword->find('all');
// 		$keywords = count($this->Keyword->find('all'));
		
		/*******************************
			get keywords: num
		*******************************/
		// get total number
		$total = count($keywords);

// 		debug("total => ");
		
// 		debug($total);
		
		// adjust number
		$num = ($num > $total) ? $total : $num;
		
// 		debug("num => adjusted");
		
// 		debug($num);
		
		srand(time());
		
		// id array
		$ids = array();
		
		// found
		$found = 0;
		
		while($found < $num) {
			
			$id = rand(0, $total - 1);
			
			if (!in_array($id, $ids)) {
				
				array_push($ids, $id);
				
				$found += 1;
				
			}
			
		}
		
// 		for ($i = 0; $i < $num; $i++) {
			
// 			$id = rand(0, $total - 1);
			
// 			array_push($ids, $id);
			
// 		}
		
// 		debug($ids);
		
// 		debug(time());
		
		/*******************************
			build: keywords list
		*******************************/
		$kw_selected = array();
		
		foreach ($ids as $i) {
			
			array_push($kw_selected, $keywords[$i]);
			
		}

		/*******************************
			set
		*******************************/
		$this->set('kw_selected', $kw_selected);
		
		
// 		debug($kw_selected);
		
		/*******************************
			render
		*******************************/
		$this->layout = 'plain';
		
	}
	
	public function get_keywords_mix_Main() {
		
	}
	
}//class ArticlesController extends AppController

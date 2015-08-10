<?php

class KeywordsController extends AppController {

	public function 
	index() {

	}

	public function view($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Invalid video'));
		}
	
		$video = $this->Video->findById($id);
		if (!$video) {
			throw new NotFoundException(__('Invalid video'));
		}
		
		$this->set('video', $video);
		
		/******************************
		
			positions
		
		******************************/
		$this->loadModel('Position');
			
		$positions = $this->Position->find('all',
							//REF conditions http://book.cakephp.org/2.0/en/models/retrieving-your-data.html#find
							array(
								'conditions' => array(
													'Position.video_id' => $id
			
												)
// 								,
// 								'order' => array('Position.point ASC')
							)
		);
		
		
		$positions = $this->sort_Position_by_Point($positions);
// 		$res = $this->sort_Position_by_Point($positions);

// 		debug($positions);
		
// 		if ($res == true) {
		
// 			debug("sort done");
			
// 		} else {
		
// 			debug("sort not done");
		
// 		}

		//REF http://blogs.bigfish.tv/adam/2008/03/24/sorting-with-setsort-in-cakephp-12/
		//REF referer http://cakephp.1045679.n5.nabble.com/Using-usort-in-Cake-td1327099.html Aug 10, 2009; 11:32pm
// 		$positions = Set::sort($positions, '{n}.Position.point', 'asc');
		
		$this->set('positions', $positions);
		
		/******************************
		
			test: SimpleXMLElement
		
		******************************/
		$this->_test_SimpleXMLElement();
// 		$this->_test_DOMXML();

		
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
			throw new NotFoundException(__('Invalid video id'));
		}
	
		$video = $this->Video->findById($id);
	
		if (!$video) {
			throw new NotFoundException(__("Can't find the video. id = %d", $id));
		}
	
		/******************************
	
		delete
	
		******************************/
		if ($this->Video->delete($id)) {
			// 		if ($this->Video->save($this->request->data)) {
				
			$this->Session->setFlash(__("Video deleted => %s", $video['Video']['title']));
				
			return $this->redirect(
					array(
							'controller' => 'videos',
							'action' => 'index'
							
					));
				
		} else {
				
			$this->Session->setFlash(
					__("Video can't be deleted => %s", $video['Video']['title']));
				
			// 			$page_num = _get_Page_from_Id($id - 1);
				
			return $this->redirect(
					array(
							'controller' => 'videos',
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
	
}//class ArticlesController extends AppController

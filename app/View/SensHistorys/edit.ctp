<!-- File: /app/View/Posts/add.ctp -->

<h1>Edit Sen</h1>

<?php

	$opt_input_text = array(
			'type'	=> 'input',
			// 						'type'	=> 'textarea',
			'cols'	=> 5,
			'rows'	=> 3,
			
			'style'	=> "width: 60%; background-color: bisque;",
// 			'style'	=> "width: 60%; background-color: antiquewhite;",
			
			// 						'options'	=> $select_Genres,
	// 						//REF http://satussy.blogspot.jp/2011/07/cakephp-select.html "見つけた方法は"
	// 						'selected'	=> $genre_id,
				
// 			'label'		=> false,
// 			'name'		=> "memo",
// 			'div'		=> false,
			'onmouseover' => 'this.select()',
				
			// 						'class'		=> 'select_genre'
	);

	$opt_input_memo = array(
			'type'	=> 'input',
			// 						'type'	=> 'textarea',
			'cols'	=> 5,
			'rows'	=> 1,
			
			'style'	=> "width: 60%; background-color: lightgreen;",
			
			// 						'options'	=> $select_Genres,
	// 						//REF http://satussy.blogspot.jp/2011/07/cakephp-select.html "見つけた方法は"
	// 						'selected'	=> $genre_id,
				
// 			'label'		=> false,
// 			'name'		=> "memo",
// 			'div'		=> false,
			'onmouseover' => 'this.select()',
				
			// 						'class'		=> 'select_genre'
	);

	$opt_input_kws = array(
			'type'	=> 'input',
			// 						'type'	=> 'textarea',
			'cols'	=> 5,
			'rows'	=> 1,
			
			'style'	=> "width: 60%; background-color: lightsteelblue;",
			// 						'options'	=> $select_Genres,
	// 						//REF http://satussy.blogspot.jp/2011/07/cakephp-select.html "見つけた方法は"
	// 						'selected'	=> $genre_id,
				
// 			'label'		=> false,
// 			'name'		=> "memo",
// 			'div'		=> false,
			'onmouseover' => 'this.select()',
				
			// 						'class'		=> 'select_genre'
	);

	echo $this->Form->create('Sen', array('type' => 'post'));
	echo $this->Form->input('text', $opt_input_text);
	echo $this->Form->input('kws', $opt_input_kws);
	
	echo $this->Form->input('memo', $opt_input_memo);
// 	echo $this->Form->input('memo');
	
	// REF http://stackoverflow.com/questions/19213165/cakephp-hidden-input-field answered Oct 6 '13 at 19:51
	echo $this->Form->input('updated_at', array(
								'type' => 'hidden',
								'value'	=> Utils::get_CurrentTime2(CONS::$timeLabelTypes["basic"])
	));
	
	echo $this->Form->input('id', array(
								'type' => 'hidden',
								'value'	=> $sen['Sen']['id']
	));


// echo $this->Form->select(
// 					'Lang id',
// 					$select_Langs,
// 					21,
// 					reset(array_keys($select_Langs)),
// 					array('empty' => false));

// echo $this->Form->input('Lang');
// echo $this->Form->input('lang_id');


echo $this->Form->end('Update sen');
?>

<br>

<?php echo $this->Html->link(
    'Back to list',
    array('controller' => 'sens', 'action' => 'index')
); ?>

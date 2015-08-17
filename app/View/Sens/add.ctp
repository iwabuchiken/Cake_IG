<h1>Add Sen</h1>
<?php

	$opt_input_memo = array(
				
// 			'onmouseover' => 'show_msg();',
			'onmouseover' => 'this.select();',
// 			'onmouseover' => 'this.select(); show_msg();',
			'rows' => '1',
			
			'class'	=> 'add_name'
// 			'cols'	=> '10'
// 			'width'	=> '100px'
// 			'columns'	=> '5'
			
	);

	$opt_input_genre = array(
				
			'onmouseover' => 'this.select()',
			
			'id'		=> "genre",
			
	);

	$opt_input_category = array(
				
// 			'onmouseover' => 'this.select()',
// 			'rows' => '3',
			
			'id'		=> "category"
			
			
	);

	echo $this->Form->create('Sen');
	
	echo $this->Form->input('text', $opt_input_memo);
	
	echo $this->Form->input('kws', $opt_input_memo);
	
	echo $this->Form->input('memo', $opt_input_memo);
	
	echo $this->Form->end('Save Sen');
	
?>

<hr>

<?php echo $this->Html->link("Back to list",
							array(
								'controller' => 'sens', 
								'action' => 'index')
							); 
?>


<!-- <div id="add_kw_ajax">abc</div> -->
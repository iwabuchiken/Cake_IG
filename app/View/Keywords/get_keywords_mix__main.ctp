<!-- <button type="button" onclick="get_kw_mix()">Click Me!</button> -->

<a class="button" onclick="get_kw_mix()">Click Me!</a>

<br>
<br>

<?php 



// $options_Submit = array(
// 		'label' => 'Mix',
// 		'id' => 'submit',
// 		'onclick' => "get_kw_mix()"
// // 		'onclick' => "show_msg()"
// // 		'onclick' => "alert('YES')"
// );

// echo $this->Form->create('Get mix');

// //REF http://stackoverflow.com/questions/6360767/form-end-without-a-div-in-cakephp answered Jun 15 '11 at 17:06
// echo $this->Form->submit("Get mix", $options_Submit);
// // echo $this->Form->submit("Get mix");

?>

<div id="message_area">Message</div>

<br>

<div id="area_composition">

	<?php 
	
		$opt = array(
		
		// 			'onmouseover' => 'show_msg();',
				'onmouseover' => 'this.select();',
				// 			'onmouseover' => 'this.select(); show_msg();',
				'rows' => '1',
					
				'div'	=> null,

				'class'	=> 'add_name'
				// 			'cols'	=> '10'
		// 			'width'	=> '100px'
		// 			'columns'	=> '5'
					
					
		);
		
		echo $this->Form->input('Compose', $opt);
		
	?>

	<a class="button" onclick="">Submit</a>
	
</div>

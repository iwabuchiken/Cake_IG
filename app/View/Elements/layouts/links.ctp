<br>
<br>

<table id="links">
	<tr>
	
		<td>
		
			<?php echo $this->Html->link(
								'Keywords',
								array('controller' => 'keywords', 
										'action' => 'index'),
								array('class' => "button_2"));
			?>
			
		</td>

		<td>
		
			<?php echo $this->Html->link(
								'Sentences',
								array('controller' => 'sens', 
										'action' => 'index'),
								array('class' => "button_2"));
			?>
			
		</td>

		<td>
		
			<?php echo $this->Html->link(
								'Admins',
								array('controller' => 'admins', 
										'action' => 'index'),
								array('class' => "button_2"));
			?>
			
		</td>

	</tr>
	
</table>

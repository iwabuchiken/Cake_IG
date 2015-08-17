<h1>
	Sens 
</h1>



<table>

	<?php echo $this->element('sens/index_t_headers'); ?>

		<!-- Here is where we loop through our $sens array, printing out post info -->

	<?php echo $this->element('sens/index_t_entries'); ?>
		
</table>

<?php echo $this->Html->link("Add sen",
							array(
								'controller' => 'sens', 
								'action' => 'add')
							); 
?>


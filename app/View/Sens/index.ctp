<h1>
	Sens (<a href="#bottom">Bottom</a><a name="top"></a>)
</h1>

<?php echo $this->element('sens/index/_index_pagination')?>
<br>

<table>

	<?php echo $this->element('sens/index_t_headers'); ?>

		<!-- Here is where we loop through our $sens array, printing out post info -->

	<?php echo $this->element('sens/index_t_entries'); ?>
		
</table>

<?php echo $this->element('sens/index/_index_pagination')?>

<br>
(<a href="#top">Top</a><a name="bottom"></a>)
<br>
<br>

<?php echo $this->Html->link("Add sen",
							array(
								'controller' => 'sens', 
								'action' => 'add')
							); 
?>


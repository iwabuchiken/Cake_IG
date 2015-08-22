<h1>
	Admins  (<a href="#bottom">Bottom</a><a name="top"></a>)
</h1>


<?php echo $this->element('sens/index/_index_pagination')?>

<br>

<table>

	<?php echo $this->element('admins/index_t_headers'); ?>

		<!-- Here is where we loop through our $admins array, printing out post info -->

	<?php echo $this->element('admins/index_t_entries'); ?>
		
</table>

<br>

<?php echo $this->element('sens/index/_index_pagination')?>

<br>
(<a href="#top">Top</a><a name="bottom"></a>)

<br>
<br>

<?php echo $this->Html->link("Add admin",
							array(
								'controller' => 'admins', 
								'action' => 'add',
								),
							array('class'		=> 'link')
							
							); 
?>

|

<?php echo $this->Html->link("Get rubi",
							array(
								'controller' => 'admins', 
								'action' => 'get_rubi',
								),
							array('class'		=> 'link')
							
							); 
?>

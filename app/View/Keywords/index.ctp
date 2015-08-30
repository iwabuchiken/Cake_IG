<h1>
	Keywords  (<a href="#bottom">Bottom</a><a name="top"></a>)
</h1>


<?php echo $this->element('sens/index/_index_pagination')?>

<br>

<table>

	<?php echo $this->element('keywords/index_t_headers'); ?>

		<!-- Here is where we loop through our $keywords array, printing out post info -->

	<?php echo $this->element('keywords/index_t_entries'); ?>
		
</table>

<br>

<?php echo $this->element('sens/index/_index_pagination')?>

<br>
(<a href="#top">Top</a><a name="bottom"></a>)

<br>
<br>

<?php echo $this->Html->link("Add keyword",
							array(
								'controller' => 'Keywords', 
								'action' => 'add'),
							array(
								'class'	=> 'button')
							); 

	echo $this->Html->link("keyword mix",
							array(
								'controller' => 'Keywords', 
								'action'	=> 'get_keywords_mix_Main',
								),
							array(
									'class'	=> 'button')
							); 

	echo $this->Html->link("Add bulk",
							array(
								'controller' => 'Keywords', 
								'action'	=> 'add_bulk',
								),
							array(
									'class'	=> 'button')
							); 
?>


<h1>
	Keywords 
</h1>

<table>

	<?php echo $this->element('keywords/index_t_headers'); ?>

		<!-- Here is where we loop through our $keywords array, printing out post info -->

	<?php echo $this->element('keywords/index_t_entries'); ?>
		
</table>

<?php echo $this->Html->link("Add keyword",
							array(
								'controller' => 'keywords', 
								'action' => 'add')
							); 
?>
|
<?php echo $this->Html->link("keyword mix",
							array(
								'controller' => 'keywords', 
								'action'	=> 'get_keywords_mix',
								3)
// 								'num'		=> 4)
							); 
?>


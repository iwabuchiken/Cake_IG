<h1>
	rubi  (<a href="#bottom">Bottom</a><a name="top"></a>)
</h1>



<br>
(<a href="#top">Top</a><a name="bottom"></a>)

<br>
<br>

<?php //print_r($ResultSet); ?>

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

<?php foreach ($sens as $sen): ?>
<tr>
		<td class="td_id">
		
			<?php 
				echo $sen['Sen']['id']; 
			?>
			
		</td>
		
		<td>
			<?php echo $this->Html->link($sen['Sen']['text'],
							array(
								'controller' => 'sens', 
								'action' => 'view', 
								$sen['Sen']['id'])
							); ?>
		</td>
		
		<td class="td_news_time"><?php echo $sen['Sen']['kws']; ?></td>
		
		<td class="td_news_time"><?php echo $sen['Sen']['memo']; ?></td>
		
		<td class="td_news_time"><?php echo $sen['Sen']['created_at']; ?></td>
		<td class="td_news_time"><?php echo $sen['Sen']['updated_at']; ?></td>
		
		<td class="td_news_time">
				<?php //echo $sen['Sen']['updated_at']; ?>
				
				<?php echo $this->Html->link(
						'Go',
						array(
								'controller' => 'sens', 
								'action' => 'delete', 
								$sen['Sen']['id']
						),
						array(
								// 							'style'	=> 'color: blue'
	// 							'class'		=> 'link_word_alert'
						),
							
						//REF http://stackoverflow.com/questions/22519966/cakephp-delete-confirmation answered Mar 19 at 23:18
						__("Delete? => %s", $sen['Sen']['text'])
		
					);
				?>
		</td>
		
</tr>
<?php endforeach; ?>
<?php unset($sen); ?>

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
		
</tr>
<?php endforeach; ?>
<?php unset($sen); ?>

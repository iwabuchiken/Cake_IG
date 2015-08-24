<?php foreach ($keywords as $keyword): ?>
<tr>
		<td class="td_id">
		
			<?php 
				echo $keyword['Keyword']['id']; 
			?>
			
		</td>
		
		<td>
			<?php echo $this->Html->link($keyword['Keyword']['word'],
							array(
								'controller' => 'keywords', 
								'action' => 'view', 
								$keyword['Keyword']['id'])
							); ?>
		</td>
		
		<td class="td_news_time"><?php echo $keyword['Keyword']['rubi']; ?></td>
		
		<td class="td_news_time"><?php echo $keyword['Keyword']['genre_id']; ?></td>
		<td class="td_news_time"><?php echo $keyword['Keyword']['type_id']; ?></td>
		<td class="td_news_time"><?php echo $keyword['Keyword']['memo']; ?></td>
		
		<td class="td_news_time"><?php echo $keyword['Keyword']['created_at']; ?></td>
		<td class="td_news_time"><?php echo $keyword['Keyword']['updated_at']; ?></td>
		
</tr>
<?php endforeach; ?>
<?php unset($keyword); ?>

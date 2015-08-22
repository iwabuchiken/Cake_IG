<?php foreach ($admins as $admin): ?>
<tr>
		<td class="td_id">
		
			<?php 
				echo $admin['Admin']['id']; 
			?>
			
		</td>
		
		<td>
			<?php echo $this->Html->link($admin['Admin']['name'],
							array(
								'controller' => 'admins', 
								'action' => 'view', 
								$admin['Admin']['id'])
							); ?>
		</td>
		
		
		<td class="td_news_time"><?php echo $admin['Admin']['val1']; ?></td>
		<td class="td_news_time"><?php echo $admin['Admin']['val2']; ?></td>
		
		<td class="td_news_time"><?php echo $admin['Admin']['created_at']; ?></td>
		<td class="td_news_time"><?php echo $admin['Admin']['updated_at']; ?></td>
		
</tr>
<?php endforeach; ?>
<?php unset($admin); ?>

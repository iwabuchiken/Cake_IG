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
		
		<td class="td_news_time">
		
			<?php 
			
				$kws = $sen['Sen']['kws'];
				
				if ($kws == null || $kws == "") {
				
					$words = "-";
				
				} else {
				
					$ids = explode(" ", $kws);
	
					$word = "";
					
					if (count($ids) == 1) {
					
						$words = $this->Keyword->conv_KwID_2_Words((string)$ids[0]);
// 						$words = $ids[0];
					
					} else {
					
						$cnt_ids = count($ids);
						
						$words = $this->Keyword->conv_KwID_2_Words((string)$ids[0]);
// 						$words = $ids[0];
						
						for ($i = 1; $i < $cnt_ids; $i++) {
							
							$words .= 
									" ".$this->Keyword->conv_KwID_2_Words((string)$ids[$i]);
// 							$words .= " ".$ids[$i];
							
						}
						
					}//if (count($ids) == 1)
					
					
					
// 					$word = $this->Keyword->conv_KwID_2_Words((string)$ids[0]);
					
					
				}//if ($kws == null || $kws == "")
				

				echo $words;
				
// 				debug($word);
				
// 				$word = $this->Main->conv_KwID_2_Words((string)$ids[0]);
				
// 				$words = array();
				
// 				for ($i = 0; $i < 3; $i++) {
					
// 					array_push()

// 				}
			
// 				echo $sen['Sen']['kws']; 
				
			?>
			
		</td>
		
		<td class="td_news_time"><?php echo $sen['Sen']['memo']; ?></td>
		
		<td class="td_news_time"><?php echo $sen['Sen']['created_at']; ?></td>
		<td class="td_news_time"><?php echo $sen['Sen']['updated_at']; ?></td>
		
		<td class="td_news_time">
				<?php //echo $sen['Sen']['updated_at']; ?>
				
				<?php echo $this->Html->link(
						'Go',
						array(
								'controller' => 'sens', 
								'action' => 'edit', 
								$sen['Sen']['id']
						),
						array(
								// 							'style'	=> 'color: blue'
	// 							'class'		=> 'link_word_alert'
						)
							
// 						//REF http://stackoverflow.com/questions/22519966/cakephp-delete-confirmation answered Mar 19 at 23:18
// 						__("Delete? => %s", $sen['Sen']['text'])
		
					);
				?>
		</td>
		
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

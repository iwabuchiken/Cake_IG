<h1><?php echo h($sen['Sen']['id']); ?></h1>

<table class="table_show">
  <tr>
    <td class="td_label_narrow">ID</td>
    <td class="td_value_mideum"><?php echo $sen['Sen']['id']; ?></td>
  </tr>
  <tr>
    <td class="td_label_narrow">name</td>
    <td class="td_value_mideum"><?php echo $sen['Sen']['text']; ?></td>
  </tr>
  
  <tr>
    <td class="td_label_narrow">Keywords</td>
    
    <td class="td_value_mideum">

    	<?php 
    	
    		$kws = $sen['Sen']['kws'];
    		
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
// 		    				" "
		    				" | "
		    				.$this->Keyword->conv_KwID_2_Words((string)$ids[$i]);
    					
    			}
    		
    		}//if (count($ids) == 1)
    		
    		echo $words;
    	
//     		echo $sen['Sen']['kws']
    		
    	?>
    
    </td>
    
  </tr>
  
  <tr>
    <td class="td_label_narrow">Memo</td>
    
    <td class="td_value_mideum">

    	<?php echo $sen['Sen']['memo']?>
    
    </td>
    
  </tr>
  
</table>

<p>
	<?php echo $this->Html->link(
					'Delete sen',
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

</p>

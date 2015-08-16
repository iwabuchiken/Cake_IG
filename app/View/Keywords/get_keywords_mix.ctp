<?php 

// 	echo json_encode($kw_selected);

?>

<table id="table_kw_selected" bordr="4" style="width: 40%;">
<!-- <table id="table_kw_selected" style="border: 1"> -->

	<tr>
		<td
			style="color: black; border: 1px solid black; width: 10%; text-align: center;"
		>
			Word
		</td>
	
		<?php foreach ($kw_selected as $kw) { ?>
		<td 
			style="color: blue; border: 1px solid black; width: 10%; text-align: center;" 
			class="td_basic_1"
			>
		
			<?php 
				echo $kw['Keyword']['word'];
			?>
			
		</td>
		<?php } ?>
	</tr>
	
	<!-- ID -->
	<tr>
		<td
			style="color: black; border: 1px solid black; width: 10%; text-align: center;"
		>
			ID
		</td>
	
		<?php foreach ($kw_selected as $kw) { ?>
		<td 
			style="color: blue; border: 1px solid black; width: 10%; text-align: center;" 
			class="td_basic_1"
			>
		
			<?php 
				echo $kw['Keyword']['id'];
			?>
			
		</td>
		<?php } ?>
	</tr>
	
	<!-- memo -->
	<tr>
		<td
			style="color: black; border: 1px solid black; width: 10%; text-align: center;"
		>
			Memo
		</td>
	
		<?php foreach ($kw_selected as $kw) { ?>
		<td 
			style="color: blue; border: 1px solid black; width: 10%; text-align: center;" 
			class="td_basic_1"
			>
		
			<?php 
				echo $kw['Keyword']['memo'];
			?>
			
		</td>
		<?php } ?>
	</tr>
	
	<!-- Genre -->
	<tr>
		<td
			style="color: black; border: 1px solid black; width: 10%; text-align: center;"
		>
			Genre
		</td>
	
		<?php foreach ($kw_selected as $kw) { ?>
		<td 
			style="color: blue; border: 1px solid black; width: 10%; text-align: center;" 
			class="td_basic_1"
			>
		
			<?php 
				echo $kw['Keyword']['genre_id'];
			?>
			
		</td>
		<?php } ?>
	</tr>
	
	<!-- Type -->
	<tr>
		<td
			style="color: black; border: 1px solid black; width: 10%; text-align: center;"
		>
			Type
		</td>
	
		<?php foreach ($kw_selected as $kw) { ?>
		<td 
			style="color: blue; border: 1px solid black; width: 10%; text-align: center;" 
			class="td_basic_1"
			>
		
			<?php 
				echo $kw['Keyword']['type_id'];
			?>
			
		</td>
		<?php } ?>
	</tr>
	

</table>
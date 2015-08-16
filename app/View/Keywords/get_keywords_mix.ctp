<?php 

// 	echo json_encode($kw_selected);

?>

<table class="table_kw_selected" bordr="4" style="width: 40%;">
<!-- <table id="table_kw_selected" bordr="4" style="width: 40%;"> -->
<!-- <table id="table_kw_selected" style="border: 1"> -->

	<tr>
		<td class="td_header"
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
		<td class="td_header"
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
		<td class="td_header"
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
		<td class="td_header"
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
		<td class="td_header"
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

<br>

<a class="button" onclick="show_composition_area()">Compose</a>
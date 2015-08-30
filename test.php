<?php

function sort_version_numbers() {
	
	$a = array("1.0", "10.0");

	print_r($a);
	

	echo "===== asort-ed ======";
	asort($a);
	print_r($a);
	
	echo "===== arsort-ed ======";
	arsort($a);
	print_r($a);
	
}

function execute() {

	sort_version_numbers();
	
}

execute();

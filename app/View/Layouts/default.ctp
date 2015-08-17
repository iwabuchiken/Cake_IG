<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
		<meta name="viewport"
           content="width=device-width,
			user-scalable=yes,
			initial-scale=0.30,
			minimum-scale=0.01,
                    maximum-scale=3.0" />
	
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');
		echo "\n";
		echo $this->Html->css('main');
		echo "\n";
		
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		
		echo "\n";
		echo "\n";
		
		echo $this->Html->script('http://code.jquery.com/jquery-1.10.2.min.js');
		echo "\n";
		echo $this->Html->script('main');
		echo "\n";
		// d3
		echo $this->Html->script('http://d3js.org/d3.v3.min.js');
		echo "\n";
		
		echo "\n";
		
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1><?php echo $this->Html->link($cakeDescription, 'http://cakephp.org'); ?></h1>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
			
			<br>
			<?php echo $this->element('layouts/links'); ?>
			
		</div>
		
		
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
				);
			?>
			<p>
				<?php echo $cakeVersion; ?>
			</p>
		</div>
	</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>

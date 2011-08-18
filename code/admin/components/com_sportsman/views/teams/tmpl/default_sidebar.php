<?php 

defined('KOOWA') or die( 'Restricted access' ); ?>

<div id="sidebar">
	<h3><?= @text('Divisions')?></h3>
	<?= @template('admin::com.sportsman.view.divisions.list', array('sports' =>  KFactory::tmp('admin::com.sportsman.model.divisions')->getDivisions())) ?>
</div>
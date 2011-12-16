<?php 

defined('KOOWA') or die( 'Restricted access' ); ?>

<div id="sidebar">
	<h3><?= @text('Divisions')?></h3>
	<?= @template('com://admin/sportsman.view.divisions.list', array('sports' =>  @service('com://admin/sportsman.model.tournaments')->getDivisions())) ?>
</div>
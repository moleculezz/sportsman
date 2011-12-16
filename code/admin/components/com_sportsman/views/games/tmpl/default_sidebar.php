<?php 

defined('KOOWA') or die( 'Restricted access' ); ?>

<div id="sidebar">
	<h3><?= @text('Tournaments')?></h3>
	<?= @template('com://admin/sportsman.view.tournaments.list', array('tournaments' =>  @service('com://admin/sportsman.model.tournaments')->set('enabled', 1)->getList())) ?>
</div>
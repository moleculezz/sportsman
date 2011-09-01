<?php

defined('KOOWA') or die('Restricted access'); ?>

<div id="sidebar">
	<h3><?= @text('Sports') ?></h3>
	<?= @template('com://admin/sportsman.view.sports.list', array('sports' => KFactory::get('com://admin/sportsman.model.sports')->getList())); ?>
</div>
<?php

defined('KOOWA') or die('Restricted access'); ?>

<div id="sidebar">
	<h3><?= @text('Sports') ?></h3>
	<?= @template('admin::com.sportsman.view.sports.list', array('sports' => KFactory::tmp('admin::com.sportsman.model.sports')->getList())); ?>
</div>
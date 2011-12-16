<?php
/**
 * @version     $Id: default.php 958 2011-09-29 14:04:27Z ercanozkaya $
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Files
 * @copyright   Copyright (C) 2011 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */
defined('KOOWA') or die( 'Restricted access' ); ?>

<?= KFactory::get('com://admin/files.controller.file')
	->container('sportsman-files')
	->layout('compact')
	->types(array('image'))
	->editor($state->editor)
	->display(); ?>

<script>
window.addEvent('domready', function() {
	var getImageString = function() {
		return document.id('image-url').get('value');
	};
	var insertImage = function() {
		var image = getImageString();
		window.parent.insertImageUrl( image );
	};
	
	document.id('insert-image').addEvent('click', function(e) {
		e.stop();
		insertImage();
		window.parent.SqueezeBox.close();
	});
	document.id('close-modal').addEvent('click', function(e) {
		e.stop();
		window.parent.SqueezeBox.close();
	});

	document.id('details').adopt(document.id('image-insert-form'));

	Files.app.grid.addEvent('clickImage', function(e) {
		var target = document.id(e.target).getParent('.files-node');
		var row = target.retrieve('row');
		
		document.id('image-url').set('value', Files.path.replace(/sites\/[^\/]+\//, '')+'/'+row.path);
	});
});
</script>

<div id="image-insert-form">
	<table class="properties">
		<tr>
			<td><label for="image-url"><?= @text('URL') ?></label></td>
			<td><input type="text" id="image-url" value="" /></td>
		</tr>
	</table>
	<div class="buttons">
		<button type="button" id="insert-image"><?= @text('Insert') ?></button>
		<button type="button" id="close-modal"><?= @text('Cancel') ?></button>
	</div>
</div>
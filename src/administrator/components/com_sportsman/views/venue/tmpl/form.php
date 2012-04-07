<?php

defined('KOOWA') or die('Restricted access') ?>

<?= @helper('behavior.validator') ?>

<style src="media://system/css/calendar-jos.css" />

<?= @template('com://admin/default.view.form.toolbar'); ?>

<form action="<?= @route('id='.$venue->id) ?>" method="post" id="venue-form" class="-koowa-form">
    <div class="grid_8">
        <div class="panel title group">
            <input class="inputbox required" type="text" name="title" id="title" size="40" maxlength="255" value="<?= @escape($venue->title) ?>" placeholder="<?= @text('Title') ?>" />
        </div>
    </div>
    <div class="grid_4">
        <div class="panel">
            <h3><?= @text( 'Publish' ); ?></h3>
            <table class="admintable">
                <tr>
                    <td class="key">
                        <label for="club" class="mainlabel"><?= @text('Club'); ?></label>
                    </td>
                    <td>
                        <?=@helper('listbox.clubs', array('name' => 'sportsman_club_id', 'selected' => $venue->sportsman_club_id, 'attribs' => array('class' => 'required'))); ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</form>
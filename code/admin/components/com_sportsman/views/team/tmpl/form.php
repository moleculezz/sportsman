<?php

defined('KOOWA') or die('Restricted access') ?>

<style src="media://system/css/calendar-jos.css" />

<form action="<?= @route('id='.$team->id) ?>" method="post" id="division-form" class="-koowa-form">
    <div class="grid_8">
        <div class="panel title group">
            <input class="inputbox required" type="text" name="title" id="title" size="40" maxlength="255" value="<?= @escape($team->title) ?>" placeholder="<?= @text('Name') ?>" />
        </div>
    </div>
    <div class="grid_4">
        <div class="panel">
            <h3><?= @text( 'Details' ); ?></h3>
            <table class="admintable">
                <tr>
                    <td class="key">
                        <label for="sponsor"><?= @text('Sponsor') ?></label>
                    </td>
                    <td>
                        <input class="inputbox required" type="text" name="sponsor" id="sponsor" size="25" maxlength="255" value="<?= @escape($team->sponsor) ?>" />
                    </td>
                </tr>
                <tr>
                    <td class="key">
                        <label for="enabled">
                            <?= @text( 'Published' ) ?>:
                        </label>
                    </td>
                    <td>
                        <?= @helper('select.booleanlist', array('name' => 'enabled', 'selected' => $team->enabled)) ?>
                    </td>
                </tr>
                <tr>
                    <td class="key">
                        <label for="created_on"><?= @text('Created on') ?></label>
                    </td>
                    <td>
                        <?= @helper('behavior.calendar', array('date' => $team->created_on, 'name' => 'created_on')); ?>
                    </td>
                </tr>
                <tr>
                    <td class="key">
                        <label for="ended_on"><?= @text('Ended on') ?></label>
                    </td>
                    <td>
                        <?= @helper('behavior.calendar', array('date' => $team->ended_on, 'name' => 'ended_on')); ?>
                    </td>
                </tr>
            </table>
        </div>
        <div class="panel folders group">
            <h3><?= @text('Divisions') ?></h3>
            <?= @template('form_divisions', array('list' =>  KFactory::get('com://admin/sportsman.model.divisions')->getDivisions(), 'team' => $team)) ?>
        </div>
    </div>
</form>
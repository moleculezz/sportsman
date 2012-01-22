<?php

defined('KOOWA') or die('Restricted access') ?>

<style src="media://system/css/calendar-jos.css" />

<form action="<?= @route('id='.$tournament->id.'&active='.$tournament->active) ?>" method="post" id="division-form" class="-koowa-form">
    <div class="grid_8">
        <div class="panel title group">
            <input class="inputbox required" type="text" name="title" id="title" size="40" maxlength="255" value="<?= @escape($tournament->title) ?>" placeholder="<?= @text('Name') ?>" />
        </div>
    </div>
    <div class="grid_4">
        <div class="panel">
            <h3><?= @text( 'Details' ); ?></h3>
            <table class="admintable">
                <tr>
                    <td class="key">
                        <label for="enabled">
                            <?= @text( 'Published' ) ?>:
                        </label>
                    </td>
                    <td>
                        <?= @helper('select.booleanlist', array('name' => 'enabled', 'selected' => $tournament->enabled)) ?>
                    </td>
                </tr>
                <tr>
                    <td class="key">
                        <label for="created_on"><?= @text('Created on') ?></label>
                    </td>
                    <td>
                        <?= @helper('behavior.calendar', array('date' => $tournament->created_on, 'name' => 'created_on')); ?>
                    </td>
                </tr>
                <tr>
                    <td class="key">
                        <label for="ended_on"><?= @text('Ended on') ?></label>
                    </td>
                    <td>
                        <?= @helper('behavior.calendar', array('date' => $tournament->ended_on, 'name' => 'ended_on')); ?>
                    </td>
                </tr>
            </table>
        </div>
        <div class="panel folders group">
            <h3><?= @text('Divisions') ?></h3>
            <?= @template('form_divisions', array('list' =>  @service('com://admin/sportsman.model.divisions')->getDivisions())) ?>
        </div>
    </div>
</form>
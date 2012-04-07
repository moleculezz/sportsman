<?php

defined('KOOWA') or die('Restricted access') ?>

<?= @helper('behavior.validator') ?>

<style src="media://system/css/calendar-jos.css"/>
<style src="media://com_sportsman/css/form.css"/>
<?= @template('com://admin/default.view.form.toolbar') ?>

<form action="" method="post" id="division-form" class="-koowa-form">
    <div class="grid_8">
        <div class="panel title group">
            <label for="users_member_id"><?= @text('Name'); ?></label>
            <?= @helper('com://admin/sportsman.template.helper.listbox.members', array(
            'autocomplete' => true,
            'text'         => 'name',
            'name'         => 'users_member_id'
        )) ?>


        </div>
        <div class="panel title">
            <label for="sportsman_team_id"><?= @text('Team'); ?></label>
            <?= @helper('com://admin/sportsman.template.helper.listbox.teams', array(
            'autocomplete' => true,
            'text'         => 'title',
            'name'         => 'sportsman_team_id'
        )) ?>
        </div>
        <div class="panel">
            <h3><?= @text('Details'); ?></h3>
            <table class="admintable">
                <tr>
                    <td class="key">
                        <label for="type">
                            <?= @text('Type') ?>:
                        </label>
                    </td>
                    <td>
                        <?=@helper('listbox.members_type', array('name'     => 'type',
                                                                 'selected' => $teammember->type)); ?>
                    </td>
                </tr>
                <tr>
                    <td class="key">
                        <label for="jersey_number">
                            <?= @text('Jersey Number') ?>:
                        </label>
                    </td>
                    <td>
                        <input class="validate-integer maxLength:2" type="text" name="jersey_number"
                               value="<?= $teammember->jersey_number ?>" size="3"/>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="grid_4">
        <div class="panel">
            <h3><?= @text('Details'); ?></h3>
            <table class="admintable">
                <tr>
                    <td class="key">
                        <label for="created_on"><?= @text('Created on') ?></label>
                    </td>
                    <td>
                        <?= @helper('behavior.calendar', array('date' => $teammember->created_on,
                                                               'name' => 'created_on')); ?>
                    </td>
                </tr>
                <tr>
                    <td class="key">
                        <label for="ended_on"><?= @text('Ended on') ?></label>
                    </td>
                    <td>
                        <?= @helper('behavior.calendar', array('date' => $teammember->ended_on,
                                                               'name' => 'ended_on')); ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</form>
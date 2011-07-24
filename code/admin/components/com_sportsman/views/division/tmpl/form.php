<?php

defined('KOOWA') or die('Restricted access') ?>

<form action="<?= @route('id='.$division->id) ?>" method="post" id="division-form" class="-koowa-form">
    <div class="grid_8">
        <div class="panel title group">
            <input class="inputbox required" type="text" name="title" id="title" size="40" maxlength="255" value="<?= @escape($division->title) ?>" placeholder="<?= @text('Name') ?>" />
        </div>
    </div>
    <div class="grid_4">
        <div class="panel">
            <h3><?= @text( 'Publish' ); ?></h3>
            <table class="admintable">
                <tr>
                    <td class="key">
                        <label for="enabled">
                            <?= @text( 'Published' ) ?>:
                        </label>
                    </td>
                    <td>
                        <?= @helper('select.booleanlist', array('name' => 'enabled', 'selected' => $division->enabled)) ?>
                    </td>
                </tr>
                <tr>
                    <td class="key">
                        <label for="port" class="mainlabel"><?= @text('Sport'); ?></label>
                    </td>
                    <td>
                        <?=@helper('listbox.sports', array('name' => 'sport', 'selected' => $division->sportsman_sport_id)); ?>
                    </td>
                </tr>
            </table>
            
            
            
        </div>
    </div>
</form>
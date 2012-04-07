<?php

defined('KOOWA') or die('Restricted access') ?>

<?= @template('com://admin/default.view.grid.toolbar') ?>
<form action="<?= @route() ?>" method="get" class="-koowa-grid">
    <table class="adminlist">
        <thead>
        <tr>
            <th width="10"></th>
            <th>
                <?= @helper('grid.sort', array('column' => 'Title')); ?>
            </th>
            <th width="7%">
                <?= @helper('grid.sort', array('column' => 'enabled')) ?>
            </th>
        </tr>
        <tr>
            <td align="center">
                <?=@helper('grid.checkall');?>
            </td>
            <td></td>
            <td></td>
        </tr>
        </thead>
        <tbody>
        <? foreach ($sports as $sport) : ?>
        <tr data-readonly="<?= $sport->getStatus() == 'deleted' ? '1' : '0' ?>">
            <td align="center">
                <?= @helper('grid.checkbox', array('row' => $sport)) ?>
            </td>
            <td>
                <?= @escape($sport->title) ?>
            </td>
            <td align="center">
                <?= @helper('grid.enable', array('row' => $sport)) ?>
            </td>
        </tr>
        <? endforeach; ?>
        <? if (!count($sports)) : ?>
        <tr>
            <td colspan="7" align="center">
                <?= @text('No Items Found'); ?>
            </td>
        </tr>
        <? endif; ?>
        </tbody>
    </table>
</form>
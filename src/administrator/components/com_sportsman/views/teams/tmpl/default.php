<?php

defined('KOOWA') or die('Restricted access');

$root = JURI::root(true);
$site = $root . '/' . str_replace(JPATH_ROOT . DS, '', JPATH_FILES) . '/';
?>
<?= @template('com://admin/default.view.grid.toolbar') ?>
<?= @template('default_sidebar') ?>
<form action="<?= @route() ?>" method="get" class="-koowa-grid">
    <?= @template('default_filter'); ?>
    <table class="adminlist">
        <thead>
        <tr>
            <th width="10"></th>
            <th width="50"></th>
            <th>
                <?= @helper('grid.sort', array('column' => 'Title')); ?>
            </th>
            <th>
                <?= @text('Sponsor'); ?>
            </th>
            <th width="10%">
                <?= @text('Created on'); ?>
            </th>
            <th width="10%">
                <?= @text('Ended on'); ?>
            </th>
        </tr>
        <tr>
            <td align="center">
                <?=@helper('grid.checkall');?>
            </td>
            <td></td>
            <td>
                <?=@helper('grid.search');?>
            </td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <td colspan="6">
                <?= @helper('paginator.pagination', array('total' => $total)) ?>
            </td>
        </tr>
        </tfoot>
        <tbody>
        <? foreach ($teams as $team) : ?>
        <tr data-readonly="<?= $team->getStatus() == 'deleted' ? '1' : '0' ?>">
            <td align="center">
                <?= @helper('grid.checkbox', array('row' => $team)) ?>
            </td>
            <td align="center">
                <img src="<?= @escape($site . $team->logo) ?>" alt="<?= @escape($team->title) ?>"
                     title="<?= @escape($team->title) ?>" width="40" height="40"/>
            </td>
            <td>
                <a href="<?= @route('view=team&id=' . $team->id) ?>">
                    <?= @escape($team->title) ?>
                </a>
            </td>
            <td>
                <?= @escape($team->sponsor) ?>
            </td>
            <td align="center">
                <?= @helper('date.format', array('date'   => $team->created_on,
                                                 'format' => '%#d %B %Y')) ?>
            </td>
            <td align="center">
                <?= $team->ended_on != '0000-00-00 00:00:00' ? @helper('date.format', array('date'   => $team->ended_on,
                                                                                            'format' => '%#d %B %Y')) : '' ?>
            </td>
        </tr>
        <? endforeach; ?>
        <? if (!count($teams)) : ?>
        <tr>
            <td colspan="6" align="center">
                <?= @text('No Items Found'); ?>
            </td>
        </tr>
        <? endif; ?>
        </tbody>
    </table>
</form>
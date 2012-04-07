<?php

defined('KOOWA') or die('Restricted access') ?>

<script src="media://lib_koowa/js/koowa.js"/>
<style src="media://lib_koowa/css/koowa.css"/>

<?= @template('com://admin/default.view.grid.toolbar') ?>
<form action="" method="get" class="-koowa-grid">
    <?= @template('default_filter'); ?>
    <table class="adminlist">
        <thead>
        <tr>
            <th></th>
            <th>
                <?= @helper('grid.sort', array('title'  => 'Name',
                                               'column' => 'name')) ?>
            </th>
            <th>
                <?= @helper('grid.sort', array('title'  => 'E-Mail',
                                               'column' => 'email')) ?>
            </th>
            <th width="10%">
                <?= @helper('grid.sort', array('title'  => 'Birthday',
                                               'column' => 'dob')) ?>
            </th>
            <th width="10%">
                <?= @helper('grid.sort', array('title'  => 'Registered',
                                               'column' => 'registered_on')) ?>
            </th>
        </tr>
        <tr>
            <td align="center">
                <?= @helper('grid.checkall'); ?>
            </td>
            <td colspan="2">
                <?= @helper('grid.search'); ?>
            </td>
            <td></td>
            <td></td>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <td colspan="5">
                <?= @helper('paginator.pagination', array('total' => $total)) ?>
            </td>
        </tr>
        </tfoot>
        <tbody>
        <? foreach ($members as $member) : ?>
        <tr>
            <td align="center">
                <?= @helper('grid.checkbox', array('row' => $member)) ?>
            </td>
            <td>
                <a href="<?= @route('view=member&id=' . $member->id) ?>">
                    <?= @escape($member->name) ?>
                </a>
            </td>
            <td>
                <?= @escape($member->email) ?>
            </td>
            <td>
                <?= @helper('date.format', array('date' => $member->dob)) ?>
            </td>
            <td>
                <?= @helper('date.humanize', array('date' => $member->registered_on)) ?>
            </td>
        </tr>
        <? endforeach ?>
        </tbody>
    </table>
</form>
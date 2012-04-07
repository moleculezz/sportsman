<?php

defined('KOOWA') or die('Restricted access') ?>

<div id="filter" class="group">
    <ul>
        <li class="<?= is_null($state->trashed) ? 'active' : ''; ?>">
            <a href="<?= @route('trashed=') ?>">
                <?= @text('All') ?>
            </a>
        </li>
        <? if ($games->isRevisable()) : ?>
        <li class="<?= $state->trashed ? 'active' : '' ?>  separator-left">
            <a href="<?= @route($state->trashed ? 'trashed=' : 'trashed=1') ?>">
                <?= 'Trashed' ?>
            </a>
        </li>
        <? endif; ?>
    </ul>
</div>
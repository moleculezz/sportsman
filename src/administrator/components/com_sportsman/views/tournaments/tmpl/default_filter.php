<?php

defined('KOOWA') or die('Restricted access') ?>

<div id="filter" class="group">
    <ul>
        <li class="<?= $state->active == '1' ? 'active' : ''; ?>">
            <a href="<?= @route('active=1') ?>">
                <?= @text('Active') ?>
            </a>
        </li>
        <li class="<?= $state->active == '0' ? 'active' : ''; ?> separator-right">
            <a href="<?= @route('active=0') ?>">
                <?= @text('Inactive') ?>
            </a>
        </li>
        <li class="<?= !is_bool($state->active) ? 'active' : ''; ?>">
            <a href="<?= @route('active=') ?>">
                <?= @text('All') ?>
            </a>
        </li>
    </ul>
</div>
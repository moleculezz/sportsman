<?php

defined('KOOWA') or die('Restricted access') ?>

<div id="filter" class="group">
    <ul>
        <li class="<?= $state->enabled == '1' ? 'active' : ''; ?>">
            <a href="<?= @route('enabled=1') ?>">
                <?= @text('Active') ?>
            </a>
        </li>
        <li class="<?= $state->enabled == '0' ? 'active' : ''; ?> separator-right">
            <a href="<?= @route('enabled=0') ?>">
                <?= @text('Inactive') ?>
            </a>
        </li>
        <li class="<?= !is_numeric($state->enabled) ? 'active' : ''; ?>">
            <a href="<?= @route('enabled=') ?>">
                <?= @text('All') ?>
            </a>
        </li>
    </ul>
</div>
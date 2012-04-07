<?php

defined('KOOWA') or die('Restricted access') ?>

<ul>
    <li class="<?= $state->tournament == null ? 'active' : ''; ?>">
        <a href="<?= @route('tournament=') ?>">
            <?= 'All Tournaments' ?>
        </a>
    </li>
    <? foreach ($tournaments as $tournament) : ?>
    <li class="<?= $state->tournament == $tournament->id ? 'active' : ''; ?>">
        <a href="<?= @route('tournament=' . $tournament->id) ?>">
            <?= @escape($tournament->title) ?>
        </a>
    </li>
    <? endforeach ?>
</ul>
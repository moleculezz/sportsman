<?php 

defined('KOOWA') or die( 'Restricted access' ); ?>

<ul>
    <li class="<?= (($state->sport == null) && ($state->division == null)) ? 'active' : ''; ?>">
        <a href="<?= @route('sport=&division=' ) ?>">
            <?= 'All Sports' ?>
        </a>
    </li>
    <? foreach($sports as $sid => $sport) : ?>
    <li class="<?= $state->sport == $sid ? 'active' : ''; ?>">
        <a href="<?= @route('division='.'&sport='.$sid) ?>">
            <?= @escape($sport['title']) ?>
        </a>
        <? if(!empty($sport['divisions'])) : ?>
        <ul>
            <? foreach($sport['divisions'] as $did => $division) : ?>
            <li class="<?= $state->division == $did ? 'active' : ''; ?>">
                <a href="<?= @route('division='.$did.'&sport='.$sid ) ?>">
                    <?= $division['title']; ?>
                </a>
            </li>
            <? endforeach; ?>
        </ul>
        <? endif; ?>
    </li>
    <? endforeach; ?>
</ul>
<?php 

defined('KOOWA') or die( 'Restricted access' ); ?>

<ul>
    <li class="<?= (($state->sport == null) && ($state->division == null)) ? 'active' : ''; ?>">
        <a href="<?= @route('sport=&division=' ) ?>">
            <?= 'All Sports' ?>
        </a>
    </li>
    <? foreach($sports as $sport) : ?>
    <li class="<?= $state->sport == $sport['id'] ? 'active' : ''; ?>">
        <a href="<?= @route('division='.'&sport='.$sport['id']) ?>">
            <?= @escape($sport['title']) ?>
        </a>
        <? if(!empty($sport['divisions'])) : ?>
        <ul>
            <? foreach($sport['divisions'] as $division) : ?>
            <li class="<?= $state->division == $division['id'] ? 'active' : ''; ?>">
                <a href="<?= @route('division='.$division['id'].'&sport='.$sport['id'] ) ?>">
                    <?= $division['title']; ?>
                </a>
            </li>
            <? endforeach; ?>
        </ul>
        <? endif; ?>
    </li>
    <? endforeach; ?>
</ul>
<?php

defined('KOOWA') or die('Restricted access') ?>

<? foreach($list as $sport) : ?>
    <span class="section"><?= @escape($sport['title']); ?></span><br />
    <?= @helper('listbox.radiolist', array(
            'list'     => $sport['divisions'],
            'selected' => $tournament->sportsman_division_id,
            'name'     => 'sportsman_division_id',
            'text'     => 'title',
        ));
    ?>
<? endforeach; ?>
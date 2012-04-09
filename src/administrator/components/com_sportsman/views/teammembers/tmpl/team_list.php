<?php defined('KOOWA') or die('Restricted access') ?>

<?php
$root = JURI::root(true);
$site = $root . '/' . str_replace(JPATH_ROOT . DS, '', JPATH_FILES) . '/';
?>


<style src="media://com_sportsman/css/form.css"/>

<div id="members-list">
    <div class="grid_12 alpha">
        <form action="<?= @route('team='.$state->team.'&tmpl='); ?>" method="post" class="members-list-form">
            <input type="hidden" name="team" value="<?= $state->team ?>" />
            <input type="hidden" name="type" value="<?= $state->type ?>" />
            <?= @helper('com://admin/sportsman.template.helper.listbox.members', array(
                'autocomplete' => true,
                'validate'     => false,
                'text'         => 'name',
                //'team'         => $state->team,
                'attribs'      => array('size' => '40'),
                'name'         => 'users_member_id',
            )) ?>
            <input class="button" type="submit" value="<?= @text('Add') ?>"/>
        </form>
    </div>
    <div class="list">
        <? foreach (@$teammembers as $member) : ?>
        <div class="teammember">
            <img src="<?= (preg_match("/^media/", $member->photo) ? $root : $site) . '/' . $member->photo ?>"
                 alt="<?= $member->name ?>" width="100" height="100"/>
            <h4><?= $member->name ?></h4>
        </div>
        <? endforeach; ?>
    </div>
</div>
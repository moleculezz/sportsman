<?php defined('KOOWA') or die('Restricted access') ?>

<?php
$root = JURI::root(true);
$site = $root . '/' . str_replace(JPATH_ROOT . DS, '', JPATH_FILES) . '/';
?>
<?= @helper('behavior.validator') ?>

<style src="media://com_sportsman/css/form.css"/>

<div id="members-list">
    <div class="list">
        <? foreach (@$teammembers as $member) : ?>
        <div class="teammember">
            <img src="<?= (preg_match("/^media/", $member->photo) ? $root : $site) . '/' . $member->photo ?>"
                 alt="<?= $member->name ?>" width="100" height="100"/>
            <h4><?= $member->name ?></h4>
        </div>
        <? endforeach; ?>
    </div>
    <!--<form action="<?/*= @route('row='.@$state->row.'&table='.$state->table.'&tmpl='); */?>" method="post">
        <input type="hidden" name="row"     value="<?/*= $state->row*/?>" />
        <input type="hidden" name="table" value="<?/*= $state->table*/?>" />
        <input name="title" type="text" value="" placeholder="<?/*= @text('Add new tag') */?>" <?/*= $disabled */?> />
        <input class="button" type="submit" <?/*= $disabled */?> value="<?/*= @text('Add') */?>"/>
    </form>-->
</div>
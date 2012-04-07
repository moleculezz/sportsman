<?php

defined('KOOWA') or die('Restricted access');

$root = JURI::root(true);
$site = $root . '/' . str_replace(JPATH_ROOT . DS, '', JPATH_FILES) . '/';
?>
<?= @helper('behavior.modal') ?>
<?= @helper('behavior.validator') ?>

<style src="media://system/css/calendar-jos.css"/>
<style src="media://com_sportsman/css/form.css"/>
<script>

    function insertImageUrl(image) {
        document.getElementById('logo').value = image;
        document.getElementById('img-logo').src = '<?= $site ?>' + image;
    }

</script>

<?= @template('com://admin/default.view.form.toolbar') ?>

<form action="<?= @route('id=' . $team->id) ?>" method="post" id="division-form" class="-koowa-form">
    <div class="grid_8">
        <div class="team_images">
            <img id="img-photo" src="<?= (preg_match("/^media/", $team->photo) ? $root : $site) . '/' . $team->photo ?>"
                 title="<?= $team->title ?>" alt="<?= $team->title ?>"/>
            <img id="img-logo" class="logo"
                 src="<?= (preg_match("/^media/", $team->logo) ? $root : $site) . '/' . $team->logo ?>"
                 title="<?= $team->title ?>" alt="<?= $team->title ?>"/>
        </div>
        <div class="panel title group">
            <input class="inputbox required" type="text" name="title" id="title" size="40" maxlength="255"
                   value="<?= @escape($team->title) ?>" placeholder="<?= @text('Name') ?>"/>
        </div>
    </div>
    <div class="grid_4">
        <div class="panel">
            <h3><?= @text('Details'); ?></h3>
            <table class="admintable">
                <tr>
                    <td class="key">
                        <label for="club" class="mainlabel"><?= @text('Club'); ?></label>
                    </td>
                    <td>
                        <?=@helper('listbox.clubs', array('name'    => 'sportsman_club_id',
                                                          'attribs' => array('class' => 'required'))); ?>
                    </td>
                </tr>
                <tr>
                    <td class="key">
                        <label for="sponsor"><?= @text('Sponsor') ?></label>
                    </td>
                    <td>
                        <input class="inputbox" type="text" name="sponsor" id="sponsor" size="25" maxlength="255"
                               value="<?= @escape($team->sponsor) ?>"/>
                    </td>
                </tr>
                <tr>
                    <td class="key">
                        <label for="created_on"><?= @text('Created on') ?></label>
                    </td>
                    <td>
                        <?= @helper('behavior.calendar', array('date' => $team->created_on,
                                                               'name' => 'created_on')); ?>
                    </td>
                </tr>
                <tr>
                    <td class="key">
                        <label for="ended_on"><?= @text('Ended on') ?></label>
                    </td>
                    <td>
                        <?= @helper('behavior.calendar', array('date' => $team->ended_on,
                                                               'name' => 'ended_on')); ?>
                    </td>
                </tr>
            </table>
        </div>
        <div class="panel group">
            <h3><?= @text('Images'); ?></h3>
            <table class="admintable">
                <tr>
                    <td class="key">
                        <label for="logo" class="mainlabel"><?= @text('Logo'); ?></label>
                    </td>
                    <td>
                        <?= @helper('com://admin/sportsman.template.helper.modal.select', array(
                        'name'  => 'logo',
                        'value' => $team->logo,
                        'link'  => @route('option=com_sportsman&view=images&tmpl=component')
                    )); ?>
                    </td>
                </tr>
                <tr>
                    <td class="key">
                        <label for="photo" class="mainlabel"><?= @text('Team'); ?></label>
                    </td>
                    <td>
                        <?= @helper('com://admin/sportsman.template.helper.modal.select', array(
                        'name'  => 'photo',
                        'value' => $team->photo,
                        'link'  => @route('option=com_files&view=images&layout=select&tmpl=component')
                    )); ?>
                    </td>
                </tr>
            </table>


        </div>
        <div class="panel divisions group">
            <h3><?= @text('Divisions') ?></h3>
            <?= @template('form_divisions', array('list' => @service('com://admin/sportsman.model.divisions')->getDivisions())) ?>
        </div>
    </div>
</form>
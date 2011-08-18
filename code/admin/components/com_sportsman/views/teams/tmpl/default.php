
<?= @template('default_sidebar') ?>
<form action="<?= @route() ?>" method="get" class="-koowa-grid">
<table class="adminlist">
<thead>
    <tr>
        <th width="10"></th>
        <th width="2%">
            <?= @text('ID'); ?>
        </th>
        <th>
            <?= @helper('grid.sort', array('column' => 'Title')); ?>
        </th>
        <th>
            <?= @text('Sponsor'); ?>
        </th>
        <th width="7%">
            <?= @helper('grid.sort', array('column' => 'enabled')) ?>
        </th>
        <th width="10%">
            <?= @helper('grid.sort', array('title' => 'Division', 'column' => 'division_title')) ?>
        </th>
        <th width="8%">
            <?= @helper('grid.sort', array('title' => 'Sport', 'column' => 'sport_title')) ?>
        </th>
    </tr>
    <tr>
        <td align="center">
            <?=@helper('grid.checkall');?>
        </td>
        <td></td>
        <td>
            <?=@helper('grid.search');?>
        </td>
        <td></td>
        <td></td>
        <td align="center">
            <?= @helper('listbox.divisions', array('name' => 'division','attribs' => array())); ?>
        </td>
        <td align="center">
            <?= @helper('listbox.sports', array('name' => 'sport','attribs' => array())); ?>
        </td>
    </tr>
</thead>
<tfoot>
    <tr>
        <td colspan="7">
            <?= @helper('paginator.pagination', array('total' => $total)) ?>
        </td>
    </tr>
</tfoot>
<tbody>
<? foreach($teams as $team) : ?>
    <tr data-readonly="<?= $team->getStatus() == 'deleted' ? '1' : '0' ?>" >
        <td align="center">
            <?= @helper('grid.checkbox' , array('row' => $team)) ?>
        </td>
        <td align="center">
            <?= @escape($team->id) ?>
        </td>
        <td>
            <a href="<?= @route('view=team&id='.$team->id) ?>">
                <?= @escape($team->title) ?>
            </a>
        </td>
        <td>
            <?= @escape($team->sponsor) ?>
        </td>
        <td align="center">
            <?= @helper('grid.enable', array('row' => $team)) ?>
        </td>
        <td>
            <a href="<?= @route('view=division&id='.$team->sportsman_division_id) ?>">
                <?= $team->division_title ?>
            </a>
        </td>
        <td>
            <a href="<?= @route('view=sport&id='.$team->sportsman_sport_id) ?>">
                <?= $team->sport_title ?>
            </a>
        </td>
    </tr>
<? endforeach; ?>
<? if (!count($teams)) : ?>
    <tr>
        <td colspan="7" align="center">
            <?= @text('No Items Found'); ?>
        </td>
    </tr>
<? endif; ?>
</tbody>
</table>
</form>
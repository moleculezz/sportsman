
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
        <th width="7%">
            <?= @helper('grid.sort', array('column' => 'enabled')) ?>
        </th>
        <th width="7%">
            <?= @helper('grid.sort', array('column' => 'access')) ?>
        </th>
        <th width="8%">
            <?= @helper('grid.sort', array('title' => 'Sport', 'column' => 'sport_title')) ?>
        </th>
        <th width="8%">
            <?= @helper('grid.sort', array('title' => 'Date', 'column' => 'created_on')) ?>
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
        <td align="center">
            <?= @helper('listbox.access'); ?>
        </td>
        <td align="center">
            <?= @helper('listbox.sports', array('name' => 'sport','attribs' => array())); ?>
        </td>
        <td></td>
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
<? foreach($divisions as $division) : ?>
    <tr data-readonly="<?= $division->getStatus() == 'deleted' ? '1' : '0' ?>" >
        <td align="center">
            <?= @helper('grid.checkbox' , array('row' => $division)) ?>
        </td>
        <td align="center">
            <?= @escape($division->id) ?>
        </td>
        <td>
            <a href="<?= @route('view=division&id='.$division->id) ?>">
                <?= @escape($division->title) ?>
            </a>
        </td>
        <td align="center">
            <?= @helper('grid.enable', array('row' => $division)) ?>
        </td>
        <td align="center">
            <?= @helper('grid.access', array('row' => $division)) ?>
        </td>
        <td>
            <a href="<?= @route('view=sport&id='.$division->sportsman_sport_id) ?>">
                <?= $division->sport_title ?>
            </a>
        </td>
        <td>
            <?= @helper('date.humanize', array('date' => $division->created_on)) ?>
        </td>
    </tr>
<? endforeach; ?>
<? if (!count($divisions)) : ?>
    <tr>
        <td colspan="7" align="center">
            <?= @text('No Items Found'); ?>
        </td>
    </tr>
<? endif; ?>
</tbody>
</table>
</form>
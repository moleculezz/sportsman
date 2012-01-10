
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
        <th width="20%">
            <?= @helper('grid.sort', array('column' => 'Club')) ?>
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
    </tr>
</thead>
<tfoot>
    <tr>
        <td colspan="4">
            <?= @helper('paginator.pagination', array('total' => $total)) ?>
        </td>
    </tr>
</tfoot>
<tbody>
<? foreach($venues as $venue) : ?>
    <tr data-readonly="<?= $venue->getStatus() == 'deleted' ? '1' : '0' ?>" >
        <td align="center">
            <?= @helper('grid.checkbox' , array('row' => $venue)) ?>
        </td>
        <td align="center">
            <?= @escape($venue->id) ?>
        </td>
        <td>
            <a href="<?= @route('view=venue&id='.$venue->id) ?>">
                <?= @escape($venue->title) ?>
            </a>
        </td>
        <td>
            <?= @escape($venue->club_title) ?>
        </td>
    </tr>
<? endforeach; ?>
<? if (!count($venues)) : ?>
    <tr>
        <td colspan="6" align="center">
            <?= @text('No Items Found'); ?>
        </td>
    </tr>
<? endif; ?>
</tbody>
</table>
</form>
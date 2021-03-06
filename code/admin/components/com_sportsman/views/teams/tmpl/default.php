
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
            <?= @text('Created on'); ?>
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
        <td></td>
    </tr>
</thead>
<tfoot>
    <tr>
        <td colspan="6">
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
        <td align="center">
            <?= @helper('date.format', array('date' => $team->created_on, 'format' => '%#d %B %Y')) ?>
        </td>
    </tr>
<? endforeach; ?>
<? if (!count($teams)) : ?>
    <tr>
        <td colspan="6" align="center">
            <?= @text('No Items Found'); ?>
        </td>
    </tr>
<? endif; ?>
</tbody>
</table>
</form>
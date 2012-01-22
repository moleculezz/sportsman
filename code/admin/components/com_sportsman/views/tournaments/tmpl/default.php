
<?= @template('default_sidebar') ?>
<form action="<?= @route() ?>" method="get" class="-koowa-grid">
<?= @template('default_filter'); ?>
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
        <th width="10%">
            <?= @text('Created on'); ?>
        </th>
        <th width="10%">
            <?= @text('Ended on'); ?>
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
    </tr>
</thead>
<tfoot>
    <tr>
        <td colspan="5">
            <?= @helper('paginator.pagination', array('total' => $total)) ?>
        </td>
    </tr>
</tfoot>
<tbody>
<? foreach($tournaments as $tournament) : ?>
    <tr data-readonly="<?= $tournament->getStatus() == 'deleted' ? '1' : '0' ?>" >
        <td align="center">
            <?= @helper('grid.checkbox' , array('row' => $tournament)) ?>
        </td>
        <td align="center">
            <?= @escape($tournament->id) ?>
        </td>
        <td>
            <a href="<?= @route('view=tournament&id='.$tournament->id) ?>">
                <?= @escape($tournament->title) ?>
            </a>
        </td>
        <td align="center">
            <?= @helper('date.format', array('date' => $tournament->created_on, 'format' => '%#d %B %Y')) ?>
        </td>
        <td align="center">
            <?= $tournament->ended_on != '0000-00-00 00:00:00' ? @helper('date.format', array('date' => $tournament->ended_on, 'format' => '%#d %B %Y')) : '' ?>
        </td>
    </tr>
<? endforeach; ?>
<? if (!count($tournaments)) : ?>
    <tr>
        <td colspan="5" align="center">
            <?= @text('No Items Found'); ?>
        </td>
    </tr>
<? endif; ?>
</tbody>
</table>
</form>
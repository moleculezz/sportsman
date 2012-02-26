
<style src="media://com_sportsman/css/sportsman.css" />

<?= @template('com://admin/default.view.grid.toolbar'); ?>
<?= @template('default_sidebar') ?>
<form action="<?= @route() ?>" method="get" class="-koowa-grid">
<table class="adminlist">
<thead>
    <tr>
        <th width="10"></th>
        <th width="2%">
            <?= @text('ID'); ?>
        </th>
        <th width="10%">
            <?= @text('Date'); ?>
        </th>
        <th>
            <?= @text('Home'); ?>
        </th>
        <th>
            <?= @text('Away'); ?>
        </th>
        <th>
            <?= @text('Venue'); ?>
        </th>
    </tr>
    <tr>
        <td>
            <?=@helper('grid.checkall');?>
        </td>
        <td></td>
        <td></td>
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
<? foreach($games as $game) : ?>
    <tr data-readonly="<?= $game->getStatus() == 'deleted' ? '1' : '0' ?>" >
        <td align="center">
            <?= @helper('grid.checkbox' , array('row' => $game)) ?>
        </td>
        <td align="center">
            <?= @escape($game->id) ?>
        </td>
        <td align="center">
            <a href="<?= @route('view=game&id='.$game->id) ?>">
                <?= @helper('date.format', array('date' => $game->game_time, 'format' => '%#d %B %Y')) ?>
            </a>
        </td>
        <td align="center" <?php if($game->home_team_score > $game->away_team_score) echo 'class="game-win"';?> >
            <?= @escape($game->home_team_title) ?> (<?= @escape($game->home_team_score) ?>)
        </td>
        <td align="center" <?php if($game->home_team_score < $game->away_team_score) echo 'class="game-win"';?>>
            <?= @escape($game->away_team_title) ?> (<?= @escape($game->away_team_score) ?>)
        </td>
        <td align="center">
            <?= @escape($game->venue_title) ?>
        </td>
    </tr>
<? endforeach; ?>
<? if (!count($games)) : ?>
    <tr>
        <td colspan="6" align="center">
            <?= @text('No Items Found'); ?>
        </td>
    </tr>
<? endif; ?>
</tbody>
</table>
</form>
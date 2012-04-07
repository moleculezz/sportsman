<ul>
    <? foreach ($divisions as $division) : ?>
    <li>
        <?=$division->id?>.
        <?=$division->title?>
    </li>
    <? endforeach; ?>
</ul>
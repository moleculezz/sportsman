<?php 

defined('KOOWA') or die( 'Restricted access' ); ?>

<ul>
	<li class="<?= $state->sport == null ? 'active' : ''; ?>">
		<a href="<?= @route('sport=' ) ?>">
			<?= 'All Sports' ?>
		</a>
	</li>
	<? foreach ($sports as $sport) : ?>
	<li class="<?= $state->sport == $sport->id ? 'active' : ''; ?>">
		<a href="<?= @route('sport='.$sport->id ) ?>">
			<?= @escape($sport->title) ?>
		</a>
	</li>
	<? endforeach ?>
</ul>
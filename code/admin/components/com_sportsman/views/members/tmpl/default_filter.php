<?php 
/**
 * @version     $Id: default_filter.php 3318 2012-02-10 15:43:35Z johanjanssens $
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Users
 * @copyright   Copyright (C) 2011 - 2012 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */
defined('KOOWA') or die( 'Restricted access' ); ?>

<div id="filter" class="group">
    <ul>
        <li class="<?= $state->gender == 'M' ? 'active' : ''; ?>">
            <a href="<?= @route('gender=M' ) ?>">
                <?= @text('Male') ?>
            </a> 
        </li>
        <li class="<?= $state->gender == 'F' ? 'active' : ''; ?>">
            <a href="<?= @route('gender=F' ) ?>">
                <?= @text('Female') ?>
            </a> 
        </li>
    </ul>
</div>
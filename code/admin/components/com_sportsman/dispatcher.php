<?php
/**
 * @category	Nooku
 * @package		Sportsman
 * @copyright	Copyright (C) G.D. Arends. All rights reserved.
 * @license		GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 */
 
 
 /**
 * Sportsman Dispatcher
 *
 * @author      G.D. Arends <https://github.com/moleculezz>
 * @category    Nooku
 * @package     Sportsman 
 */
class ComSportsmanDispatcher extends ComDefaultDispatcher
{
    protected function _initialize(KConfig $config)
    {
        $config->append(array(
            'controller' => 'dashboard'
        ));
        parent::_initialize($config);
    }
}
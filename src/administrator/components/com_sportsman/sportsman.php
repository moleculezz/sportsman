<?php
/**
 * @category       Nooku
 * @package        Sportsman
 * @copyright      Copyright (C) G.D. Arends. All rights reserved.
 * @license        GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 */


/**
 * Component Loader
 *
 * @author      G.D. Arends <https://github.com/moleculezz>
 * @category    Nooku
 * @package     Sportsman
 */
// Check if Koowa is active
if (!defined('KOOWA')) {
    JError::raiseWarning(0, JText::_("Koowa wasn't found. Please install the Koowa plugin and enable it."));
    return;
}

echo KService::get('com://admin/sportsman.dispatcher')->dispatch();
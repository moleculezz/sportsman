<?php
/**
 * @category       Nooku
 * @package        Sportsman
 * @copyright      Copyright (C) G.D. Arends. All rights reserved.
 * @license        GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 */


/**
 * Tournaments Database Table Class
 *
 * @author      G.D. Arends <https://github.com/moleculezz>
 * @category    Nooku
 * @package     Sportsman
 */
class ComSportsmanDatabaseTableTournaments extends KDatabaseTableAbstract
{
    public function _initialize(KConfig $config)
    {
        $config->append(array(
            'name'       => 'sportsman_view_tournaments',
            'base'       => 'sportsman_tournaments',
            'behaviors'  => array('creatable', 'modifiable', 'identifiable')
        ));

        parent::_initialize($config);
    }
}
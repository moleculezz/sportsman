<?php
/**
 * @category       Nooku
 * @package        Sportsman
 * @copyright      Copyright (C) G.D. Arends. All rights reserved.
 * @license        GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 */


/**
 * Venues Database Table Class
 *
 * @author      G.D. Arends <https://github.com/moleculezz>
 * @category    Nooku
 * @package     Sportsman
 */
class ComSportsmanDatabaseTableVenues extends KDatabaseTableAbstract
{
    public function _initialize(KConfig $config)
    {
        $config->append(array(
            'name'       => 'sportsman_view_venues',
            'base'       => 'sportsman_venues',
            'behaviors'  => array('creatable', 'modifiable', 'identifiable')
        ));

        parent::_initialize($config);
    }
}
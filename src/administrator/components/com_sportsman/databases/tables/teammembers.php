<?php
/**
 * @category    Nooku
 * @package     Sportsman
 * @copyright   Copyright (C) G.D. Arends. All rights reserved.
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 */


/**
 * Team Members Database Table Class
 *
 * @author      G.D. Arends <https://github.com/moleculezz>
 * @category    Nooku
 * @package     Sportsman
 */
class ComSportsmanDatabaseTableTeamMembers extends KDatabaseTableAbstract
{
    public function _initialize(KConfig $config)
    {
        $config->append(array(
            'name'       => 'sportsman_teams_members',
            'behaviors'  => array('creatable', 'modifiable', 'identifiable')
        ));

        parent::_initialize($config);
    }
}
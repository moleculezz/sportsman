<?php
/**
 * @category	Nooku
 * @package		Sportsman
 * @copyright	Copyright (C) G.D. Arends. All rights reserved.
 * @license		GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 */
 
 
 /**
 * Dashboard Controller Class
 *
 * @author      G.D. Arends <https://github.com/moleculezz>
 * @category    Nooku
 * @package     Sportsman 
 */
class ComSportsmanControllerDashboard extends ComDefaultControllerResource
{
    protected function _initialize(KConfig $config) 
    {	
        $config->append(array(
            'request' => array('layout' => 'default')
        ));

        parent::_initialize($config);
    }

}
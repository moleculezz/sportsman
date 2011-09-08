<?php
/**
 * @category	Nooku
 * @package		Sportsman
 * @copyright	Copyright (C) G.D. Arends. All rights reserved.
 * @license		GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 */
 
 
 /**
 * Listbox Template Helper
 *
 * @author      G.D. Arends <https://github.com/moleculezz>
 * @category    Nooku
 * @package     Sportsman 
 */
class ComSportsmanTemplateHelperListbox extends ComDefaultTemplateHelperListbox
{
    public function sports( $config = array())
    {
        $config = new KConfig($config);
        $config->append(array(
            'model'    => 'sports',
            'name'     => 'sportsman_sport_id',
            'value'    => 'id',
            'text'     => 'title',
            'prompt'   => '- Select Sport -',
            'attribs'  => array('id' => $config->name)
        ));
        return parent::_listbox($config);
    }
    
    public function clubs( $config = array())
    {
        $config = new KConfig($config);
        $config->append(array(
            'model'    => 'clubs',
            'name'     => 'sportsman_club_id',
            'value'    => 'id',
            'text'     => 'title',
            'prompt'   => '- Select Club -',
            'attribs'  => array('id' => $config->name)
        ));
        return parent::_listbox($config);
    }
}
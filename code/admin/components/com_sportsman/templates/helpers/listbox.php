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
    
    public function venues( $config = array())
    {
        $config = new KConfig($config);
        $config->append(array(
            'model'    => 'venues',
            'name'     => 'sportsman_venue_id',
            'value'    => 'id',
            'text'     => 'title',
            'prompt'   => '- Select Venue -',
            'attribs'  => array('id' => $config->name)
        ));
        return parent::_listbox($config);
    }
    
    public function tournaments($config = array())
    {
        $config = new KConfig($config);
        $config->append(array(
            'prompt'   => '- Select Tournament -',
            'attribs'  => array('id' => $config->name )
        ));
        
        $list = $this->getService('com://admin/sportsman.model.tournaments')
            ->set('active', true)
            ->getList();
            
        
        foreach($list as $tournament) {
            //TODO Optimization: Remove loop. Only division and tournament id and titles are needed
            foreach($tournament->toArray() as $key => $val) {
                $groups[$tournament->division_title][$tournament->title][$key] = $val;
            }
        }
        
        foreach($groups as $division => $tournaments) {
            $options[] = $this->option(array('text' => $division, 'group' => true));
            foreach($tournaments as $tournament) {
                $options[] = $this->option(array(
                    'text'    => $tournament['title'],
                    'value'   => $tournament['id'],
                    'attribs' => array(
                        'data-division' => $this->getTemplate()->getView()->getRoute(
                            'option=com_sportsman&view=teams&format=json&division='.$tournament['sportsman_division_id']
                        )
                    )
                ));
            }
        }
        $config->append(array('options' => $options));
        
        return $this->optionlist($config);
    }
    
    public function teams($config = array())
    {
        $config = new KConfig($config);
        $config->append(array(
            'model'    => 'teams',
            'name'     => 'sportsman_team_id',
            'value'    => 'id',
            'text'     => 'title',
            'prompt'   => '- Select Team -',
            'attribs'  => array('id' => $config->name)
        ));
        return parent::_listbox($config);
    }
}
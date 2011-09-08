<?php
/**
 * @category	Nooku
 * @package		Sportsman
 * @copyright	Copyright (C) G.D. Arends. All rights reserved.
 * @license		GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 */
 
 
 /**
 * Divisions Model Class
 *
 * @author      G.D. Arends <https://github.com/moleculezz>
 * @category    Nooku
 * @package     Sportsman 
 */
class ComSportsmanModelDivisions extends ComDefaultModelDefault
{
    public function __construct(KConfig $config)
    {
        parent::__construct($config);

        $this->_state
            ->insert('enabled' , 'int', 1)
            ->insert('access'  , 'int')
            ->insert('sport'   , 'int');
    }
    
    protected function _buildQueryWhere(KDatabaseQuery $query)
    {
        $state = $this->_state;
        
        if(is_numeric($state->access)) {
        	$query->where('tbl.access','=', $state->access);
        }
        
        if(is_numeric($state->enabled)) {
        	$query->where('tbl.enabled','=', $state->enabled);
        }
        
        if (is_numeric($state->sport)) {
            $query->where('tbl.sportsman_sport_id', '=', $state->sport);
        }
        
        parent::_buildQueryWhere($query);
    }
    
    //TODO Probably there is a way to make this more DRY
    // All divisions & sport
    public function getDivisions()
    {
        
        $list = $this
            ->set('enabled', 1)
            ->getList();

        foreach($list as $item)
        {
            if(!isset($divisions[$item->sportsman_sport_id])) {
                $divisions[$item->sportsman_sport_id]['id'] = $item->sportsman_sport_id;
                $divisions[$item->sportsman_sport_id]['title'] = $item->sport_title;
            }
            
            $divisions[$item->sportsman_sport_id]['divisions'][] = array('id' => $item->id, 'title' => $item->title);
        }

        return $divisions;
    }
}
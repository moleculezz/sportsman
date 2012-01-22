<?php
/**
 * @category	Nooku
 * @package		Sportsman
 * @copyright	Copyright (C) G.D. Arends. All rights reserved.
 * @license		GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 */
 
 
 /**
 * Tournaments Model Class
 *
 * @author      G.D. Arends <https://github.com/moleculezz>
 * @category    Nooku
 * @package     Sportsman 
 */
class ComSportsmanModelTournaments extends ComDefaultModelDefault
{
    public function __construct(KConfig $config)
    {
        parent::__construct($config);
        
        $this->_state
            ->insert('active' , 'boolean', true)
            ->insert('division', 'int')
            ->insert('sport'   , 'int');
    }
    
    protected function _buildQueryWhere(KDatabaseQuery $query)
    {
        $state = $this->_state;
        
        if (is_bool($state->active) && $state->active) {
            $query->where('tbl.ended_on','=', '0000-00-00 00:00:00')
                    ->where('tbl.ended_on','>', date("Y-m-d H:i:s"), 'OR');
        }
        else if (is_bool($state->active) && !$state->active) {
            $query->where('tbl.ended_on','!=', '0000-00-00 00:00:00')
                    ->where('tbl.ended_on','<', date("Y-m-d H:i:s") );
        }
        
        if (is_numeric($state->division)) {
            $query->where('tbl.sportsman_division_id', '=', $state->division);
        }
        
        if (is_numeric($state->sport)) {
            $query->where('tbl.sportsman_sport_id', '=', $state->sport);
        }
        
        parent::_buildQueryWhere($query);
    }
    
    //TODO Probably there is a way to make this more DRY
    // Only divisions that contain tournaments
    public function getDivisions()
    {
        
        $list = $this
            ->set('enabled', 1)
            ->getList();

        foreach($list as $item)
        {
            if(!isset($divisions[$item->sportsman_sport_id])) {
                $divisions[$item->sportsman_sport_id] = array('title' => $item->sport_title);
            }
            if(!isset($divisions[$item->sportsman_sport_id]['divisions'][$item->sportsman_division_id])) {
                $divisions[$item->sportsman_sport_id]['divisions'][$item->sportsman_division_id] = array('title' => $item->division_title);
            }
        }

        return $divisions;
    }
}
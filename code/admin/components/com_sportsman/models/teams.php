<?php
/**
 * @category	Nooku
 * @package		Sportsman
 * @copyright	Copyright (C) G.D. Arends. All rights reserved.
 * @license		GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 */
 
 
 /**
 * Teams Model Class
 *
 * @author      G.D. Arends <https://github.com/moleculezz>
 * @category    Nooku
 * @package     Sportsman 
 */
class ComSportsmanModelTeams extends ComDefaultModelDefault
{
    public function __construct(KConfig $config)
    {
        parent::__construct($config);
        
        $this->_state
            ->insert('active'  , 'boolean', true)
            ->insert('division', 'int')
            ->insert('sport'   , 'int');
    }
    
    protected function _buildQueryWhere(KDatabaseQuery $query)
    {
        $state = $this->_state;
        
        if(!$state->isUnique()) {
            if (is_bool($state->active) && $state->active) {
                $query->where('( tbl.ended_on','=', '0000-00-00 00:00:00')
                        ->where('tbl.ended_on','>', date("Y-m-d H:i:s"), 'OR');
                $query->where[] = array('condition' => ')', 'property' => null);
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
        }
        
        if ($state->search) {
            $query
                ->where('( tbl.title', 'LIKE', '%' . $state->search . '%', 'AND')
                ->where('tbl.sponsor', 'LIKE', '%' . $state->search . '%', 'OR');
            $query->where[] = array('condition' => ')', 'property' => null);
        }
        
        parent::_buildQueryWhere($query);
    }
    
    //TODO Probably there is a way to make this more DRY
    // Only divisions that contain teams
    public function getDivisions()
    {
        // get active teams
        $teams = $this->getList();

        foreach($teams as $team)
        {
            if(!isset($divisions[$team->sportsman_sport_id])) {
                $divisions[$team->sportsman_sport_id]['title'] = $team->sport_title;
            }
            
            if(!isset($divisions[$team->sportsman_sport_id]['divisions'][$team->sportsman_division_id])) {
                $divisions[$team->sportsman_sport_id]['divisions'][$team->sportsman_division_id] = array('title' => $team->division_title);
            }
        }

        return $divisions;
    }
}
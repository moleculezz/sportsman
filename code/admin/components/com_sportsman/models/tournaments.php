<?php

class ComSportsmanModelTournaments extends ComDefaultModelDefault
{
    public function __construct(KConfig $config)
    {
        parent::__construct($config);
        
        $this->_state
            ->insert('enabled' , 'int')
            ->insert('division', 'int')
            ->insert('sport'   , 'int');
    }
    
    protected function _buildQueryColumns(KDatabaseQuery $query)
    {
        parent::_buildQueryColumns($query);
        
        $query->select('division.title AS division_title')
            ->select('sport.title AS sport_title')
            ->select('sport.sportsman_sport_id');
    }
    
    protected function _buildQueryJoins(KDatabaseQuery $query)
    {
        parent::_buildQueryJoins($query);
        
        $query->join('LEFT', 'sportsman_divisions AS division', 'division.sportsman_division_id = tbl.sportsman_division_id')
              ->join('LEFT', 'sportsman_sports AS sport', 'sport.sportsman_sport_id = division.sportsman_sport_id');
        
    }
    
    protected function _buildQueryWhere(KDatabaseQuery $query)
    {
        $state = $this->_state;
        
        if (is_numeric($state->enabled)) {
            $query->where('tbl.enabled','=', $state->enabled);
        }
        
        if (is_numeric($state->division)) {
            $query->where('tbl.sportsman_division_id', '=', $state->division);
        }
        
        if (is_numeric($state->sport)) {
            $query->where('sport.sportsman_sport_id', '=', $state->sport);
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
                $divisions[$item->sportsman_sport_id]['id'] = $item->sportsman_sport_id;
                $divisions[$item->sportsman_sport_id]['title'] = $item->sport_title;
            }
            
            $divisions[$item->sportsman_sport_id]['divisions'][] = array('id' => $item->sportsman_division_id, 'title' => $item->division_title);
        }

        return $divisions;
    }
}
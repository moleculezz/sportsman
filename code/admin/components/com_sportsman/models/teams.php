<?php

class ComSportsmanModelTeams extends ComDefaultModelDefault
{
    public function __construct(KConfig $config)
    {
        parent::__construct($config);
        
        $this->_state
            ->insert('enabled' , 'int')
            ->insert('access'  , 'int')
            ->insert('division', 'int')
            ->insert('sport'   , 'int');
    }
    
    protected function _buildQueryColumns(KDatabaseQuery $query)
    {
        parent::_buildQueryColumns($query);
        
        $query->select('division.title AS division_title')
            ->select('sport.title AS sport_title');
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
            $query->where('tbl.sportsman_division_id', '=', $state->sport);
        }
        
        if (is_numeric($state->sport)) {
            $query->where('tbl.sportsman_sport_id', '=', $state->sport);
        }
        
        if ($state->search)
        {
            $search = '%'.$state->search.'%';
            $query->where('tbl.title', 'LIKE', $search);
        }
        
        parent::_buildQueryWhere($query);
    }
}
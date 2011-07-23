<?php

class ComSportsmanModelDivisions extends ComDefaultModelDefault
{
    public function __construct(KConfig $config)
    {
        parent::__construct($config);

        $this->_state
            ->insert('enabled', 'int')
            ->insert('access' , 'int')
            ->insert('sport'  , 'int');
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
}
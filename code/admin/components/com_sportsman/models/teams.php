<?php

class ComSportsmanModelTeams extends ComDefaultModelDefault
{
    public function __construct(KConfig $config)
    {
        parent::__construct($config);
        
        $this->_state
            ->insert('enabled' , 'int')
            ->insert('division', 'int')
            ->insert('sport'   , 'int');
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
        
        if ($state->search)
        {
            $search = '%'.$state->search.'%';
            $query->where('tbl.title', 'LIKE', $search);
        }
        
        parent::_buildQueryWhere($query);
    }
    
    //TODO Probably there is a way to make this more DRY
    // Only divisions that contain teams
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
<?php
/**
 * @category	Nooku
 * @package		Sportsman
 * @copyright	Copyright (C) G.D. Arends. All rights reserved.
 * @license		GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 */
 
 
 /**
 * Venues Model Class
 *
 * @author      G.D. Arends <https://github.com/moleculezz>
 * @category    Nooku
 * @package     Sportsman 
 */
class ComSportsmanModelVenues extends ComDefaultModelDefault
{
    public function __construct(KConfig $config)
    {
        parent::__construct($config);

        $this->_state
            ->insert('club'   , 'int');
    }
    
    protected function _buildQueryWhere(KDatabaseQuery $query)
    {
        $state = $this->_state;
        
        if (is_numeric($state->club)) {
            $query->where('tbl.sportsman_club_id', '=', $state->club);
        }
        
        if ($state->search) {
            $search = '%'.$state->search.'%';
            $query->where('tbl.title', 'LIKE', $search)
                    ->where('tbl.club_title', 'LIKE', '%'.$state->search.'%', 'OR');
        }
        
        parent::_buildQueryWhere($query);
    }
}
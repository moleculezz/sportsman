<?php
/**
 * @category       Nooku
 * @package        Sportsman
 * @copyright      Copyright (C) G.D. Arends. All rights reserved.
 * @license        GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 */


/**
 * Games Model Class
 *
 * @author      G.D. Arends <https://github.com/moleculezz>
 * @category    Nooku
 * @package     Sportsman
 */
class ComSportsmanModelGames extends ComDefaultModelDefault
{
    public function __construct(KConfig $config)
    {
        parent::__construct($config);

        $this->_state
            ->insert('tournament', 'int')
            ->insert('trashed', 'int');
    }

    protected function _buildQueryWhere(KDatabaseQuery $query)
    {
        $state = $this->_state;

        if (is_numeric($state->tournament)) {
            $query->where('tbl.sportsman_tournament_id', '=', $state->tournament);
        }

        if ($this->getTable()->isRevisable() && $state->trashed) {
            $query->where('tbl.deleted', '=', 1);
        }

        parent::_buildQueryWhere($query);
    }
}
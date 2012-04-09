<?php
/**
 * @category    Nooku
 * @package     Sportsman
 * @copyright   Copyright (C) G.D. Arends. All rights reserved.
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 */


/**
 * Team Members Model Class
 *
 * @author      G.D. Arends <https://github.com/moleculezz>
 * @category    Nooku
 * @package     Sportsman
 */
class ComSportsmanModelTeamMembers extends ComDefaultModelDefault
{
    public function __construct(KConfig $config)
    {
        parent::__construct($config);
        $this->_state
             ->insert('team', 'int')
             ->insert('member', 'int')
             ->insert('type', 'string');
    }

    protected function _buildQueryColumns(KDatabaseQuery $query)
    {
        parent::_buildQueryColumns($query);
        $query->select('users.name, users.email')
            ->select('members.dob, members.photo');
    }

    protected function _buildQueryWhere(KDatabaseQuery $query)
    {
        $state = $this->_state;


        if (is_numeric($state->team)) {
            $query->where('tbl.sportsman_team_id', '=', $state->team);
        }

        if (is_numeric($state->member)) {
            $query->where('tbl.users_member_id', '=', $state->member);
        }

        if (!empty($state->type)) {
            $query->where('tbl.type', '=', $state->type);
        }

        parent::_buildQueryWhere($query);
    }

    protected function _buildQueryJoins(KDatabaseQuery $query)
    {
        $query->join('LEFT', 'users_members AS members', 'members.users_member_id = tbl.users_member_id')
            ->join('LEFT', 'users AS users', 'users.id = members.users_member_id');
    }
}
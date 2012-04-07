<?php

class ComSportsmanModelMembers extends ComUsersModelUsers
{
    public function __construct(KConfig $config)
    {
        parent::__construct($config);

        $this->_state
            ->insert('gender', 'word');
    }

    protected function _buildQueryWhere(KDatabaseQuery $query)
    {
        $state = $this->_state;

        if (!$state->isUnique()) {
            if (!empty($state->gender)) {
                $query->where('members.gender', '=', $state->gender);
            }
        }

        parent::_buildQueryWhere($query);
    }
}
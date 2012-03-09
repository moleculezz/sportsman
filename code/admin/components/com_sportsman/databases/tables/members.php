<?php

class ComSportsmanDatabaseTableMembers extends ComUsersDatabaseTableUsers
{
    public function  _initialize(KConfig $config)
    {
        
        $config->append(array(
            'behaviors'  => array(
                'com://admin/sportsman.database.behavior.extendable' => array('extending' => 'members')
            )
        ));

        parent::_initialize($config);
    }
}
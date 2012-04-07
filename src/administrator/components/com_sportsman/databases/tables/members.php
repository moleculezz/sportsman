<?php

class ComSportsmanDatabaseTableMembers extends ComUsersDatabaseTableUsers
{
    public function  _initialize(KConfig $config)
    {
        $this->mixin(new KMixinBehavior($config->append(array('mixer' => $this))));
        $extendable = $this->getBehavior('com://admin/sportsman.database.behavior.extendable', array('table'   => 'members',
                                                                                                     'table_id'=> 'users_member_id'));

        $config->append(array(
            'behaviors'  => array(
                $extendable
            )
        ));

        parent::_initialize($config);
    }
}
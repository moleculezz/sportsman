<?php
class ComSportsManDatabaseTableDivisions extends KDatabaseTableAbstract
{
    public function _initialize(KConfig $config)
    {
        $config->append(array(
            'name'       => 'sportsman_view_divisions',
            'base'       => 'sportsman_divisions',
            'behaviors'  => array('creatable', 'modifiable', 'identifiable')
        ));

        parent::_initialize($config);
    }
}
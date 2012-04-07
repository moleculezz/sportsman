<?php

class ComSportsmanControllerGame extends ComDefaultControllerDefault
{
    protected function _initialize(KConfig $config)
    {
        $config->append(array(
            'behaviors' => array(
                'com://admin/versions.controller.behavior.revisable'
            )
        ));

        parent::_initialize($config);
    }
}
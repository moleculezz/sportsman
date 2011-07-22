<?php

class ComSportsmanModelDivisions extends ComDefaultModelDefault
{
    public function __construct(KConfig $config)
    {
        parent::__construct($config);

        $this->_state
            ->insert('enabled', 'int');
    }
    
}
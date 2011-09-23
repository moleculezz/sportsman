<?php
/**
 * @category	Nooku
 * @package		Sportsman
 * @copyright	Copyright (C) G.D. Arends. All rights reserved.
 * @license		GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 */
 
 
 /**
 * Listbox Template Helper
 *
 * @author      G.D. Arends <https://github.com/moleculezz>
 * @category    Nooku
 * @package     Sportsman 
 */
class ComSportsmanTemplateHelperListbox extends ComDefaultTemplateHelperListbox
{
    protected function _listbox($config = array())
 	{
 	    $config = new KConfig($config);
		$config->append(array(
			'name'		  => '',
			'filter' 	  => array(),
			'attribs'	  => array(),
			'model'		  => KInflector::pluralize($this->getIdentifier()->package),
		    'prompt'      => '- Select -', 
		    'unique'	  => true
		))->append(array(
			'value'		 => $config->name,
			'selected'   => $config->{$config->name},
		    'identifier' => 'com://'.$this->getIdentifier()->application.'/'.$this->getIdentifier()->package.'.model.'.KInflector::pluralize($config->model)
		))->append(array(
			'text'		=> $config->value,
			'column'    => $config->value,
			'deselect'  => true,
		))->append(array(
		    'sort'	    => $config->text,
		));
		
		$list = KFactory::get($config->identifier)->limit(0)->set($config->filter)->sort($config->sort)->getList();
		
		//Get the list of items
 	    $items = $list->getColumn($config->value);
		if($config->unique) {
		    $items = array_unique($items);
		}

		//Compose the options array
        $options   = array();
 		if($config->deselect) {
         	$options[] = $this->option(array('text' => JText::_($config->prompt)));
        }
		
        
        foreach($items as $key => $value) 
        {
            $item      = $list->find($key);
            $optdata = array();
            if($config->optdata) {
                
                foreach($config->optdata as $key => $val) {
                    $optdata['data-'.$key] = $item->{$val};
                }
            }
            $options[] =  $this->option(
                array(
                    'text'    => $item->{$config->text}, 
                    'value'   => $item->{$config->value},
                    'attribs' => $optdata
                )
            );
        }
		
		//Add the options to the config object
		$config->options = $options;

		return $this->optionlist($config);
 	}
 	
    public function sports( $config = array())
    {
        $config = new KConfig($config);
        $config->append(array(
            'model'    => 'sports',
            'name'     => 'sportsman_sport_id',
            'value'    => 'id',
            'text'     => 'title',
            'prompt'   => '- Select Sport -',
            'attribs'  => array('id' => $config->name)
        ));
        return parent::_listbox($config);
    }
    
    public function clubs( $config = array())
    {
        $config = new KConfig($config);
        $config->append(array(
            'model'    => 'clubs',
            'name'     => 'sportsman_club_id',
            'value'    => 'id',
            'text'     => 'title',
            'prompt'   => '- Select Club -',
            'attribs'  => array('id' => $config->name)
        ));
        return parent::_listbox($config);
    }
    
    public function tournaments( $config = array())
    {
        $config = new KConfig($config);
        $config->append(array(
            'model'    => 'tournaments',
            'name'     => 'sportsman_tournament_id',
            'value'    => 'id',
            'text'     => 'title',
            'optdata' => array('division' => 'sportsman_division_id'),
            'prompt'   => '- Select Tournament -',
            'attribs'  => array('id' => $config->name)
        ));
        
        
        return $this->_listbox($config);
    }
    
    public function teams( $config = array())
    {
        $config = new KConfig($config);
        $config->append(array(
            'model'    => 'teams',
            'name'     => 'sportsman_team_id',
            'value'    => 'id',
            'text'     => 'title',
            'prompt'   => '- Select Team -',
            'attribs'  => array('id' => $config->name)
        ));
        return parent::_listbox($config);
    }
}
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
	//TODO Remove option when upgrade to 12.3
	/**
	 * Generates an HTML select option
	 *
	 * @param 	array 	An optional array with configuration options
	 * @return	string	Html
	 */
	public function option( $config = array() )
	{
		$config = new KConfig($config);
		$config->append(array(
			'value' 	=> null,
			'text'   	=> '',
			'disable'	=> false,
            'group'     => false,
			'attribs'	=> array(),
		));

		$option = new stdClass;
		$option->value 	  = $config->value;
		$option->text  	  = trim( $config->text ) ? $config->text : $config->value;
		$option->disable  = $config->disable;
		$option->group    = $config->group;
		$option->attribs  = $config->attribs;
		
		return $option;
	}
	
	//TODO Remove optionlist when upgrade to 12.3
	/**
	 * Generates an HTML select list
	 *
	 * @param 	array 	An optional array with configuration options
	 * @return	string	Html
	 */
	public function optionlist($config = array())
	{
		$config = new KConfig($config);
		$config->append(array(
			'options' 	=> array(),
			'name'   	=> 'id',
			'attribs'	=> array('size' => 1),
			'selected'	=> null,
			'translate'	=> false
		));
		
		$name    = $config->name;
		$attribs = KHelperArray::toString($config->attribs);
		
		$html = array();
		$html[] = '<select name="'. $name .'" '. $attribs .'>';
		
		foreach($config->options as $option)
		{
			$value  = $option->value;
			$text   = $config->translate ? JText::_( $option->text ) : $option->text;
            
			if ($option->group) {
			    $html[] = '<optgroup label="'.$text.'">'.$text.'</option>';
			    continue;
			}
			
			$extra = '';
			if(isset($option->disable) && $option->disable) {
				$extra .= 'disabled="disabled"';
			}
				
			if(isset($option->attribs)) {
				$extra .= ' '.KHelperArray::toString($option->attribs);;
			}
			
			if(!is_null($config->selected))
			{
				if ($config->selected instanceof KConfig)
				{
					foreach ($config->selected as $selected)
					{
						$sel = is_object( $selected ) ? $selected->value : $selected;
						if ((string) $value == (string) $sel)
						{
							$extra .= 'selected="selected"';
							break;
						}
					}
				} 
				else $extra .= ((string) $value == (string) $config->selected ? ' selected="selected"' : '');
			}
				
			$html[] = '<option value="'. $value .'" '. $extra .'>' . $text . '</option>';
		}
		
		$html[] = '</select>';

		return implode(PHP_EOL, $html);
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
    
    public function venues( $config = array())
    {
        $config = new KConfig($config);
        $config->append(array(
            'model'    => 'venues',
            'name'     => 'sportsman_venue_id',
            'value'    => 'id',
            'text'     => 'title',
            'prompt'   => '- Select Venue -',
            'attribs'  => array('id' => $config->name)
        ));
        return parent::_listbox($config);
    }
    
    public function tournaments($config = array())
    {
        $config = new KConfig($config);
        $config->append(array(
            'prompt'   => '- Select Tournament -',
            'attribs'  => array('id' => $config->name )
        ));
        
        $list = $this->getService('com://admin/sportsman.model.tournaments')
            ->set('active', true)
            ->getList();
            
        
        foreach($list as $tournament) {
            //TODO Optimization: Remove loop. Only division and tournament id and titles are needed
            foreach($tournament->toArray() as $key => $val) {
                $groups[$tournament->division_title][$tournament->title][$key] = $val;
            }
        }
        
        foreach($groups as $division => $tournaments) {
            $options[] = $this->option(array('text' => $division, 'group' => true));
            foreach($tournaments as $tournament) {
                $options[] = $this->option(array(
                    'text'    => $tournament['title'],
                    'value'   => $tournament['id'],
                    'attribs' => array(
                        'data-division' => $this->getTemplate()->getView()->getRoute(
                            'option=com_sportsman&view=teams&format=json&division='.$tournament['sportsman_division_id']
                        )
                    )
                ));
            }
        }
        $config->append(array('options' => $options));
        
        return $this->optionlist($config);
    }
    
    public function teams($config = array())
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
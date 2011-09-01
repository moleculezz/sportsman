<?php
class ComSportsmanControllerToolbarMenubar extends ComDefaultControllerToolbarMenubar
{
    public function getCommands()
    { 
        $name = $this->getController()->getIdentifier()->name;
        
        $this->addCommand('Dashboard', array(
        	'href'   => JRoute::_('index.php?option=com_sportsman&view=dashboard'),
        	'active' => ($name == 'dashboard')
        ));
        
        $this->addCommand('Tournaments', array(
        	'href'   => JRoute::_('index.php?option=com_sportsman&view=tournaments'),
        	'active' => ($name == 'tournament')
        ));
        
        $this->addCommand('Teams', array(
        	'href'   => JRoute::_('index.php?option=com_sportsman&view=teams'),
        	'active' => ($name == 'team')
        ));
        
        $this->addCommand('Divisions', array(
        	'href'   => JRoute::_('index.php?option=com_sportsman&view=divisions'),
        	'active' => ($name == 'division')
        ));
        
        $this->addCommand('Sports', array(
        	'href'   => JRoute::_('index.php?option=com_sportsman&view=sports'),
        	'active' => ($name == 'sport')
        ));
        
        return parent::getCommands();
    }
}
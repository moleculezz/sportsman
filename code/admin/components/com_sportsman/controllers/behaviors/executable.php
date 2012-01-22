<?php
/**
 * @category    Nooku
 * @package     Sportsman
 * @copyright   Copyright (C) G.D. Arends. All rights reserved.
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 */


/**
 * Executable Behavior Controller Class
 *
 * @author      G.D. Arends <https://github.com/moleculezz>
 * @category    Nooku
 * @package     Sportsman 
 */
class ComSportsmanControllerBehaviorExecutable extends ComDefaultControllerBehaviorExecutable
{  
    public function canBrowse()
    {
        $user = JFactory::getUser();
        $item = $this->getModel()->getItem();
        
        if($this->getMixer()->getIdentifier()->name == 'division') {
            
            if($user->gid == 18 && !$item->enabled) {
                return false;
            }
        }
        if($this->getMixer()->getIdentifier()->name == 'tournament') {
            
            if($user->gid == 18 && !$item->active) {
                return false;
            }
        }
        return true;
    }
    
    public function canRead()
    {
        $user = JFactory::getUser();
        $item = $this->getModel()->getItem();
        
        if($this->getMixer()->getIdentifier()->name == 'division') {
            
            if($user->gid == 18 && !$item->enabled) {
                return false;
            }
        }
        if($this->getMixer()->getIdentifier()->name == 'tournament') {
            
            if($user->gid == 18 && !$item->active) {
                return false;
            }
        }
        return true;
    }
    
    public function canEdit()
    {
        $user = JFactory::getUser();
        $item = $this->getModel()->getItem();
        
        if($this->getMixer()->getIdentifier()->name == 'division') {
            
            if($user->gid == 18 && !$item->enabled) {
                return false;
            }
        }
        if($this->getMixer()->getIdentifier()->name == 'tournament') {
            
            if($user->gid == 18 && !$item->active) {
                return false;
            }
        }
        return true;
    }
    
    public function canAdd()
    {
        $user = JFactory::getUser();
        $item = $this->getModel()->getItem();
        
        if($this->getMixer()->getIdentifier()->name == 'division') {
            
            if($user->gid == 18 && !$item->enabled) {
                return false;
            }
        }
        if($this->getMixer()->getIdentifier()->name == 'tournament') {
            
            if($user->gid == 18 && !$item->active) {
                return false;
            }
        }
        return true;
    }
    
    public function canDelete()
    {
        $user = JFactory::getUser();
        $item = $this->getModel()->getItem();
        
        if($this->getMixer()->getIdentifier()->name == 'division') {
            
            if($user->gid == 18 && !$item->enabled) {
                return false;
            }
        }
        if($this->getMixer()->getIdentifier()->name == 'tournament') {
            
            if($user->gid == 18 && !$item->active) {
                return false;
            }
        }
        return true;
    }
}
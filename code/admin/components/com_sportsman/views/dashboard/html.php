<?php

class ComSportsmanViewDashboardHtml extends ComHarbourViewHtml
{
    public function display()
    {
        
        //Set the joomla menu to visible
        KRequest::set('get.hidemainmenu', 0);
        
        return parent::display();
    }
}
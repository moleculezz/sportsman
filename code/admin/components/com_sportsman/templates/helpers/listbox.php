<?php
/**
 * @version		$Id: listbox.php 389 2011-07-02 11:31:53Z christianhent $
 * @category	Nooku
 * @package     Nooku_Examples
 * @subpackage  Harbour
 * @copyright	Copyright (C) 2010 Timble CVBA and Contributors. (http://www.timble.net)
 * @license		GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link		http://www.nooku.org
 */

/**
 * Description
 *   
 * @author   	Christian Hent <hent.dev@googlemail.com>
 * @category	Nooku
 * @package    	Nooku_Examples
 * @subpackage 	Harbour
 */
class ComSportsmanTemplateHelperListbox extends ComDefaultTemplateHelperListbox
{
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
}
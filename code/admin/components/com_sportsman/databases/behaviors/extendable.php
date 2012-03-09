<?php

class ComSportsmanDatabaseBehaviorExtendable extends KDatabaseBehaviorAbstract
{

    protected $_extending;

    public function __construct( KConfig $config = null)
    {
        $config->append(array('extending' => null));
        $this->_extending = $config->extending;

        parent::__construct($config);
    }

    /**
    * This will join the main table with the customs table..
    **/
    protected function _beforeTableSelect(KCommandContext $context)
    {
        $table     = $context->caller;
        $app       = $this->getIdentifier()->application;
        $package   = $this->getIdentifier()->package;
        $tablename = str_ireplace($package.'_', '', $table->getName());

        if($database = KService::get('com://' . $app . '/' . $package . '.database.table.'.$this->_extending)){
            $query = $context->query;

            if(!is_null($query)){
                $query->join('LEFT', $tablename.'_'.$this->_extending.' AS members', 'members.'.$table->get('_identity_column').' = tbl.'.$table->get('_identity_column'));
                $query->select('members.dob, members.gender, members.address, members.city, members.photo, members.ended_on, members.reason_ended');
            }
        }
        return true;
    }

    /**
    * After a new insert on the main table we also need to insert the profile fields.
    */
    protected function _afterTableInsert(KCommandContext $context)
    {
        $table     = $context->caller;
        $app       = $this->getIdentifier()->application;
        $package   = $this->getIdentifier()->package;
        $tablename = str_ireplace($package.'_', '', $table->getName());

        if($database = KService::get('com://' . $app . '/'.$package.'.database.table.'.$this->_extending)){
            $row = $database->getRow();
            foreach ($database->getSchema()->columns as $column) {
                $row->{$column->name} = $context->data->{$column->name};
            }
            $row->save();
            return true;
        }

    }


    /**
    * After the main table is updated we also need to update the members table.
    */
    protected function _afterTableUpdate(KCommandContext $context)
    {
        $table     = $context->caller;
        $app       = $this->getIdentifier()->application;
        $package   = $this->getIdentifier()->package;
        $tablename = str_ireplace($package.'_', '', $table->getName());

        if($database = KService::get('com://' . $app . '/'.$package.'.database.table.'.$this->_extending)){
            $row = $database->getRow();
            $row->id = $context->data->id;
            $row->load();
            $row->setData($context->data);
            $row->save();

            return true;
        }
    }

    /**
    * Deletes the profiles row after the main row is deleted
    */
    protected function _afterTableDelete(KCommandContext $context)
    {
        $app       = $this->getIdentifier()->application;
        $package   = $this->getIdentifier()->package;

        if($database = KService::get('com://' . $app . '/'.$package.'.database.table'.$this->_extending)) {
            $row = $database->getRow();
            $row->id = $context->data->id;
            $row->load();
            $row->delete();
        }
    }
}
<?php

class ComSportsmanDatabaseBehaviorExtendable extends KDatabaseBehaviorAbstract
{
    /**
    * 
    * The name of the table 
    * example if u want to extend #__users and the table where u want to store the data in #__users_profiles
    * $_extending would be 'profiles'
    * @var string
    */
    protected $_extending;
    
    /**
    * 
    * The identity_column of the table we want to extend.
    * @var string
    */
    protected $_table_id;

    public function __construct( KConfig $config = null)
    {
        $config->append(array('table' => null,'table_id'=> null));
        $this->_extending = $config->table;
        $this->_table_id  = $config->table_id;
        
        parent::__construct($config);
    }
  
 
    /**
    * Modify the select query
    *
    *
    * This will join the main table with the customs table..
    */
    
    
    protected function _beforeTableSelect(KCommandContext $context)
    {
        $table     = $context->caller;
        $app       = $this->getIdentifier()->application;
        $package   = $this->getIdentifier()->package;
        $tablename = str_ireplace($package.'_', '', $table->getName());
        
        if($database = KService::get('com://' . $app . '/' . $package . '.database.table.'.$this->_extending)){
            $query = $context->query;
            
            if(!is_null($query)){
                $query->join('LEFT', $tablename.'_'.$this->_extending.' AS members', 'members.'.$this->_table_id.' = tbl.'.$table->get('_identity_column'));
                $query->select('members.*');
            }
        }
        
        return true;
    }

    /**
    * After a new insert on the main table we also need to insert the custom fields.
    *
    * This will be done to 'tablename'_cstms the key will be the same as the main table key.
    */
    
    protected function _afterTableInsert(KCommandContext $context)
    {
        $table     = $context->caller;
        $app       = $this->getIdentifier()->application;
        $package   = $this->getIdentifier()->package;
        $tablename = str_ireplace($package.'_', '', $table->getName());
        
        if($database = $this->getService('com://' . $app . '/'.$tablename.'.database.table.'.$this->_extending)) {
            //check if the is a cstms table. If not we don't want to extend this table.
            
            $row = $database->getRow();
            
            $row->{$this->_table_id} = $context->data->id;
            
            foreach ($database->getSchema()->columns as $column) {
                if($column->name != $this->_table_id){
                    $row->{$column->name} = $context->data->{$column->name};
                }
            }
            $row->save();
            return true;
        }
    }


    /**
    * After the main table is updated we also need to update the custom table.
    *
    * This is done here.
    */
    
    protected function _afterTableUpdate(KCommandContext $context)
    {
        $table     = $context->caller;
        $app       = $this->getIdentifier()->application;
        $package   = $this->getIdentifier()->package;
        $tablename = str_ireplace($package.'_', '', $table->getName());
        
        if($database = $this->getService('com://' . $app . '/'.$tablename.'.database.table.'.$this->_extending)){
            //check if the is a cstms table. If not we don't want to extend this table.
            $row = $database->getRow();
            
            $row->id = $context->data->id;
            if(!$row->load()){
                $row->save();
            }
            foreach ($database->getSchema()->columns as $column) {
                $row->{$column->name} = $context->data->{$column->name};
            }
            $row->save();
            return true;
        }
    }
}
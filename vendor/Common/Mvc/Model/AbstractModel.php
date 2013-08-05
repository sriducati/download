<?php

namespace Common\Mvc\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\TableGateway\TableGateway;

abstract class AbstractModel extends AbstractTableGateway {
    protected $table = '';
    protected $adapter;
    private $tableGateWay;
    
    public function __construct(Adapter $adapter) {
        $this->adapter = $adapter;
        $this->initialize ();
    }
    public function tableName($tableKey) {
        $tableName = '';
        switch ($tableKey) {
            case 'users' :
                $tableName = 'users';
                break;
            case 'shop_goods' :
                $tableName = 'shop_goods';
                break;
            case 'shop_categories' :
                $tableName = 'shop_categories';
                break;
        }
        return $tableName;
    }
    public function check_number($str) {
        if (empty ( $str )) {
            return;
        }
        $reg = "/^\+?[1-9][0-9]*$/";
        if (! preg_match ( $reg, $str )) {
            return;
        }
    }
    
    
    /*public function setTableGateWay($table){
    	   $this->tableGateWay = new TableGateway($table, $this->getAdapter());
    	   return $this->tableGateWay;
        
    }
    
    public function getTableGateWay(){
        	return $this->tableGateWay;
    }
    */
    public function dbUpdate($table, $data, $where){
    	   return $this->setTableGateWay($table)->update($data, $where);
    }
    
    
    
}


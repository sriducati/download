<?php

namespace Common\Mvc\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\AbstractTableGateway;

abstract class Abstract_Db_Model extends AbstractTableGateway {
    protected $table = '';
    protected $adapter;
    
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
}
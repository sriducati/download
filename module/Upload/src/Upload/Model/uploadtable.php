<?php
namespace Upload\Model;
use Zend\Db\Sql\Sql;
use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\ResultSet\ResultSet;

class uploadtable extends AbstractTableGateway
{
    protected $table = '';
    protected $adapter;
    private $tableGateWay;
    
	public function __construct(Adapter $adapter)
	{
		$this->adapter=$adapter;
		//print_R($this->adapter);
		$this->initialize();
	}
	
	public function displayme()
	{

		$sel = new Sql($this->adapter);
		$s = $sel->select('upimages');
		$s->where(array('status'=>1));
		$statement = $sel->prepareStatementForSqlObject($s);
		$comment = $statement->execute();
		$resultset = new ResultSet();
		$resultset->initialize($comment);
		$result = $resultset->toArray();

		return $result;

	}
	
	public function manageme($user)
	{
	
		$sel = new Sql($this->adapter);
		$s = $sel->select('upimages');
		$s->where(array('uname'=>$user,'status'=>1));
		
		$statement = $sel->prepareStatementForSqlObject($s);
		$comment = $statement->execute();
		$resultset = new ResultSet();
		$resultset->initialize($comment);
		$result = $resultset->toArray();

		return $result;
	
	}
	
	public function insertme($user,$file,$size)
	{
		$sel = new Sql($this->adapter);
		$s = $sel->insert('upimages');
		$time=time();
		$message='You Have Successfully Inserted'.$file;
		$data = array(
		    'uname'=>$user,
		    'status'=>1,
		    'uploaded'=>$file,
		    'downloaded'=>'',
		    'uptime'=>$time,
		    'ImageSize'=>$size,
		    'downtime'=>'',
		);
		$s->values($data);
		$statement = $sel->prepareStatementForSqlObject($s);
		$comment = $statement->execute();
	}
	
	public function updateme($file)
	{
		$sel = new Sql($this->adapter);
		$s=$sel->update('upimages');
		$s->where(array('uploaded'=>$file));
		$data = array(
				'status'=>0,
		);
		$s->set($data);
		$statement = $sel->prepareStatementForSqlObject($s);
		$comments = $statement->execute();
	
	}
	
    
}



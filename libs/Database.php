<?php

namespace Libs;

	class Database extends \PDO
	{

		function __construct()
		{
			parent::__construct(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASSWORD);
			parent::setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
		}
		public function select($sql,$array=array(),$fetchmode=\PDO::FETCH_ASSOC)
		{
			$st=$this->prepare($sql);
			foreach ($array as $key => $value) {
				$st->bindValue(":`$key`",$value);
			}
			$st->execute();
			return $st->fetchAll($fetchmode);
		}
		public function insert($table,$data)
		{
			ksort($data);
			$fieldNames=implode(',', array_keys($data));
			$fieldValues=':'.implode(',:', array_keys($data));
			$st=$this->prepare("INSERT INTO $table($fieldNames) VALUES($fieldValues)");
			foreach ($data as $key => $value) {
				$st->bindValue(":$key",$value);
			}
			return $st->execute();
		}
		public function update($table, $data,$where)
		{
			ksort($data);
			$fieldDetails=NULL;
			foreach ($data as $key => $value) {
				$fieldDetails.="$key=:$key,";
			}
			$fieldDetails=rtrim($fieldDetails,',');
			$st=$this->prepare("UPDATE $table SET $fieldDetails where $where");
			foreach ($data as $key => $value) {
				$st->bindValue(":$key",$value);
			}
			return $st->execute();
		}

		public function delete($table,$where)
		{
			return $this->exec("DELETE FROM $table WHERE $where ");
		}
	}
<?php
	namespace Project\Models;
	use \Core\Model;
	
	class Main extends Model
	{
                public function __construct()
	        {
		    parent::__construct();
                    if (!isset($_SESSION)) { session_start(); }

	        }
                
		public function getById($id)
		{
			return $this->findOne("SELECT * FROM task_table WHERE id=$id");
		}
		
		public function getAll($SortName, $StatusSort)
		{
			return $this->findMany("SELECT * FROM task_table ORDER BY $SortName $StatusSort ");
		}

                public function getLimitAll($page, $limit, $SortName, $StatusSort)
		{
			return $this->findMany("SELECT * FROM task_table ORDER BY $SortName $StatusSort LIMIT " . ( ( $page - 1 ) * $limit ) . ", $limit");
		}

      
                public function getCountRow()
		{
			return $this->setOne("SELECT * FROM task_table");
		}

	}

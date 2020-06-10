<?php
	namespace Project\Models;
	use \Core\Model;
	
	class Edit extends Model
	{
		public function getById($id)
		{
			return $this->findOne("SELECT * FROM task_table WHERE id=$id");
		}
		
		public function getAll()
		{
			return $this->findMany("SELECT id, title FROM page");
		}

                public function Delete($id)
		{
			return $this->setOne("DELETE FROM task_table WHERE id=$id");
		}
	}

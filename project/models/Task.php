<?php
	namespace Project\Models;
	use \Core\Model;
	
	class Task extends Model
	{
                public function __construct()
	        {
		    parent::__construct();
		    session_start();

	        }
                
		public function addTask($name, $email, $description, $completed, $edited = 0)
		{
       			 return $this->setOne("INSERT INTO task_table (Name, Email, Description, completed, edited) VALUES ('" . strip_tags($name) . "', '" . strip_tags($email) . "', '" . strip_tags($description) . "', $completed, $edited )");
                        
		}

                public function updateTask($id, $name, $email, $description, $completed, $edited)
		{
       			return $this->setOne("UPDATE task_table SET Name = '" . strip_tags($name) ."', Email = '" . strip_tags($email) ."', Description = '" . strip_tags($description) ."', completed = $completed, edited = $edited WHERE `id`={$id}");
                        
		}
	}

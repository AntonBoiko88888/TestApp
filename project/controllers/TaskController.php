<?php
	namespace Project\Controllers;
	use \Core\Controller;
	use \Project\Models\Task;
	
	class TaskController extends Controller
	{
                public function index() {
			$this->title = 'Операция выполнена успешно';

			$task = new Task;

                        $name = $_POST['Имя'];
                        $email = $_POST['E-mail'];
                        $description = $_POST['description'];
                        $completed = 0;
                        $edited = 0;
                        
                        if (isset($_POST['desc_old']) && ($_POST['desc_old'] !== $description)) $edited = 1;

                        if (isset($_POST['is_task']))  $completed = $_POST['is_task'];

                        if (isset($name) && isset($email) && isset($description)) {

                            if ($_GET['success_id'] != null) {
               			$res = $task->updateTask($_GET['success_id'], $name, $email, $description, $completed, $edited);
                                if ($res) $data["text_info"] = "Обновление задачи выполнено успешно!";
                                else $data["text_info"] = "При обновлении возникла ошибка, просим обратиться в тех поддержку.";
               		        return $this->render('info/index', $data);
                            }
                            else {
                                $res = $task->addTask($name, $email, $description, $completed, $edited);
                                if ($res) $data["text_info"] = "Добавление новой задачи выполнено успешно!";
                                else $data["text_info"] = "При добавлении возникла ошибка, просим обратиться в тех поддержку.";
               		        return $this->render('info/index', $data);
                            }
                       } else {
                            $data["text_info"] = "Одно или несколько полей формы не были заполнены, данные не были добавлены.";
               		    return $this->render('info/index', $data);
                       }
		}
	}

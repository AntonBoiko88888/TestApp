<?php
	namespace Project\Controllers;
	use \Core\Controller;
	use \Project\Models\Edit;
	
	class EditController extends Controller
	{
        public function index() {
			$this->title = 'Редактирование задачи';
                          if (!isset($_SESSION)) { session_start(); }

                        if (!empty($_SESSION['login']) or !empty($_SESSION['id'])) {

			                $edit = new Edit;

			               return $this->render('edit/index', $edit->getById($_GET['task_id']));
                        } else {
                            $data["text_info"] = "Вы не можете редактировать. Текущая сессия уже завершена! Вы можете: <br/><a style='color:white' href='http://idealist.kl.com.ua/login'>Войти заново</a> <br/><br/>или";
               		        return $this->render('info/index', $data);
                        }
		}

        public function delete() {
                    $this->title = 'Редактирование задачи';
                      if (!isset($_SESSION)) { session_start(); }


                    if (!empty($_SESSION['login']) or !empty($_SESSION['id'])) {

                            $edit = new Edit;
                        $edit->Delete($_GET['task_id']);
                        $data['text_info'] = "Задача удалена успешно!";

                        return $this->render('info/index', $data);
                    } else {
                        $data["text_info"] = "Вы не можете удалить. Текущая сессия уже завершена! Вы можете: <br/><a style='color:white' href='http://idealist.kl.com.ua/login'>Войти заново</a> <br/><br/>или";
                        return $this->render('info/index', $data);
                    }
		}
	}

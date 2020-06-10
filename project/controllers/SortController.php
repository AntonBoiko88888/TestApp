<?php
	namespace Project\Controllers;
	use \Core\Controller;
	use \Project\Models\Main;
	
	class SortController extends Controller
	{ 

 
		public function index() {

                        $SortName = $_POST['Сортировка_поле'];
                        $StatusSort = $_POST['Сортировка_статус'];
                        $uri = $_POST['uri'];
                         
                        $this->setWrite("SortName", $SortName);
                        $this->setWrite("StatusSort", $StatusSort);


                        header('Location: ' . $uri . '');

//			return $this->render('main/index', $data);
		}

                public function setWrite($namef, $data) {

                             $fd = fopen($namef. ".txt", 'w+');
                             fseek($fd, 0); // поместим указатель файла в начало
                             fwrite($fd, $data . ""); // запишем в начало строку
                             fclose($fd);
		}

	}	
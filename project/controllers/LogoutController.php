<?php
	namespace Project\Controllers;
	use \Core\Controller;
	use \Project\Models\Logout;
	
	class LogoutController extends Controller
	{   

                public function __construct()
	        {
		       if (!isset($_SESSION)) { session_start(); }

	        }


                /* Разлогиниваемся */
	        public function index()
	        {
                      $this->title = 'Выход';
		       session_destroy();
                       header('Location: /');
                       return $this->render('main/index');
		       exit;
	        }
	
	}
		
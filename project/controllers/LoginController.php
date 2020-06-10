<?php
	namespace Project\Controllers;
	use \Core\Controller;
	use \Project\Models\Login;
	
	class LoginController extends Controller
	{   

                public function __construct()
	        {
		    

	        }

                public function index() {
			$this->title = 'Страница входа в приложение';

                  if(isset($_POST['user_name']) && isset($_POST['password'])){

                       $login = new Login();
                       $reslt = $login->signin();     
                       if($reslt === 'signin')
                       {
                             header('Location: /');
                             return $this->render('main/index');
                       }
                       else
                       {
                             $data["error"] = "Логин или пароль неверный, попробуйте снова.";
                             return $this->render('login/index', $data);
                       }

                  
                  } else {
                             return $this->render('login/index');
                  }
                

			
			
		}
	}
		
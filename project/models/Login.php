<?php
     namespace Project\Models;
     use \Core\Model;
	
     class Login extends Model
     {
        
        public function __construct()
	{
		parent::__construct();
		if (!isset($_SESSION)) { session_start(); }

	}

	public function signin()
	{

            if(isset($_POST['user_name']) && isset($_POST['password'])){
           
		
		$user_name=$_POST['user_name'];
		$password=md5($_POST['password']);

		$res = $this->getDataLogin($user_name, $password);
//		$count = count($res);
		if ($res) {
                        $_SESSION['login']= $user_name; 
                        $_SESSION['id'] = 1;

                      return 'signin';
		} 
		   else {
			$_SESSION['login']= null; 
                        $_SESSION['id'] = null;
                      return 'invalid user';
		}
            } 
            else {
                  return 'no data';
            }
		
		
	}	

        function getDataLogin($user_name, $password)
	{
		return $this->findOne("SELECT * FROM `test_panel` WHERE login = '".$user_name."' AND password = '".$password."'");
	}

     }	
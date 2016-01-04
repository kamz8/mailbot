<?php
require_once('class.ini.php');

class user
{
	private $_login;
	private $_passwort;
	
	
public function __construct()
{
	$ini = new ini_file;
	$ini->setFileName('./include/config/account.ini');
	$ini->load();
	//$ini->printini(); echo'<br />';
	$this->_login = $ini->getElementValue('user','login');
	$this->_passwort = $ini->getElementValue('user','pass');
		
}

public function getLogin()
{
	return $this->_login;	
}

public function getPasswort()
{
	return $this->_passwort;	
}

}

class access  
{
	private $_account;
	private $_user_auth;
	private $_logged_in;
	
public function __construct()
	{
		session_start();	
		$_SESSION['user']='';
		$this->_user_auth= 2;
		$this->_logged_in = false;		

	}
	
	function __Destruct()
	{
		session_destroy();
		//unset($this->_logged_in);
		
	}
	
public	function login()
{
	if(isset($_POST['pass']) && isset($_POST['login']) ) 
	{		
		$login = $_POST['login'];
		$pass = md5($_POST['pass']);
		
		$user = new user;
			
        if($login == $user->getLogin() && $pass == $user->getPasswort() )
        {
        	$_SESSION['user'] = 'login';
			$this->_user_auth= true;	
			$this->_logged_in = true;
        }
		else 
		{ 
			$this->_user_auth= false;		
		
		}
	}
}
	
public	function logout()
		{
			if(isset($_GET['app']) && $_GET['app'] = "logout" )
			{
				$_SESSION['user']="logout";	
				unset($_SESSION['user']);
				$this->_logged_in = false;
				
			}
			
			
		}

public function login_layout()
{
	echo'<div class="container">
      			';
				if(!$this->_user_auth) $this->error();
				echo'
          <div class="row">
              <div class="col-md-4 col-md-offset-4">
                  <div class="panel panel-gray">
                   <div class="panel-heading">
                         <h3 class="panel-title">Proszę zaloguj się</h3>
                  </div>
             <div class="panel-body">
              <form class="form-horizontal" role="form" action="index.php" method="post">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-1 control-label"><i class="fa fa-user fa-lg"></i></label>
                <div class="col-sm-10">
                  <input type="login" name="login" class="form-control" id="inputUser" placeholder="Podaj login">
                </div>
              </div>
              
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-1 control-label"><i class="fa fa-key fa-lg"></i></label>
                <div class="col-sm-10">
                  <input type="password" name="pass" class="form-control" id="inputPassword" placeholder="Podaj hasło">
                </div>
              </div>
        
             
              <div class="form-group">
                <div class="col-md-offset-1 col-md-10">
                  <button type="submit" name="submite" value="1" class="btn btn-md btn-gray btn-block">Wyślij</button>
                </div>
              </div>
              </form>
                      
                  </div>
                </div>            	
              </div>
          </div>
      </div>
	  ';	
}

private function error()
{
	echo' 
      	      <div class="row">
        	<div class="col-md-4 col-md-offset-4">
            	<div class="alert alert-danger" >Podany login lub hasło są błędne!</div>
                
           </div>

        

	
	';
}

public function issetAuth()
{
	if($this->_logged_in=true) return true;
		else return false;	
}

}//end class


?>
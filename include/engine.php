<?php
 
require("RewriteUrl.php");
require_once('./include/login.php');
/*class app
{

	private $_value;
	
	public function __construct($value)
	{
		$this->_attr;
		$this->_value;	
	
		$this->ifbloc();
	}
	
	static function instruct();
	private function ifbloc()
	{
		if(isset($_GET['app']) == $this->_value)
			$this->instruct();	
	}
}*/

class engine 
{
	private $_title;
	public $_mainName;
	private $_ptitle;
	private $_subtitle;

	public function browser()
	{
		$urli = new RewriteUrl;
		$urli -> getRootDir('mailbot/');
		
		$page1 = $urli -> getTag('page1');
		$page2 = $urli -> getTag('page2');	
	  	$this->getTitle($page1);
		
			//echo $page1.' '.;
		switch($page1)
		{
			case 'Home' && '': 
			echo' <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
							Panel Główny
							<small>Przegląd Statystyk</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  Panel Główny
                            </li>
                            
                        </ol>
                    </div>
                </div>
                <!-- /.row -->';
			
			break;
			
			case 'ustawienia': 
			echo' <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
							Ustawienia
							<small>Ustawienia aplikacji</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="./">Panel Główny</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-fw fa-cog"></i> Ustawienia
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->';
				
				echo"<div class=\"row\">
                    <div class=\"col-lg-12\">
                        <div id=\"alert-status\" class=\"alert alert-success alert-dismissable\" style=\"display:none\">
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
                            <i class=\"fa fa-check-circle-o fa-lg\"></i>  <strong>Zadanie zakończono z sukcesem.</strong> Zmieniono ustawienia. 
                        </div>
                    </div>
                </div>
				
				"; 
				
				include_once('class.settings.php');
				require_once('layout.settings.php');
				$settings = new Settings;
				
				$settings->userForm();
				$settings->serverForm();
	
			  if(isset($_POST['send1']))
			  {
				  $settings->updateUser();
			  }
			  if(isset($_POST['send']))
			  {
				  $settings->updateServer();
			  }		
			  
			  echo'<script src="./js/ajax.setings.js"></script>';		
			break;
			
			case 'baza-kontaktow': 
			echo' <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
							Baza Kontaktow
							<small></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="./">Panel Główny</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-fw fa-cog"></i> Baza Kontaktow
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				                <div class="row">
                    <div class="col-lg-12">
                        <div id="alert-status" class="alert alert-success alert-dismissable" style="display:none">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <i class="fa fa-check-circle-o fa-lg"></i>  <strong>Zadanie zakończono z sukcesem.</strong> Importowano konakty z pliku do bazy danych. 
                        </div>
                    </div>
                </div>
                
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Importowanie danych do bazy.</h3>
                    </div>
                    <div class="panel-body">
            <form enctype="multipart/form-data" class="form-horizontal" role="form" id="mailform" action="./baza-kontaktow" method="post">
              
              <div class="form-group has-feedback">
                <label for="dbFile" class="col-sm-2 control-label">Wybierz plik z danymi</label>
                  <div class="col-lg-10">
                    <div class="input-group">
                      	<span class="input-group-btn">
                        	<span class="btn btn-gray btn-file ">
                           	Browse <input type="file" name="fileInput" accept="*.cvs">
                       	</span>                        
                      </span>
                      <input type="text" class="form-control" disabled id="upload-label" value="" placeholder="Wybierz plik..." />
					  

                    </div><!-- /input-group -->
                  </div><!-- /.col-lg-6 -->  
              </div>

              <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                  <button type="submite" name="submit" class="btn btn-md btn-gray btn-block container">Wyślij</button>
                </div>
              </div>
              
              
              
              </form>
                        
                                      
			  </div>
            </div>
			<script src="./js/uploads.js"></script>
				
				'; 
			require_once('./include/class.uploadfile.php');
			

			if( isset($_POST['submit']) && $_POST['submit']=1)
			{
			  $file = new UploadFile('./uploads');
			  $file->startUplod();
			  	
			  require_once('./include/class.importtodb.php');

			  $importCsv = new ImportToDb;
			  
			  $importCsv->import('mail_data',$file->getFileSaveFolder().'/'.$file->getFileName());
			  echo'<script>$(\'#alert-status\').css("display","inherit")</script>';
			  $file->remove();
			}
			
			break;
			
			case 'rozpocznij-kampanie': 
			
			echo' <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
							Rozpocznij Kampanie
							<small>Rozpocznij Wysyłanie Maili</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="./">Panel Główny</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-fw fa-cog"></i> Rozpocznij Kampanie
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				
				';  
				require('./include/send-layout.php');
				echo'<script src="./js/ajax.send.js"></script>';
				
				if(isset($_POST['send']) && $_POST['send']=1)
				{
					echo'odebrano';	
				}
			break;
			
/*			case 'logout': 
				logout();
			break;*/	
			default:
			echo' <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
							404
							<small>Nie odnaleziono strony!</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="./">Panel Główny</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-fw fa-file""></i> 404
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				
				'; 
			break;
		}
			  
	}//
	
	private function getTitle($get_page)
	{
		if($get_page == "") $this->_title = $this-> _mainName;
		else $this->_title = $this-> _mainName.'::'.$get_page;	
	}
	
	public function title()
	{
		return $this->_title;	
	}
	
	public function getPageTitle()
	{
		return $this->_ptitle;	
	}
	
	public function getSubtitle()
	{
		return $this->_subtitle;	
	}
	
}



?>
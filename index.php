<?php
session_start();

//require_once('./include/sendmail.php');
require_once('./include/engine.php');
require_once('./include/login.php');

$main = new engine;
$main->_mainName = "MailerBot";
$title =$main->title();
/*				if(isset($_GET['app']) == 'stat_add&tocken=3sd456gds4567')
				{
					echo'ok';
				}*/

$page = '';	
if(isset($_GET['page1']))  
{
$page = $_GET['page1'];

if($page == 'logout') logout();

}
?>
<!doctype html>
<html>
<head>
 	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bot do marketingu emailingowego. Proste rzarządzanie kampanią mailingową i jej prosta automatyzacja.">
    <meta name="author" content="Kamil Żmijowski">
<script>
  $(document).ready(function() {
	$('#bmone2t-1276\.1\.1\.1').hide();
	
	
});
</script>	
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

    <title><?php echo $main->title();?></title>
    

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>"
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->   

</head>

<body>
<?php

login();


if (isset($_SESSION['admin']) && $_SESSION['admin']=='ok')
{		echo'
	 <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./"><i class="fa fa-envelope-o fa-lg"></i>&nbsp;Mailer Bot</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
             
                        <li>
                            <a href="logout"><i class="fa fa-fw fa-power-off"></i> <span style="font-weight:bold">Wyloguj</span></a>
                        </li>
                
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li '; if($page == '') echo ' class="active" '; echo'>
                        <a href="./"><i class="fa fa-fw fa-dashboard"></i> Panel Główny</a>
                    </li>
                    <li '; if($page == "ustawienia") echo 'class="active"'; echo'>
                        <a href="ustawienia"><i class="fa fa-fw fa-cog"></i> Ustawienia</a>
                    </li>
                    <li '; if($page == "baza-kontaktow") echo ' class="active"'; echo'>
                        <a href="baza-kontaktow"><i class="fa fa-fw fa fa-database"></i> Baza Kontaktów</a>
                    </li>
                    <li '; if($page == 'rozpocznij-kampanie') echo 'class="active"'; echo'>
                        <a href="rozpocznij-kampanie"><i class="fa fa-fw fa-envelope-o"></i> Rozpocznij Kampanię</a>
                    </li>
   
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">';
			
				$main->browser();
				
            echo'</div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

	';		


}


?>
	
      <!-- jQuery -->
      <script src="js/jquery.js"></script>
  
      <!-- Bootstrap Core JavaScript -->
      <script src="js/bootstrap.min.js"></script>
      

</body>
</html>

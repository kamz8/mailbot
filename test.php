<?php
/*if(isset($_GET['app']) && $_GET['app'] == 'ajax-qwery')
{
	$subject = $_POST['subject'];
	$checkbox = $_POST['checkbox']; 
	$x = 2;
	
	for($i=1;$i<=5;$i++)
	echo $i."/";
}*/
require_once('./include/class.ini.php');
		$cfg = new ini_file;
		$cfg->setFileName('./include/config/account.ini');
		$cfg->load();
		$cfg->printini();
		echo'<br />';
		$cfg->updateValue('user','login','admin');
		$cfg->save();
		$cfg->load();
		$cfg->printini();
?>
<?php
if(isset($_GET['app']) && $_GET['app'] == 'ajax-qwery')
{
	$subject = $_POST['subject'];
	$checkbox = $_POST['checkbox']; 
	$x = 2;
	
	for($i=1;$i<=5;$i++)
	echo $i."/";
}
?>
<?php
if(isset($_POST['send']) && $_POST['send']=1)
{
	$subject = $_POST['subject'];
	$checkbox = $_POST['checkbox']; 
	$x = 2;
	echo '5';
	sleep(1);
	for($i=1;$i<=5;$i++)
	echo $i."/";
}

?>
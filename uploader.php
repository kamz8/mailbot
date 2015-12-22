<?php
require_once('./include/class.uploadfile.php');
if(isset($_POST['submit']) && $_POST['submit']=1)
{
$file = new UploadFile('./uploads');
$file->startUplod();
echo $file->getFileName();
}

?>
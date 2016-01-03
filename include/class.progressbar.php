<?php
class ProgressBar
{
	private $percentDone = 0;
	private $id;
	private $pId;
	private $tId;
	private $textId;
	private $decimals = 1;
	
	
	function __construct($percentDone = 0) 
	{
		$this->id = 'pb';
		$this->pId = '#loading';
		$this->tId = '#loading div';
		$this->textId = 'pb_text';
		$this->percentDone = $percentDone;
	}
	
	public function render() 
	{

	  echo $this->getContent();
	  $this->flush();
		
	}	
	
	private function getContent()
	{
		$content = NULL;
		$this->percentDone = floatval($this->percentDone);
		$percentDone = number_format($this->percentDone, $this->decimals, '.', '') .'%';
		$content .= '
          	
					<div id="loading" class="progress progress-striped active">
                    	<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
                    </div> '."\r\n";	
		
		return $content;
	}
	
	
	public function setProgress($percentDone, $text = '')
	{
		$this->percentDone = $percentDone;
		$text = $text ? $text : number_format($this->percentDone, $this->decimals, '.', '').'%';
		echo'
		<script>

			$("#loading .progress-bar").css("width","'.$percentDone.'%");';

		if ($text) {
			echo"\n".'$("#loading").HTML(\''.htmlspecialchars($text).'\');';
		}
		echo'</script>'."\r\n";
		$this->flush();	
		
	}
	
	private	function flush() {
		echo str_pad('', intval(ini_get('output_buffering')))."\n";
		
		flush();
	}	
}
?>
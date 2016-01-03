<?php
class Filter
{
	public function dataFilter($input)
	{
		$input = trim($input);
		$input = htmlspecialchars($input);
		$input = addslashes($input);
		return $input;
	}
}
?>
<?php

class View
{
	public function __construct()
	{

	}

	public function render ($viewTemplate)
	{
		$viewPath = __DIR__ . '/../view/' . $viewTemplate;
		if (file_exists($viewPath) === true) {
			require($viewPath);
		} else {
			echo 'View does not exist';
		}
	}
}
<?php 

class View
{
	private $path;
	private $data;
	private $templatePath;
	
	public function __construct($viewPath, $viewData=[], $templatePath=null)
	{
		$this -> path = $viewPath;
		$this -> data = $viewData;
		$this -> templatePath = $templatePath;
	}

	public function generate()
	{
		extract ($this -> data);
		if ($this -> templatePath === null)
		{
			include VIEWS.$this -> path;
		}
		else 
		{
			ob_start();
			include VIEWS.$this -> path;
			$viewContent = ob_get_clean();

			include VIEWS.'templates/'.$this -> templatePath;
		}
	}
}

 ?>
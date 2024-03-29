<?php
	class html
	{
		private $sHtml = '';
		private $sTitle = '';
		private $sFavicon = '';
		private $sHtmlBody = '';
		private $aCss = [];
		private $aJs = [];

		public function __construct()
		{

		}

		private function renderHtml()
		{
			$sHtml = '';
			$sHtml .= '
<!DOCTYPE html>
<html>
    <head>
		<title>' . $this->sTitle .'</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="robots" content="index,follow" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
		<meta name="viewport" content="width=device-width, initial-scale=1">';
			
			if(!empty($this->sFavicon))
			{
				$sHtml .= '
		<link rel="shortcut icon" type="image/png" href="' . $this->sFavicon . '"/>';
			}

			if(is_array($this->aCss) && sizeof($this->aCss))
			{
				foreach($this->aCss as $sCss)
				{
					$sHtml .= '' . $sCss;
				}
			}
			
			if(is_array($this->aJs) && sizeof($this->aJs))
			{
				foreach($this->aJs as $sJs)
				{
					$sHtml .= '' . $sJs;
				}
			}
	$sHtml .= '
	</head>
	<body>


	' . $this->sHtmlBody . '';

			if(is_array($this->aJs) && sizeof($this->aJs))
			{
				foreach($this->aJs as $sJs)
				{
					$sHtml .= '' . $sJs;
				}
			}

	$sHtml .= '
    </body>
</html>';

			$this->sHtml = $sHtml;
		}

	public function addHtml($sHtml, $bWrapper = false, $sTagname = '')
	{
		if(!$bWrapper){
			$this->sHtmlBody .=  $sHtml;
		}   
		else {
			if(empty($sTagname)) {
				$sTagname = 'div';
			}

			$this->sHtmlBody .= '
				<'. $sTagname . '>
					<div class="justified">
						<div class="content">
						'. $sHtml .'
						</div>
					</div>
				</'. $sTagname . '>
			';
		}
	}

	public function addCss($sFile){
		$this->aCss[] = '<link rel="stylesheet" type="text/css" href="' . ROOT_URL . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . $sFile . '"/>';
	}
	public function doOutput()
	{
		if(empty($this->sHtml))
		{
			$this->renderHtml();
		}

		if(!empty($this->sHtml))
		{
			echo trim($this->sHtml);
			exit;
		}
		else
		{
			echo "NO OUTPUT FOUND!";
			exit;
		}
	}

	public function setTitle($sTitle)
	{
		$this->sTitle = $sTitle;
	}
	public function addJs($sFile)
	{
        $this->aJs[] = '<script type="text/javascript" src="' . ROOT_URL . 'scripts' . "/" . $sFile . '"/></script>';
    }
}

?>
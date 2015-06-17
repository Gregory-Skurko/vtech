<?php
	function getFiles($dir) {  
		if(is_dir($dir)) { 			
			$files = scandir($dir); 
			for($i=0; $i<sizeof($files); $i++) {  
				if (substr($files[$i], -1) !== '\\') {
					$files[$i] = $dir.$files[$i].'\\';
				}	
			}
			return $files;
		}
		return null;
	}
	
	if (isset($_POST["go"])) {
		$files = getFiles($_POST["path"]);
	}
	
	include("laba3.html")
?>

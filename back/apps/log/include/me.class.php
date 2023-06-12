<?php
class meClass{
	private $app = "log";
	private $dbc = null;
	
	function __construct($dbc=null){
		$this->dbc = $dbc;
	}
	
	private $header_meta = array(
		array('table'		,"Table",			'fa fa-group'),
		array('timeline'	,"Timeline",	'fa fa-user')
	);
	
	function PageHeader($active){
		echo '<div id="breadcrumb">';
			echo '<ul class="breadcrumb push-down-0">';
				echo ' <li><a href="?app='.$this->app.'"> Administration</a></li>';
				echo ' <li><a href="?app='.$this->app.'"> Activity Log</a></li>';
				foreach($this->header_meta as $header){
					if($header[0]==$active){
						echo '<li class="active">'.$header[1].'</li>';;
					}
				}	
			echo '</ul>';
		echo '</div>';
				
	}
	
	function PageTabPanel($active){
		echo '<div class="page-tabs">';
		foreach($this->header_meta as $header){
			echo '<a href="?app='.$this->app.'&view='.$header[0].'"'.($header[0]==$active?' class="active"':'').'>';
				echo ''.$header[1];
			echo '</a>';
		}
		echo '</div>';
	}
	
	
	
	
	
	
}
?>

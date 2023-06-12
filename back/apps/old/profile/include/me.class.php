<?php
class meClass{
	private $app = "profile";
	private $dbc = null;
	
	function __construct($dbc=null){
		$this->dbc = $dbc;
	}
	
	private $header_meta = array(
		array('main'			,"Main",			'fa fa-group'),
		array('edit_profile'	,"Edit Profile",	'fa fa-user')
	);
	
	function PageHeader($active){
			echo '<ul class="breadcrumb">';
				echo ' <li><a href="?app='.$this->app.'"> Administration </a></li>';
				echo ' <li><a href="?app='.$this->app.'"> Profile</a></li>';
				foreach($this->header_meta as $header){
					if($header[0]==$active){
						echo '<li class="active">'.$header[1].'</li>';;
					}
				}	
			echo '</ul>';
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

<?php
class meClass{
	private $app = "transfer";
	private $dbc = null;
	
	function __construct($dbc=null){
		$this->dbc = $dbc;
	}
	
	private $header_meta = array(
		array('transfer'	,"Transfer Villa Rental Rate",	'fa fa-group'),
		//array('user'	,"User",	'fa fa-user')
	);
	
	function PageHeader($active){
		echo '<div id="breadcrumb">';
			echo '<ul class="breadcrumb push-down-0">';
				echo ' <li><a href="?app='.$this->app.'"> VILLAS Management</a></li>';
				echo ' <li><a href="?app='.$this->app.'"> Transfer Villa Rental Rate</a></li>';
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

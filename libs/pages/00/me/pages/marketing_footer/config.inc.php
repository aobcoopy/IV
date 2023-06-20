<?php
//echo $_REQUEST['des'].'----'.$_REQUEST['sub'].'----'.$_REQUEST['cate'];
if($_REQUEST['des']==110) //--- srilanka
{
	if($_REQUEST['sub']=='all' && $_REQUEST['cate']=='0')
	{
		include "srilunka.inc.php";
	}
	elseif($_REQUEST['sub']=='111' && $_REQUEST['cate']=='0')
	{
		include "srilanka-galle.inc.php";
	}
}
elseif($_REQUEST['des']==100) //---bali
{
	if($_REQUEST['sub']=='all' && $_REQUEST['cate']==0)
	{
		include "bali.inc.php";
	}
}
else
{
}
?>

<?php /*?><div class="container-fluid new_foot webss padtop50 <?php echo $f_foot_2; ?>"></div><?php */?>
<?php

    //echo "<br><br>file = ". dirname(__FILE__) . "/" . _DESTINATION_SLUG . "-" . _SUBDESTINATION_SLUG . ".inc.php";

    if( file_exists( dirname(__FILE__) . "/" . _DESTINATION_SLUG . "-" . _SUBDESTINATION_SLUG . ".inc.php") ) 
	{
		include_once( dirname(__FILE__) . "/" . _DESTINATION_SLUG . "-" . _SUBDESTINATION_SLUG . ".inc.php" );
	}
    else 
	{
		include "general.inc.php";
	}
?>
<?php /*?><div class="container-fluid new_foot webss padtop50 <?php echo $f_foot_2; ?>"></div><?php */?>
<?php
if($_REQUEST['page']=='home' || $_REQUEST['page']=='' || $_REQUEST['page']=='forrent')//
{
}
else
{
	?><div style="height: 20px;"></div><?php
}
?>

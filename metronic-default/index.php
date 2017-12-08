<?php
error_reporting(0);
require_once("includes/classes/xtemplate.class.php");
$page = isset($_GET['page'])?$_GET['page']:'home';


$array_profile = array("signin","signup","forgotyourpassword","page-404");

// -------------------------
$page = (isset($_GET['page']) && $_GET['page']!='home'  && $_GET['page']!='index') ? $_GET['page'] : "home";

if(in_array($page,$array_profile))
{
		// echo $page ;
	if($page=='signin'||$page=='signup'||$page=='forgotyourpassword'||$page=='page-404'){
		$xtpl = new XTemplate("./template/index-signin.html");
	}
	else if($page=="binarytree"){
		$xtpl = new XTemplate("./template/index-tree.html");
	}
	else	
	
	$xtpl = new XTemplate("./template/index.html");
}
else
{
	$xtpl = new XTemplate("./template/index.html");
}

if(file_exists("template/page/".$page.".html")){
 $xtpl->assign_file("action_file","template/page/".$page.".html");
}
else{
$xtpl = new XTemplate("./template/index-signin.html");
 $xtpl->assign_file("action_file","template/page/page-404.html");
}


// -------------------------

$xtpl->parse('main');
$xtpl->out('main');
?>
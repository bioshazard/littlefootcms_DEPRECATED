<?php 
class dashboard extends app

public function main($var)
{
	$cwd = getcwd();
	
	foreach(scandir(ROOT.'apps') as $app)
	{
		if($app == '.' || $app == '..' || !is_file(ROOT.'apps/'.$app.'/admin.php')) continue;
		
		chdir(ROOT.'apps/'.$app);
		
		echo '<div style="border: 1px solid #000; float: left; width: 350px; padding: 10px; margin: 10px">
			<h3>'.$app.'</h3>
		';
		ob_start();
		include 'admin.php';
		echo str_replace('%appurl%', '%baseurl%apps/manage/'.$app.'/', ob_get_clean());
		echo '</div>';
	}
	chdir($cwd);
}

?>
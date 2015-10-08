<?php include('includes/config.php');?>
<?php include('includes/session_check.php');?>

<?php 

	if(!empty($_POST['domain']))
	{
		$domain = $_POST['domain'];
	}

	if(!empty($_POST['vhost']))
	{
		$vhost = $_POST['vhost'];
	}
?>

<?php
	if( !empty($_POST['domain']) && !empty($_POST['vhost']) )
	{
		$vhost = str_replace('$DOMAIN_REPLACE', $domain, $vhost);
		writeFileContent($domain, $vhost);
		echo 'Perfecto, ahora ejecutá:<br>';
		echo 'sudo sh /var/tools/nginx/addvhost.sh '.$domain.'<br>';
		echo '<br>';
		echo 'En caso de error para borrar ejecuta: <br>';
		echo 'sudo sh /var/tools/nginx/delvhost.sh '.$domain.'<br>';
	}
?>

<?php 

	function writeFileContent($domain, $content)
	{

		$domain = 'tmp/'.$domain;
	    $fp = fopen($domain, 'w');
	    fwrite($fp, $content);
	    fclose($fp);
	    chmod($domain, 0777);  //changed to add the zero

	    $tmp_path = 'tmp/'.$domain;
	    return true;
	}

?>
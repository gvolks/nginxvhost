<?php include('includes/config.php');?>
<?php session_start();?>
<html>
<head>
</head>

<body>

<form action="" method="POST" />
	<input type="password" id="password" name="password" />
</form>

<?php if(!empty($_POST['password'])):?>
	
	<?php if($_POST['password'] == PASSWORD):?>		
		<?php $_SESSION['logged_in'] = TRUE;?>
		<?php header("Location: ". BASE_URL . "/nginx.php");?>
	<?php endif;?>
	
<?php endif;?>

</body>

</html>
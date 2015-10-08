<?php include_once('includes/config.php');?>
<?php session_start();?>

<?php if($_SESSION['logged_in'] != TRUE):?>
	<?php header("Location: " . BASE_URL . "/index.php");?>
<?php endif;?>
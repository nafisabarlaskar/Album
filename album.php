<?php 
	session_start();
	$username = $_SESSION['username'];
	$dir_name = hash('ripemd160',$username);
	$structure1 = "/Users/nafisabarlaskar/www/bootstrap/".$dir_name;
	$albums = $structure1."/album";
	$album_name = $_POST['name'];
    $description = $_POST['message'];
    $album_name_path = $albums."/".$album_name;
    if (!file_exists($album_name_path)){
       	mkdir($album_name_path, 0777, true) or
        	die('Failed to create album...');
    }
    else
    {
    	echo "<script type='text/javascript'>alert('File name already exists!');</script>";
    }
	header('Location: albumview.php');
?>
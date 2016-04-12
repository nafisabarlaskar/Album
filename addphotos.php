<?php
	session_start();
	$checkbox = $_POST['check'];
	if(!empty($_POST['albumselect']))
	{
		$album_name = $_POST['albumselect'];
	}

	$username = $_SESSION['username'];
	$dir_name = hash('ripemd160',$username);
	$structure = "/Users/nafisabarlaskar/www/bootstrap/".$dir_name;
	$structure2 = "/Users/nafisabarlaskar/www/bootstrap/".$dir_name."/thumbnails";
    $structure1 = $structure."/album";
    $ip = getenv('ALBUM_MYSQL_HOST');
    if ($ip == null)
    {
        $localhost = 'localhost';
        $root = 'root';
    }
    else
    {
        $localhost = $ip;
        $root = '';
    }
    $p = getenv('ALBUM_MYSQL_ROOT_PASSWORD');
    if($p == null)
    {
        $passwrd = 'sslab34182';
    }
    else
    {
        $passwrd = $p;
    }  
    $con = @mysql_connect($localhost,$root,$passwrd)
    or die('Could not connect to the mysql server!');
    mysql_select_db("SSLAB34182", $con)
    or die('Database not selected!');
	for ($i = 0; $i < sizeof($_POST['check']); $i++)
	{
		$path = $structure1."/".$album_name."/".$checkbox[$i];
		$file_path = $structure2."/".$checkbox[$i];
		$system_name = $checkbox[$i];
		if (!copy($file_path, $path)) {
    		echo "failed to copy file!\n";
		}
		$sql = "SELECT ID FROM SSLAB34182.Photos WHERE System_Filename='".$checkbox[$i]."'";
		$query = mysql_query($sql);
        $row = mysql_fetch_assoc($query);
       	$id= $row['ID'];
        $sql_new = "INSERT INTO SSLAB34182.Albums (`Photo_ID`,`Username`,`Album_Name`,`System_Name`,`Path`) 
        VALUES ($id, '$username', '$album_name', '$system_name', '$path')" ;       
        if(!mysql_query($sql_new, $con))
        {
            die('Error in query: '.mysql_error());
        }
        else{
        	?>
        	<?php
        }       

	}
	header('Location: photoview.php');
	
?>
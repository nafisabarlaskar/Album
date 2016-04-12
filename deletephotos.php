<?php 
	session_start();
	$checkbox = $_POST['check'];
	
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
	$username = $_SESSION['username'];
	$album_name = $_GET['album_name'];
	//echo $album_name;
	$dir_name = hash('ripemd160',$username);
	$structure = "/Users/nafisabarlaskar/www/bootstrap/".$dir_name;
	$structure2 = "/Users/nafisabarlaskar/www/bootstrap/".$dir_name."/album/".$album_name;
  
  for ($i = 0; $i < sizeof($_POST['check']); $i++)
	{
  		$path = $structure2."/".$checkbox[$i];
  		
  		$sql = 'select ID from SSLAB34182.Albums where Album_Name="'.$album_name.'" and System_Name="'.$checkbox[$i].'"';
  		$query = mysql_query($sql);
      $index = 0;
      $rows = array();
      while($row = mysql_fetch_assoc($query))
      {
          $rows[$index] = $row;
          $index++;
      }
      //print_r($rows);
      unlink($path);
      foreach ($rows as $key => $value) 
      {
  	      $sql1 = "delete from SSLAB34182.Albums where ID=".$value['ID'];
          $res1 = mysql_query($sql1);
          if(!$res1)
          {
              echo "Error in Query:".@mysql_error();
          }
          else
          {
             	header('Location: albumview.php');
          }
          //echo $value['ID'];
  	 }

  }
?>
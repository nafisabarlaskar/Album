<?php

require __DIR__ . '/vendor/autoload.php';
//require './vendor/predis/predis/autoload.php';
	//require "predis/autoload.php";
Predis\Autoloader::register();
 
// since we connect to default setting localhost
// and 6379 port there is no need for extra
// configuration. If not then you can specify the
// scheme, host and port to connect as an array
// to the constructor.

    $redis = new Predis\Client();
/*
    $redis = new Predis\Client(array(
        "scheme" => "tcp",
        "host" => "127.0.0.1",
        "port" => 6379));
*/
$con = @mysql_connect("localhost:8080","root","sslab34182")
                        or die('Could not connect to the mysql server!');
                        mysql_select_db("SSLAB34182", $con)
                        or die('Database not selected!');

	$username = 'nafisa';
	$password = '19d47814f065c71b0dcc04b722f7e6d3';
	$dir_name = hash('ripemd160',$username);
    $structure1 = "/Users/nafisabarlaskar/www/bootstrap/".$dir_name;

                                        $albums = $structure1."/album";
                                        $albm =  array_diff( scandir($albums), array(".", "..",".DS_Store") );
                                        if (!file_exists($structure1))
                                        {
                                            mkdir($structure1, 0777, true) or
                                            die('Failed to create folders...');
                                        }
                                        if (!file_exists($albums))
                                        {
                                            mkdir($albums, 0777, true) or
                                            die('Failed to create albums folders...');
                                        }
                                        $thumbnailDir = $structure1."/thumbnails";
                                        if (!file_exists($thumbnailDir))
                                        {
                                            mkdir($thumbnailDir, 0777, true) or
                                            die('Failed to create folders...');
                                        }
	$url = "https://ssbox-dev.unicloud.org.tw/sync/list?photo=true";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	$info = curl_getinfo($ch);
	$result = curl_exec($ch);
	curl_close($ch);
	$data = json_decode($result, true);
	//var_dump($data);
	$hash = $data['hash'];
	echo $hash;
	echo "Successfully connected to Redis<br/>";
	//$redis->set($username, $hash);
	
	//$present = $redis->exists($hash) ? "true" : "false";
	
	$value = $redis->get($username);
	//var_dump($value);
	//var_dump($value);
	if($hash != $value)
	{
		echo "Not equal";
		$redis->set($username, $hash);
		$hash = $data['hash'];
                                        //$value = $redis->get($username);
                                       
                                        
                                            $sql = "SELECT `Server_path`,`Modified_date`,`Content_hash`,`Actual_Filename`,`System_Filename` FROM Photos WHERE `Username`='$username'";
                                            $query = mysql_query($sql);
                                            if(!mysql_query($sql, $con))
                                            {
                                                die('Error in query: '.mysql_error());
                                            }
                                            $index = 0;
                                            $rows = array();
                                            while($row = mysql_fetch_assoc($query))
                                            {
                                                $rows[$index] = $row;
                                                $index++;
                                            }
                                            print_r($rows);
                                            echo "<br />";
                                            echo "<br />";
                                            $two_array = array();
                                            foreach($data['content'] as $key=>$value)
                                            {
                                                $two_array[$key]['Server_path'] = $value['path'];
                                                $two_array[$key]['Modified_date'] = $value['time'];
                                                $two_array[$key]['Content_hash'] = $value['hash'];
                                                $path = hash('ripemd160', $value['path']).".".$value['extension'];
                                                $two_array[$key]['Actual_Filename'] = basename($value['path']);
                                                $two_array[$key]['System_Filename'] = $path;
                                            }
                                            $newFiles = array_map('unserialize',array_diff(array_map('serialize', $two_array), array_map('serialize', $rows)));
                                            print_r($newFiles);
                                            echo "<br />";
                                            echo "<br />";
                                            $new_array = array_merge($newFiles,$rows);
                                            function cmp($a, $b) 
                                            {
                                                return $a['Actual_Filename'] - $b['Actual_Filename'];
                                            }
                                            usort($new_array, "cmp");
                                            //print_r($new_array);
                                            $new_arr = array_unique($new_array, SORT_REGULAR);
                                            //print_r($new_arr);
                                            $taken = array();
                                            foreach($new_arr as $key => $item) 
                                            {
                                                if(!in_array($item['Server_path'], $taken)) 
                                                {
                                                    $taken[] = $item['Server_path'];
                                                } 
                                                else 
                                                {
                                                    unset($new_arr[$key]);
                                                }
                                            }
                                           	echo "<br />";
                                            echo "<br />";
                                            print_r($new_arr);
                                            echo "<br />";
                                            echo "<br />";
                                            $newFiles1 = array_map('unserialize',array_diff(array_map('serialize', $new_arr), array_map('serialize', $rows)));
                                            print_r($newFiles1);
                                             echo "<br/>";
                                            echo "<br/>";
                                            //echo " ".$newFiles1['Server_path'];
                                            foreach ($newFiles1 as $key => $value) 
                                            {
                                                foreach ($value as $name => $val) 
                                                {
                                                    //$system_path = null;
                                                    if ($name == 'Server_path')
                                                        $server_path = $val;
                                                    if ($name == 'Modified_date')
                                                        $modified_date = $val;
                                                    if ($name == 'Content_hash')
                                                        $content_hash = $val;
                                                    if ($name == 'Actual_Filename')
                                                        $actual_filename = $val;
                                                    if ($name == 'System_Filename')
                                                    {
                                                        $system_filename = $val;
                                                        $system_path = $structure1."/".$val;

                                                        $url1 = 'https://ssbox-dev.unicloud.org.tw/api/files/'.$server_path;
                                                        $ch1 = curl_init();
                                                        curl_setopt($ch1, CURLOPT_URL, $url1);
                                                        curl_setopt($ch1, CURLOPT_USERPWD, "$username:$password");
                                                        curl_setopt($ch1, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
                                                        curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);
                                                        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
                                                        $result1 = curl_exec($ch1);
                                                        curl_close($ch1);
                                    
                                                        $file = fopen($system_path,"w");
                                                        fwrite($file,$result1);
                                                        fclose($file);

                                                        $im = new imagick("$system_path");
                                                        $exifArray = $im->getImageProperties("exif:*");
                                                        if (!empty($exifArray))
														{
															$created_date = $exifArray['exif:DateTimeOriginal'];
															$width = $exifArray['exif:ExifImageWidth'];
															$height = $exifArray['exif:ExifImageLength'];
															$imagePath1 = $structure1."/".$system_filename;
												   			$thumbnailPath = $structure1."/thumbnails/".$system_filename;
															$new_length = 1200*($height/$width);
															// echo " ".$new_length;
															$imagick = new \Imagick(realpath($system_path));
												    		$imagick->setbackgroundcolor('rgb(64, 64, 64)');
												    		$imagick->thumbnailImage(1200, $new_length, true, true);
												    		$imagick->readImageBlob($imagick->getImageBlob());
												    		if($f=fopen($thumbnailPath, "w"))
												    		{ 
												  				$imagick->writeImageFile($f);
															}
															$sql = "INSERT INTO Photos (`Username`,`Content_hash`,`Server_path`,`Modified_date`,`System_path`,`Actual_filename`,`System_filename`,`Height`,`Width`,`Created_date`) 
															VALUES ('$username','$content_hash','$server_path','$modified_date','$system_path','$actual_filename','$system_filename','$height','$width','$created_date')";
															if(!mysql_query($sql, $con))
															{
																die('Error in query: '.mysql_error());
															}
															else
																echo "Query okay!!";

														}
														else
														{
															$imagePath1 = $structure1."/".$system_filename;
												   			$thumbnailPath = $structure1."/thumbnails/".$system_filename;
															//$new_length = 1200*($height/$width);
															// echo " ".$new_length;
															$imagick = new \Imagick(realpath($system_path));
												    		$imagick->setbackgroundcolor('rgb(64, 64, 64)');
												    		$imagick->thumbnailImage(500, 400, true, true);
												    		$imagick->readImageBlob($imagick->getImageBlob());
												    		if($f=fopen($thumbnailPath, "w"))
												    		{ 
												  				$imagick->writeImageFile($f);
															}
															$sql = "INSERT INTO Photos (`Username`,`Content_hash`,`Server_path`,`Modified_date`,`System_path`,`Actual_filename`,`System_filename`) 
															VALUES ('$username','$content_hash','$server_path','$modified_date','$system_path','$actual_filename','$system_filename')";
															if(!mysql_query($sql, $con))
															{
																die('Error in query: '.mysql_error());
															}
															else
																echo "Query okay!!";

														}
                                                    }
                                                }  
                                            }
                                            $new_array1 = array_merge($two_array,$rows);
                                            $new_arr1 = array_unique($new_array1, SORT_REGULAR);
                                            //print_r($new_arr1);
                                            $taken1 = array();

                                            foreach($new_arr1 as $key => $item) 
                                            {
                                                if(!in_array($item['System_Filename'], $taken1)) 
                                                {
                                                    $taken1[] = $item['System_Filename'];
                                                } 
                                                else 
                                                {    
                                                    unset($new_arr1[$key]);
                                                }
                                            }
                                            //print_r($new_arr);
                                            $newFiles12 = array_map('unserialize',array_diff(array_map('serialize', $new_arr1), array_map('serialize', $two_array)));
                                            print_r($newFiles12);
                                            foreach ($newFiles12 as $key => $value) 
		                                    {
		                                        $path1 = $value['Server_path'];
		                                        $filename = $value['System_Filename'];
		                                        $p = $structure1."/".$filename;
		                                        $t = $structure1."/thumbnails/".$filename;
		                                        $a = $structure1."/album/";
		                                        unlink($p);
		                                        unlink($t);
		                                        $albm =  array_diff( scandir($a), array(".", "..",".DS_Store") );
		                                        //print_r($albm);
		                                        foreach ($albm as $k1 => $v1) 
		                                        {
		                                            $path = $a."/".$v1;
		                                            $albm1 =  array_diff( scandir($path), array(".", "..",".DS_Store") );
		                                            //print_r($albm1);
		                                            echo "<br/>";
		                                            foreach ($albm1 as $k => $v) 
		                                            {
		                                                if( $v == $filename)
		                                                {
		                                                    $al = $path."/".$v;
		                                                    unlink($al);
		                                                }
		                                            }
		                                        }
		                                        $sql_sel = "SELECT ID from SSLAB34182.Photos where `Server_path`='$path1'";
		                                        $res1 = mysql_query($sql_sel);
		                                        if(!$res1)
		                                        {
		                                            echo "Error in Query:".@mysql_error();
		                                        }
		                                    
		                                    $index1 = 0;
		                                    $rows11 = array();
		                                    if ($res1 != null)
		                                    {
		                                        while($row = mysql_fetch_assoc($res1))
		                                        {
		                                            $rows11[$index] = $row;
		                                            $index1++;
		                                        }
		                                        foreach ($rows11 as $key) 
		                                        {
		                                            $id = $key['ID'];
		                                            $sql_del = "DELETE FROM Photos where `ID` = $id ";
		                                            $res2 = mysql_query($sql_del);
		                                            if(!$res2)
		                                            {
		                                                echo "Error in deleting!".mysql_error();        
		                                            }
		                                            $sql_del1 = "DELETE FROM Albums where `Photo_ID` = $id ";
		                                            $result2 = mysql_query($sql_del1);
		                                            if(!$result2)
		                                            {
		                                                echo "Error in deleting!".mysql_error();        
		                                            }
		                                            
		                                        }
		                                    }
		                                    //print_r($rows11);      
                                         }}
                                        $sql99 = "SELECT `Server_path`,`Created_date`,`Actual_Filename`,`System_Filename`,`System_path` FROM Photos WHERE Username='$username'";
                                        $query = mysql_query($sql99);
                                        if(!mysql_query($sql99, $con))
                                        {
                                            die('Error in query: '.mysql_error());
                                        }
                                        $index = 0;
                                        $rows1 = array();
                                        while($row = mysql_fetch_assoc($query))
                                        {   
                                            $rows1[$index] = $row;
                                            $index++;
                                        }
                                        function compare_func($a, $b)
                                        {
                                            $t1 = strtotime(date($a["Created_date"]));
                                            $t2 = strtotime(date($b["Created_date"]));
                                            return ($t2 - $t1);
                                        }
                                        @usort($rows1, "compare_func");
                                        //print_r($rows);
                                        $currentDate = false;
                                        $count = 1;
                                        foreach ($rows1 as $key => $value)
                                        {
                                            $date1 = $value['Created_date'];
                                            $phpdate = @strtotime( $date1 );
                                            $date = @date('jS F Y', $phpdate );
                                            $path = $dir_name.'/thumbnails/'.$value['System_Filename'];
                                            $photo_path = $dir_name."/".$value['System_Filename'];
                                            $filename = $value['Actual_Filename'];         
                                            ?>
                                    <a id="id<?php echo $count;?>" href="<?php echo $photo_path;?>" rel="lightbox[group]" >
                                       <div class="roundedTwo">  <img margin="0" class="borders"src="<?php echo $path;?>" title="<?php echo $filename;?>" id="ids<?php echo $count;?>"/>
                                    </a>
                                     
                                </div>
                      
                                                     
                            <?php
                                            $count++;

                                        }
                                      
                               
	
	

?>

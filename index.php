<?php
    session_start();
    error_reporting(E_ALL & ~E_NOTICE);
    error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE html>
<html class="no-js"> 
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Photo Gallery</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link href="css1/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/simple-sidebar.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
        <link href="css/bootstrap.css" rel='stylesheet' type='text/css'>
        <link href="js/colorbox/colorbox.css"  rel='stylesheet' type='text/css'>
        <link href="css/templatemo_style.css"  rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Yesteryear' rel='stylesheet' type='text/css'>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <style>
            body{
                position: relative;
            }
            #abc1 {
                width:100%;
                height:100%;
                opacity:.95;
                top:0;
                left:0;
                display:none;
                position:fixed;
                background-color:#313131;
                overflow:hidden;
                z-index:14;
            }
            div#popupContact {
                position: absolute;
                left:50%;
                top:17%;
                margin-left:-202px;
                font-family: "Trebuchet MS", Helvetica, sans-serif
            }
            
            #form1 {
                max-width:400px;
                min-width:250px;
                 height: 400px;
                padding:10px 50px;
                border:2px solid gray;
                border-radius:10px;
                font-family: "Trebuchet MS", Helvetica, sans-serif;
                background-color:#fff;

            }
            
            textarea {
                width:100%;
                height:95px;
                padding:10px;
                resize:none;
               
                border:1px solid #ccc;
                padding-left:40px;
                font-size:16px;
                font-family: "Trebuchet MS", Helvetica, sans-serif;
                margin-bottom:30px
            }
            #close {
                position: absolute;
                font-size: 25px;
                right:-20px;
                border-radius: 15px;
                color:#808080;
                top:-25px;
                cursor:pointer
            }
           
            input[type=text] {
                width:100%;
                padding:10px;
                margin-top:30px;
                border:1px solid #ccc;
                padding-left:40px;
                font-size:16px;
                font-family: "Trebuchet MS", Helvetica, sans-serif
            }
            button {
                width:10%;
                height:45px;
                border-radius:3px;
                background-color:#cd853f;
                
                font-family: "Trebuchet MS", Helvetica, sans-serif;
                font-size:18px;
                cursor:pointer
            }
            #submit {
                text-decoration:none;
                width:50%;
                text-align:center;
                display:block;
                font-family: "Trebuchet MS", Helvetica, sans-serif;
                background-color:#FFBC00;
                color:#fff;
                position: fixed;
                border:1px solid #FFCB00;
                padding:10px 0;
                font-size:20px;
                cursor:pointer;
                border-radius:5px
            }
            #submit2 {
                background-color: Transparent;
                background-repeat:no-repeat;
                font-size: 30px;
                font-family: "Trebuchet MS", Helvetica, sans-serif;
                outline:none;
                text-align:center;
                display:block;
                text-align: center;
                color:#808080;
                border: none;
                position: fixed;
                cursor:pointer;
            }
            #submit1 {
                text-decoration:none;
                width:24%;
                text-align:center;
                display:block;
                font-family: "Trebuchet MS", Helvetica, sans-serif;
                background-color:#FFBC00;
                color:#fff;
                position: fixed;
                border:1px solid #FFCB00;
                padding:10px 0;
                font-size:20px;
                cursor:pointer;
                border-radius:5px
            }
            .borders
            {
                border: solid 2px #808080;
              
            }
            
            .naf{
                width:1500px;
                position:relative;
                display:block;
            }
            .col-md-3 a > img{
                height: 200px;
                width: 200px;
                image-orientation: from-image;
            }

        </style>
    </head>
    <body>
        <?php
            error_reporting(E_ALL & ~E_NOTICE);
            $username = $_SESSION['username'];
            $password = $_SESSION['token'];
            $_SESSION['username'] = $username;
        ?>
        <script src="js1/jquery.js"></script>
        <script src="js1/bootstrap.min.js"></script>
        <div class="templatemo-top-menu">
            <div class="container">
                <div class="navbar navbar-default navbar-fixed-top" role="navigation">
                    <div class="container">
                        <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                </button>
                                 <a href="index.php" class="navbar-brand" style="font-size: 25px; font-style: bold; display: block;">NebulaBox</a>  
                        </div>
                       <div class="navbar-collapse collapse" id="templatemo-nav-bar">
                            <ul class="nav navbar-nav navbar-right" style="margin-top: 40px;">
                                <li><a href="index.php" title="View all photos"><img src="/bootstrap/home.png" height="10px" width="25px"></a></li>
                                <li><a href="albumview.php" title="View albums"><img src="/bootstrap/photos.png" height="20px" width="30px"></a></li>
                                <li><a href="photoview.php" title="Add photos to album"><img src="/bootstrap/g.png" height="20px" width="30px"></a></li>
                                <li><a onclick="div_show()" title="Create Album"><img src="/bootstrap/albumadd.png" height="10px" width="30px"></a></li>
                                <li> <a href="logout.php">Logout</a></li> 
                                <li class="dropdown">
                            </ul>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <div class="container gallery" >
            <div id="abc1" style="overflow:hidden;">
                <div id="popupContact">
                    <form action="album.php" id="form1" method="post" name="form">
                        <p id="close" onclick ="div_hide()">X</p>
                        <h2 style='font-family:"Courier New", Courier, monospace;color:#FFBC00;text-decoration:none;text-shadow:none;'>Album</h2>
                        <input id="aname" name="name" placeholder="Name" type="text"/>
                        <textarea id="msg" name="message" placeholder="Write something about the album"></textarea>
                        <input type="submit" name="submit" id="submit1" value="Create"/>
                    </form>
                </div>
            </div> 
            <form name="checkbox" action="addphotos.php" method="post">
                <?php 
                    
                    require __DIR__ . '/vendor/autoload.php';
                    $i = getenv('ALBUM_REDIS_HOST');
                    if ($ip == null)
                    {
                        $arg = '';
                    }
                    else
                    {
                        $arg = $i;   
                    }
                    Predis\Autoloader::register();
                    $redis = new Predis\Client($arg);              
                    $dir_name = hash('ripemd160',$username);
                    $structure1 = "/Users/nafisabarlaskar/www/bootstrap/".$dir_name;
                    $_SESSION['username'] = $username;
                    $albums = $structure1."/album";
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
                    $value = $redis->get($username);
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
                    $u = getenv('NEBULA_HOST');
                    if($u == null)
                    {
                        $link_url = 'ssbox-dev.unicloud.org.tw';
                    }
                    else
                    {
                        $link_url = $u;
                    }
                    $albm =  array_diff( scandir($albums), array(".", "..",".DS_Store") );
                    $url = "https://".$link_url."/sync/list?photo=true&hash=" . ($value || '');
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
                    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
                    $result = curl_exec($ch);
                    curl_close($ch);
                    $data = json_decode($result, true);
                    $hash = $data['hash'];
                    //$value = $redis->get($username);
                    $con = @mysql_connect($localhost,$root,$passwrd)
                    or die('Could not connect to the mysql server!');
                    mysql_select_db("SSLAB34182", $con)
                    or die('Database not selected!');
                    if($hash != $value)
                    {
                        $redis->set($username, $hash);
                        $sql = "SELECT `Server_path`,`Modified_date`,`Content_hash`,`Actual_Filename`,`System_Filename` FROM Photos WHERE Username='$username'";
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
                        //var_dump($rows);
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
                        //print_r($newFiles);
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
                        //print_r($new_arr);
                        $newFiles1 = array_map('unserialize',array_diff(array_map('serialize', $new_arr), array_map('serialize', $rows)));
                        //print_r($newFiles1);*/
                        function find_key_value($array, $key, $val)
                        {
                            foreach ($array as $item)
                            {
                                if (is_array($item))
                                {
                                    find_key_value($item, $key, $val);
                                }
                                if (isset($item[$key]) && $item[$key] == $val) 
                                    return true;
                            }
                            return false;
                        }
                        //echo " ".$newFiles1['Server_path'];
                        foreach ($newFiles1 as $key => $value) 
                        {
                            foreach ($value as $name => $val) 
                            {
                                //$system_path = null;
                                if ($name == 'Server_path' && ((find_key_value($rows, $name, $val)) == 1) )
                                {
                                    //echo $key."<br/>";
                                    unset($newFiles1[$key]);
                                }
                            }
                        }
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

                                    $url1 = 'https://'.$link_url.'/api/files/'.$server_path;
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
                                    }
                                    else
                                    {
                                        $imagePath1 = $structure1."/".$system_filename;
                                        $thumbnailPath = $structure1."/thumbnails/".$system_filename;
                                        //$new_length = 1200*($height/$width);
                                        // echo " ".$new_length;
                                        $imagick = new \Imagick(realpath($system_path));
                                        $imagick->setbackgroundcolor('rgb(64, 64, 64)');
                                        $imagick->thumbnailImage(1200, 700, true, true);
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
                            $sql_sel = "SELECT ID from SSLAB34182.Photos where `Server_path`='$path1' and Username='$username'";
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
                        }
                    }
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
                        if ($date != $currentDate)
                        {
                ?>
                <div class="row"></div>
                    <h3 style="font-family: 'optima';text-align:justify;font-size: 20px; font-color: #ffffff;"> 
                
                
                <?php
                            //echo DATE_FORMAT($date,'l jS F Y');
                            if($date1 == null)
                            {
                                echo "Others";
                            } 
                            else
                            {
                                echo $date;
                            }
                            $currentDate = $date;
                    ?>
                    <div class="row">

                    
                <?php 
                    }
                ?>   
                </h3>  
      
               
                            <div class="col-md-3">
                    <a id="id<?php echo $count;?>" href="<?php echo $photo_path;?>" rel="lightbox[group]" >
                        <img class="borders" margin="0" src="<?php echo $path;?>" title="<?php echo $filename;?>" id="ids<?php echo $count;?>"/>
                    </a>
                       </div>
                <?php
                        $count++;
                    }
                ?>
                </div>
            </form>              
        </div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/jquery.prettyPhoto.js"></script>
        <script src="js/main.js"></script>
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
            $(document).ready(function(){
                $("[rel^='lightbox']").prettyPhoto();
            });
        </script>
        <script type="text/javascript">
            function div_show()
            {
                document.getElementById('abc1').style.display = "block";
            }
            function div_hide()
            {
                document.getElementById('abc1').style.display = "none";
            }
        </script>
    </body>
</html>
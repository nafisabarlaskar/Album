<?php
    session_start();
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
        <link href='http://fonts.googleapis.com/css?family=Yesteryear' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
        
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.css" rel='stylesheet' type='text/css'>

        <!-- Custom styles for this template -->
        <link href="js/colorbox/colorbox.css"  rel='stylesheet' type='text/css'>
        <link href="css/templatemo_style.css"  rel='stylesheet' type='text/css'>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <!--<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">-->
        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <style>
           .thumbnail {
                color: #797478;
                font: 10px/1.5 Verdana, Helvetica, sans-serif;
                width: 16%;
                margin:  2% 2% 50px 2%;
                float: left;
                -webkit-transition: color 0.5s ease;
            }
            .thumbnail img {
                position: absolute;
                left: 50%;
                top: 50%;
                height: 70%;
                width: auto;
                -webkit-transform: translate(-50%,-50%);
                -ms-transform: translate(-50%,-50%);
                transform: translate(-50%,-50%);
            }
            .thumbnail img.portrait {
                width: 100px;
                height: 100px;
                display: block; 
            }
            table {
                width: 100%;
            }
            .ty {
                padding: 35px;
            }
            .tys {
                padding: 15px;
            }
            input[type=checkbox] {
                visibility: hidden;
            }
            .roundedTwo {
                position: relative;
            }
            .roundedTwo label {
                cursor: pointer;
                position: absolute;
                width: 25px;
                height: 25px;

                -webkit-border-radius: 50px;
                -moz-border-radius: 50px;
                border-radius: 50px;
                left: 10px;
                top: 10px;

                -webkit-box-shadow: inset 1px 1px 1px rgba(255,255,255,255), 1px 1px 1px rgba(255,255,255,1);
                -moz-box-shadow: inset 1px 1px 1px rgba(255,255,255,255), 1px 1px 1px rgba(255,255,255,1);
                box-shadow: inset 1px 1px 1px rgba(255,255,255,255), 1px 1px 1px rgba(255,255,255,1);
            }

            .roundedTwo label:after {
                -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
                filter: alpha(opacity=0);
                opacity: 0;
                content: '';
                position: absolute;
                width: 15px;
                height: 10px;
                top: 6px;
                left: 5px;
                border: 3px solid #ffffff;
                border-top: none;
                border-right: none;

                -webkit-transform: rotate(-45deg);
                -moz-transform: rotate(-45deg);
                -o-transform: rotate(-45deg);
                -ms-transform: rotate(-45deg);
                transform: rotate(-45deg);
            }

            .roundedTwo label:hover::after {
                -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=30)";
                filter: alpha(opacity=30);
                opacity: 0.3;
            }
            .roundedTwo input[type=checkbox]:checked + label:after {
                -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
                filter: alpha(opacity=100);
                opacity: 1;
            }
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
                z-index:11;
            }
            div#popupContact {
                position: absolute;
                left:50%;
                top:17%;
                margin-left:-202px;
                font-family:"Courier New", Courier, monospace;
            }
            
            #form1 {
                max-width:400px;
                min-width:250px;
                padding:10px 50px;
                border:2px solid gray;
                border-radius:10px;
                font-family:"Courier New", Courier, monospace;
                background-color:#fff
            }
            p {
                margin-top:30px
            }
            textarea {
                width:100%;
                height:95px;
                padding:10px;
                resize:none;
               
                border:1px solid #ccc;
                padding-left:40px;
                font-size:16px;
                font-family:"Courier New", Courier, monospace;
                margin-bottom:30px
            }
            #close {
                position: absolute;
               
                right:-4px;
                border-radius: 15px;
                top:-40px;
                cursor:pointer
            }
           
            input[type=text] {
                width:100%;
                padding:10px;
                margin-top:30px;
                border:1px solid #ccc;
                padding-left:40px;
                font-size:16px;
                font-family:"Courier New", Courier, monospace
            }
            button {
                width:10%;
                height:45px;
                border-radius:3px;
                background-color:#cd853f;
                
                font-family:"Courier New", Courier, monospace;
                font-size:18px;
                cursor:pointer
            }
            #submit {
                text-decoration:none;
                width:100%;
                text-align:center;
                display:block;
                background-color:#FFBC00;
                color:#fff;
                position: fixed;
                border:1px solid #FFCB00;
                padding:10px 0;
                font-size:20px;
                cursor:pointer;
                border-radius:5px
            }

        </style>
    </head>
    <body style="position: relative;">
        
        <?php
        
            error_reporting(E_ALL & ~E_NOTICE);
            
            $username = $_SESSION['username'];
            $password = $_SESSION['token'];
            $_SESSION['username'] = $username;
        ?>
        <script src="js1/jquery.js"></script>
        <script src="js1/bootstrap.min.js"></script>
        <!--<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                <a class="nav navbar-brand" href="#" >Home</a>
                </div>
                <div class="collapse navbar-collapse navbar-right" id="navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Photos</a></li>
                        <li><a href="albumview.php">Albums</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hi <?php echo $username ?><span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                                <li> <a onclick="div_show()">Create Album</a></li>
                                <li> <a href="logout.php">Logout</a></li>   
                            </ul>
                        </li>           
                    </ul>
                </div>
            </div>
        </nav>-->
        <div class="templatemo-top-menu">
            <div class="container">
                <!-- Static navbar -->
                <div class="navbar navbar-default navbar-fixed-top" role="navigation">
                    <div class="container">
                        <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                </button>
                                
                        </div>
                        <div class="navbar-collapse collapse" id="templatemo-nav-bar">
                            <ul class="nav navbar-nav navbar-right" style="margin-top: 40px;">
                                <li class="active"><a href="#templatemo-top">HOME</a></li>
                                <li><a href="#templatemo-about">ALBUMS</a></li>
                                <li><a href="#templatemo-about">ADD TO ALBUM</a></li>
                                
                            </ul>
                        </div><!--/.nav-collapse -->
                    </div><!--/.container-fluid -->
                </div><!--/.navbar -->
            </div> <!-- /container -->
        </div>
     
   
        <div class="container gallery" >
            <div id="abc1" style="overflow:hidden;">
                <div id="popupContact">
                    <form action="album.php" id="form1" method="post" name="form">
                        <p id="close" onclick ="div_hide()">X</p>
                        <h2 style='font-family:"Courier New", Courier, monospace;color:#FFBC00;text-decoration:none;'>Album</h2>
                        
                        <input id="aname" name="name" placeholder="Name" type="text">
                        <textarea id="msg" name="message" placeholder="Write something about the album"></textarea>
                        <input type="submit" name="submit" id="submit" value="Create"/>
                    </form>
                </div>
            </div> 
            <form name="checkbox" action="addphotos.php" method="post">
                <table>
                <tr><td><label>
                    <select name="albumselect">
                        <?php                 
                            $dir_name = hash('ripemd160',$username);
                            $structure1 = "/Users/nafisabarlaskar/www/bootstrap/".$dir_name;
                            $_SESSION['username'] = $username;
                            $albums = $structure1."/album";

                            $albm =  array_diff( scandir($albums), array(".", "..",".DS_Store") );

                            foreach ($albm as $key => $value)
                            {
                                ?>
                                 <option name="<?php echo $value; ?>" value="<?php echo $value; ?>"><?php echo $value; ?></option>
                            <?php
                            }

                        ?>
                    </select>
                </label></td>
                <td><div id="abc">
                    <input type="submit" id="submit" value="Add to album" disabled/>
                </div></td>
                
                    <?php

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
                        curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
                        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
                        //$info = curl_getinfo($ch);
                        $result = curl_exec($ch);
                        curl_close($ch);
                        $data = json_decode($result, true);
                        $con = @mysql_connect("localhost:8080","root","sslab34182")
                        or die('Could not connect to the mysql server!');
                        mysql_select_db("SSLAB34182", $con)
                        or die('Database not selected!');
                        $sql = "SELECT `Server_path`,`Modified_date`,`Content_hash`,`Actual_Filename`,`System_Filename` FROM Photos";
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
                        //print_r($rows);
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
                        function cmp($a, $b) {
                            return $a['Actual_Filename'] - $b['Actual_Filename'];
                        }
                        usort($new_array, "cmp");
                        //print_r($new_array);
                        $new_arr = array_unique($new_array, SORT_REGULAR);
                        //print_r($new_arr);
                        $taken = array();
                        foreach($new_arr as $key => $item) {
                            if(!in_array($item['Server_path'], $taken)) {
                                $taken[] = $item['Server_path'];
                                } 
                            else {
                                    unset($new_arr[$key]);
                                }
                            }
                        //print_r($new_arr);
                        $newFiles1 = array_map('unserialize',array_diff(array_map('serialize', $new_arr), array_map('serialize', $rows)));
                        //print_r($newFiles1);
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
                                if ($name == 'System_Filename'){
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
                                    $created_date = $exifArray['exif:DateTimeOriginal'];
                                    $width = $exifArray['exif:ExifImageWidth'];
                                    $height = $exifArray['exif:ExifImageLength'];
                    
                                    $sql2 = "INSERT INTO Photos (`Username`,`Content_hash`,`Server_path`,`Modified_date`,`System_path`,`Actual_filename`,`System_filename`,`Height`,`Width`,`Created_date`) 
                                        VALUES ('$username','$content_hash','$server_path','$modified_date','$system_path','$actual_filename','$system_filename','$height','$width','$created_date')";
                                    if(!mysql_query($sql2, $con))
                                    {
                                        die('Error in query: '.mysql_error());
                                    }
                                    //$imagePath1 = $structure."/".$image;
                                    $thumbnailPath = $structure1."/thumbnails/".$system_filename;
                                    $new_length = 300*($height/$width);
                                    // echo " ".$new_length;
                                    $imagick = new \Imagick(realpath($system_path));
                                    $imagick->setbackgroundcolor('rgb(64, 64, 64)');
                                    $imagick->thumbnailImage(300, $new_length, true, true);
                                    $imagick->readImageBlob($imagick->getImageBlob());
                                    if($f=fopen($thumbnailPath, "w")){ 
                                        $imagick->writeImageFile($f);
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
                            unlink($p);
                            unlink($t);
                            //echo "".$filename;
                            $sql_sel = "SELECT ID from SSLAB34182.Photos where `Server_path`='$path1'";
                            $res1 = mysql_query($sql_sel);
                            if(!$res1)
                            {
                                echo "Error in Query:".@mysql_error();
                            }
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
                            foreach ($rows11 as $key) {
                                $id = $key['ID'];
                                $sql_del = "DELETE FROM Photos where `ID` = $id ";
                                $res2 = mysql_query($sql_del);
                                if(!$res2)
                                {
                                    echo "Error in deleting!".mysql_error();        
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
                        ?>
                        <h3> 
                            <?php 
                                if ($date != $currentDate)
                                {
                            ?>
                            <tr style="font-size: 14px;" >
                                <td class="ty"  style="font-family: 'lucida console';">
                                <?php
                                    //echo DATE_FORMAT($date,'l jS F Y'); 
                                    echo $date;
                                    $currentDate = $date;
                                ?>
                                </td>
                            </tr>
                            <tr height="300px">
                            <?php 
                                }
                            ?> 
                        </h3>           
                                <td class="tys">
                                    <div class="roundedTwo">
                                        <a id="id<?php echo $count;?>" href="<?php echo $photo_path;?>" rel="lightbox[group]" >
                                            <img src="<?php echo $path;?>" title="<?php echo $filename;?>" id="ids<?php echo $count;?>"/></a>
                                            <input type="checkbox"  id="roundedTwo<?php echo $count;?>" name="check[]" value="<?php echo $value['System_Filename'];?>"/>
                                            <label for="roundedTwo<?php echo $count;?>">
                                            </label>  
                                    </div>  
                                </td>
                            
                            <?php
                                $count++;
                            }
                            ?>
                            </tr>
                    </table> 
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
        var checkboxes = $("input[type='checkbox']"),
        submitButt = $("input[type='submit']");

        checkboxes.click(function() {
        submitButt.attr("disabled", !checkboxes.is(":checked"));
        document
});
    </script>
    <script type="text/javascript">
        function div_show() {
            document.getElementById('abc1').style.display = "block";
    }
    function div_hide(){
        document.getElementById('abc1').style.display = "none";
        }
    </script>
</body>
</html>

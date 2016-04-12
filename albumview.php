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
                font-family: "Trebuchet MS", Helvetica, sans-serif;
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
                font-family: "Trebuchet MS", Helvetica, sans-serif;
                margin-bottom:30px
            }
            #close {
              position: absolute;
                font-size: 25px;
                right:-20px;
                border-radius: 15px;
                color:#808080;
                top:-50px;
                cursor:pointer
            }
           
            input[type=text] {
                width:100%;
                padding:10px;
                margin-top:30px;
                border:1px solid #ccc;
                padding-left:40px;
                font-size:16px;
                font-family: "Trebuchet MS", Helvetica, sans-serif;
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
                background-color:#FFBC00;
                color:#fff;
                position: fixed;
                border:1px solid #FFCB00;
                padding:10px 0;
                font-size:20px;
                cursor:pointer;
                border-radius:5px
            }
            #submit1 {
                text-decoration:none;
                width:24%;
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
            .new div
            {
                 width:1500px;
                position:relative; 
                display:inline-block;
                float: left;
                text-align: justify;
                padding: 15px;
            }
            .new > a > img
            {
                width: 200px;
                height: 200px; 
                display: inline-block;
                 
                float: left; 
                overflow: scroll;
            }
            .new div:after
            {
                content: '';
                display: inline-block;
            }
            #naf{
                width:1500px;
                position:relative;
                
            }
            a{
                color : #008080;
            }
            #naf > a > img{
                height: 200px;
                width: 200px;
                display: inline-block;
                float: left;

            }
            ul.rig {
            list-style: none;
            font-size: 0px;
            margin-left: -2.5%; /* should match li left margin */
            }
            ul.rig.columns-3 li {
                width: 30.83%; /* this value + 2.5 should = 33% */
            }
            ul.rig li {
                display: inline-block;
                padding: 10px;
                margin: 0 0 2.5% 2.5%;
                background: #ECFCFA;
                border: 1px solid #ddd;
                font-family: 'Exo', sans-serif;
                font-size: 16px;
                font-size: 1rem;
                vertical-align: top;
                box-shadow: 0 0 5px #ddd;
                box-sizing: border-box;
                -moz-box-sizing: border-box;
                -webkit-box-sizing: border-box;
            }
            ul.rig li img {
                max-width: 100%;
                height: 200px;
                width: 300px;
                
            }
            ul.rig li h3 {
                margin: 0 0 5px;
            }
            @media (max-width: 1199px) {
                .container {
                    width: auto;
                    padding: 0 10px;
                }
            }

            @media (max-width: 480px) {
                ul.grid-nav li {
                    display: block;
                    margin: 0 0 5px;
                }
                ul.grid-nav li a {
                    display: block;
                }
                ul.rig {
                    margin-left: 0;
                }
                ul.rig li {
                    width: 100% !important; /* over-ride all li styles */
                    margin: 0 0 20px;
                }
            }
        </style>
    </head>
    <body>
        <?php
            error_reporting(E_ALL & ~E_NOTICE);
            session_start();
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
        <div class="container gallery">
           <div id="abc1" style="overflow:hidden;">
                <div id="popupContact">
                    <form action="album.php" id="form1" method="post" name="form">
                        <p id="close" onclick ="div_hide()">X</p>
                        <h2 style='font-family:"Courier New", Courier, monospace;color:#FFBC00;text-decoration:none;text-shadow:none;'>Album</h2>
                        
                        <input id="aname" name="name" placeholder="Name" type="text">
                        <textarea id="msg" name="message" placeholder="Write something about the album"></textarea>
                        <input type="submit" name="submit" id="submit1" value="Create"/>
                    </form>
                </div>
            </div> 
            <h3 style="text-align: center;font-family: 'optima';">Albums</h3>
            <div id="three-columns" class="grid-container">
            <ul class="rig columns-3">
            <?php                 
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
                $dir_name = hash('ripemd160',$username);
                $structure1 = "/Users/nafisabarlaskar/www/bootstrap/".$dir_name;

                $albums = $structure1."/album";
                $albm =  array_diff( scandir($albums), array(".", "..",".DS_Store") );
                foreach ($albm as $key => $value)
                {
                    $sql = "SELECT * FROM SSLAB34182.Albums WHERE Album_Name='".$value."' ORDER BY ID DESC LIMIT 1";
                    $query = mysql_query($sql);
                    $row = mysql_fetch_assoc($query);
                    $name = $row['System_Name'];
                    $album_path = $dir_name."/".$name;
                    $thmb_path = $dir_name."/album/".$value."/".$name;
                    $images = $albums."/".$value;
                    $count = 1;
                    if(!empty($name))
                    {
                    
            ?>
                
                  <li>
                       <a href = "albums.php?album_name=<?php echo $value?>">  <img id="images<?php echo $count;?>" style="border: 2px solid #808080;" src="<?php echo $thmb_path;?>" title="Image Title" /></a>
                       <p style="font-family: 'optima';text-align:justify;font-size: 20px;"><a href = "albums.php?album_name=<?php echo $value?>"> <?php echo $value?></a>
                        </p>  
                 </li>
            <?php
                    $count++;
                    }
                    else 
                    {
            ?>
            
                <li>
                        
                            <img style="border: 2px solid #808080;width: 300px; height: 200px;" margin="0" id="images<?php echo $count;?>" src="/bootstrap/no-image.png" title="Empty album" />
                       <p style="font-family: 'lucida console';text-align:justify;font-size: 20px; color:#008080 ;"><?php echo $value?>
                        </p>
                    </li>  
                    
            <?php
                $count++;
                    }  
                }
            ?>
          </ul>
      </div>
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
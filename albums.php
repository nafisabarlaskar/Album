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
        <link href="js/colorbox/colorbox.css"  rel='stylesheet' type='text/css'>
        <link href="css/templatemo_style.css"  rel='stylesheet' type='text/css'>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
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
            .roundedTwo img
            {
                border: 2px solid #808080;
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
                z-index:14;
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
                 height: 400px;
                padding:10px 50px;
                border:2px solid gray;
                border-radius:10px;
                font-family:"Courier New", Courier, monospace;
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
                font-family:"Courier New", Courier, monospace;
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
                border:1px solid #FFCB00;
                padding:10px 0;
                font-size:20px;
                cursor:pointer;
                border-radius:5px;
                text-align:center 
            }
            #submit1 {
                text-decoration:none;
                width:26.5%;
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
            .roundedTwo > a > img{
                height: 200px;
                width: 300px;
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
            $album_name = $_GET['album_name'];
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
                        <input id="aname" name="name" placeholder="Name" type="text">
                        <textarea id="msg" name="message" placeholder="Write something about the album"></textarea>
                        <input type="submit" name="submit" id="submit" value="Create"/>
                    </form>
                </div>
            </div> 
            <form name="checkbox" action="deletephotos.php?album_name=<?php echo $album_name;?>" method="post" class="uniForm">
                <div class="row">
                <div class="col-md-8" style="font-size: 20px;font-family: 'optima';"><a href="albumview.php">Albums</a>><?php echo $album_name;?></div>
                    <div class="col-md-2"> <input type="image" src="/bootstrap/delete.png"  alt="Submit" height="38px" width="48px" style="float:right;"/>
                </div>
                <div class="row"><div class="col-md-10"></div></div>
                <div class="row">
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
            $albums = $structure1."/album/".$album_name;
            $albm =  array_diff( scandir($albums), array(".", "..",".DS_Store") );
            $count = 1;
            foreach($albm as $key => $val)
            {
                $t_path = $dir_name."/album/".$album_name."/".$val;
                $path = $dir_name."/".$val;
        ?>
        <div class="col-md-3">
               <div class="roundedTwo">
                    <a id="id<?php echo $count;?>" href="<?php echo $path;?>" rel="lightbox[group]" >
                        <img  class="size"  src="<?php echo $t_path;?>"  id="ids<?php echo $count;?>"/>
                    </a>
                    <input type="checkbox"  id="roundedTwo<?php echo $count;?>" name="check[]" value="<?php echo $val;?>"onclick="changeborder('ids<?php echo $count;?>');"/>
                    <label for="roundedTwo<?php echo $count;?>">
                    </label>  
                </div>
                </div>  
        <?php
                $count++;
            }
        ?>
                </div>
                                
                            
                   
              
            </form>
        </div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
        </script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')
        </script>
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
            submitButt = $("input[type='image']");
            checkboxes.click(function() 
            {
                submitButt.attr("disabled", !checkboxes.is(":checked"));
                
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
        <script language="JavaScript" type="text/javascript">
                function changeborder(imageid) 
                {
                    var img = document.getElementById(imageid);
                    if (img.style.border == '') img.style.border = "solid 4px #ffffff";
                    else img.style.border = '';
                   
                }
            </script>
    </body>
</html>
<?php

require_once "tools.php";

$type_id = get('type_id');

$db=conn();


$stmt = $db->prepare('select * from qy_type  ');
$stmt ->execute();

$types = $stmt->fetchAll();

$stmt = $db->prepare('select * from qy_article  order by id desc  ');
$stmt ->execute();

$articles = $stmt->fetchAll();

?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?=$type['name']?> 「如果有妹妹就好了.」</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by GetTemplates.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="GetTemplates.co" />

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Crimson+Text:400,400i|Roboto+Mono" rel="stylesheet">
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
	<div class="gtco-loader"></div>
	
	<div id="page">
	<nav class="gtco-nav" role="navigation">
		<div class="container">
			<div class="row">
				<div class="col-xs-2 text-left">
					<div id="gtco-logo"><a href="index.php">Yszm<span>.</span></a></div>
				</div>
				<div class="col-xs-10 text-right menu-1">
					<ul>
						<li class="has-dropdown">
							<a href="index.php">首页</a>
							<ul class="dropdown">
                                <?php foreach ($types as $type){?>
                                    <li><a href="article_list.php?type_id=<?=$type['id']?>"><?=$type['name']?></a></li>
                                <?php }?>
							</ul>
						</li>
                        <?php foreach ($types as $type){?>
                            <li><a href="article_list.php?type_id=<?=$type['id']?>"><?=$type['name']?></a></li>
                        <?php }?>


					</ul>
				</div>
			</div>
			
		</div>
	</nav>

	<header id="gtco-header" class="gtco-cover" role="banner" style="background-image:url(img/11.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-7 text-left">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeInUp">
							<span class="date-post"></span>
							<h1 class="mb30"><a href="#">爆裂螺旋枪杀之疾风乱舞德意志骑士团团长</a></h1>
							<p><a href="#" class="text-link">Yszm</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	
	<div id="gtco-main">
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-12">
					<ul id="gtco-post-list">
                        <?php
                        foreach ($articles as $article) {
                            //$o ++;

                            ?>
                            <li class="full entry animate-box" data-animate-effect="fadeIn">
                                <a href="article.php?id=<?=$article['id']?>" target="_blank">
<!--                                    --><?php
//                                    foreach ($articl as $type) {
//                                    ?>
                                    <div class="entry-img" style="background-image: url(<?=$article['img']?>)"></div>
<!--                                        --><?php
//                                    }
//                                    ?>
                                    <div class="entry-desc">
                                        <h3><?=$article['title']?></h3>
                                        <p><?php
                                            $contents = $article['content'];
                                            $contents = preg_replace('#<.+?>#','',$contents);
                                            echo (mb_substr($contents,0,70))?>

                                            ...</p>
                                    </div>
                                </a>
                                <a href="#" class="post-meta">Yszm <span class="date-posted"><?=$article['created_at']?><?=$article['name']?></span></a>

                            </li>
                            <?php
                        }
                        ?>

					</ul>	
				</div>
			</div>
		</div>
	</div>




	
	<footer id="gtco-footer" role="contentinfo" style="text-align:center;">
        by Wuzuoda <a href="#" target="_blank">闽ICP备17034294号</a>
        <span id="sitetime"></span>
	</footer>
        <script language=javascript>
            function siteTime(){
                window.setTimeout("siteTime()", 1000);
                var seconds = 1000;
                var minutes = seconds * 60;
                var hours = minutes * 60;
                var days = hours * 24;
                var years = days * 365;
                var today = new Date();
                var todayYear = today.getFullYear();
                var todayMonth = today.getMonth()+1;
                var todayDate = today.getDate();
                var todayHour = today.getHours();
                var todayMinute = today.getMinutes();
                var todaySecond = today.getSeconds();

                var t1 = Date.UTC(2017,12,28,00,00,00);
                var t2 = Date.UTC(todayYear,todayMonth,todayDate,todayHour,todayMinute,todaySecond);
                var diff = t2-t1;
                var diffYears = Math.floor(diff/years);
                var diffDays = Math.floor((diff/days)-diffYears*365);
                var diffHours = Math.floor((diff-(diffYears*365+diffDays)*days)/hours);
                var diffMinutes = Math.floor((diff-(diffYears*365+diffDays)*days-diffHours*hours)/minutes);
                var diffSeconds = Math.floor((diff-(diffYears*365+diffDays)*days-diffHours*hours-diffMinutes*minutes)/seconds);
                document.getElementById("sitetime").innerHTML=" <br />勉强运行"+diffYears+" 年 "+diffDays+" 天 "+diffHours+" 小时 "+diffMinutes+" 分钟 "+diffSeconds+" 秒";
            }
            siteTime();
        </script>
    </div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Stellar -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>


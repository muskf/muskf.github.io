<?php

require "./data/index.php";
$data = data(array("act" => "index"));

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta name="referrer" content="no-referrer">
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
<title>影视电视剧在线观看</title>
<meta name="keywords" content="最新影片资源，影视资源采集，在线电视剧在线观看，免费视频解析">
<meta name="description" content="刀客源码网开发组，全网最新影片视频资源免费观看">
<link rel="stylesheet" type="text/css" href="./static_mg/css/jquery.mobile.min.css">
<link rel="stylesheet" type="text/css" href="./static_mg/css/common.css">
</head>

<body class="body">

<div class="header-bg-wrap">

	<div class="header-bg"><i id="headBg"></i><span></span></div>
	
	<div class="header">
		<a class="logo" href="./" style="background-image:url(./static_mg/images/logo.png)"></a>
		<div class="search">
			<input type="text" placeholder="输入你想看的" id="search" />
			<a id="searchDo"></a>
		</div>
		<div class="navigate">
			<a href="./" class="current">精选</a>
			<a href="./list/dianying/">电影</a>
			<a href="./list/dianshi/">电视剧</a>
			<a href="./list/zongyi/">综艺</a>
			<a href="./list/dongman/">动漫</a>
		</div>
	</div>

	<span class="clear" style="height:0.1rem"></span>

	<div class="s-slider">
		<ul id="bannerList">
			<?php foreach($data['banner'] as $v){ ?>
			<li><a href="./play/?vid=<?php echo urlencode($v['id'])?>"><i style="background-image:url(<?php echo $v['pic']?>)"></i><span><?php echo htmlspecialchars($v['title'])?></span></a></li>
			<?php } ?>
		</ul>
		<ol></ol>
		<div style="display:none"><span class="now"></span><span>/</span><span class="total"></span></div>
	</div>
</div>
	

<div class="list">

	<h3 class="title">热播电视剧</h3>

	<div class="items" id="dianshiList">
		<?php foreach($data['dianshi'] as $k => $v){ ?>
		<a href="./play/?vid=<?php echo urlencode($v['id'])?>"<?php echo $k >= 6 ? ' style="display:none"' : '' ?>>
			<i style="background-image:url(<?php echo $v['pic']?>)"><b><?php echo $v['hint']?></b></i>
			<span><?php echo htmlspecialchars($v['title'])?></span>
		</a>
		<?php } ?>
		<span class="clear"></span>
	</div>

	<div class="more">
		<a href="./list/dianshi/"><img src="./static_mg/images/more_1.png" />更多热剧戳这里</a>
		<a class="switch-button" data-list-type="dianshi"><img src="./static_mg/images/more_2.png" />换一换</a>
	</div>
</div>

<div class="clear" style="height:0.8rem"></div>

<div class="list">

	<h3 class="title">热播电影</h3>

	<div class="items" id="dianyingList">
		<?php foreach($data['dianying'] as $k => $v){ ?>
		<a href="./play/?vid=<?php echo urlencode($v['id'])?>"<?php echo $k >= 6 ? ' style="display:none"' : '' ?>>
			<i style="background-image:url(<?php echo $v['pic']?>)"><b><?php echo $v['hint']?></b></i>
			<span><?php echo htmlspecialchars($v['title'])?></span>
		</a>
		<?php } ?>
		<span class="clear"></span>
	</div>

	<div class="more">
		<a href="./list/dianying/"><img src="./static_mg/images/more_1.png" />更多院线大片</a>
		<a class="switch-button" data-list-type="dianying"><img src="./static_mg/images/more_2.png" />换一换</a>
	</div>
</div>

<div class="clear" style="height:0.8rem"></div>

<div class="list">

	<h3 class="title">热播综艺</h3>

	<div class="items" id="zongyiList">
		<?php foreach($data['zongyi'] as $k => $v){ ?>
		<a href="./play/?vid=<?php echo urlencode($v['id'])?>"<?php echo $k >= 6 ? ' style="display:none"' : '' ?>>
			<i style="background-image:url(<?php echo $v['pic']?>)"><b><?php echo $v['hint']?></b></i>
			<span><?php echo htmlspecialchars($v['title'])?></span>
		</a>
		<?php } ?>
		<span class="clear"></span>
	</div>

	<div class="more">
		<a href="./list/zongyi/"><img src="./static_mg/images/more_1.png" />更多精彩综艺</a>
		<a class="switch-button" data-list-type="zongyi"><img src="./static_mg/images/more_2.png" />换一换</a>
	</div>
</div>

<div class="clear" style="height:0.8rem"></div>

<div class="list">

	<h3 class="title">热播动漫</h3>

	<div class="items" id="dongmanList">
		<?php foreach($data['dongman'] as $k => $v){ ?>
		<a href="./play/?vid=<?php echo urlencode($v['id'])?>"<?php echo $k >= 6 ? ' style="display:none"' : '' ?>>
			<i style="background-image:url(<?php echo $v['pic']?>)"><b><?php echo $v['hint']?></b></i>
			<span><?php echo htmlspecialchars($v['title'])?></span>
		</a>
		<?php } ?>
		<span class="clear"></span>
	</div>

	<div class="more">
		<a href="./list/dongman/"><img src="./static_mg/images/more_1.png" />更多精彩动漫</a>
		<a class="switch-button" data-list-type="dongman"><img src="./static_mg/images/more_2.png" />换一换</a>
	</div>
</div>

<div class="clear" style="height:2rem"></div>

<div class="copyright">
	<p>本站内容均来自于互联网资源实时采集</p>
	<p>本源码仅用做学习交流</p>
</div>

<a class="scroll-to-top" id="scrollToTop"></a>

<script src="./static_mg/js/jquery.min.js"></script>
<script src="./static_mg/js/common.js"></script>
<script src="./static_mg/js/index.js"></script>
<script language="javascript" type="text/javascript" src="http://js.users.51.la/18759442.js"></script>
<div style="display: none">
<script type="text/javascript" src="https://s9.cnzz.com/z_stat.php?id=1279824854&web_id=1279824854"></script>
    </div>
</body>
</html>

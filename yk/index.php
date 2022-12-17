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
<title>智云影视</title>
<meta name="keywords" content="刀客源码网影视,全网VIP免费,免费VIP电影,免费VIP电视剧,免费VIP综艺,免费VIP动漫,在线免费看">
<meta name="description" content="刀客源码网影视提供一个全网VIP电影,电视剧,综艺,动漫等系列影视免费在线观看。">
<link rel="stylesheet" type="text/css" href="./static_yk/css/jquery.mobile.min.css">
<link rel="stylesheet" type="text/css" href="./static_yk/css/common.css">
</head>

<body class="body" oncontextmenu="return false">

<div class="header">
	<a class="logo" href="./" style="background-image:url(./static_yk/images/logo.png)"></a>
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
		<a href="./list/dianshi/"><img src="./static_yk/images/more_1.png" />更多精彩电视剧</a>
		<a class="switch-button" data-list-type="dianshi"><img src="./static_yk/images/more_2.png" />换一换</a>
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
		<a href="./list/dianying/"><img src="./static_yk/images/more_1.png" />更多精彩电影</a>
		<a class="switch-button" data-list-type="dianying"><img src="./static_yk/images/more_2.png" />换一换</a>
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
		<a href="./list/zongyi/"><img src="./static_yk/images/more_1.png" />更多精彩综艺</a>
		<a class="switch-button" data-list-type="zongyi"><img src="./static_yk/images/more_2.png" />换一换</a>
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
		<a href="./list/dongman/"><img src="./static_yk/images/more_1.png" />更多精彩动漫</a>
		<a class="switch-button" data-list-type="dongman"><img src="./static_yk/images/more_2.png" />换一换</a>
	</div>
</div>
<div class="clear" style="height:2rem"></div>
<div class="copyright">
	<p>全网最新影片资源</p>
</div>
<!--底部导航-->
	<div class="myui-nav__tabbar">
        <a class="item" href="./">
			<img  class="iconfont" src="./static_yk/images/icon_tj.png">
			<p class="title" class="current">首页</p>
		</a>
		<a class="item" href="./list/dianying/">
			<img  class="iconfont" src="./static_yk/images/icon_dy.png">
			<p class="title">电影</p>
		</a>
		<a class="item" href="./list/dianshi/">
			<img  class="iconfont" src="./static_yk/images/icon_dsj.png">
			<p class="title">电视剧</p>
		</a>
		<a class="item" href="./list/zongyi/">
			<img  class="iconfont" src="./static_yk/images/icon_zy.png">
			<p class="title">综艺</p>
		</a>
		<a class="item" href="./list/dongman/">
			<img  class="iconfont" src="./static_yk/images/icon_dh.png">
			<p class="title">动漫</p>
		</a>
	</div>
<!--底部版权-->	
<a class="scroll-to-top" id="scrollToTop"></a>

<script src="./static_yk/js/jquery.min.js"></script>
<script src="./static_yk/js/common.js"></script>
<script src="./static_yk/js/index.js"></script>
<div style="display: none">
<script type="text/javascript" src="https://s9.cnzz.com/z_stat.php?id=1279824854&web_id=1279824854"></script>
    </div>
</body>
</html>

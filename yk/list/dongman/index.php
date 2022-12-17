<?php

if(!isset($_GET["condition"])){ $_GET['condition'] = ""; }
if(!isset($_GET["page"]) || !is_numeric($_GET["page"]) || $_GET["page"] < 1){ $_GET["page"] = 1; }
require "../../data/index.php";
$data = data(array("act" => "list","type" => "dongman","filter" => $_GET["condition"],"page" => $_GET["page"]));

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta name="referrer" content="no-referrer">
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
<title>动漫</title>
<meta name="keywords" content="刀客源码网,全网VIP免费,免费VIP电影,免费VIP电视剧,免费VIP综艺,免费VIP动漫,在线免费看">
<meta name="description" content="智云影视提供一个全网VIP电影,电视剧,综艺,动漫等系列影视免费在线观看。">
<link rel="stylesheet" type="text/css" href="../../static_yk/css/jquery.mobile.min.css">
<link rel="stylesheet" type="text/css" href="../../static_yk/css/common.css">
</head>

<body class="body" ltype="dongman">

<div class="header">
	<a class="logo" href="../../" style="background-image:url(../../static_yk/images/logo.png)"></a>
	<div class="search">
		<input type="text" placeholder="输入你想看的" id="search" />
		<a id="searchDo"></a>
	</div>
	<div class="navigate">
		<a href="../../">精选</a>
		<a href="../dianying/">电影</a>
		<a href="../dianshi/">电视剧</a>
		<a href="../zongyi/">综艺</a>
		<a href="../dongman/" class="current">动漫</a>
	</div>
</div>

<div class="clear" style="height:0.2rem"></div>

<div class="condition" id="conditionBox">
	<?php foreach($data['filter'] as $condition){ ?>
		<div class="s-slide-menu"><div>
			<?php foreach($condition as $k => $v){ ?>
				<a href="./?condition=<?php echo urlencode($v)?>"<?php echo $v === $_GET['condition'] ? ' class="now"' : ''?>><?php echo  htmlspecialchars(substr($k,1))?></a>
			<?php } ?>
		</div></div>
	<?php } ?>
</div>

<div class="list">

	<?php if(!isset($data['list']) || count($data['list']) === 0){ ?>
	<div class="no-data" id="noDataBox" style="margin-top:1rem;background:none">没有找到相关影片，请尝试其他分类！</div>

	<?php }else{ ?>
	<div class="items" id="listList">
		<?php foreach($data['list'] as $v){ ?>
		<a href="../../play/?vid=<?php echo urlencode($v['id'])?>">
			<i style="background-image:url(<?php echo $v['pic']?>)"><b><?php echo $v['hint']?></b></i>
			<span><?php echo htmlspecialchars($v['title'])?></span>
		</a>
		<?php } ?>
		<span class="clear"></span>
	</div>

	<div class="more">
		<a class="prev" href="./?condition=<?php echo urlencode($_GET['condition'])?>&page=<?php echo $_GET['page'] - 1?>"<?php echo $_GET['page'] <= 1 ? ' style="display:none"' : ''?>><img src="../../static_yk/images/more.png" />上一页</a>
		<a class="next" href="./?condition=<?php echo urlencode($_GET['condition'])?>&page=<?php echo $_GET['page'] + 1?>"<?php echo !$data['hasmore'] ? ' style="display:none"' : ''?>>下一页<img src="../../static_yk/images/more.png" /></a>
	</div>
	<?php } ?>
</div>

<div class="clear" style="height:2rem"></div>

<div class="copyright">
	<p>版权归原创作者所有</p>
</div>
	<div class="myui-nav__tabbar">
        		<a class="item" href="../../">
			<img  class="iconfont" src="../../static_yk/images/icon_tj.png">
			<p class="title">首页</p>
		</a>
		<a class="item" href="../dianying/">
			<img  class="iconfont" src="../../static_yk/images/icon_dy.png">
			<p class="title">电影</p>
		</a>
		<a class="item" href="../dianshi/">
			<img  class="iconfont" src="../../static_yk/images/icon_dsj.png">
			<p class="title">电视剧</p>
		</a>
		<a class="item" href="../zongyi/">
			<img  class="iconfont" src="../../static_yk/images/icon_zy.png">
			<p class="title">综艺</p>
		</a>
		<a class="item" href="../dongman/">
			<img  class="iconfont" src="../../static_yk/images/icon_dh.png">
			<p class="title">动漫</p>
		</a>
	</div>
<a class="scroll-to-top" id="scrollToTop"></a>

<script src="../../static_yk/js/jquery.min.js"></script>
<script src="../../static_yk/js/common.js"></script>
<script src="../../static_yk/js/list.js"></script>
<div style="display: none">
<script type="text/javascript" src="https://s9.cnzz.com/z_stat.php?id=1279824854&web_id=1279824854"></script>
    </div>
</body>
</html>

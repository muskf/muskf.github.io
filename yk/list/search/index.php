<?php

if(!isset($_GET["keyword"])){ header("Location: ../../");die(); }
if(!isset($_GET["page"]) || !is_numeric($_GET["page"]) || $_GET["page"] < 1){ $_GET["page"] = 1; }
require "../../data/index.php";
$data = data(array("act" => "search","word" => $_GET["keyword"],"page" => $_GET["page"]));

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta name="referrer" content="no-referrer">
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
<title>搜索结果 - <?php echo htmlspecialchars($_GET['keyword'])?></title>
<meta name="keywords" content="搜索关键词<?php echo htmlspecialchars($_GET['keyword'])?>的搜索结果.">
<meta name="description" content="搜索关键词<?php echo htmlspecialchars($_GET['keyword'])?>的搜索结果。">
<link rel="stylesheet" type="text/css" href="../../static_yk/css/jquery.mobile.min.css">
<link rel="stylesheet" type="text/css" href="../../static_yk/css/common.css">
</head>

<body class="body">

<div class="header">
	<a class="logo" href="../../" style="background-image:url(../../static_yk/images/logo.png)"></a>
	<div class="search">
		<input type="text" placeholder="输入你想看的" id="search" value="<?php echo htmlspecialchars($_GET['keyword'])?>" />
		<a id="searchDo"></a>
	</div>
	<div class="navigate">
		<a href="../../">精选</a>
		<a href="../dianying/">电影</a>
		<a href="../dianshi/">电视剧</a>
		<a href="../zongyi/">综艺</a>
		<a href="../dongman/">动漫</a>
	</div>
</div>

<div class="clear" style="height:0.5rem"></div>

<div class="keywords" id="keywordItem"><b>“<?php echo htmlspecialchars($_GET['keyword'])?>”</b> 的搜索结果：</div>

<div class="list">

	<?php if(!isset($data['list']) || count($data['list']) === 0){ ?>
	<div class="no-data" id="noDataBox" style="margin-top:1rem;background:none">没有找到相关影片，请尝试其他关键词！</div>

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
		<a class="prev" href="./?keyword=<?php echo urlencode($_GET['keyword'])?>&page=<?php echo $_GET['page'] - 1?>"<?php echo $_GET['page'] <= 1 ? ' style="display:none"' : ''?>><img src="../../static_yk/images/more.png" />上一页</a>
		<a class="next" href="./?keyword=<?php echo urlencode($_GET['keyword'])?>&page=<?php echo $_GET['page'] + 1?>"<?php echo !$data['hasmore'] ? ' style="display:none"' : ''?>>下一页<img src="../../static_yk/images/more.png" /></a>
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
<div style="display: none">
<script type="text/javascript" src="https://s9.cnzz.com/z_stat.php?id=1279824854&web_id=1279824854"></script>
    </div>
</body>
</html>

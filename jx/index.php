<?php 
include('./aike.config.php'); 
$jiexi = explode("#", $aike['jiexi']); 
$url=!empty($_GET["url"])?$_GET["url"]:'';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" /> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $aike['sitename']?>-全网VIP视频无广告播放</title>
<link href="style.css" rel="stylesheet">
<script src="style.js" type="text/javascript"></script>
<link href="static/layui/css/layui.css" rel="stylesheet">
<script src="static/js/jquery.min.js"></script>
</head>
<body style="overflow-y:hidden;">
<div class="panel" id="XianLuBox">
    <a href="javascript:void(0)" class="red"><p id="Close">
    关闭选择×</p></a>
     <?php
    for($i=0;$i<count($jiexi);$i++){
        $jxlink="'".$jiexi[$i].$url."'";
        $k=$i+1;
        echo '<a class="jiexi" href="javascript:QQ('.$jxlink.')">解析'.$k.'线</a>';
    } 
    ?> 
 
</div>
<?php
if(strstr($url,'.m3u8')){//如果是m3u8
    if(($aike['m_type']==1)&&(is_mobile())){//手机且不用解析
?>
    <div style="width:100%;height:100%;">
    <iframe id="WANG" scrolling="no" allowtransparency="true" frameborder="0"
            src="<?php echo $url; ?>" width="100%" scrolling="no" height="100%" align="middle" frameborder="no" hspace="0" vspace="0" allowFullscreen="true" marginheight="0" marginwidth="0" name="tv"></iframe>
<?php 
    }else if(isset($aike['inm3u8jiexi'])){//是m3u8且站内播放+解析
?>
    <iframe id="WANG" scrolling="no" allowtransparency="true" frameborder="0"
            src="<?php echo $aike['inm3u8jiexi'].$url; ?>" width="100%" scrolling="no" height="100%" align="middle" frameborder="no" hspace="0" vspace="0" allowFullscreen="true" marginheight="0" marginwidth="0" name="tv"></iframe>
<?php 
}
}else {
?>
<a href="javascript:void(0)"><p class="slide WANG" id="XianLu">
   切换线路</p></a>
<div style="margin:-36px auto;width:100%;height:100%;"> 
 <iframe id="WANG" scrolling="no" allowtransparency="true" frameborder="0"
            src="<?php echo $jiexi[0].$url; ?>"width="100%" scrolling="no" height="100%" align="middle" frameborder="no" hspace="0" vspace="0" allowFullscreen="true" marginheight="0" marginwidth="0" name="tv"></iframe>
<?php }?>

    <script type="text/javascript"> 
        function QQ(url) {     
            $('#WANG').attr('src', decodeURIComponent(decodeURIComponent(url))).show();              
        } 
    </script>
</div>
  <script type="text/javascript">
    $( document ).ready( function () {
      $('#XianLu').click(function () {
        $('.panel').slideToggle();
        $(this).toggleClass("hidden");
      });
      $('.panel a').click(function(){
        $('.panel').slideToggle();
        $(this).addClass("active").siblings().removeClass("active");
        $("#XianLu").removeClass("hidden");
      });
       $('#Close').click(function () {
        
        $(this).addClass("active").siblings().removeClass("active");
        $("#XianLu").removeClass("hidden");
      });
    } );
    document.oncontextmenu = function () {
      return false;
    }
  
</script> 

</div><div style="display: none">
<?php echo $aike['tongji']?>
</div>
</body>
</html>

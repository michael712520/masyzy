<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />

<title><?php echo $this->_var['page_title']; ?></title>



<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="animated_favicon.gif" type="image/gif" />
<link href="<?php echo $this->_var['ecs_css_path']; ?>" rel="stylesheet" type="text/css" />
<link rel="alternate" type="application/rss+xml" title="RSS|<?php echo $this->_var['page_title']; ?>" href="<?php echo $this->_var['feed_url']; ?>" />

<?php echo $this->smarty_insert_scripts(array('files'=>'common.js,index.js')); ?>
</head>
<body class="index_body">
<?php echo $this->fetch('library/page_header.lbi'); ?>
<div class="es_w clearfix">
  
  <div  class="AreaL">
  
<?php echo $this->fetch('library/category_tree.lbi'); ?>
<?php echo $this->fetch('library/recommend_all.lbi'); ?>


  </div>
  
  
  <div class="AreaR">
   
   <div class="blank"></div>
    <div class="box clearfix">
       <?php echo $this->fetch('library/index_ad.lbi'); ?>
        </div>
    <div class="box syhd">
  <div class="LeftBotton" onmousedown="ISL_GoUp()" onmouseup="ISL_StopUp()" onmouseout="ISL_StopUp()"></div>
  <div id="ISL_Cont" class="clearfix">
   <div class="ScrCont"> 
    <div id="List1"> 
   
<?php $this->assign('ads_id','2'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
<?php $this->assign('ads_id','3'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
<?php $this->assign('ads_id','4'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
<?php $this->assign('ads_id','5'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
<?php $this->assign('ads_id','6'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
<?php $this->assign('ads_id','7'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
<?php $this->assign('ads_id','8'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>

</div>
    <div id="List2"></div> 
      </div>
  </div>
  <div class="RightBotton" onmousedown="ISL_GoDown()" onmouseup="ISL_StopDown()" onmouseout="ISL_StopDown()"></div>
</div>
<script language="javascript" type="text/javascript"> 
<!-- 

//图片滚动列表 5icool.org 
var Speed = 1; //速度(毫秒) 
var Space = 5; //每次移动(px) 
var PageWidth = 716; //翻页宽度 
var fill = 0; //整体移位 
var MoveLock = false; 
var MoveTimeObj; 
var Comp = 0; 
var AutoPlayObj = null; 
GetObj("List2").innerHTML = GetObj("List1").innerHTML; 
GetObj('ISL_Cont').scrollLeft = fill; 
GetObj("ISL_Cont").onmouseover = function(){clearInterval(AutoPlayObj);} 
GetObj("ISL_Cont").onmouseout = function(){AutoPlay();} 
AutoPlay(); 
function GetObj(objName){if(document.getElementById){return eval('document.getElementById("'+objName+'")')}else{return eval('document.all.'+objName)}} 
function AutoPlay(){ //自动滚动 
clearInterval(AutoPlayObj); 
AutoPlayObj = setInterval('ISL_GoDown();ISL_StopDown();',3000); //间隔时间 
} 
function ISL_GoUp(){ //上翻开始 
if(MoveLock) return; 
clearInterval(AutoPlayObj); 
MoveLock = true; 
MoveTimeObj = setInterval('ISL_ScrUp();',Speed); 
} 
function ISL_StopUp(){ //上翻停止 
clearInterval(MoveTimeObj); 
if(GetObj('ISL_Cont').scrollLeft % PageWidth - fill != 0){ 
Comp = fill - (GetObj('ISL_Cont').scrollLeft % PageWidth); 
CompScr(); 
}else{ 
MoveLock = false; 
} 
AutoPlay(); 
} 
function ISL_ScrUp(){ //上翻动作 
if(GetObj('ISL_Cont').scrollLeft <= 0){GetObj('ISL_Cont').scrollLeft = GetObj('ISL_Cont').scrollLeft + GetObj('List1').offsetWidth} 
GetObj('ISL_Cont').scrollLeft -= Space ; 
} 
function ISL_GoDown(){ //下翻 
clearInterval(MoveTimeObj); 
if(MoveLock) return; 
clearInterval(AutoPlayObj); 
MoveLock = true; 
ISL_ScrDown(); 
MoveTimeObj = setInterval('ISL_ScrDown()',Speed); 
} 
function ISL_StopDown(){ //下翻停止 
clearInterval(MoveTimeObj); 
if(GetObj('ISL_Cont').scrollLeft % PageWidth - fill != 0 ){ 
Comp = PageWidth - GetObj('ISL_Cont').scrollLeft % PageWidth + fill; 
CompScr(); 
}else{ 
MoveLock = false; 
} 
AutoPlay(); 
} 
function ISL_ScrDown(){ //下翻动作 
if(GetObj('ISL_Cont').scrollLeft >= GetObj('List1').scrollWidth){GetObj('ISL_Cont').scrollLeft = GetObj('ISL_Cont').scrollLeft - GetObj('List1').scrollWidth;} 
GetObj('ISL_Cont').scrollLeft += Space ; 
} 
function CompScr(){ 
var num; 
if(Comp == 0){MoveLock = false;return;} 
if(Comp < 0){ //上翻 
if(Comp < -Space){ 
Comp += Space; 
num = Space; 
}else{ 
num = -Comp; 
Comp = 0; 
} 
GetObj('ISL_Cont').scrollLeft -= num; 
setTimeout('CompScr()',Speed); 
}else{ //下翻 
if(Comp > Space){ 
Comp -= Space; 
num = Space; 
}else{ 
num = Comp; 
Comp = 0; 
} 
GetObj('ISL_Cont').scrollLeft += num; 
setTimeout('CompScr()',Speed); 
} 
} 

//--> 
</script> 
  </div>
  
  <div class="box_1 wenz">
    
<?php $this->assign('ads_id','1'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>

</div>
<div style="clear:both"></div> 
   <div class="blank"></div> 
  <div class="blank"></div>
<div class="es_w clearfix">
  <div class="down_l">
   
<?php $this->assign('cat_goods',$this->_var['cat_goods_25']); ?><?php $this->assign('goods_cat',$this->_var['goods_cat_25']); ?><?php echo $this->fetch('library/cat_goods.lbi'); ?>
<?php $this->assign('cat_goods',$this->_var['cat_goods_161']); ?><?php $this->assign('goods_cat',$this->_var['goods_cat_161']); ?><?php echo $this->fetch('library/cat_goods.lbi'); ?>
<?php $this->assign('cat_goods',$this->_var['cat_goods_149']); ?><?php $this->assign('goods_cat',$this->_var['goods_cat_149']); ?><?php echo $this->fetch('library/cat_goods.lbi'); ?>
<?php $this->assign('cat_goods',$this->_var['cat_goods_151']); ?><?php $this->assign('goods_cat',$this->_var['goods_cat_151']); ?><?php echo $this->fetch('library/cat_goods.lbi'); ?>
<?php $this->assign('cat_goods',$this->_var['cat_goods_155']); ?><?php $this->assign('goods_cat',$this->_var['goods_cat_155']); ?><?php echo $this->fetch('library/cat_goods.lbi'); ?>

</div>
<div class="cxhd">  
   
<?php echo $this->fetch('library/recommend_promotion.lbi'); ?>
<?php echo $this->fetch('library/top10.lbi'); ?>
 
</div>
</div>
 
  
   
 
  
  
</div>


    <?php echo $this->fetch('library/help.lbi'); ?>
 
<?php echo $this->fetch('library/page_footer.lbi'); ?>
</body>
</html>

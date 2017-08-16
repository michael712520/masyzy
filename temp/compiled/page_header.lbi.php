<link href="themes/ecmoban_jindong2013/css/all.css" rel="stylesheet" type="text/css" />
<link href="themes/ecmoban_jindong2013/css/index_nav.css" rel="stylesheet" type="text/css" />

<?php echo $this->smarty_insert_scripts(array('files'=>'jquery.min.js')); ?> 
<script type="text/javascript">
var process_request = "<?php echo $this->_var['lang']['process_request']; ?>";
</script> 
<script type="text/javascript">
function disp_over()
{
document.getElementById("wzdh_3").style.display="block";
}
function disp_out()
{
document.getElementById("wzdh_3").style.display="none";
}
</script>
<script type="text/javascript">
function zzkf_1()
{
document.getElementById("zzkf_ba").style.display="block";
document.getElementById("zzkf_ah").style.display="none";
}
function zzkf_2()
{
document.getElementById("zzkf_ah").style.display="block";
document.getElementById("zzkf_ba").style.display="none";
}
</script>

<div class="zzkf clearfix">
<div id="zzkf_ah" class="zzkf_ah" onclick="zzkf_1()">在线客服</div>
<div id="zzkf_ba" class="zzkf_ba">
<div class="zzkf_title"><span class="zzkf_title_1">在线客服</span><span class="x" onclick="zzkf_2()">x</span></div>
<div class="zzkf_content">
<?php $_from = $this->_var['qq']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'im');if (count($_from)):
    foreach ($_from AS $this->_var['im']):
?>
      <?php if ($this->_var['im']): ?>
      <p><a href="http://wpa.qq.com/msgrd?v=3&amp;uin=<?php echo $this->_var['im']; ?>&amp;site=qq&amp;menu=yes" target="_blank"><img src="http://wpa.qq.com/pa?p=1:<?php echo $this->_var['im']; ?>:4" height="16" border="0" alt="QQ" style="vertical-align:middle;"/></a>QQ客服</p>
      <?php endif; ?>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      <?php $_from = $this->_var['ww']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'im');if (count($_from)):
    foreach ($_from AS $this->_var['im']):
?>
      <?php if ($this->_var['im']): ?>
     <p><a href="http://amos1.taobao.com/msg.ww?v=2&uid=<?php echo urlencode($this->_var['im']); ?>&s=2" target="_blank"><img src="http://amos1.taobao.com/online.ww?v=2&uid=<?php echo urlencode($this->_var['im']); ?>&s=2" width="16" height="16" border="0" alt="淘宝旺旺" style="vertical-align:middle;" /></a>阿里旺旺</p>
      <?php endif; ?>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
<div class="zzkf_foot">
<h4>客服电话</h4>
<em><?php if ($this->_var['service_phone']): ?>
      <?php echo $this->_var['service_phone']; ?>
 <?php endif; ?></em>
</div>
</div>
</div>
</div>
<ul id="top_nav_ul">
  <div class="es_w clearfix"  style=" position:relative">
    <div style="float:right; height:31px; max-width: 210px;" class="clearfix"> 
    <div style="float:left;display:inline-block;">
      <?php $_from = $this->_var['navigator_list']['top']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'nav');$this->_foreach['nav_top_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nav_top_list']['total'] > 0):
    foreach ($_from AS $this->_var['nav']):
        $this->_foreach['nav_top_list']['iteration']++;
?> 
      <a href="<?php echo $this->_var['nav']['url']; ?>"  <?php if ($this->_var['nav']['opennew'] == 1): ?> target="_blank" <?php endif; ?>><?php echo $this->_var['nav']['name']; ?></a> <img style="vertical-align:middle" src="themes/ecmoban_jindong2013/images/nav_li.gif"> 
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      </div>
      <div class="wzdh" onmouseover="disp_over()" onmouseout="disp_out()"> <span class="wzdh_1"></span> <span class="wzdh_2"></span> <a href="#">网站导航</a>
        <div class="wzdh_3 clearfix" id="wzdh_3">
          <ul class="wzdh_ul">
            <li class="wzdh_li">新手疑问</li>
            <li><a href="article.php?id=9">售后流程</a></li>
            <li><a href="article.php?id=10">购物流程</a></li>
            <li><a href="article.php?id=11">订购方式</a></li>
            <li><a href="article.php?id=17">支付说明</a></li>
          </ul>
            <ul class="wzdh_ul">
            <li class="wzdh_li">常用功能</li>
            <li><a href="flow.php">进购物车</a></li>
            <li><a href="user.php?act=order_list">我的订单</a></li>
            <li><a href="user.php?act=account_log">资金管理</a></li>
            <li><a href="user.php?act=collection_list">我的收藏</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div  style="float:left; color:#acacac; padding-right:15px;"> <?php echo $this->smarty_insert_scripts(array('files'=>'transport.js,utils.js')); ?> <font id="ECS_MEMBERZONE"><?php 
$k = array (
  'name' => 'member_info',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?> </font> </div>
  </div>
</ul>
<div style="clear:both"></div>
<div class="es_w clearfix" style="position:relative; z-index:999; height:90px;">
  <div class="logo  " ><a  href="index.php" name="top"><img src="themes/ecmoban_jindong2013/images/logo.gif" /> </a></div>
  <div id="search" >
    <form id="searchForm" name="searchForm" method="get" action="search.php" onSubmit="return checkSearchForm()"  >
      <div class="B_input_box">
        <input name="keywords" type="text" id="keyword" value="品名或商品号" onclick="javascript:this.value=''" class="B_input"/>
      </div>
      <input name="imageField" type="submit" value="" class="go" style="cursor:pointer;" />
    </form>
    <div class="keys  "> 
      <script type="text/javascript">
    
    <!--
    function checkSearchForm()
    {
        if(document.getElementById('keyword').value)
        {
            return true;
        }
        else
        {
           alert("<?php echo $this->_var['lang']['no_keywords']; ?>");
            return false;
        }
    }
    -->
    
    </script> 
      <?php if ($this->_var['searchkeywords']): ?> <b> 热门关键词：</b> <?php $_from = $this->_var['searchkeywords']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'val');if (count($_from)):
    foreach ($_from AS $this->_var['val']):
?> <a href="search.php?keywords=<?php echo urlencode($this->_var['val']); ?>"><?php echo $this->_var['val']; ?></a> <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      <?php endif; ?> </div>
  </div>
  <div style=" float:right;  margin-top:28px; width: 131px;">
    <div class="buy_car_bg_box" style="float:right;  ">
      <div class="buy_car_bg " id="ECS_CARTINFO" onmouseover="this.className='buy_car_bg ul1_on'" onmouseout="this.className='buy_car_bg'"> <a   href="flow.php">去购物车结算</a>
        <div class="dang"></div>
      </div>
    </div>
  </div>
  <div style=" float:right;  margin-top:28px;margin-right: 12px;">
    <div class="buy_car_bg_box" style="float:right;  ">
      <div id="ECS_CARTINFO"> <a   href="user.php?act=collection_list"><img src="themes/ecmoban_jindong2013/images/myyzy.png" /></a>
        <div class="dang"></div>
      </div>
    </div>
  </div>
</div>
<div style="clear:both"></div>
<div   class="head_down clearfix" style=" position:relative; z-index:999; ">
  <div id="mainNav" class="clearfix">
    <div class="category_all2"  onmouseover="this.className='category_all2 category_all2_on'" onmouseout="this.className='category_all2'"> <a class="all" href="categoryall.php?id=0">全部商品分类</a>
      <div class="category_all20"><?php echo $this->fetch('category_tree.lbi'); ?></div>
      <style type="text/css">
	 
    <!--
.category_all2 .category_all20 {display:none;}
.category_all2_on {position:relative;}
.category_all2_on .category_all20 {display:block;position:absolute;top:39px;left:0;}
		  -->
    
</style>
    </div>
    <a class="aa" href="index.php"  <?php if ($this->_var['navigator_list']['config']['index'] == 1): ?> id="aa_on"   <?php endif; ?>><?php echo $this->_var['lang']['home']; ?> </a> 
    
    <?php $_from = $this->_var['navigator_list']['middle']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'nav');$this->_foreach['nav_middle_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nav_middle_list']['total'] > 0):
    foreach ($_from AS $this->_var['nav']):
        $this->_foreach['nav_middle_list']['iteration']++;
?> 
    
    <a  class="aa" <?php if ($this->_var['nav']['active'] == 1): ?>  id="aa_on" <?php endif; ?>  href="<?php echo $this->_var['nav']['url']; ?>" <?php if ($this->_var['nav']['opennew'] == 1): ?>target="_blank" <?php endif; ?>><?php echo $this->_var['nav']['name']; ?></a> 
    
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
        <a style="
   
    color: #F7161F;  
    text-decoration: none;  float: left;  
    height: 37px;  line-height: 37px;  
    text-align: center;
    font-size: 18px;  

    font-weight: bold;
    margin-left: 20px;
">批量订购&nbsp;&nbsp;价格优惠&nbsp;&nbsp;电议<span style=" font-size: 14px;">或</span>面议</a>
  </div>
</div>
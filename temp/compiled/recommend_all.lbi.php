   <script type="text/javascript">
        function nTabs(thisObj, Num) {
            if (thisObj.className == "active") return;
            var tabObj = thisObj.parentNode.id;//赋值指定节点的父节点的id名字
            var tabList = document.getElementById(tabObj).getElementsByTagName("li");
            for (i = 0; i < tabList.length; i++) {//点击之后，其他tab变成灰色，内容隐藏，只有点击的tab和内容有属性
                if (i == Num) {
                    thisObj.className = "active";
                    document.getElementById(tabObj + "_Content" + i).style.display = "block";
                } else {
                    tabList[i].className = "normal";
                    document.getElementById(tabObj + "_Content" + i).style.display = "none";
                }
            }
        }
    </script>
<div class="all_goods">
<?php if ($this->_var['best_goods']): ?>
<?php if ($this->_var['new_goods']): ?>
<?php if ($this->_var['hot_goods']): ?>
		<div class="TabTitle">
            <ul id="myTab" class="clearfix">
               <li class="active" onmouseover="nTabs(this,0);">
                <span><a href="javascript:void(0)" onclick="change_tab_style('itemBest', 'span', this);get_cat_recommend(1, 0);">精品推荐</a></span></li>
               <li class="normal" onmouseover="nTabs(this,1);">
                <span><a href="javascript:void(0)" onclick="change_tab_style('itemhot', 'span', this);get_cat_recommend(3, 0);">热销商品</a></span></li>
               <li class="normal" onmouseover="nTabs(this,2);">
                <span><a href="javascript:void(0)" onclick="change_tab_style('itemnew', 'span', this);get_cat_recommend(2, 0);">今日上架</a></span></li>
            </ul>
        </div>
  <div class="TabContent">

<div class="blank"></div>
   <div id="myTab_Content0">
  <div id="show_best_area" class="clearfix">
  <?php $_from = $this->_var['best_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
  <div class="goodsItem"> 
     <div class="goodsItem_best"></div>
           <a href="<?php echo $this->_var['goods']['url']; ?>"><img src="<?php echo $this->_var['goods']['thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" class="goodsimg" /></a><br />
           <p class="f1"><a href="<?php echo $this->_var['goods']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"><?php echo $this->_var['goods']['goods_style_name']; ?></a></p>
      <font class="market"><?php echo $this->_var['goods']['market_price']; ?></font><br />
           <font class="f1">
           <?php if ($this->_var['goods']['promote_price'] != ""): ?>
          <?php echo $this->_var['goods']['promote_price']; ?>
          <?php else: ?>
          <?php echo $this->_var['goods']['shop_price']; ?>
          <?php endif; ?>
           </font>
        </div>
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
   </div>
   </div>
   
 <div id="myTab_Content1">
 <div id="show_hot_area" class="clearfix">
  <?php $_from = $this->_var['hot_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
  <div class="goodsItem"> 
  <div class="goodsItem_hot"></div>
           <a href="<?php echo $this->_var['goods']['url']; ?>"><img src="<?php echo $this->_var['goods']['thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" class="goodsimg" /></a><br />
           <p class="f1"><a href="<?php echo $this->_var['goods']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"><?php echo $this->_var['goods']['goods_style_name']; ?></a></p>
      <font class="market"><?php echo $this->_var['goods']['market_price']; ?></font><br />
           <font class="f1">
           <?php if ($this->_var['goods']['promote_price'] != ""): ?>
          <?php echo $this->_var['goods']['promote_price']; ?>
          <?php else: ?>
          <?php echo $this->_var['goods']['shop_price']; ?>
          <?php endif; ?>
           </font>
        </div>
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </div>
  </div>

 <div id="myTab_Content2">
 <div id="show_new_area" class="clearfix">
  <?php $_from = $this->_var['new_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
  <div class="goodsItem"> 
   <div class="goodsItem_new"></div>
           <a href="<?php echo $this->_var['goods']['url']; ?>"><img src="<?php echo $this->_var['goods']['thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" class="goodsimg" /></a><br />
           <p class="f1"><a href="<?php echo $this->_var['goods']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"><?php echo $this->_var['goods']['goods_style_name']; ?></a></p>
      <font class="market"><?php echo $this->_var['goods']['market_price']; ?></font><br />
           <font class="f1">
           <?php if ($this->_var['goods']['promote_price'] != ""): ?>
          <?php echo $this->_var['goods']['promote_price']; ?>
          <?php else: ?>
          <?php echo $this->_var['goods']['shop_price']; ?>
          <?php endif; ?>
           </font>
        </div>
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </div>
</div>

</div>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
</div>
<?php if ($this->_var['promotion_goods']): ?>
<div class="box">
  <div class="hdcx_span"><em>特价商品</em></div>
  <div class="hdcx_list">
    <div class=" clearfix"> 
      <?php $_from = $this->_var['promotion_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_0_85098200_1503166679');$this->_foreach['promotion_foreach'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['promotion_foreach']['total'] > 0):
    foreach ($_from AS $this->_var['goods_0_85098200_1503166679']):
        $this->_foreach['promotion_foreach']['iteration']++;
?>
      
      <div class="hdcx_goods clearfix" <?php if ($this->_foreach['promotion_foreach']['iteration'] < 9): ?>style="border-bottom:1px dashed #cccccc"<?php endif; ?>>
        <div class="goodsimg"><a href="<?php echo $this->_var['goods_0_85098200_1503166679']['url']; ?>"><img src="<?php echo $this->_var['goods_0_85098200_1503166679']['thumb']; ?>" border="0" alt="<?php echo htmlspecialchars($this->_var['goods_0_85098200_1503166679']['name']); ?>" /></a></div>
        <div class="hdcx_pn">
        <p class="hdcx_pn1">
         <font class="f1"><?php echo $this->_var['goods_0_85098200_1503166679']['promote_price']; ?></font><font class="market" style="margin-left:5px;"><?php echo $this->_var['goods_0_85098200_1503166679']['market_price']; ?></font>
         </p>
          <p class="hdcx_pn2"><a href="<?php echo $this->_var['goods_0_85098200_1503166679']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods_0_85098200_1503166679']['name']); ?>"><?php echo $this->_var['goods_0_85098200_1503166679']['goods_style_name']; ?>&nbsp;&nbsp;<?php 
$k = array (
  'name' => 'attr',
  'aid' => '185',
  'gid' => $this->_var['goods_0_85098200_1503166679']['id'],
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>&nbsp;&nbsp;<?php 
$k = array (
  'name' => 'attr',
  'aid' => '178',
  'gid' => $this->_var['goods_0_85098200_1503166679']['id'],
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></a></p>
        </div>
      </div>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
    </div>
  </div>
</div>
<div class="blank"></div>
<?php endif; ?>
<div class="box top10">
  <div class="goods_table"><strong>销售排行榜</strong></div> 
  <div class="top10List clearfix">
  <?php $_from = $this->_var['top_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_0_01437400_1502327289');$this->_foreach['top_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['top_goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods_0_01437400_1502327289']):
        $this->_foreach['top_goods']['iteration']++;
?>
  <?php if ($this->_foreach['top_goods']['iteration'] < 6): ?>
  <ul class="clearfix">
	<img src="themes/ecmoban_jindong2013/images/top_<?php echo $this->_foreach['top_goods']['iteration']; ?>.gif" class="iteration" />
	
      <li class="topimg">
      <a href="<?php echo $this->_var['goods_0_01437400_1502327289']['url']; ?>"><img src="<?php echo $this->_var['goods_0_01437400_1502327289']['thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods_0_01437400_1502327289']['name']); ?>" class="samllimg" /></a>
      </li>

      <li>
      <p class="h_l"><a href="<?php echo $this->_var['goods_0_01437400_1502327289']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods_0_01437400_1502327289']['name']); ?>"><?php echo $this->_var['goods_0_01437400_1502327289']['goods_name']; ?></a></p>
      <p class="h_l"><font class="f1"><?php echo $this->_var['goods_0_01437400_1502327289']['price']; ?></font></p>
      </li>
     	
    </ul>	
     <?php endif; ?>	
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
 </div>
</div>
<div class="blank5"></div>
